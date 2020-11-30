@extends('layout.layout')
@section('title', 'Thay đổi quyền truy cập')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-teacher') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-role-user-access') }}">Quyền người dùng truy cập</a></li>
                        <li class="breadcrumb-item active">Thay đổi quyền truy cập</li>
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
            <section class="col-lg-8 offset-lg-2">
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            <b>THAY ĐỔI QUYỀN TRUY CẬP</b>
                        </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-3">
                        <form action="{{ url('update-change-role/'.$user_ids->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    @php($teachers = DB::table('teachers')->where('id', $user_ids->teacher_id)->first())
                                    <label for="">Người dùng</label>
                                    <input type="text" disabled class="form-control" value="{{ $teachers->fullname }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Quyền truy cập</label>
                                    <select name="inputRoleId" class="form-control">
                                        @php($roles = DB::table('roles')->where('id', $user_ids->role_id)->first())
                                        <option value="{{ $roles->id }}">{{ $roles->role_name }}</option>

                                        <option value="">- - Chọn - -</option>
                                        @php($get_roles = DB::table('roles')->get())
                                        @foreach($get_roles as $get_role)
                                        <option value="{{ $get_role->id }}">{{ $get_role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                                </div>
                            </div>
                        </form>
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

@endsection
