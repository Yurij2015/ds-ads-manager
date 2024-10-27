<?php

namespace App\Models;

class FbAdCampaign
{
    protected int $id;
    protected string $name;
    protected string $objective;
    protected string $accountId;
    protected string $buyingType;
    protected ?string $lifetimeBudget;
    protected ?string $bidStrategy;
    protected ?array $pacingType;
    protected string $status;
    protected string $effectiveStatus;
    protected string $startTime;

    protected ?string $stopTime;
    protected string $createdTime;
    protected string $updatedTime;
    protected array $specialAdCategories;
    protected string $smartPromotionType;
    protected bool $isSkadnetworkAttribution;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->objective = $data['objective'];
        $this->accountId = $data['account_id'];
        $this->buyingType = $data['buying_type'];
        $this->lifetimeBudget = $data['lifetime_budget'] ?? null;
        $this->bidStrategy = $data['bid_strategy'] ?? null;
        $this->pacingType = $data['pacing_type'] ?? [];
        $this->status = $data['status'];
        $this->effectiveStatus = $data['effective_status'];
        $this->startTime = $data['start_time'];
        $this->stopTime = $data['stop_time'] ?? null;
        $this->createdTime = $data['created_time'];
        $this->updatedTime = $data['updated_time'];
        $this->specialAdCategories = $data['special_ad_categories'];
        $this->smartPromotionType = $data['smart_promotion_type'];
        $this->isSkadnetworkAttribution = $data['is_skadnetwork_attribution'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getObjective()
    {
        return $this->objective;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function getBuyingType()
    {
        return $this->buyingType;
    }

    public function getLifetimeBudget()
    {
        return $this->lifetimeBudget;
    }

    public function getBidStrategy()
    {
        return $this->bidStrategy;
    }

    public function getPacingType()
    {
        return $this->pacingType;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getEffectiveStatus()
    {
        return $this->effectiveStatus;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getStopTime()
    {
        return $this->stopTime;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }

    public function getSpecialAdCategories()
    {
        return $this->specialAdCategories;
    }

    public function getSmartPromotionType()
    {
        return $this->smartPromotionType;
    }

    public function getIsSkadnetworkAttribution()
    {
        return $this->isSkadnetworkAttribution;
    }
}
