@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Campaigns</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right btn-sm" href="{{ route('add-fb-campaign') }}">Add campaing</a>
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
    ['label' => 'Name', 'title' => 'Name'],
    ['label' => 'Objective', 'title' => 'Objective'],
//    ['label' => 'Account ID', 'title' => 'Account ID'],
    ['label' => 'Buying Type', 'title' => 'Buying Type'],
//    ['label' => 'Lifetime Budget', 'title' => 'Lifetime Budget'],
    ['label' => 'Bid Strategy', 'title' => 'Bid Strategy'],
//    ['label' => 'Effective Status', 'title' => 'Effective Status'],
//    ['label' => 'Status', 'title' => 'Status'],
//    ['label' => 'Start Time', 'title' => 'Start Time'],
//    ['label' => 'Stop Time', 'title' => 'Stop Time'],
    ['label' => 'Created Time', 'title' => 'Created Time'],
    ['label' => 'Updated Time', 'title' => 'Updated Time'],
    ['label' => 'Smart Promotion Type', 'title' => 'Smart Promotion Type'],
    ['label' => 'Is Skadnetwork Attribution', 'title' => 'Is Skadnetwork Attribution'],
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
                        @foreach($adCampaigns as $adCampaign)
                            <tr>
                                <td>{{ $adCampaign->getId() }}</td>
                                <td>{{ $adCampaign->getName() }}</td>
                                <td>{{ $adCampaign->getObjective() }}</td>
{{--                                <td>{{ $adCampaign->getAccountId() }}</td>--}}
                                <td>{{ $adCampaign->getBuyingType() }}</td>
{{--                                <td>{{ $adCampaign->getLifetimeBudget() }}</td>--}}
                                <td>{{ $adCampaign->getBidStrategy() }}</td>
{{--                                <td>{{ $adCampaign->getEffectiveStatus() }}</td>--}}
{{--                                <td>{{ $adCampaign->getStatus()}}</td>--}}
{{--                                <td>{{ $adCampaign->getStartTime() }}</td>--}}
{{--                                <td>{{ $adCampaign->getStopTime() }}</td>--}}
                                <td>{{ $adCampaign->getCreatedTime() }}</td>
                                <td>{{ $adCampaign->getUpdatedTime() }}</td>
                                <td>{{ $adCampaign->getSmartPromotionType() }}</td>
                                <td>{{ $adCampaign->getIsSkadnetworkAttribution() ? 'true' : 'false'}}</td>
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
