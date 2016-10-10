@extends('admin.layouts.master')

@section('content')
    <div class="posts">
        <h2 class="posts__heading">Danh sách thành viên</h2>
        <hr>
        <div class="table-responsive posts__table">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Role</th>
                    <th>Tham gia</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->getRole()->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <li><a href="{{ route("admin.users.show","$user->id") }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route("admin.users.edit","$user->id") }}" class="btn btn-default"><i class="fa fa-edit"></i></a></li>
                                <li>
                                    <form action="{{route("admin.users.destroy","$user->id")}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                    </form>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

























