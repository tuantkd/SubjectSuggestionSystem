@extends('layout.layout')
@section('title', 'Chỉnh sửa lớp học phần')

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
                        <li class="breadcrumb-item active">Chỉnh sửa lớp học phần</li>
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
                <!--  col 6-->
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA LỚP HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('update-class-subject/'.$edit_class_subject->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-sm-4">
                                        <label for="">Mã lớp</label>
                                        <input type="text" name="" class="form-control" disabled value="{{ $edit_class_subject->class_subject_code }}">
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <label for="">Tên lớp</label>
                                        <input type="text" name="inputClassSubjectName" required class="form-control" value="{{ $edit_class_subject->class_subject_name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-sm-12">
                                        <label for="">Học phần</label>
                                        <select class="form-control form-control-xs selectpicker" name="inputSubjectId" data-size="5"
                                        data-live-search="true" data-width="100%" required>
                                            @php($subject = DB::table('subjects')->where('id',$edit_class_subject->subject_id)->first())
                                            <option value="{{ $subject->id }}">{{ $subject->subject_code }} - {{ $subject->subject_name }}</option>

                                            <option value="">- - Chọn - -</option>
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
                                        <select class="form-control form-control-xs selectpicker" name="inputTeacherId" data-size="5"
                                        data-live-search="true" data-width="100%" required>
                                            @php($teacher = DB::table('teachers')->where('id',$edit_class_subject->teacher_id)->get())
                                            @foreach($teacher as $value_teacher)
                                            <option value="{{ $value_teacher->id }}">{{ $value_teacher->fullname }}</option>
                                            @endforeach

                                            <option value="">- - Chọn - -</option>
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
                                        <select class="form-control form-control-xs selectpicker" name="inputSemesterYearId" data-size="10"
                                        data-live-search="true" data-width="100%" required>
                                            @php($semester_years = DB::table('semester_years')->where('id', $edit_class_subject->semester_year_id)->latest()->get())
                                            @foreach($semester_years as $get_semester_year)
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

                                            <option value="">- - Chọn - -</option>
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
                                        <textarea name="inputClassSubjectNote" class="form-control" rows="3" required placeholder="Nhập ghi chú lớp học phần">{{ $edit_class_subject->class_subject_note }}</textarea>
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
                <!--  End col 6-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
