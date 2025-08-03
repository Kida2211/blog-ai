<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIService
{
    public function generateText(string $prompt, string $tone = 'friendly'): string
    {
        // Define tone-based instructions
        $toneInstructions = match ($tone) {
            'professional' => 'in a professional and informative tone.',
            'informal'     => 'in a casual and humorous tone.',
            'persuasive'   => 'in a persuasive and convincing tone.',
            default        => 'in a friendly and conversational tone.',
        };

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type' => 'application/json',
        ])->post(config('services.openai.url') . '/chat/completions', [
            'model' => config('services.openai.model'),
            'messages' => [
                ['role' => 'system', 'content' => "You are a professional tech blogger. Write detailed blog posts $toneInstructions Each post should be 3–5 paragraphs long, clearly formatted with headings and paragraphs."],
                ['role' => 'user', 'content' => "Write a blog post titled: $prompt"]
            ],
            'temperature' => 0.7,
            'max_tokens' => 500,
        ]);

        if (!$response->successful()) {
            Log::error('OpenAI API error', ['body' => $response->body()]);
            throw new \Exception('API error: ' . $response->body());
        }

        return $response['choices'][0]['message']['content'] ?? 'No output received';
    }
}
