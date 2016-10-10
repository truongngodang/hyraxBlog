@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Sửa thông tin thành viên</h2>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        <hr>
        <form action="{{ route('admin.users.update', "$user->id") }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label>Ủy quyền: </label>
                <select name="role" class="form-control">
                    <option>{{ $user->getRole()->name }}</option>

                    @foreach ($roles as $role)
                        @if ($role->name != $user->getRole()->name)
                            <option>{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
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
                <label>Mật khẩu: </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu: </label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Cập nhật">
            </div>
        </form>
    </div>
@endsection

























