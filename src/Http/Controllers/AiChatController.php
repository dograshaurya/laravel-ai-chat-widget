<?php

namespace Shaurya\LaravelAiChatWidget\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use OpenAI;

class AiChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        try {

            $request->validate([
                'message' => 'required|string'
            ]);

            $settings = DB::table(
                'ai_chat_settings'
            )->first();

            if (!$settings) {
                return response()->json([
                    'success' => false,
                    'message' =>
                        'AI settings not found.'
                ], 400);
            }

            if (empty($settings->api_key)) {
                return response()->json([
                    'success' => false,
                    'message' =>
                        'OpenAI API key missing.'
                ], 400);
            }

           $message = trim(
                strtolower($request->message)
            );

            $keywords = explode(
                ' ',
                $message
            );

            $faqsQuery =
                DB::table('ai_chat_faqs')
                ->where('status', 1);

            foreach ($keywords as $keyword) {

                if(strlen($keyword) < 3){
                    continue;
                }

                $faqsQuery->orWhere(
                    'question',
                    'LIKE',
                    "%{$keyword}%"
                );

                $faqsQuery->orWhere(
                    'answer',
                    'LIKE',
                    "%{$keyword}%"
                );
            }

            $faqs = $faqsQuery
                ->limit(5)
                ->get();

            $faqContext = '';

            foreach ($faqs as $faq) {

                $faqContext .=
                    "Question: {$faq->question}\n";

                $faqContext .=
                    "Answer: {$faq->answer}\n\n";
            }

            $client = OpenAI::client(
                $settings->api_key
            );

            $response =
                $client->chat()->create([

                'model' =>
                    $settings->model
                    ?? 'gpt-4o-mini',

                'messages' => [
                    [
                        'role' => 'system',
                        'content' =>
                            "You are an AI business assistant.

                            Use the FAQ data below to answer.

                            If the answer exists in FAQs,
                            prioritize FAQ information.

                            If answer is not available,
                            respond professionally and
                            briefly.

                            FAQ DATA:
                            " . $faqContext
                    ],
                    [
                        'role' => 'user',
                        'content' =>
                            $request->message
                    ]
                ],

                'temperature' =>
                    $settings->temperature
                    ?? 0.7,

                'max_tokens' =>
                    $settings->max_tokens
                    ?? 500,
            ]);

            $reply =
                $response->choices[0]
                ->message
                ->content;

            DB::table(
                'ai_chat_messages'
            )->insert([
                'session_id' =>
                    session()->getId(),
                'message' =>
                    $request->message,
                'response' =>
                    $reply,
                'ip_address' =>
                    request()->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'reply' => $reply
            ]);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}