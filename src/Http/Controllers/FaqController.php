<?php

namespace Shaurya\LaravelAiChatWidget\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = DB::table('ai_chat_faqs')
            ->latest()
            ->get();

        return view(
            'ai-chat::faqs',
            compact('faqs')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        DB::table('ai_chat_faqs')
            ->insert([
                'question' =>
                    $request->question,
                'answer' =>
                    $request->answer,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return back()->with(
            'success',
            'FAQ added successfully.'
        );
    }
}