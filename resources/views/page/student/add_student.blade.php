@extends('layout.layout')
@section('title', 'Thêm sinh viên')

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
                        <li class="breadcrumb-item active">Thêm sinh viên</li>
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
                                <b>THÊM SINH VIÊN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('post-add-student') }}" class="needs-validation" novalidate
                            method="POST" enctype="multipart/form-data" name="AddStudent" onsubmit="return validateSex()">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Mã sinh viên</label>
                                        <input type="text" name="inputStudentCode" class="form-control"
                                        placeholder="Nhập mã sinh viên" required>
                                        <small class="text-danger">{{ $errors->first('inputStudentCode') }}</small>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="inputStudentFullName" class="form-control" placeholder="Nhập họ và tên" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Giới tính</label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputStudentSex" value="Nam">Nam
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputStudentSex" value="Nữ">Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" name="inputStudentBirthday" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="inputStudentPhone" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Email</label>
                                        <input type="email" name="inputStudentEmail" class="form-control" placeholder="Nhập địa chỉ email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Lớp chuyên ngành</label>
                                        <select class="form-control select2bs4" required name="inputClassMajorId">
                                            <option value="">- - Chọn - -</option>
                                            @php($class_majors = DB::table('class_majors')->get())
                                            @foreach($class_majors as $class_major)
                                                <option value="{{ $class_major->id }}">
                                                    {{ $class_major->class_major_code }} - {{ $class_major->class_major_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Quê quán</label>
                                        <textarea name="inputStudentAddress" rows="2" class="form-control" placeholder="Nhập địa chỉ quê quán"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 text-right">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
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
        function validateSex() {
            var x = document.forms["AddStudent"]["inputStudentSex"].value;
            if (x == "") {
                alert("Vui lòng chọn giới tính");
                return false;
            }
        }

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

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

@endsection
