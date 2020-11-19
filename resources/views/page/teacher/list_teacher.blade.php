@extends('layout.layout')
@section('title', 'Danh sách giảng viên')

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
                        <li class="breadcrumb-item active">Danh sách giảng viên</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>NHẬP FILE EXCEL</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Chọn file Excel</label>
                                <input type="file" name="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 12-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>GIẢNG VIÊN</b>
                            </h3>
                            <div class="card-tools">
                                {{--<a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel-o"></i> Nhập Excel
                                </a>--}}
                                <a class="btn btn-primary btn-xs" href="{{ url('add-teacher') }}" role="button">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <!-- SEARCH FORM -->
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nhập tìm kiếm giảng viên">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- SEARCH FORM -->

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Họ và tên</th>
                                        <th scope="col" style="width:15%;">Ảnh đại diện</th>
                                        <th scope="col" style="width:15%;">Giới tính</th>
                                        <th scope="col" style="width:15%;">Điện thoại</th>
                                        <th scope="col" style="width:15%;">Email</th>
                                        <th scope="col" style="width:15%;">Chức vụ</th>
                                        <th scope="col" style="width:5%;"colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Họ và tên">
                                            <b>Nguyễn Thanh Hải</b>
                                        </td>
                                        <td data-label="Ảnh đại diện">
                                            <img src="{{ url('public/dist/img/avatar.png') }}" alt="Ảnh đại diện"
                                            style="max-width:100%;height:60px;border-radius:40%;">
                                        </td>
                                        <td data-label="Giới tính">
                                            <p>Nam</p>
                                        </td>
                                        <td data-label="Điện thoại">
                                            <p>0326859698</p>
                                        </td>
                                        <td data-label="Email">
                                            <p>thanhhai@gmail.com</p>
                                        </td>
                                        <td data-label="Chức vụ">
                                            <b>Phó bộ môn</b>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" href="#" role="button" title="Xóa">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-sm"
                                               href="{{ url('view-infor-reacher') }}" role="button" title="Xem thông tin">
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
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
