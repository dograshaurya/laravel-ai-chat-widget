<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_chat_settings', function (Blueprint $table) {
            $table->id();

            // AI Provider
            $table->string('provider')
                ->default('openai');

            // API Settings
            $table->text('api_key')
                ->nullable();

            $table->string('model')
                ->default('gpt-4o-mini');

            // Chat Behaviour
            $table->longText('system_prompt')
                ->nullable();

            $table->text('welcome_message')
                ->default('Hi 👋 How can I help you today?');

            $table->decimal('temperature', 3, 2)
                ->default(0.70);

            $table->integer('max_tokens')
                ->default(500);

            // Widget UI
            $table->string('theme_color')
                ->default('#2563eb');

            $table->string('widget_position')
                ->default('right');

            $table->string('chat_title')
                ->default('AI Assistant');

            // Features
            $table->boolean('enabled')
                ->default(true);

            $table->boolean('lead_capture')
                ->default(false);

            $table->boolean('save_chat_history')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_chat_settings');
    }
};