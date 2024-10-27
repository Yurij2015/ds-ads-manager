<?php

namespace App\Http\Services\Gemini;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use JsonException;

class GeminiApiService
{
    protected string $baseUrl;
    protected string $key;

    public function __construct()
    {
        $this->baseUrl = config('services.gemini.gemini_api_base_url');
        $this->key = config('services.gemini.gemini_api_key');
    }

    /**
     * @throws JsonException
     */
    public function makeRequest($method, $geminiMethod, ?array $data = [])
    {
        $url = "{$this->baseUrl}{$geminiMethod}?key={$this->key}";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->$method($url, $data ?: null);

        Log::info('Gemini  API Request:', [
            'response' => $response->body()
        ]);

        return $response;
    }
}
