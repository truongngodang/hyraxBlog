@extends('front.layouts.auth')

@section('title', '| Đăng nhập')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="auth auth__login">
                <form action="" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Đăng nhập</h3>
                    <hr>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu: </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember"> <label>Ghi nhớ đăng nhập</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    <a href="password/reset" class="btn btn-danger btn-block">Forgot password</a>
                </form>
            </div>
        </div>
    </div>
@endsection	