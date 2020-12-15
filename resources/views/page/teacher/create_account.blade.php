@extends('layout.layout')
@section('title', 'Tạo tài khoản')

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
                        <li class="breadcrumb-item active">Tạo tài khoản</li>
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
                                <b>TẠO TÀI KHOẢN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('post-create-account/'.$account->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Tên tài khoản</label>
                                        <input type="text" name="inputUsername" class="form-control" placeholder="Nhập tên tài khoản" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Mật khẩu</label>
                                        <input type="password" name="inputPassword" class="form-control" placeholder="Nhập mật khẩu" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Quyền truy cập</label>
                                        <select name="inputRoleId" class="form-control">
                                            <option value="">- - Chọn - -</option>

                                            @php($get_roles = DB::table('roles')->get())
                                            @foreach($get_roles as $get_role)
                                            <option value="{{ $get_role->id }}">
                                                {{ $get_role->role_name }}
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
                                    </div>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @php($get_users = DB::table('users')->where('teacher_id', $account->id)->get())
    @foreach($get_users as $get_user)
        @if ($get_user->role_id == 1)
            <script type="text/javascript">
                Swal.fire({
                    position: 'center'
                    , icon: 'success'
                    , title: 'Đã thêm quản trị'
                    , showConfirmButton: false
                    , timer: 2000
                });
                location.href = "{{ url('page-list-admin') }}";
            </script>
        @else
            <script type="text/javascript">
                Swal.fire({
                    position: 'center'
                    , icon: 'success'
                    , title: 'Đã thêm giảng viên'
                    , showConfirmButton: false
                    , timer: 2000
                });
                location.href = "{{ url('page-list-teacher') }}";
            </script>
        @endif

    @endforeach

@endsection
