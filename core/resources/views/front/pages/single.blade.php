@extends('front.layouts.master')

@section('content')
    <div class="posts posts__show">
        <figure class="posts__show__img">
            <img src="{{ url("uploads/post-images/$post->img") }}" alt="{{ $post->img }}">
            <a href="{{ url("blog")}}/{{ $post->cate->slug }}" class="posts__show__cate">{{ $post->cate->name }}</a>
            <div class="posts__show__inner">
                <h3 class="posts__show__title">{{ $post->title }}</h3>
                <ul class="media__big__info">
                    <li><a href="#"><i class="fa fa-eye"></i> {{ $post->view_count }} lượt xem</a></li>
                    <li><a href="#"><i class="fa fa-comments"></i> {{count($post)}}</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></li>
                </ul>
            </div>
        </figure>
        <article class="posts__show__content">
            <div class="posts__show__body">{!! $post->body !!}</div>
        </article>
    </div>
    <div class="space"></div>
@endsection