<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\SiteSettingController;
use Illuminate\Console\Command;

class CreateDefaultSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:create-defaults';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default site settings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new SiteSettingController();
        $controller->createDefaults(true); // Pass true to indicate this is being run from CLI
        
        $this->info('Default site settings created successfully.');
        
        return Command::SUCCESS;
    }
} 