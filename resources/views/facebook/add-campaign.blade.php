@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Add Campaign</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add campoign form</h3>
        </div>
        <form method="post" action="{{ route('store-fb-campaign') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" placeholder="Name" value="{{ old('name') }}"/>
                @php
                    $objectives = ['OUTCOME_TRAFFIC', 'OUTCOME_SALES', 'OUTCOME_LEADS', 'OUTCOME_ENGAGEMENT', 'OUTCOME_AWARENESS', 'OUTCOME_APP_PROMOTION'];
                @endphp
                <x-adminlte-select name="status">
                    <option value="">Select Objective</option>
                    @foreach($objectives as $objective)
                        <option
                                value="{{ $objective }}" {{ old('status') === $objective ? 'selected' : '' }}>{{ $objective }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input name="status" placeholder="Status" value="{{ old('status') }}"/>
                <x-adminlte-input name="special_ad_categories" placeholder="Special ad categories"
                                  value="{{ old('special_ad_categories') }}"/>
                <x-adminlte-input name="optimization_goal" placeholder="Optimization goal"
                                  value="{{ old('optimization_goal') }}"/>
                <x-adminlte-input name="daily_budget" placeholder="Daily budget" value="{{ old('daily_budget') }}"/>
                <x-adminlte-input name="billing_event" placeholder="Billing event" value="{{ old('billing_event') }}"/>
                <x-adminlte-input name="targeting" placeholder="Targeting" value="{{ old('targeting') }}"/>
                <x-adminlte-input name="promoted_object" placeholder="Promoted object"
                                  value="{{ old('promoted_object') }}"/>
                <x-adminlte-input name="bid_strategy" placeholder="Bid Strategy" value="{{ old('bid_strategy') }}"/>
                <x-adminlte-input name="REACH" placeholder="REACH" value="{{ old('REACH') }}"/>
                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                   icon="fas fa-lg fa-save"/>
            </div>
        </form>

@endsection