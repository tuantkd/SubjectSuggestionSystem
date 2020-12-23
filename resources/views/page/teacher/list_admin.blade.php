@extends('layout.layout')
@section('title', 'Danh sách quản trị')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-teacher') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Danh sách quản trị</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 12-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>QUẢN TRỊ</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('add-admin') }}" role="button">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:12%;">Họ và tên</th>
                                        <th scope="col" style="width:10%;">Tài khoản</th>
                                        <th scope="col" style="width:10%;">Ảnh đại diện</th>
                                        <th scope="col" style="width:8%;">Giới tính</th>
                                        <th scope="col" style="width:10%;">Điện thoại</th>
                                        <th scope="col" style="width:10%;">Email</th>
                                        <th scope="col" style="width:10%;">Chức vụ</th>
                                        <th scope="col" style="width:15%;">Quê quán</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_admins as $key => $show_admin)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Họ và tên">
                                            <b>{{ $show_admin->fullname }}</b>
                                        </td>
                                        <td data-label="Tài khoản">
                                            @php($users = DB::table('users')->where('teacher_id', $show_admin->id)->first())
                                            <b>{{ $users->username }}</b>
                                        </td>
                                        <td data-label="Ảnh đại diện">
                                            @if ($show_admin->avatar != null)
                                                <img src="{{ url('public/upload_avatar/'.$show_admin->avatar) }}" alt="Ảnh đại diện"
                                                     style="max-width:100%;height:70px;border-radius:30%;">
                                            @else
                                                <img src="{{ url('public/dist/img/user_avatar.png') }}" alt="Ảnh đại diện"
                                                     style="max-width:100%;height:70px;border-radius:30%;">
                                            @endif
                                        </td>
                                        <td data-label="Giới tính">
                                            <p>{{ $show_admin->sex }}</p>
                                        </td>
                                        <td data-label="Điện thoại">
                                            <p>{{ $show_admin->phone }}</p>
                                        </td>
                                        <td data-label="Email">
                                            <p>{{ $show_admin->email }}</p>
                                        </td>
                                        <td data-label="Chức vụ">
                                            @php($get_positions = DB::table('positions')->where('id', $show_admin->position_id)->get())
                                            @foreach($get_positions as $get_position)
                                            <b>{{ $get_position->position_name }}</b>
                                            @endforeach
                                        </td><td data-label="Quê quán">
                                            {{ $show_admin->address }}
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
