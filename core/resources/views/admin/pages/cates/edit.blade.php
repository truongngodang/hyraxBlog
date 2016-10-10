@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Sửa bài viết</h2>
        <hr>
        <form action="{{ route("admin.cates.update", "$cate->id") }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Tên chủ đề: </label>
                <input type="text" class="form-control" name="name" value="{{ $cate->name }}">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" value="Cập nhật">
                <a href="{{ route('admin.cates.index') }}" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
@endsection

























