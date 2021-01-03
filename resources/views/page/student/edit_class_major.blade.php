@extends('layout.layout')
@section('title', 'Chỉnh sửa lớp chuyên ngành')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-class-major') }}">Lớp chuyên ngành</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa lớp chuyên ngành</li>
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
                                <b>CHỈNH SỬA LỚP CHUYÊN NGÀNH</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('update-class-major/'.$edit_class_major->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-sm-3">
                                        <label for="">Mã lớp học</label>
                                        <input type="text" name="" class="form-control" disabled value="{{ $edit_class_major->class_major_code }}">
                                    </div>
                                    <div class="col-12 col-sm-7">
                                        <label for="">Tên lớp học</label>
                                        <input type="text" name="inputClassMajorName" required
                                        value="{{ $edit_class_major->class_major_name }}" class="form-control" placeholder="Nhập tên lớp học">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label for="">Sỉ số</label>
                                        <input type="number" name="inputTotalNumber" required
                                        value="{{ $edit_class_major->class_major_total_number }}" class="form-control"
                                               placeholder="Sỉ số lớp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Khóa học</label>
                                        <select name="inputCourseId" required class="form-control">
                                            @php($courses = DB::table('courses')->where('id', $edit_class_major->course_id)->first())
                                            <option value="{{ $courses->id }}">{{ $courses->course_name }}</option>

                                            <option value="">- - Chọn - -</option>
                                            @php($get_courses = DB::table('courses')->get())
                                            @foreach($get_courses as $get_course)
                                                <option value="{{ $get_course->id }}">{{ $get_course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Chuyên ngành</label>
                                        <select name="inputMajorId" required class="form-control">
                                            @php($majors = DB::table('majors')->where('id', $edit_class_major->major_id)->first())
                                            <option value="{{ $majors->id }}">{{ $majors->major_name }}</option>

                                            <option value="">- - Chọn - -</option>
                                            @php($get_majors = DB::table('majors')->get())
                                            @foreach($get_majors as $get_major)
                                                <option value="{{ $get_major->id }}">{{ $get_major->major_name }}</option>
                                            @endforeach
                                        </select>
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
