<?php

namespace App\Http\Controllers;

use App\Http\Services\Facebook\AdCampaignService;

class FacebookController extends Controller
{
    public function index(AdCampaignService $adCampaignService)
    {
        $adCampaigns = $adCampaignService->getCampaigns();
        return view('facebook.ad-campaigns', compact('adCampaigns'));
    }

    public function addCampaign()
    {
        return view('facebook.add-campaign');
    }

    public function storeAdCampaign(AdCampaignService $adCampaignService)
    {
        $adCampaignService->addCampaign();
        return redirect()->route('fb-campaigns');
    }

    public function adSets(AdCampaignService $adCampaignService)
    {
        $adSets = $adCampaignService->getAdSets();
        return view('facebook.ad-sets', compact('adSets'));
    }

    public function addAdSets()
    {
        return view('facebook.add-ad-sets');
    }

    public function ads(){
        return view('facebook.ads');
    }


    public function addAds(){
        return view('facebook.add-ads');
    }

    public function adCreatives(){
        return view('facebook.ad-creatives');
    }

    public function addAdCreatives(){
        return view('facebook.add-ad-creatives');
    }
}
