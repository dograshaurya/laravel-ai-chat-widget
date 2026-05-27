<?php

namespace Shaurya\LaravelAiChatWidget\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InstallAiChatCommand extends Command
{
    protected $signature = 'ai-chat:install';

    protected $description = 'Install Laravel AI Chat Widget';

    public function handle(): void
    {
        $this->info('Installing Laravel AI Chat Widget...');

        Artisan::call('vendor:publish', [
            '--tag' => 'ai-chat-config',
            '--force' => true,
        ]);

        Artisan::call('migrate');

        $exists = DB::table('ai_chat_settings')->exists();

        if (!$exists) {
            DB::table('ai_chat_settings')->insert([
                'model' => 'gpt-4o-mini',
                'system_prompt' =>
                    'You are a helpful AI assistant.',
                'welcome_message' =>
                    'Hi 👋 How can I help you?',
                'theme_color' => '#2563eb',
                'enabled' => true,
                'lead_capture' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->info('Laravel AI Chat Widget Installed Successfully.');
    }
}