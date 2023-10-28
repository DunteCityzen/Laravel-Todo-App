@extends('layouts.app')

@section('title')
    New Tudu
@endsection

@section('content')
    <h1 style="margin-left: 30px; margin-top: 50px;">Tudu??</h1>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="/home" class="btn btn-primary" style="margin-left: 30px; margin-top: 50px; padding: 10px 20px"><i class="fa fa-arrow-left"></i> Go back</a>
    <form action="{{ route('tudu.store') }}" method="POST" class="mt-4 p-4">
        @csrf
        <div class="form-group m-3">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group m-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>
@endsection