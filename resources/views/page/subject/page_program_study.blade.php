@extends('layout.layout')
@section('title', 'Chương trình học tập')

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
                        <li class="breadcrumb-item active">Chương trình học tập</li>
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
                        <h5 class="modal-title"><b>THÊM CHƯƠNG TRÌNH HỌC</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Loại học phần</label>
                            <select name="" class="form-control">
                                <option value="">- - Chọn - -</option>
                                <option value="">Tiên quyết</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Học phần</label>
                            <select name="" class="form-control">
                                <option value="">- - Chọn - -</option>
                                <option value="">Lập trình website</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chương trình đào tạo</label>
                            <select name="" class="form-control">
                                <option value="">- - Chọn - -</option>
                                <option value="">Chương trình đào tạo Khóa 44</option>
                            </select>
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
                                <b style="text-transform: uppercase;">CHƯƠNG TRÌNH HỌC TẬP</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-subject') }}" data-toggle="modal" data-target="#modelId">
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
                                        <th scope="col" style="width:15%;">Loại học phần</th>
                                        <th scope="col" style="width:35%;">Học phần</th>
                                        <th scope="col" style="width:40%;">Chương trình đào tạo</th>
                                        <th scope="col" style="width:5%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Loại học phần">
                                            <b>Tiên quyết</b>
                                        </td>
                                        <td data-label="Họ tên">
                                            <b>Lập trình website</b>
                                        </td>
                                        <td data-label="Giới tính">
                                            Chương trình đào tạo khóa 44
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
