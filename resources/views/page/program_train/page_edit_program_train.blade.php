@extends('layout.layout')
@section('title', 'Chỉnh sửa CTĐT')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-program-train') }}">CTĐT</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa CTĐT</li>
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
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA CHƯƠNG TRÌNH ĐÀO TẠO</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">

                            <form action="{{ url('update-program-train/'.$edit_program_train->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Tên chương trình đào tạo</label>
                                    <input type="text" name="inputProgramName" class="form-control"
                                           value="{{ $edit_program_train->program_train_name }}"
                                           placeholder="Nhập tên chương trình đào tạo" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Ngày bắt đầu</label>
                                    <input type="date" name="inputProgramDateBegin" class="form-control" required
                                           value="{{ $edit_program_train->program_train_date_begin }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Khóa học</label>
                                    <select name="inputProgramCourseId" class="form-control" required>
                                        @php($course_edit = DB::table('courses')->where('id', $edit_program_train->course_id)->first())
                                        <option value="{{ $course_edit->id }}">{{ $course_edit->course_name }}</option>

                                        <option value="">- - Chọn - -</option>
                                        @php($courses = DB::table('courses')->get())
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Chuyên ngành</label>
                                    <select name="inputMajorId" class="form-control" required>
                                        @php($major_edit = DB::table('majors')->where('id', $edit_program_train->major_id)->first())
                                        <option value="{{ $major_edit->id }}">{{ $major_edit->major_name }}</option>

                                        <option value="">- - Chọn - -</option>
                                        @php($majors = DB::table('majors')->get())
                                        @foreach($majors as $major)
                                            <option value="{{ $major->id }}">{{ $major->major_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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

        $(".alert").alert();
    </script>

@endsection
