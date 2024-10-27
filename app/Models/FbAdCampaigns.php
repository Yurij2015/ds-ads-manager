<?php

namespace App\Models;

use Illuminate\Support\Collection;

class FbAdCampaigns
{
    public Collection $campaigns;

    public function __construct(?array $campaigns)
    {
        $this->campaigns = collect($this->setCampaigns($campaigns));
    }

    public function setCampaigns(?array $campaigns): ?array
    {
        if (!$campaigns) {
            return null;
        }

        $processedCampaigns = [];
        foreach ($campaigns as $campaign) {
            $processedCampaigns[] = new FbAdCampaign($campaign);
        }
        return $processedCampaigns;
    }

    public function getCampaings(): Collection
    {
        return $this->campaigns;
    }

    public function toArray(): array
    {
        return $this->campaigns->toArray();
    }
}
