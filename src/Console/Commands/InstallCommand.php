<?php

namespace Shaurya\LaravelAiChatWidget\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'ai-chat:install';
    protected $description = 'Install AI Chat Widget package';

    public function handle()
    {
        $this->info('AI Chat Widget Package Installed Successfully!');

        return Command::SUCCESS;
    }
}