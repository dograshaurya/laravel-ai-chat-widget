<?php

namespace Shaurya\LaravelAiChatWidget\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AiChatSettingsController extends Controller
{
    public function index()
    {
        $settings = DB::table('ai_chat_settings')->first();

        if (!$settings) {
            DB::table('ai_chat_settings')->insert([
                'provider' => 'openai',
                'model' => 'gpt-4o-mini',
                'welcome_message' => 'Hi 👋 How can I help you today?',
                'theme_color' => '#2563eb',
                'widget_position' => 'right',
                'chat_title' => 'AI Assistant',
                'enabled' => true,
                'lead_capture' => false,
                'save_chat_history' => true,
                'temperature' => 0.70,
                'max_tokens' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $settings = DB::table('ai_chat_settings')->first();
        }

        return view('ai-chat::settings', compact('settings'));
    }

    public function update(Request $request)
    {
        DB::table('ai_chat_settings')
            ->updateOrInsert(
                ['id' => 1],
                [
                    'provider' => $request->provider,
                    'api_key' => $request->api_key,
                    'model' => $request->model,
                    'system_prompt' => $request->system_prompt,
                    'welcome_message' => $request->welcome_message,
                    'temperature' => $request->temperature,
                    'max_tokens' => $request->max_tokens,
                    'theme_color' => $request->theme_color,
                    'widget_position' => $request->widget_position,
                    'chat_title' => $request->chat_title,
                    'enabled' => $request->has('enabled'),
                    'lead_capture' => $request->has('lead_capture'),
                    'save_chat_history' => $request->has('save_chat_history'),
                    'updated_at' => now(),
                ]
            );

        return back()->with(
            'success',
            'Settings updated successfully.'
        );
    }
}