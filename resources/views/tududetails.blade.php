@extends('layouts.app')

@section('title')
    Tudu Details
@endsection

@section('content')
    <div style="text-align: center;">
        <h1><b>Tudu Details</b></h1>
    </div>
    
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card text-center mt-5">
        <div class="card-header">
            @if($tudu->iscompleted == false)
                <h3 style="color: red;"><b>ACTIVE</b></h3>
            @endif
            @if($tudu->iscompleted == true)
                <h3 style="color: green;"><b>COMPLETE</b></h3>
            @endif
        </div>
        <a href="/home" class="btn btn-primary" style="margin-right: 40%; margin-left: 40%; margin-top: 10px; padding: 10px 20px"><i class="fa fa-arrow-left"></i> Back to Tudus</a>
        <div class="card-body" style="padding: 40px;">
            <h2 class="card-title"><b>{{$tudu->title}}</b></h2>
            <p style="font-size: 20px;" class="card-text">{{$tudu->description}}</p>
            <div style="padding: 15px;">
                <a style="margin-right: 30px" href="{{ route('tudu.edit', $tudu->id) }}"><span class="btn btn-primary">Edit</span></a>
                <a href="/tudu/{{$tudu->id}}/deleteconfirm"><span class="btn btn-danger">Delete</span></a>
            </div>
        </div>
    </div>
@endsection