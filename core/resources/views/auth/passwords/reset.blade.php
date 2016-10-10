@extends('front.layouts.auth')

@section('title', '| Forgot my Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="auth">

                <form method="POST" action="{{ url('password/reset') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <input name="token" type="hidden" value="{{ $token }}">
                    <h3>Lấy lại mật khẩu</h3>
                    <hr>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input class="form-control" name="email" type="email" value="{{ $email }}" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input class="form-control" name="password" type="password" value="" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password:</label>
                        <input class="form-control" name="password_confirmation" type="password" value=""
                               id="password_confirmation">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Reset Password">

                </form>
            </div>
        </div>
    </div>

@endsection