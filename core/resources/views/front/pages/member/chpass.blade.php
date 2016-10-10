@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Đổi mật khẩu</h2>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        <hr>
        <form action="{{ route('member.updatePass', array($user->name, $user->id)) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label>Mật khẩu cũ: </label>
                <input type="password" class="form-control" name="oldpassword">
            </div>
            <div class="form-group">
                <label>Mật khẩu mới: </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới: </label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Cập nhật">
            </div>
        </form>
    </div>
@endsection

























