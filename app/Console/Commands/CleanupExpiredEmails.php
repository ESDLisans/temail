<?php

namespace App\Console\Commands;

use App\Models\TemporaryEmail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CleanupExpiredEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up expired temporary emails and their messages';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Cleaning up expired temporary emails...');
        
        try {
            DB::beginTransaction();
            
            // Find expired emails
            $expiredEmails = TemporaryEmail::where('expires_at', '<=', Carbon::now())
                ->with(['messages.attachments'])
                ->get();
                
            $count = $expiredEmails->count();
            $this->info("Found $count expired emails to clean up");
            
            foreach ($expiredEmails as $email) {
                // Remove attachment files from storage
                foreach ($email->messages as $message) {
                    foreach ($message->attachments as $attachment) {
                        if (Storage::exists($attachment->storage_path)) {
                            Storage::delete($attachment->storage_path);
                        }
                    }
                }
                
                // Delete the temporary email (cascades to messages and attachments)
                $email->delete();
            }
            
            DB::commit();
            $this->info("Successfully cleaned up $count expired emails");
            
            return self::SUCCESS;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error cleaning up expired emails: ' . $e->getMessage());
            $this->error('Error cleaning up expired emails: ' . $e->getMessage());
            
            return self::FAILURE;
        }
    }
}
