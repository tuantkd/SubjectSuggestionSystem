@extends('layout.layout')
@section('title', 'Khóa học')

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
                        <li class="breadcrumb-item active">Khóa học</li>
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
                <section class="col-lg-5">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>THÊM KHÓA HỌC</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Tên khóa học</label>
                                        <input type="text" name="" class="form-control" placeholder="Nhập tên khóa học">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Nhập ghi chú khóa học"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>


                <section class="col-lg-7">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>KHÓA HỌC</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Khóa học</th>
                                        <th scope="col" style="width:45%;">Ghi chú</th>
                                        <th scope="col" style="width:5%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Khoa">
                                            <b>Khóa 44</b>
                                        </td>
                                        <td data-label="Mô tả">
                                            <p class="text-justify">
                                            </p>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" href="#" role="button">
                                                <i class="fa fa-trash-o"></i>
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
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
