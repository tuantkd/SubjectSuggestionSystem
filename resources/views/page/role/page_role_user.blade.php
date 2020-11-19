@extends('layout.layout')
@section('title', 'Quyền người dùng truy cập')

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
                        <li class="breadcrumb-item active">Quyền người dùng truy cập</li>
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
            <div class="row"
                <!--  col 6-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>QUYỀN NGƯỜI DÙNG TRUY CẬP</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:20%;">Tên người dùng</th>
                                        <th scope="col" style="width:20%;">Chức vụ</th>
                                        <th scope="col" style="width:20%;">Quyền truy cập</th>
                                        <th scope="col" style="width:15%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Tên người dùng">
                                            <b>Nguyễn Thanh Hải</b>
                                        </td>
                                        <td data-label="Chức vụ">
                                            <p>
                                                Phó bộ môn
                                            </p>
                                        </td>
                                        <td data-label="Quyền truy cập">
                                            <p>
                                                Giảng viên
                                            </p>
                                        </td>
                                        <td data-label="Quyền truy cập">
                                            <a class="btn btn-primary btn-sm" href="#" role="button">
                                                <i class="fa fa-exchange"></i> Thay đổi quyền
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

@endsection
