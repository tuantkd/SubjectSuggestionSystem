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
                        @if (Auth::user()->role_id == 1)
                            <li class="breadcrumb-item"><a href="{{ url('page-list-teacher') }}">Danh sách giảng viên</a></li>
                        @endif
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
                                @if ($infor_teachers->avatar != null)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ url('public/upload_avatar/'.$infor_teachers->avatar) }}">
                                @else
                                    <img src="{{ url('public/dist/img/user_avatar.png') }}" class="profile-user-img img-fluid img-circle">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{ $infor_teachers->fullname }}</h3>
                            @php($get_positions = DB::table('positions')->where('id', $infor_teachers->position_id)->get())
                            @foreach($get_positions as $get_position)
                                <p class="text-muted text-center">{{ $get_position->position_name }}</p>
                            @endforeach

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Số lớp dạy</b>
                                    <a class="float-right">
                                        @php($count_class = DB::table('class_subjects')->where('teacher_id', $infor_teachers->id)->count())
                                        <b class="text-success">{{ $count_class }}</b> Lớp
                                    </a>
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
                        <div class="card-header">
                            <h3 class="card-title"><b>THÔNG TIN CÁ NHÂN</b></h3>
                        </div><!-- /.card-header -->
                        <div class="card-body p-1">
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>LỚP GIẢNG DẠY</b></h3>
                        </div><!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">STT</th>
                                        <th scope="col" style="width: 10%;">Mã lớp</th>
                                        <th scope="col" style="width: 25%;">Tên lớp</th>
                                        <th scope="col" style="width: 15%;">HK - NH</th>
                                        <th scope="col" style="width: 40%;">Ghi chú</th>
                                        <th scope="col" style="width: 5%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($class_subjects as $key => $show_class_subject)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã lớp">
                                                <b>{{ $show_class_subject->class_subject_code }}</b>
                                            </td>
                                            <td data-label="Tên lớp">
                                                <a href="{{ url('view-detail-class-subject/'.$show_class_subject->id) }}">
                                                    <b style="text-transform: uppercase;">{{ $show_class_subject->class_subject_name }}</b>
                                                </a>
                                            </td>
                                            <td data-label="Học kỳ - Năm học">
                                                @php($semester_year = DB::table('semester_years')->where('id', $show_class_subject->semester_year_id)->first())
                                                <?php
                                                $semester_year = str_split($semester_year->semester_year);
                                                echo $semester = "HK ".$semester_year[0];
                                                echo $year = " - NH ".$semester_year[1].$semester_year[2].$semester_year[3].$semester_year[4];
                                                ?>
                                            </td>
                                            <td data-label="Ghi chú" class="text-justify">
                                                <p>{{ $show_class_subject->class_subject_note }}</p>
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-sm" title="Xem lớp học phần"
                                                href="{{ url('view-detail-class-subject/'.$show_class_subject->id) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
