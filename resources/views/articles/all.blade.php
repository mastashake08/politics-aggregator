@extends('layouts.app')

@section('content')
<div class="container">
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Articles</div>

                <div class="panel-body">
                  <form action="/article/search" method="get">
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="keyword" placeholder="Search By Keyword">
                  </div>
                  <button class="btn btn-success">Search</button>
                  </form>
                    <table class="table table-striped">
                      @foreach($articles as $article)
                      <tr>
                        <td>
                          <h2><a href="/articles/{{$article->url}}" target="_blank">{{$article->title}}</a></h2>
                          <br>
                          <h5>
                            @if($article->source != null)
                            {{$article->source}}
                            @else
                            Source - <a href="{{$article->link}}" target="blank">{{$article->link}}</a></h5>
                            @endif
                        </td>

                      </tr>
                      @endforeach
                    </table>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
