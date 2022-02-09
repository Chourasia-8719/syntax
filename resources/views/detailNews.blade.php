@extends('layout')
@section('template_title')
Details News with comments
@endsection
@section('content')
    <div class="card text-center">
        <div class="card-header">
            <img src="{{$data['urlToImage']}}" alt="" style="height:300px;">
            <h5 class="card-title">{{$data['title']}}</h5>
            <p>{{$data['source']}}</p>
            <p>{{Carbon\Carbon::parse($data['publishedAt'])->format('Y-m-d')}} ({{ Carbon\Carbon::parse($data['created_at'])->diffForHumans()}})</p>
            <p>Total Comments: {{$total}} </p>
        </div>
        <div class="card-body">
            <p>{{$data['description']}}</p>
            <p>{{$data['content']}}</p>
        </div>
        <div class="card-footer text-muted">
            <div class="card-group">
                @foreach($data['comments'] as $d)
                    <div class="card">
                        <div class="card-body">
                        <p class="card-text">Email: {{$d['email']}}</p>
                        <p class="card-text">Name: {{$d['first_name']}} {{$d['last_name']}}</p>
                        <p class="card-text">Comment: {{$d['comment']}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection