@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Danh sách chủ đề</h2>
        <hr>
        <div class="table-responsive posts__table">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên chủ đề</th>
                    <th>Số bài viết</th>
                    <th>Khởi tạo</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cates as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>{{ $cate->countPost() }}</td>
                            <td>{{ $cate->created_at }}</td>
                            <td>
                                <li><a href="{{ route("admin.cates.show","$cate->id") }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route("admin.cates.edit","$cate->id") }}" class="btn btn-default"><i class="fa fa-edit"></i></a></li>
                                <li>
                                    <form action="{{route("admin.cates.destroy","$cate->id")}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                    </form>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

























