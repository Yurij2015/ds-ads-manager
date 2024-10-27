<?php

namespace App\Http\Services\Facebook;

use App\Models\FbAdCampaigns;
use Illuminate\Support\Collection;

class AdCampaignService
{
    protected string $baseUrl;
    protected string $marketingToken;
    protected string $adAccountId;

    public function __construct(private readonly FacebookApiService $facebookApiService)
    {
        $this->baseUrl = config('services.facebook.fb_api_base_url');
        $this->marketingToken = config('services.facebook.fb_marketing_token');
        $this->adAccountId = config('services.facebook.fb_ad_account_id');
    }

    public function getCampaigns(): Collection
    {
        $campaigns = $this->facebookApiService->makeRequest('get', 'act_' . $this->adAccountId . '/campaigns', [
            'fields' => 'id,name,objective,account_id,buying_type,daily_budget,lifetime_budget,spend_cap,bid_strategy,pacing_type,status,effective_status,promoted_object,recommendations,start_time,stop_time,created_time,updated_time,adlabels,issues_info,special_ad_categories,special_ad_category_country,smart_promotion_type,is_skadnetwork_attribution'
        ]);
        return (new FbAdCampaigns($campaigns->json()['data']))->getCampaings();
    }

    public function getAdSets()
    {
        $adSets = $this->facebookApiService->makeRequest('get', 'act_' . $this->adAccountId . '/adsets', [
            'fields'=>'optimization_goal,updated_time,billing_event,bid_strategy,lifetime_spend_cap,daily_spend_cap,learning_stage_info,effective_status,lifetime_min_spend_target,destination_type,bid_adjustments,bid_amount,id,daily_min_spend_target,campaign_id,pacing_typ,created_time,attribution_spec,issues_info,lifetime_budget,creative_sequence,adset_schedule,end_time,daily_budget,is_dynamic_creative,start_time,account_id,adlabels,budget_remaining,promoted_object,name,bid_constraints,targeting{geo_locations,keywords,genders,age_min,age_max,relationship_statuses,countries,locales,device_platforms,effective_device_platforms,publisher_platforms,effective_publisher_platforms,facebook_positions,effective_facebook_positions,instagram_positions,effective_instagram_positions,audience_network_positions,effective_audience_network_positions,messenger_positions,effective_messenger_positions,education_statuses,user_adclusters,excluded_geo_locations,interested_in,interests,behaviors,connections,excluded_connections,friends_of_connections,user_os,user_device,excluded_user_device,app_install_state,wireless_carrier,site_category,college_years,work_employers,work_positions,education_majors,life_events,politics,income,home_type,home_value,ethnic_affinity,generation,household_composition,moms,office_type,family_statuses,net_worth,home_ownership,industries,education_schools,custom_audiences,excluded_custom_audiences,dynamic_audience_ids,product_audience_specs,excluded_product_audience_specs,flexible_spec,exclusions,excluded_publisher_categories,excluded_publisher_list_ids,place_page_set_ids,targeting_optimization,brand_safety_content_filter_levels,is_whatsapp_destination_ad,instream_video_skippable_excluded,targeting_relaxation_types},status,rf_prediction_id,time_based_ad_rotation_id_blocks,time_based_ad_rotation_intervals,frequency_control_specs']);

        return $adSets->json()['data'];
    }

    public function addCampaign(): void
    {
        $this->facebookApiService->makeRequest('post', 'act_' . $this->adAccountId . '/campaigns', [
            'name' => 'My Campaign',
            'objective' => 'LINK_CLICKS',
            'status' => 'PAUSED',
            'special_ad_categories' => ['NONE'],
            'smart_promotion_type' => 'SMART_PROMOTION_TYPE_CUSTOM',
            'is_skadnetwork_attribution' => false
        ]);
    }
}
