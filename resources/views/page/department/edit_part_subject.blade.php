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
                        <li class="breadcrumb-item"><a href="{{ url('page-part-subject') }}">Bộ môn</a></li>
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
                                <b>CHỈNH SỬA BỘ MÔN</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Khoa</label>
                                    <select name="" class="form-control">
                                        <option value="">- - Chọn - -</option>
                                        <option value="">CNTT&TT - Công nghê thông tin và truyền thông</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên bộ môn</label>
                                    <input type="text" name="" class="form-control" placeholder="Nhập tên bộ môn">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" name="" id="" rows="5" placeholder="Nhập mô bộ môn"></textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
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
