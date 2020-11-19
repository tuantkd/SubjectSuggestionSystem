@extends('layout.layout')
@section('title', 'Chuyên ngành')

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
                        <li class="breadcrumb-item active">Chuyên ngành</li>
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
                        <h5 class="modal-title"><b>THÊM NGÀNH HỌC</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Bộ môn</label>
                                <select name="" class="form-control">
                                    <option value="">- - Chọn - -</option>
                                    <option value="">Công nghệ thông tin và truyền thông</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Mã Ngành</label>
                                <input type="text" name="" class="form-control" placeholder="Nhập mã ngành">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Tên Ngành</label>
                                <input type="text" name="" class="form-control" placeholder="Nhập tên ngành">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="" id="" rows="5" placeholder="Nhập mô tả ngành"></textarea>
                            </div>
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
                <!--  col 12-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHUYÊN NGÀNH HỌC</b>
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
                                        <th scope="col" style="width:15%;">Bộ môn</th>
                                        <th scope="col" style="width:10%;">Mã ngành</th>
                                        <th scope="col" style="width:20%;">Tên ngành</th>
                                        <th scope="col" style="width:45%;">Mô tả</th>
                                        <th scope="col" style="width:5%;"colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Khoa">
                                            <b>Công nghệ thông tin và truyền thông</b>
                                        </td>
                                        <td data-label="Mã Ngành">
                                            <b>CN-CNTT</b>
                                        </td>
                                        <td data-label="Tên Ngành">
                                            <b class="text-justify">Công nghệ thông tin</b>
                                        </td>
                                        <td data-label="Mô tả">
                                            <p class="text-justify">
                                                Ngành Công nghệ thông tin thường phân chia thành các chuyên ngành phổ biến: Khoa học máy tính,
                                                Kỹ thuật máy tính, Hệ thống thông tin, Mạng máy tính truyền thông, Kỹ thuật phần mềm, An ninh mạng...
                                                Công nghệ thông tin hầu như được sở dụng phổ biến trong lĩnh vực kinh tế.
                                                Các dịch vụ cốt lõi để giúp thực thi các chiến lược kinh doanh đó là:
                                                quá trình tự động kinh doanh, cung cấp thông tin, kết nối với khách hàng và các công cụ sản xuất.
                                            </p>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" href="#" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ url('edit-department') }}" role="button">
                                                <i class="fa fa-edit"></i>
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
