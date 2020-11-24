@extends('layout.layout')
@section('title', 'Thêm lớp học phần')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-class-subject') }}">Lớp học phần</a></li>
                        <li class="breadcrumb-item active">Thêm lớp học phần</li>
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
                                <b>THÊM LỚP HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-4">
                                        <label for="">Mã lớp</label>
                                        <input type="text" name="" class="form-control" placeholder="Nhập mã lớp">
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <label for="">Tên lớp</label>
                                        <select class="form-control form-control-xs selectpicker" name="" data-size="5"
                                                data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                            <option value="">Quản trị hệ thống</option>
                                            <option value="">Lập trình website</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Giảng viên</label>
                                        <select class="form-control form-control-xs selectpicker" name="" data-size="5"
                                                data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                            <option value="">Nguyễn Thanh Hải</option>
                                            <option value="">Trần Thanh Điện</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Năm học - Học kỳ </label>
                                        <select class="form-control form-control-xs selectpicker" name="" data-size="5"
                                                data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                            <option value="">Học kỳ 1 - Năm 2020</option>
                                        </select>
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
