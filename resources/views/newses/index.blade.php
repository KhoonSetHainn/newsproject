@extends("layouts.app")

@section("content")
<div class="container">
    @if(session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
    @endif
    {{$newses->links()}}
        @foreach($newses as $news)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{$news->title}} :  <b>By {{$news->user->name}}</b></h5> 
                <div class="card-subtitle mb-2 text-muted small">
                    {{$news->created_at->diffForHumans()}}
                </div>
                <p class="card-text">{{$news->body}}</p>
                <a class="card-link" href="{{url("/newses/detail/$news->id")}}">
                    View Detail &raquo;
                </a>
            </div>
        </div>
        @endforeach
        </div>
        @endsection