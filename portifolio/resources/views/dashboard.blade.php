@extends('layouts.layouts')
@section('title','Dashbord')
@section('content')
    <x-dashboard.navbar/>

    @if ($x == "list")
        <x-dashboard.liste :result="$list" :service="$type"/>
    @else
    @endif
    
    @if(isset($msg))
        <div class="alert alert-success text-center" role="alert">
            {{$msg}}
        </div>
    @else

    @endif

    <x-dashboard.about-modal/>
    <x-dashboard.portifolio-modal/>
    <x-dashboard.service-modal/>
    <x-dashboard.signature-modal/>
    <x-dashboard.testmonial-modal/>

@endsection