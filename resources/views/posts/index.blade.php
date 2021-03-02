@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h1>
	<a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
	Blog Posts
</h1>
<ul>
	@forelse ($posts as $post)
		<li>
            <a href="{{ url('/posts', $post) }}">{{$post->title}}</a>
            <a href="{{ url('/posts/edit', $post) }}" class="edit">[EDIT]</a>
            <a href="#" class="del" data-id="{{ $post->id }}">[×]</a>
            <form action="{{ url('/posts', $post->id) }}" method="POST" id="form_{{ $post->id }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
            </form>
        </li>
	@empty
		<li>No posts yet</li>
	@endforelse
</ul>
<script src="/js/main.js"></script>
@endsection
