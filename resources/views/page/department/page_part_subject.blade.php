@extends('layout.layout')
@section('title', 'Bộ môn')

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
                        <li class="breadcrumb-item active">Bộ môn</li>
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
                        <h5 class="modal-title"><b>THÊM BỘ MÔN</b></h5>
                    </div>
                    <div class="modal-body">
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
                                <b>BỘ MÔN</b>
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
                                        <th scope="col" style="width:20%;">Khoa</th>
                                        <th scope="col" style="width:15%;">Tên bộ môn</th>
                                        <th scope="col" style="width:55%;">Mô tả</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Khoa">
                                            <b>CNTT&TT - Công nghệ thông và truyền thông</b>
                                        </td>
                                        <td data-label="Tên bộ môn">
                                            <b>Công nghệ thông tin</b>
                                        </td>
                                        <td data-label="Mô tả">
                                            <p class="text-justify">
                                                Được thành lập năm 1994, Khoa Công nghệ Thông tin và Truyền thông (CNTT&TT),
                                                một trong bảy khoa trọng điểm về lĩnh vực công nghệ thông tin của Việt Nam, đã không ngừng hoàn thiện và phát triển vững mạnh.
                                                Năm 2019, Khoa nhận được Huân chương lao động hạng ba của Chủ tịch nước.
                                                Sứ mệnh của Khoa là đào tạo, nghiên cứu khoa học và chuyển giao công nghệ trong lĩnh vực CNTT&TT. Tầm nhìn đến 2025,
                                                Khoa trở thành một trung tâm đào tạo và nghiên cứu khoa học đẳng cấp trong nước và khu vực Đông Nam Á về lĩnh vực CNTT&TT.
                                            </p>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" href="#" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>

                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                            href="{{ url('edit-part-subject') }}" role="button">
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
