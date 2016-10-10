@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Viết bài</h2>
        <hr>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="desc">Mô tả: </label>
                <textarea type="text" class="form-control" name="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="img">Ảnh minh họa: </label>
                <input type="file" name="img">
            </div>
            <div class="form-group">
                <label for="body">Nội dung: </label>
                <textarea id="body" name="body"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Đăng bài">
            </div>
        </form>
    </div>
@endsection

























