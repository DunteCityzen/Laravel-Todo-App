@extends('layouts.app')

@section('title')
    Tudu Details
@endsection

@section('content')
    
    <div style="text-align: center;">
        <h1><b>Tudu Details</b></h1>
    </div>

    <div class="card text-center mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form action="{{ route('tudu.destroy', $tudu->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="card-header">
                @if($tudu->iscompleted == false)
                    <h3 style="color: red;"><b>ACTIVE</b></h3>
                @endif
                @if($tudu->iscompleted == true)
                    <h3 style="color: green;"><b>COMPLETE</b></h3>
                @endif
            </div>
            <div class="card-body" style="padding: 40px;">
                <h2 class="card-title"><b>Are you sure you want to remove:</b></h2>
                <p style="font-size: 20px;" class="card-text">{{$tudu->title}}??</p>
                <div style="padding: 15px;">
                    <a style="margin-right: 30px" href="{{ route('tudu.show', $tudu->id) }}"><span class="btn btn-primary">Cancel</span></a>
                    <input style="width: 70px" type="submit" class="btn btn-danger" value="Yes">
                </div>
            </div>
        </form>
    </div>
@endsection