@extends('layout.layout')
@section('title', 'Khoa')

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
                        <li class="breadcrumb-item active">Khoa</li>
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
            <form action="{{ url('post-add-department') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM KHOA</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Tên khoa</label>
                                <input type="text" name="inputDepartmentName" class="form-control" placeholder="Nhập tên khoa" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="inputDepartmentDescription" rows="5" required placeholder="Nhập mô tả khoa"></textarea>
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

                    <!-- message -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <strong>
                                {{ $errors->first('inputDepartmentName') }}
                            </strong>
                        </div>
                    @endif
                    <!-- /message -->


                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>KHOA</b>
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
                                        <th scope="col" style="width:20%;">Tên Khoa</th>
                                        <th scope="col" style="width:60%;">Mô tả</th>
                                        <th scope="col" style="width:5%;"colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_departments as $key =>$show_department)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Tên khoa">
                                                <b class="text-justify">
                                                    {{ $show_department->department_name }}
                                                </b>
                                            </td>
                                            <td data-label="Mô tả">
                                                <p class="text-justify">
                                                    {!! $show_department->department_description !!}
                                                </p>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?');"
                                                href="{{ url('delete-department/'.$show_department->id) }}" role="button">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-sm"
                                                href="{{ url('edit-department/'.$show_department->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
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
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    {{--Thông báo box--}}
    @if (Session::has('add_department_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm khoa'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_department_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa Khoa'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_department_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã cập nhật Khoa'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
