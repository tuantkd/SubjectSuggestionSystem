@extends('layout.layout')
@section('title', 'Thông tin sinh viên')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-admin') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-list-student') }}">Danh sách sinh viên</a></li>
                        <li class="breadcrumb-item active">Thông tin sinh viên</li>
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
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('public/dist/img/avatar.png') }}">
                            </div>
                            <h3 class="profile-username text-center">B1607138</h3>
                            <p class="text-muted text-center">Nguyễn Văn Tuấn</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b class="text-success">Học phần đã học</b> <a class="float-right">30 HP</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-danger">Học phần chưa học</b> <a class="float-right">10 HP</a>
                                </li>
                                <hr>
                                <li class="list-group-item">
                                    <b class="text-primary">Tổng số tín chỉ</b> <a class="float-right"><b>155 TC</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-success">Tín chỉ tích lũy</b> <a class="float-right">130 TC</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-danger">Tín chỉ bắt buộc</b> <a class="float-right">25 TC</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cá nhân</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <strong><i class="fas fa-book mr-1"></i>Giới tính</strong>
                            <p class="text-muted">
                                Nam
                            </p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ngày sinh</strong>
                            <p class="text-muted">25/01/1998</p>
                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Điện thoại</strong>
                            <p class="text-muted">
                                0326827393
                            </p>
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Email</strong>
                            <p class="text-muted">tuanb1607138@student.ctu.edu.vn</p>
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Quê quán</strong>
                            <p class="text-muted">Ấp 3, Xã Thủy, Vị Thủy, Hậu Giang</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                XEM ĐIỂM HỌC KỲ
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" method="get">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-2 text-right">
                                        <label for="">Năm học</label>
                                    </div>
                                    <div class="col-12 col-sm-3 text-left">
                                        <select class="form-control" name="" id="">
                                            <option value="">2020 - 2021</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-2 text-right">
                                        <label for="">Học kỳ</label>
                                    </div>
                                    <div class="col-12 col-sm-3 text-left">
                                        <select class="form-control" name="" id="">
                                            <option value="">1</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <button type="button" class="btn btn-primary">Liệt kê</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                XEM ĐIỂM <b>HỌC KỲ 1 NĂM HỌC 2020 - 2021</b>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:10%;">Mã HP</th>
                                        <th scope="col" style="width:35%;">Tên học phần</th>
                                        <th scope="col" style="width:15%;">Nhóm lớp</th>
                                        <th scope="col" style="width:10%;">Tín chỉ</th>
                                        <th scope="col" style="width:15%;">Điểm chữ</th>
                                        <th scope="col" style="width:15%;">Điểm số</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Mã học phần">
                                            <b>CT054</b>
                                        </td>
                                        <td data-label="Tên học phần">
                                            <b>Lập trình website</b>
                                        </td>
                                        <td data-label="Nhóm lớp">
                                            H01
                                        </td>
                                        <td data-label="Tín chí">
                                            3
                                        </td>
                                        <td data-label="Điểm chữ">
                                            <b>B</b>
                                        </td>
                                        <td data-label="Điểm số">
                                            <b>8.0</b>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-2 text-right">
                            <a class="btn btn-warning btn-sm" href="#" role="button">
                                <i class="fa fa-book"></i> GỢI Ý MÔN HỌC
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
