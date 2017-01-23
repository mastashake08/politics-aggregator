@extends('layouts.app')
@section('title',addslashes($article->title))
@section('url',url("/articles/{$article->url}"))
@section('description', str_limit($article->description, 150))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$article->title}}</h2></div>

                <div class="panel-body" class="img-responsive">
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- all-around-politics -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-7023023584987784"
                       data-ad-slot="2351142156"
                       data-ad-format="auto"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
                    {!!$article->description!!}
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- all-around-politics -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-7023023584987784"
                         data-ad-slot="2351142156"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <br>
                    Original Link <a href="{{$article->link}}">here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
