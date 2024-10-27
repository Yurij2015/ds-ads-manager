@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Create Ad Sets</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Ad Set form</h3>
        </div>
        <form method="post" action="{{ route('store-fb-campaign') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="id" placeholder="Id" value="{{ old('id') }}"/>
                <x-adminlte-input name="name" placeholder="Name" value="{{ old('name') }}"/>
                <x-adminlte-input name="optimization_goal" placeholder="Optimization Goal"
                                  value="{{ old('optimization_goal') }}"/>
                <x-adminlte-input name="updated_time" placeholder="Updated Time" value="{{ old('updated_time') }}"/>
                <x-adminlte-input name="billing_event" placeholder="Billing Event" value="{{ old('billing_event') }}"/>
                <x-adminlte-input name="effective_status" placeholder="Effective Status"
                                  value="{{ old('effective_status') }}"/>
                <x-adminlte-input name="destination_type" placeholder="Destination Type"
                                  value="{{ old('destination_type') }}"/>
                <x-adminlte-input name="bid_amount" placeholder="Bid Amount" value="{{ old('bid_amount') }}"/>
                <x-adminlte-input name="campaign_id" placeholder="Campaign ID" value="{{ old('campaign_id') }}"/>
                <x-adminlte-input name="created_time" placeholder="Created Time" value="{{ old('created_time') }}"/>
                <x-adminlte-input name="is_dynamic_creative" placeholder="Is Dynamic Creative"
                                  value="{{ old('is_dynamic_creative') }}"/>
                <x-adminlte-input name="start_time" placeholder="Start Time" value="{{ old('start_time') }}"/>
                <x-adminlte-input name="budget_remaining" placeholder="Budget Remaining"
                                  value="{{ old('budget_remaining') }}"/>
                <x-adminlte-input name="status" placeholder="Status" value="{{ old('status') }}"/>
                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                   icon="fas fa-lg fa-save"/>
            </div>
        </form>

@endsection