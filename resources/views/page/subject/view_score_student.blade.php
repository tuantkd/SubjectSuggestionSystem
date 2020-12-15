@extends('layout.layout')
@section('title', 'Xem cập nhật điểm')

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
                        <li class="breadcrumb-item">
                            @php($class_subject = DB::table('class_subjects')->where('id',$view_score_student->class_subject_id)->first())
                            <a href="{{ url('view-detail-class-subject/'.$class_subject->id) }}">
                                {{ $class_subject->class_subject_code }} - {{ $class_subject->class_subject_name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Xem cập nhật điểm</li>
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
                                <b>XEM CẬP NHẬT ĐIỂM HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('update-score-student/'.$class_subject_id->id.'/'.$view_score_student->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Tên Lớp Học phần</label>
                                        <input type="text" name="" class="form-control"
                                       value="{{ $class_subject->class_subject_code }} - {{ $class_subject->class_subject_name }}" disabled>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Sinh viên</label>
                                        @php($students = DB::table('students')->where('id',$view_score_student->student_id)->first())
                                        <input type="text" name="" class="form-control" value="{{ $students->student_fullname }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điểm số</label>
                                        <input type="text" name="inputScoreNumber" class="form-control" placeholder="Nhập điểm số" value="{{ $view_score_student->score_number }}">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điểm chữ</label>
                                        <input type="text" name="inputScoreChar" class="form-control" placeholder="Nhập điểm chữ" value="{{ $view_score_student->score_char }}">
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
