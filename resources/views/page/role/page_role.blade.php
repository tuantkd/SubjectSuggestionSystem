@extends('layout.layout')
@section('title', 'Quyền truy cập')

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
                        <li class="breadcrumb-item active">Quyền truy cập</li>
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
            <form action="{{ url('post-add-role') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM QUYỀN TRUY CẬP</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Tên quyền</label>
                                <input type="text" name="inputRoleName" class="form-control" placeholder="Nhập tên quyền">
                            </div>
                            <div class="col-6">
                                <label for="">Chức vụ</label>
                                <select class="form-control" name="inputPositionId">
                                    <option>- - Chọn - -</option>
                                    @php($get_positions = DB::table('positions')->get())
                                    @foreach($get_positions as $get_position)
                                        <option value="{{ $get_position->id }}">
                                            {{ $get_position->position_name }}
                                        </option>
                                    @endforeach
                                </select>
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
                <!--  col 6-->
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>QUYỀN TRUY CẬP</b>
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
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên quyền</th>
                                        <th scope="col">Chức vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_roles as $key => $show_role)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Tên quyền">
                                            <b>{{ $show_role->role_name }}</b>
                                        </td>
                                        <td data-label="Chức vụ">
                                            @php($get_positions = DB::table('positions')->where('id',$show_role->position_id)->get())
                                            @foreach($get_positions as $get_position)
                                            <b>{{ $get_position->position_name }}</b>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
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

    @if (Session::has('add_role_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm quyền'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
