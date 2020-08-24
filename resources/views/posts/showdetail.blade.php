<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.common')
@section('contents')


<a href="{{ action('PostsController@add') }}" role="button" class="btn btn-primary">新規作成</a>

<div id="cardlayout-wrap">

    <section class="card-list">
        <a class="card-link">
            <figure class="card-figure"><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"></figure>
            <h2 class="card-title">{{ \Str::limit($post->title, 100) }}</h2>
        </a>
        <div>
            <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集</a>
        </div>
        <div>
            <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除</a>
        </div>
        <div class="form-text text-info">
            現在選択中のタグ: @foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach
        </div>
    </section>
</div>
@endsection



@extends('layouts.posts')
@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="row">
        <h2>{{ $post->title }}</h2>
        @if (session('err_msg'))
        <p> {{ session('err_msg') }}
        </p>
        @endif
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <a href="{{ action('PostsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8 mx-auto">
            <form action="{{ action('PostsController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2 mx-auto"></label>
                    <div class="col-md-8">
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<div class="row">
    <div class="list-news col-md-12 mx-auto">
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">タイトル</th>
                        <th width="50%">投稿写真</th>
                        <th width="30%">タグ</th>


                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ \Str::limit($post->title, 100) }}</td>
                        <td><a href="{{ action('PostsController@edit', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/'.$post->image_path)}}"> </td>
                        <div>
                            <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集</a>
                        </div>
                        <div>
                            <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除</a>
                        </div>
                        <th>
                            <p>@foreach ($post->tags as $tag) {{ $tag->name }} {{"\n"}} @endforeach </p>

                            <p>{{ $post->title }}</p>
                            <p>タイトルはいらない？</p>
                        </th>
                    </tr>
                    <td><img src="{{ asset('storage/user/'.$user->image_path)}}"></td>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection