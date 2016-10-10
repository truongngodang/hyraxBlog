@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Tạo thành viên</h2>
        <hr>
        <form action="{{ route('admin.users.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Ủy quyền: </label>
                <select name="role" class="form-control">
                    @foreach($roles as $role)
                        <option>{{ $role->name }}</option>
                    @endforeach    
                </select>
            </div>
            <div class="form-group">
                <label>Tên: </label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Sinh Nhật: </label>
                <input type="text" class="form-control" name="birthday">
            </div>
            <div class="form-group">
                <label>Mật khẩu: </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu: </label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Tạo tài khoản">
            </div>
        </form>
    </div>
@endsection

























