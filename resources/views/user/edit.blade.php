<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>プロフィール編集画面</title>
    </head>
    <body>
        <h1>
        
        {{Auth::user()->name}}
        {{Auth::user()->email}}
        <!-- {{$user->name}}
        {{$user->email}}
        {{$user->email}}
        {{$user->email}}
        {{$user->email}} -->
        

        </h1>
    </body>
</html>