@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$article->title}}</div>

                <div class="panel-body">
                    {!!$article->description!!}
                    <br>
                    Original Link <a href="{{$article->link}}">here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
