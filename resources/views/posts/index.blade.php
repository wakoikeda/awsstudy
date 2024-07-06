<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       
        <title>Blog</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   
        
    <body>
         <x-app-layout>
        <x-slot name="header">
        <h1>Blog Name</h1>
        </x-slot>
        
         <div>
        @foreach($questions as $question)
            <div>{{ $question['title'] }}</div>
        @endforeach
        </div>
        
        <div>
        @foreach($questions as $question)
            <div>
                <a href="https://teratail.com/questions/{{ $question['id'] }}">
                    {{ $question['title'] }}
                </a>
            </div>
        @endforeach
        </div>
        
        <div class='posts'>
             <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                   
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
       <div class='paginate'>
            {{ $posts->links() }}
        </div>
             <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
            </script>   
         
         
         @auth
            <br><br>
            <p>ログインユーザー: {{ Auth::user()->name }}</p>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to continue.</p>
        @endauth
    </x-app-layout>    
    </body>
  
</html>