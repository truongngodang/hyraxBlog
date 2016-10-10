@extends('front.layouts.auth')
@section('title', '| Lấy lại mật khẩu')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="auth">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ url('password/email') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Lấy lại mật khẩu</h3>
                    <hr>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
@endsection