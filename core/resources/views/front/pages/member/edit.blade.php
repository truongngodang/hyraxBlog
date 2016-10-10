@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Sửa thông tin {{ $user->name }}</h2>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        <hr>
        <form action="{{ route('member.update', array($user->name, $user->id)) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label>Tên: </label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label>Sinh Nhật: </label>
                <input type="text" class="form-control" name="birthday" value="{{ $user->birthday }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Cập nhật">
            </div>
        </form>
    </div>
@endsection

























