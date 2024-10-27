@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Ad Sets</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right btn-sm" href="{{ route('add-fb-ad-sets') }}">Create Ad Set</a>
        </div>
    </div>
@stop
@php
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-2 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $heads = [
    ['label' => '#', 'title' => 'ID'],
    ['label' => 'Optimization Goal', 'title' => 'Optimization Goal'],
    ['label' => 'Updated Time', 'title' => 'Updated Time'],
    ['label' => 'Billing Event', 'title' => 'Billing Event'],
    ['label' => 'Effective Status', 'title' => 'Effective Status'],
    ['label' => 'Destination Type', 'title' => 'Destination Type'],
    ['label' => 'Bid Amount', 'title' => 'Bid Amount'],
    ['label' => 'Campaign ID', 'title' => 'Campaign ID'],
    ['label' => 'Created Time', 'title' => 'Created Time'],
    ['label' => 'Is Dynamic Creative', 'title' => 'Is Dynamic Creative'],
    ['label' => 'Start Time', 'title' => 'Start Time'],
    ['label' => 'Account ID', 'title' => 'Account ID'],
    ['label' => 'Budget Remaining', 'title' => 'Budget Remaining'],
    ['label' => 'Name', 'title' => 'Name'],
    ['label' => 'Status', 'title' => 'Status'],
];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-button id="backButton" class="btn-flat btn-sm mb-3" type="submit" label="Back"
                                       theme="primary" icon="fas fa-arrow-circle-left"/>
                    <x-adminlte-datatable id="table" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($adSets as $adSet)
                            <tr>
                                <td>{{ $adSet['id'] }}</td>
                                <td>{{ $adSet['optimization_goal'] }}</td>
                                <td>{{ $adSet['updated_time'] }}</td>
                                <td>{{ $adSet['billing_event'] }}</td>
                                <td>{{ $adSet['effective_status'] }}</td>
                                <td>{{ $adSet['destination_type'] }}</td>
                                <td>{{ $adSet['bid_amount'] }}</td>
                                <td>{{ $adSet['campaign_id'] }}</td>
                                <td>{{ $adSet['created_time'] }}</td>
                                <td>{{ $adSet['is_dynamic_creative'] ? 'true' : 'false' }}</td>
                                <td>{{ $adSet['start_time'] }}</td>
                                <td>{{ $adSet['account_id'] }}</td>
                                <td>{{ $adSet['budget_remaining'] }}</td>
                                <td>{{ $adSet['name'] }}</td>
{{--                                <td>{{ $adSet['targeting'] }}</td>--}}
                                <td>{{ $adSet['status'] }}</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        document.getElementById('backButton').addEventListener('click', function () {
            window.history.back();
        });
        window.onload = function () {
            let documentHeight = Math.max(
                document.body.scrollHeight, document.documentElement.scrollHeight,
                document.body.offsetHeight, document.documentElement.offsetHeight,
                document.body.clientHeight, document.documentElement.clientHeight
            );

            let elements = document.getElementsByClassName('elevation-4');

            for (let i = 0; i < elements.length; i++) {
                elements[i].style.height = documentHeight + 'px';
            }
        }


    </script>
@stop
<style>
    .text-center {
        text-align: center;
    }

    .countOfRors {
        color: red;
        font-weight: bold;
    }

</style>
