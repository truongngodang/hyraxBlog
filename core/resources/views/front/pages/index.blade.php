@extends('front.layouts.master')

@section('content')
    @if (isset($posts))

        <div class="media__big">
            <figure class="media__big__img">
                <img src="{{ url("uploads/post-images/$postHead->img") }}" alt="ndt">
            </figure>
            <article class="media__big__content">
                <a href="{{ url("blog")}}/{{ $postHead->cate->slug }}" class="media__big__cate">{{ $postHead->cate->name }}</a>
                <a href="{{ route("blog.single", array($postHead->cate->slug, $postHead->slug)) }}"><h3
                            class="media__big__title">{{ $postHead->title }}</h3></a>
                <ul class="media__big__info">
                    <li><a href="#"><i class="fa fa-eye"></i> {{ $postHead->view_count }} lượt xem</a></li>
                    <li><a href="#"><i class="fa fa-comments"></i> 99 bình luận</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> {{ $postHead->user->name }}</a></li>
                </ul>
            </article>
        </div>

        <div class="space"></div>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-12 col-md-6">
                    <div class="media__medium">
                        <figure class="media__medium__img">
                            <img src="{{ url("uploads/post-images/$post->img") }}" alt="{{ $post->title }}">
                            <div class="media__medium__box">
                                <a href="{{ url("blog")}}/{{ $post->cate->slug }}" class="media__medium__cate">{{ $post->cate->name }}</a>
                                <a href="#"
                                   class="media__medium__date">{{ date('d/m/y', strtotime($post->updated_at)) }}</a>
                            </div>
                        </figure>
                        <article class="media__medium__content">
                            <a href="{{ route("blog.single", array($post->cate->slug, $post->slug)) }}"><h3
                                        class="media__medium__title">
                                    {{ mb_substr($post->title, 0, 65) }} {{ strlen($post->title) > 65 ? "..." : "" }}
                                </h3></a>
                            <p class="media__medium__summary">
                                {{ mb_substr($post->desc, 0, 190) }} {{ strlen($post->desc) > 190 ? "..." : "" }}
                            </p>
                            <ul class="media__medium__info">
                                <li><a href="#"><i class="fa fa-eye"></i> {{ $post->view_count }} lượt xem</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 99 bình luận</a></li>
                            </ul>
                        </article>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="space"></div>
        <div class="text-center">
            <ul class="pagination">
                @if(PaginateRoute::hasPreviousPage())
                    <li>
                        <a href="{{ PaginateRoute::previousPageUrl() }}" rel="prev"> <i
                                    class="fa fa-long-arrow-left"></i> Trước</a>
                    </li>
                @else
                    <li>
                    <li class="disabled"><a href="#" aria-label="Previous"> <i class="fa fa-long-arrow-left"></i> Trước</a>
                @endif

                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <li class="{{ ($posts->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ PaginateRoute::pageUrl($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if(PaginateRoute::hasNextPage($posts))
                    <li>
                        <a href="{{ PaginateRoute::nextPageUrl($posts) }}" rel="next">Tiếp <i
                                    class="fa fa-long-arrow-right"></i></a>
                    </li>
                @else
                    <li>
                    <li class="disabled"><a href="#" aria-label="Next">Tiếp <i class="fa fa-long-arrow-right"></i></a>
                @endif

            </ul>
        </div>

    @else
        Không có dữ liệu
    @endif
@endsection