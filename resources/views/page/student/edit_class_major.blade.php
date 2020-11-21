@extends('layout.layout')
@section('title', 'Chỉnh sửa lớp chuyên ngành')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-class-major') }}">Lớp chuyên ngành</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa lớp chuyên ngành</li>
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
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA LỚP CHUYÊN NGÀNH</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Mã lớp học</label>
                                        <input type="text" name="" class="form-control" disabled>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Tên lớp học</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="Nhập tên lớp học">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Khóa học</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">- - Chọn - -</option>
                                            <option value="">Khóa 44</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Chuyên ngành</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">- - Chọn - -</option>
                                            <option value="">Công nghệ thông tin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
