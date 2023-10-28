@extends('layouts.app')

@section('title')
    My Tudus
@endsection

@section('content')
    <div class="row mt-3" style="font-weight: bold; font-size: 35px">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @forelse($tudus as $tudu)
                    <li class="list-group-item" style="padding: 20px 20px; display:flex; justify-content:space-between">
                        <a href="{{ route('tudu.show', $tudu->id) }}" style=" text-decoration: none; color: black; margin-left:  20px;">{{ $tudu->title }}</a>
                        @if( $tudu->iscompleted == false )
                            <span style="margin-right: 20%;"><h3>Status: <b style="color: red;">Active</b></h3></span>
                        @endif
                        @if($tudu->iscompleted == true)
                            <span style="margin-right: 20%;"><h3>Status: <b style="color: green">Completed</b></h3></span>
                        @endif
                    </li>
                    @empty
                        <div style="text-align: center; padding: 15%">
                            <h1 style="font-weight: bolder">You're Free!!!</h1>
                        </div>
                @endforelse
            </ul>
        </div>
    </div>
@endsection