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
                            <form action="{{ url('page-list-teacher') }}" method="GET">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Nhập tìm kiếm giảng viên" name="inputSearch">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- SEARCH FORM -->

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:12%;">Họ và tên</th>
                                        <th scope="col" style="width:10%;">Tài khoản</th>
                                        <th scope="col" style="width:10%;">Ảnh đại diện</th>
                                        <th scope="col" style="width:8%;">Giới tính</th>
                                        <th scope="col" style="width:10%;">Điện thoại</th>
                                        <th scope="col" style="width:10%;">Email</th>
                                        <th scope="col" style="width:10%;">Chức vụ</th>
                                        <th scope="col" style="width:15%;">Quê quán</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_teachers as $key => $show_teacher)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Họ và tên">
                                                <b>{{ $show_teacher->fullname }}</b>
                                            </td>
                                            <td data-label="Tài khoản">
                                                @php($teacher = DB::table('users')->where('teacher_id', $show_teacher->id)->first())
                                                <b>{{ $teacher->username }}</b>
                                            </td>
                                            <td data-label="Ảnh đại diện">
                                                @if ($show_teacher->avatar != null)
                                                    <img src="{{ url('public/upload_avatar/'.$show_teacher->avatar) }}" alt="Ảnh đại diện"
                                                    style="max-width:100%;height:70px;border-radius:30%;">
                                                @else
                                                    <img src="{{ url('public/dist/img/user_avatar.png') }}" alt="Ảnh đại diện"
                                                         style="max-width:100%;height:70px;border-radius:30%;">
                                                @endif
                                            </td>
                                            <td data-label="Giới tính">
                                                <p>{{ $show_teacher->sex }}</p>
                                            </td>
                                            <td data-label="Điện thoại">
                                                <p>{{ $show_teacher->phone }}</p>
                                            </td>
                                            <td data-label="Email">
                                                <p>{{ $show_teacher->email }}</p>
                                            </td>
                                            <td data-label="Chức vụ">
                                                @php($get_positions = DB::table('positions')->where('id', $show_teacher->position_id)->get())
                                                @foreach($get_positions as $get_position)
                                                    <b>{{ $get_position->position_name }}</b>
                                                @endforeach
                                            </td>
                                            <td data-label="Quê quán">
                                                {{ $show_teacher->address }}
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?');"
                                                href="{{ url('delete-teacher/'.$show_teacher->id) }}" role="button">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                href="{{ url('view-infor-teacher/'.$show_teacher->id) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm" style="margin:20px 0">
                                {{ $show_teachers->links() }}
                            </ul>
                            <!-- /pagination -->

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

    @if (Session::has('delete_teacher_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa giảng viên'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
