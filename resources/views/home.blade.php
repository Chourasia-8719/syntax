@extends('layout')
@section('template_title')
News
@endsection
@section('content')
        <div class="card-group">
            @foreach($news_data as $d)
                <div class="card-columns col-lg-4 col-md-6 col-sm-12">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;width:350px">
                        <img class="card-img-top" src="{{$d['urlToImage']}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$d['title']}}</h5>
                            <p class="card-text">{{$d['description']}}</p>
                        </div>
                        <div class="p-3">
                            <div class="mb-0">
                            <p>{{$d['content']}}</p>
                            <footer class="footer">
                                <small class="text-muted">
                                {{ Carbon\Carbon::parse($d['publishedAt'])->diffForHumans()}} 
                                <cite title="Source Title"><span style="color:red">Source:</span>{{$d['source']}}</cite>
                                </small><br>
                                <button type="button" class="btn btn-warning"><a class="text-white text-decoration-none" href="{{route('comment.view',[$d->id])}}">Leave Comment</a></button>
                                <button type="button" class="btn btn-info"><a class="text-white text-decoration-none" href="{{route('comment.news',[$d->id])}}">Detail</a></button>
                            </footer>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection


