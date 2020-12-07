@extends('layout.layout')
@section('title', 'Chỉnh sửa sinh viên')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-list-student') }}">Danh sách sinh viên</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa sinh viên</li>
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
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA SINH VIÊN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('update-student/'.$edit_student->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Mã sinh viên</label>
                                        <input type="text" name="inputStudentCode" class="form-control" disabled value="{{ $edit_student->student_code }}">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="inputStudentFullName" class="form-control" disabled value="{{ $edit_student->student_fullname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Giới tính</label><br>
                                        @if ($edit_student->student_sex == 'Nam')
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="inputStudentSex" value="Nam" checked>Nam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="inputStudentSex" value="Nữ">Nữ
                                                </label>
                                            </div>
                                        @else
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="inputStudentSex" value="Nam">Nam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="inputStudentSex" value="Nữ" checked>Nữ
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" name="inputStudentBirthday" class="form-control" value="{{ $edit_student->student_birthday }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="inputStudentPhone" class="form-control" placeholder="Nhập số điện thoại" value="{{ $edit_student->student_phone }}">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Email</label>
                                        <input type="email" name="inputStudentEmail" class="form-control" placeholder="Nhập địa chỉ email" value="{{ $edit_student->student_email }}">
                                    </div>
                                </div>

                                {{--<div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Lớp chuyên ngành</label>
                                        <select class="form-control" name="">
                                            <option value="">- - Chọn - -</option>
                                            <option value="">Công nghệ thông tin</option>
                                        </select>
                                    </div>
                                </div>--}}

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Quê quán</label>
                                        <textarea name="inputStudentAddress" rows="3" class="form-control" placeholder="Nhập địa chỉ quê quán">{{ $edit_student->student_address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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

@endsection
