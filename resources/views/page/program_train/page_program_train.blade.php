@extends('layout.layout')
@section('title', 'Chương trình đào tạo')

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
                        <li class="breadcrumb-item active">Chương trình đào tạo</li>
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
                        <h5 class="modal-title"><b>THÊM CHƯƠNG TRÌNH ĐÀO TẠO</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên chương trình đào tạo</label>
                            <input type="text" name="" class="form-control" placeholder="Nhập tên chương trình đào tạo">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" name="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Khóa học</label>
                            <select name="" class="form-control">
                                <option value="">- - Chọn - -</option>
                                <option value="">Khóa 44</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chuyên ngành</label>
                            <select name="" class="form-control">
                                <option value="">- - Chọn - -</option>
                                <option value="">Công nghệ thông tin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
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
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHƯƠNG TRÌNH ĐÀO TẠO</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
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
                                        <th scope="col" style="width:30%;">Tên chương trình</th>
                                        <th scope="col" style="width:15%;">Ngày bắt đầu</th>
                                        <th scope="col" style="width:10%;">Khóa học</th>
                                        <th scope="col" style="width:35%;">Chuyên ngành</th>
                                        <th scope="col" style="width:5%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Tên chương trình">
                                            <b>Chương trình Đào Tạo K44</b>
                                        </td>
                                        <td data-label="Ngày bắt đầu">
                                            <b>16/0/2020</b>
                                        </td>
                                        <td data-label="Khóa học">
                                            Khóa 44
                                        </td>
                                        <td data-label="Chuyên ngành">
                                            Công nghệ thông tin
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs" href="#" role="button">
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
