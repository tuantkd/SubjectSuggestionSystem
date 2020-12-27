@extends('layout.layout')
@section('title', 'Thêm lớp học phần')

@section('link_cdn')
    <link rel="stylesheet" href="{{ url('public/dist/css/select.css') }}">
    <script src="{{ url('public/dist/js/select.js') }}"></script>
@endsection


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
                        <li class="breadcrumb-item"><a href="{{ url('page-class-subject') }}">Lớp học phần</a></li>
                        <li class="breadcrumb-item active">Thêm lớp học phần</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection


@section('content')

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
                                <b>THÊM LỚP HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('post-add-class-subject') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 col-sm-4">
                                        <label for="">Mã lớp</label>
                                        <input type="text" name="inputClassSubjectCode" class="form-control" placeholder="Nhập mã lớp" required>
                                        <small class="text-danger">{{ $errors->first('inputClassSubjectCode') }}</small>
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <label for="">Tên lớp học phần</label>
                                        <input type="text" name="inputClassSubjectName" class="form-control"
                                               placeholder="Nhập tên lớp học phần" required>
                                        <small class="text-danger">{{ $errors->first('inputClassSubjectName') }}</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Học phần</label>
                                        <select class="form-control selectpicker" name="inputSubjectId" data-size="10" required
                                        data-live-search="true" data-title="- - Chọn học phần- -" data-width="100%">
                                            @php($get_subjects = DB::table('subjects')->get())
                                            @foreach($get_subjects as $get_subject)
                                            <option value="{{ $get_subject->id }}">
                                                {{ $get_subject->subject_code }} - {{ $get_subject->subject_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Giảng viên</label>
                                        <select class="form-control selectpicker" name="inputTeacherId" data-size="15"
                                        data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                            @php($get_teachers = DB::table('teachers')->get())
                                            @foreach($get_teachers as $get_teacher)
                                                <option value="{{ $get_teacher->id }}">
                                                    {{ $get_teacher->fullname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Năm học - Học kỳ </label>
                                        <select class="form-control selectpicker" name="inputSemesterYearId" data-size="15" required
                                        data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                            @php($get_semester_years = DB::table('semester_years')->latest()->get())
                                            @foreach($get_semester_years as $get_semester_year)
                                                <option value="{{ $get_semester_year->id }}">
                                                    <?php
                                                        $year = str_split($get_semester_year->semesteryear);
                                                        //Hiển thị học kỳ
                                                        echo $semester = "Học kỳ ".$year[0];

                                                        //Hiển thị năm học
                                                        echo $year_arr = " - Năm học ".$get_semester_year->semester_year;
                                                    ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Ghi chú</label>
                                        <textarea name="inputClassSubjectNote" class="form-control" rows="3" placeholder="Nhập ghi chú lớp học phần"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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

    @if (Session::has('message_error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Lớp Học phần đã tồn tại!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
