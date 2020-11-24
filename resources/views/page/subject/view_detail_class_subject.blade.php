@extends('layout.layout')
@section('title', 'Xem lớp học phần')

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
                        <li class="breadcrumb-item"><a href="#">Lớp học phần</a></li>
                        <li class="breadcrumb-item active">H02 - Quản trị hệ thống</li>
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
                        <div class="form-group">
                            <label for="">Chọn file Excel</label><br>
                            <input type="file" name="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary btn-sm">Nhập</button>
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
                <!--  col 6-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b style="text-transform: uppercase;">H02 - Quản trị hệ thống</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel"></i> Nhập Excel
                                </a>

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
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Mã SV</th>
                                        <th scope="col" style="width:15%;">Họ tên</th>
                                        <th scope="col" style="width:10%;">Giới tính</th>
                                        <th scope="col" style="width:15%;">Điện thoại</th>
                                        <th scope="col" style="width:15%;">Email</th>
                                        <th scope="col" style="width:20%;">Lớp CN</th>
                                        <th scope="col" style="width:5%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Mã sinh viên">
                                            <b>B1607138</b>
                                        </td>
                                        <td data-label="Họ tên">
                                            <b>Nguyễn Văn Tuấn</b>
                                        </td>
                                        <td data-label="Giới tính">
                                            Nam
                                        </td>
                                        <td data-label="Điện thoại">
                                            0326598969
                                        </td>
                                        <td data-label="Email">
                                            tuanb1607138@student.ctu.edu.vn
                                        </td>

                                        <td data-label="Lớp chuyên ngành">
                                            <b>Công nghệ thông tin</b>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs" href="#" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                               href="{{ url('view-score-student') }}" role="button" title="Cập nhật điểm">
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
