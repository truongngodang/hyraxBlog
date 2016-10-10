@extends('front.layouts.auth')

@section('title', '| Đăng ký')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="auth">
                <form action="" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Đăng Ký</h3>
                    <hr>
                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh: </label>
                        <input class="form-control" data-format="yyyy-MM-dd" type="text" name="birthday"></input>
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu: </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu: </label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
@endsection	