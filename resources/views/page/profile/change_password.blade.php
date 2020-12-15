@extends('page.profile.profile_user_layout')
@section('card_col_9')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#settings" data-toggle="tab"><b>Thay đổi mật khẩu</b></a>
                </li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal needs-validation" method="POST" action="{{ url('update-password/'.$user->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Mật khẩu cũ:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="inputPasswordOld" placeholder="Nhập mật khẩu cũ" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="inputPasswordNew" placeholder="Nhập mật khẩu mới" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Xác nhận mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="inputPasswordComfirmNew" placeholder="Nhập mật khẩu mới" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10 text-right">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @if (Session::has('old_pass_fail'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Mật khẩu cũ không đúng!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('change_password_user_fail'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Xác nhận mật khẩu sai!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('change_password_user'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thay đổi mật khẩu!'
                , showConfirmButton: false
                , timer: 2000
            });
            location.href = "{{ url('logout') }}"
        </script>
    @endif

@endsection
