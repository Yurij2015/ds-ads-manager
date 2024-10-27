@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Ad Creative</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-right btn-sm" href="{{ route('add-fb-ad-creatives') }}">Create Ad Creative</a>
        </div>
    </div>
@stop