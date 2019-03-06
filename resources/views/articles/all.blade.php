@extends('layouts.app')

@section('content')
<div class="container">
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
                            <a href="{{$article->link}}" target="blank">Source</a>
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
