@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Create Ad Creative </h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Ad Creative form</h3>
        </div>
        <form method="post" action="{{ route('store-fb-campaign') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" placeholder="Name" value="{{ old('name') }}"/>
                <x-adminlte-input name="object_story_id" placeholder="Object Story ID"
                                  value="{{ old('object_story_id') }}"/>
                <x-adminlte-input name="page_id" placeholder="Page ID" value="{{ old('page_id') }}"/>
            </div>
        </form>
@endsection