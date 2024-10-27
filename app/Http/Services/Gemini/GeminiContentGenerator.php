<?php

namespace App\Http\Services\Gemini;

use JsonException;

readonly class GeminiContentGenerator
{

    public function __construct(private GeminiApiService $geminiApiService)
    {
    }

    /**
     * @throws JsonException
     */
    public function generateContent($data)
    {
        return $this->geminiApiService->makeRequest('post', 'generateContent', $data);
    }
}