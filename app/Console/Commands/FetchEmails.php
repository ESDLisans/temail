<?php

namespace App\Console\Commands;

use App\Services\EmailReceiver;
use Illuminate\Console\Command;

class FetchEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new emails from IMAP server';

    /**
     * Execute the console command.
     */
    public function handle(EmailReceiver $emailReceiver): int
    {
        $this->info('Fetching emails from IMAP server...');
        
        try {
            $emailReceiver->fetchEmails();
            $this->info('Emails fetch completed successfully');
            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error fetching emails: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
