@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Danh sách bài viết</h2>
        <hr>
        <div class="table-responsive posts__table">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Chủ đề</th>
                    <th>Tác giả</th>
                    <th>Last Updated</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ mb_substr($post->title, 0 , 50) }} {{ strlen($post->title) > 50 ? "..." : "" }}</td>
                            <td>{{ $post->cate->name }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                                <li><a href="{{ route("admin.posts.show","$post->id") }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route("admin.posts.edit","$post->id") }}" class="btn btn-default"><i class="fa fa-edit"></i></a></li>
                                <li>
                                    <form action="{{route("admin.posts.destroy","$post->id")}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                    </form>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        </div>
    </div>
@endsection

























