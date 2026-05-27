<?php

namespace Shaurya\LaravelAiChatWidget;

use Illuminate\Support\ServiceProvider;
use Shaurya\LaravelAiChatWidget\Console\Commands\InstallCommand;
use Shaurya\LaravelAiChatWidget\Console\Commands\InstallAiChatCommand;

class LaravelAiChatWidgetServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ai-chat');

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/ai-chat.php' => config_path('ai-chat.php'),
        ], 'ai-chat-config');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'ai-chat-migrations');

        // Publish assets
        $this->publishes([
            __DIR__ . '/../resources/js' => public_path('vendor/ai-chat/js'),
            __DIR__ . '/../resources/css' => public_path('vendor/ai-chat/css'),
        ], 'ai-chat-assets');

        // Register blade component
       $this->loadViewComponentsAs('ai-chat', [
            \Shaurya\LaravelAiChatWidget\View\Components\Widget::class,
        ]);
        
        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                InstallAiChatCommand::class,
            ]);
        }
    }
}