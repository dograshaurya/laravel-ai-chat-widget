<?php

namespace Shaurya\LaravelAiChatWidget\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Widget extends Component
{
    public $settings;

    public function __construct()
    {
        $this->settings = DB::table(
            'ai_chat_settings'
        )->first();
    }

    public function render()
    {
        return view('ai-chat::components.widget');
    }
}