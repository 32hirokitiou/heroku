@extends('layouts.posts')
@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="row">
        <h2>投稿一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <a href="{{ action('PostsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8 mx-auto">
            <form action="{{ action('PostsController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2 mx-auto">タイトル</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="title" value="{{ $title }}">
                    </div>
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

                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ \Str::limit($post->title, 100) }}</td>
                        <td> <img src="{{ asset('storage/image/'.$post->image_path)}}"> </td>
                        <td>
                            <div>
                                <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}">編集</a>
                            </div>
                            <div>
                                <a href="{{ action('PostsController@delete', ['id' => $post->id]) }}">削除</a>
                            </div>
                        </td>
                        <td>
                            @if ($auth_user->id != $post->user->id)

                            @if ($auth_user->is_favorite($post->id))
                            {{ Form::open(['route' => ['favorites.unfavorite', $posts->id], 'method' => 'delete']) }}
                            {{ Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) }}
                            {{ Form::close() }}
                            @else
                            {{ Form::open(['route' => ['favorites.favorite', $posts->id]]) }}
                            {{ Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) }}
                            {{ Form::close() }}
                            @endif

                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection