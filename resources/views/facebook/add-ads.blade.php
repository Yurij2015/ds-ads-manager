@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Create Ad </h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Ad form</h3>
        </div>
        <form method="post" action="{{ route('store-fb-campaign') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" placeholder="Name" value="{{ old('name') }}"/>
                <x-adminlte-input name="adset_id" placeholder="Adset ID" value="{{ old('adset_id') }}"/>
                <x-adminlte-input name="status" placeholder="Status" value="{{ old('status') }}"/>
                <x-adminlte-input name="creative" placeholder="Creative" value="{{ old('creative') }}"/>
            </div>
        </form>
@endsection