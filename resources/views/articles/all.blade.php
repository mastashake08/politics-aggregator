@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Articles</div>

                <div class="panel-body">
                    <table>
                      @foreach($articles as $article)
                      <tr>
                        <td><a href="/articles/{{$article->id}}">{{$article->title}}</a></td>

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
