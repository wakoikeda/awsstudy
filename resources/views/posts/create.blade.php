<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       
       
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
 
    <body>
        
        <h1>Blog Name</h1>
            @if(Auth::check())
        <p>Logged in as: {{ Auth::user()->name }}</p>
             @else
        <p>Not logged in</p>
             @endif
        <form action="/posts" method="POST">
            @csrf
            <x-app-layout>
                <x-slot name="header">
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            </x-slot>
            <div class="body">
                <h3>Body</h3>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
            <h4>Category</h4>
             <select name="post[category_id]">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        </x-app-layout>
    </body>
    
</html>