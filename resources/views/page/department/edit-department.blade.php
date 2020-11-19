@extends('layout.layout')
@section('title', 'Chỉnh sửa')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-department') }}">Khoa</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA KHOA</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Mã khoa</label>
                                        <input type="text" name="" class="form-control" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Tên khoa</label>
                                        <input type="text" name="" class="form-control" placeholder="Nhập tên khoa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Mô tả</label>
                                        <textarea class="form-control" name="" id="" rows="5" placeholder="Nhập mô tả khoa"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
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
