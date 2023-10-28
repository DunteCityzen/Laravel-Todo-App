@extends('layouts.app')

@section('title')
    Update Tudu
@endsection

@section('content')
    <h1 style="text-align: center; padding: 20px 20px"><b>Update Tudu</b></h1>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    
    <a href="{{ route('tudu.show', $tudu->id) }}" class="btn btn-primary" style="margin-left: 30px; margin-top: 30px; padding: 10px 20px"><i class="fa fa-arrow-left"></i> Go back</a>
    <form style="font-size: 20px;" action="{{ route('tudu.update', $tudu->id) }}" method="POST" class="mt-4 p-4">
        @method('PATCH')
        @csrf
        <div class="form-group m-3">
            <label for="name"><b>Title</b></label>
            <input style="font-size: 20px;" type="text" class="form-control" value="{{$tudu->title}}" name="title">
        </div>
        <div class="form-group m-3">
            <label for="description"><b>Description</b></label>
            <textarea style="font-size: 15px;" class="form-control" name="description" rows="3"> {{$tudu->description}} </textarea>
        </div>
        <div class="form-group m-3" style="justify-content: space-between;">
            <input type="checkbox" name="chkbox-iscompleted" id="chkbox-iscompleted" @if($tudu->iscompleted) checked @endif> Completed </input>
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>
@endsection