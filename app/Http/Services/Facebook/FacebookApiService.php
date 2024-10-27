<?php

namespace App\Http\Services\Facebook;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookApiService
{
    protected string $baseUrl;
    protected string $marketingToken;
    protected string $adAccountId;

    public function __construct()
    {
        $this->baseUrl = config('services.facebook.fb_api_base_url');
        $this->marketingToken = config('services.facebook.fb_marketing_token');
        $this->adAccountId = config('services.facebook.fb_ad_account_id');
    }

    public function makeRequest($method, $endpoint, ?array $data = [])
    {
        $url = "{$this->baseUrl}/{$endpoint}";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->marketingToken,
        ])->$method($url, $data ?: null);

        Log::info('Facebook Marketing API Request:', [
            'response' => $response->body()
        ]);

        return $response;
    }

}
