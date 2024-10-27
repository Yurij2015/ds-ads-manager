@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Gemini - Ads Creator Helper </h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Post (content) generator with Gemini!</h3>
        </div>
        <form method="post" action="{{ route('generate-content') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" placeholder="Name" value="{{ $name ?? null }}"/>
                <x-adminlte-textarea name="prompt" placeholder="Prompt">{{ $prompt ?? null}}</x-adminlte-textarea>

                <x-adminlte-button class="btn-flat" type="submit" theme="success" label="Genetate Content"
                                   icon="fas fa-lg fa-save"/>
            </div>
        </form>
    </div>
    @if(isset($clearedResult))
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Result of content generations!</h3>
            </div>
            <div class="card-body">
                {!! $clearedResult  !!}
            </div>
            <x-adminlte-button class="btn-flat" type="button" theme="success" label="Move to Ads Creator"
                               icon="fas fa-lg fa-save"/>
        </div>
    @endif
@endsection