@extends('layout.layout')
@section('title', 'Chỉnh sửa sinh viên')

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
                        <li class="breadcrumb-item active">Chỉnh sửa sinh viên</li>
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
                                <b>CHỈNH SỬA SINH VIÊN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Mã sinh viên</label>
                                        <input type="text" name="" class="form-control" disabled>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Giới tính</label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Nam">Nam
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Nữ">Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" name="" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Email</label>
                                        <input type="email" name="" class="form-control" placeholder="Nhập địa chỉ email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Lớp chuyên ngành</label>
                                        <select class="form-control" name="">
                                            <option value="">- - Chọn - -</option>
                                            <option value="">Công nghệ thông tin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Quê quán</label>
                                        <textarea name="" rows="3" class="form-control" placeholder="Nhập địa chỉ quê quán"></textarea>
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
