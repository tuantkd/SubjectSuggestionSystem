@extends('layout.layout')
@section('title', 'Lớp học phần')

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
                        <li class="breadcrumb-item active">Lớp học phần</li>
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
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>LỚP HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-subject') }}" role="button">
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
                                        <th scope="col" style="width: 5%;">STT</th>
                                        <th scope="col" style="width: 15%;">Mã lớp</th>
                                        <th scope="col" style="width: 20%;">Tên lớp</th>
                                        <th scope="col" style="width: 25%;">Giảng viên</th>
                                        <th scope="col" style="width: 25%;">Học kỳ - Năm học</th>
                                        <th scope="col" style="width: 10%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Mã lớp">
                                            <b>H02</b>
                                        </td>
                                        <td data-label="Tên lớp">
                                            <b>Quản trị hệ thống</b>
                                        </td>
                                        <td data-label="Giảng viên">
                                            <b>Nguyễn Thanh Hải</b>
                                        </td>
                                        <td data-label="Ghi chú">
                                            <span>Học kỳ 1 - Năm 2020</span>
                                        </td>
                                        <td data-label="Ghi chú">
                                            <a class="btn btn-danger btn-xs" href="#" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Ghi chú">
                                            <a class="btn btn-primary btn-xs"
                                            href="{{ url('edit-class-subject') }}" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td><td data-label="Ghi chú">
                                            <a class="btn btn-success btn-xs"
                                            href="{{ url('view-detail-class-subject') }}" role="button">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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

    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

@endsection
