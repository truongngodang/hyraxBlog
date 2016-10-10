@extends('admin.layouts.master')

@section('content')
    <div class="posts posts__show">
        <article class="posts__show__content">
            <h3>Trang cá nhân của {{ $user->name }}</h3>
            <hr>
            <p>Tên: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Sinh nhật: {{ $user->birthday }}</p>
            <p>Đã tham gia: {{ $user->created_at }}</p>
        </article>
    </div>
@endsection