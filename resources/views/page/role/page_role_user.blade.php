@extends('layout.layout')
@section('title', 'Quyền người dùng truy cập')

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
                        <li class="breadcrumb-item active">Quyền người dùng truy cập</li>
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
            <div class="row"
                <!--  col 6-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>QUYỀN NGƯỜI DÙNG TRUY CẬP</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <!-- SEARCH FORM -->
                            <form action="{{ url('page-role-user-access') }}" method="GET">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Nhập tìm kiếm người dùng ..." name="inputSearch">
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
                                        <th scope="col" style="width:20%;">Tên người dùng</th>
                                        <th scope="col" style="width:20%;">Chức vụ</th>
                                        <th scope="col" style="width:20%;">Quyền truy cập</th>
                                        <th scope="col" style="width:15%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_user_roles as $key => $show_user_role)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Tên người dùng">
                                            @php($get_teachers = DB::table('teachers')->where('id', $show_user_role->teacher_id)->get())
                                            @foreach($get_teachers as $get_teacher)
                                                <b>{{ $get_teacher->fullname }}</b>
                                            @endforeach
                                        </td>
                                        <td data-label="Chức vụ">
                                            @php($teachers = DB::table('teachers')->where('id', $show_user_role->teacher_id)->get())
                                            @foreach($teachers as $teacher)
                                                @php($get_positions = DB::table('positions')->where('id', $teacher->position_id)->get())
                                                @foreach($get_positions as $get_position)
                                                    {{ $get_position->position_name }}
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td data-label="Quyền truy cập">
                                            @php($roles = DB::table('roles')->where('id', $show_user_role->role_id)->get())
                                            @foreach($roles as $role)
                                                {{ $role->role_name }}
                                            @endforeach
                                        </td>
                                        <td data-label="Chọn">
                                            @if ($show_user_role->role_id == 1)
                                                <button class="btn btn-primary btn-sm" type="button" disabled title="Không thể thay đổi">
                                                    <i class="fa fa-exchange"></i> Thay đổi
                                                </button>
                                            @else
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ url('change-role/'.$show_user_role->id) }}" title="Thay đổi quyền">
                                                    <i class="fa fa-exchange"></i> Thay đổi
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm" style="margin:20px 0">
                                {{ $show_user_roles->links() }}
                            </ul>
                            <!-- /pagination -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  End col 6-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @if (Session::has('update_change_role_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thay đổi quyền'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
