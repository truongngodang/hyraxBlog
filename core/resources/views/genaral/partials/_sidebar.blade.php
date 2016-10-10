@if (isset($postPopulars))
	<div class="media__list">
	    <h3 class="media__list__heading">
		<i class="fa fa-newspaper-o"></i> Xem Nhiều Nhất
	    </h3>
	    @foreach($postPopulars as $postPopular)
		<div class="media__list__item">
		    <div class="row">
		        <div class="col-xs-4">
		            <figure class="media__list__img">
		                <img src="{{ url("public/images/$postPopular->img") }}" alt="{{ $postPopular->title }}">
		            </figure>
		        </div>
		        <div class="col-xs-8">
		            <a href="{{ route("blog.single", array($postPopular->cate->slug, $postPopular->slug)) }}"><h3 class="media__list__title">{{ $postPopular->title }}</h3></a>
		            <p class="media__list__time">{{ date('d/m/y', strtotime($postPopular->updated_at)) }}</p>
		        </div>
		    </div>
		</div>
	    @endforeach
	</div>
	<div class="space"></div>
	<div class="media__big">
	    <figure class="media__big__img">
		<img src="{{ url("public/images/$postHead->img") }}" alt="{{ $postHead->title }}">
	    </figure>
	    <article class="media__big__content media__big__content--small">
		<a href="blog/{{$postHead->cate->slug}}" class="media__big__cate media__big__cate--small media__big__cate--green">{{$postHead->cate->ten}}</a>
		<a href="{{ route("blog.single", array($postHead->cate->slug, $postHead->slug)) }}"><h3 class="media__big__title media__big__title--small">{{ $postHead->title }}</h3></a>
	    </article>
	</div>

@else

	Không có dữ liệu

@endif
