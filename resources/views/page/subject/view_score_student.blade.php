@extends('layout.layout')
@section('title', 'Xem cập nhật điểm')

@section('link_cdn')
    <link rel="stylesheet" href="{{ url('public/dist/css/select.css') }}">
    <script src="{{ url('public/dist/js/select.js') }}"></script>
@endsection


@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('view-detail-class-subject') }}">H02 - Quản trị hệ thống</a></li>
                        <li class="breadcrumb-item active">Xem cập nhật điểm</li>
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
                <!--  col 6-->
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>XEM CẬP NHẬT ĐIỂM HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Lớp - Học phần</label>
                                        <input type="text" name="" class="form-control" value="H02 - Quản trị hệ thống" disabled>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Sinh viên</label>
                                        <input type="text" name="" class="form-control" value="Nguyễn Văn Tuấn" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điểm số</label>
                                        <input type="text" name="" class="form-control" placeholder="Nhập điểm số">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điểm chữ</label>
                                        <input type="text" name="" class="form-control" placeholder="Nhập điểm chữ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  End col 6-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
