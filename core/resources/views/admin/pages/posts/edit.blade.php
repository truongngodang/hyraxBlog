@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Sửa bài viết</h2>
        <hr>
        <form action="{{ route("admin.posts.update", "$post->id") }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Chủ đề: </label>
                <select name="cate" class="form-control">
                    @foreach($cates as $cate)
                        <option>{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề: </label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="desc">Mô tả: </label>
                <textarea id="desc" class="form-control" name="desc">{{ $post->desc }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Ảnh minh họa: </label>
                <input type="file" name="img" value="{{ url("public\\images\\$post->img") }}">
            </div>
            <div class="form-group">
                <label for="body">Nội dung: </label>
                <textarea name="body" id="body">{{ $post->body }}</textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" value="Cập nhật">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
@endsection

























