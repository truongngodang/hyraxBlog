<div class="list-group control">
    <a href="{{ route('admin.getIndex') }}" class="list-group-item active">Bảng điều khiển</a>
</div>

@if($user->getRole()->name == 'Admin')
    <div class="list-group control">
        <p class="list-group-item active"> Quản lý bài viết </p>
        <a href="{{ url('admin/posts/create') }}" class="list-group-item">Viết bài <i class="fa fa-pencil"></i> </a>
        <a href="{{ url('admin/posts') }}" class="list-group-item"><span class="badge">{{ $posts->count() }}</span> Danh sách bài</a>
    </div>

    <div class="list-group control">
        <p class="list-group-item active"> Quản lý Chủ đề </p>
        <a href="{{ route('admin.cates.create') }}" class="list-group-item">Thêm <i class="fa fa-plus-circle"></i> </a>
        <a href="{{ route('admin.cates.index') }}" class="list-group-item"><span class="badge">{{ $cates->count() }}</span> Danh sách</a>
    </div>

    <div class="list-group control">
        <p class="list-group-item active"> Quản lý thành viên </p>
        <a href="{{ url('admin/users/create') }}" class="list-group-item">Thêm <i class="fa fa-plus-circle"></i> </a>
        <a href="{{ url('admin/users') }}" class="list-group-item"><span class="badge">{{ $users->count() }}</span> Danh sách</a>
    </div>
@endif

<div class="list-group control">
    <p class="list-group-item active"> Cá nhân </p>
    <a href="{{ route('member.edit', array(str_slug($user->name), $user->id)) }}" class="list-group-item">Sửa thông tin <i class="fa fa-edit"></i></a>
    <a href="{{ route('member.changePass', array(str_slug($user->name), $user->id)) }}" class="list-group-item">Đổi mật khẩu <i class="fa fa-lock"></i></a>
</div>

<div class="list-group control">
    <p class="list-group-item active"> {{ $user->name }} </p>
    <a href="{{ route('getLogout') }}" class="list-group-item">Đăng xuất <i class="fa fa-sign-out"></i> </a>
</div>