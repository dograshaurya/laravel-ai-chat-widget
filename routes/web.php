<?php

use Illuminate\Support\Facades\Route;
use Shaurya\LaravelAiChatWidget\Http\Controllers\AiChatSettingsController;
use Shaurya\LaravelAiChatWidget\Http\Controllers\AiChatController;

Route::prefix('ai-chat')->group(function () {
    Route::get('/test', function () {
        return response()->json([
            'status' => true,
            'message' => 'AI Chat Package Working'
        ]);
    });
});
Route::prefix('admin/ai-chat')
    ->name('ai-chat.')
    ->group(function () {

    Route::get('/settings', [
        AiChatSettingsController::class,
        'index'
    ])->name('settings');

    Route::post('/settings/update', [
            AiChatSettingsController::class,
            'update'
        ])->name('settings.update');

        Route::get('/faqs', [
        \Shaurya\LaravelAiChatWidget\Http\Controllers\FaqController::class,
        'index'
    ]);

    Route::post('/faqs', [
        \Shaurya\LaravelAiChatWidget\Http\Controllers\FaqController::class,
        'store'
    ]);
});

Route::prefix('ai-chat')->group(function () {

    Route::post('/send-message', [
        AiChatController::class,
        'sendMessage'
    ]);
});