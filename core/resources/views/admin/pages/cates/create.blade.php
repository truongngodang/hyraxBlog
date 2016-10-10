@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Thêm chủ đề mới</h2>
        <hr>
        <form action="{{ route('admin.cates.store') }}" method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Tên chủ đề: </label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Thêm chủ đề">
            </div>
        </form>
    </div>
@endsection

























