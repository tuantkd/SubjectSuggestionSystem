@extends('layout.layout')
@section('title', 'Thông tin giảng viên')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-list-teacher') }}">Danh sách giảng viên</a></li>
                        <li class="breadcrumb-item active">Thông tin giảng viên</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{ url('public/upload_avatar/'.$infor_teachers->avatar) }}">
                            </div>
                            <h3 class="profile-username text-center">{{ $infor_teachers->fullname }}</h3>
                            @php($get_positions = DB::table('positions')->where('id', $infor_teachers->position_id)->get())
                            @foreach($get_positions as $get_position)
                                <p class="text-muted text-center">{{ $get_position->position_name }}</p>
                            @endforeach

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Số lớp dạy</b> <a class="float-right">3</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active btn-sm p-2" href="#timeline" data-toggle="tab">
                                        Hồ sơ thông tin
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body p-2">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width:15%;" class="text-right">Họ và tên:</td>
                                        <td style="width:85%;"><b>{{ $infor_teachers->fullname }}</b></td>
                                    </tr>

                                    @php($get_username = DB::table('users')->where('teacher_id', $infor_teachers->id)->first())
                                    @if ($get_username != null)
                                        <tr>
                                            <td class="text-right">Tên tài khoản:</td>
                                            <td><b>{{ $get_username->username }}</b></td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td class="text-right">Giới tính:</td>
                                        <td><b>{{ $infor_teachers->sex }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Ngày sinh:</td>
                                        <td><b>{{ date('d-m-Y', strtotime($infor_teachers->birthday)) }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Điện thoại:</td>
                                        <td><b>{{ $infor_teachers->phone }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Email:</td>
                                        <td><b>{{ $infor_teachers->email }}</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Chức vụ:</td>
                                        @php($get_positions = DB::table('positions')->where('id', $infor_teachers->position_id)->get())
                                        @foreach($get_positions as $get_position)
                                            <td><b>{{ $get_position->position_name }}</b></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="text-right">Chức danh:</td>
                                        @php($get_titles = DB::table('titles')->where('id', $infor_teachers->title_id)->get())
                                        @foreach($get_titles as $get_title)
                                            <td><b>{{ $get_title->title_name }}</b></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="text-right">Học vị:</td>
                                        @php($get_degrees = DB::table('degrees')->where('id', $infor_teachers->degree_id)->get())
                                        @foreach($get_degrees as $get_degree)
                                            <td><b>{{ $get_degree->degree_name }}</b></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="text-right">Quê quán:</td>
                                        <td><b>{{ $infor_teachers->address }}</b></td>
                                    </tr>

                                    @php($get_username = DB::table('users')->where('teacher_id', $infor_teachers->id)->first())
                                    @if ($get_username == null)
                                        <tr>
                                            <td class="text-right">Tùy chọn:</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm"
                                                   href="{{ url('create-account') }}" role="button">
                                                    <i class="fa fa-user-plus"></i> Tạo tài khoản
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                    @endif

                                </tbody>
                            </table>
                            <br>
                            <!-- tab-content -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-primary">
                                              Lớp giảng dạy
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div class="p-0">
                                            <div class="timeline-item">
                                                <div class="timeline-body p-0">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item p-2">
                                                            <a href="">Lớp H01 - Nguyên lý máy học</a>
                                                        </li>
                                                        <li class="list-group-item p-2">
                                                            <a href="">Lớp H03 - An toàn hệ thống</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-circle bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
