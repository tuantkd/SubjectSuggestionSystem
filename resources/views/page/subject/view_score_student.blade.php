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
                <div class="col-sm-12">
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
                                        <input type="text" name="inputScoreNumber" class="form-control" placeholder="Nhập điểm số" id="ScoreNumber"
                                        value="{{ $view_score_student->score_number }}" onkeyup="keyup_score()">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Điểm chữ</label>
                                        <input type="text" name="inputScoreChar" class="form-control" placeholder="Nhập điểm chữ" id="ScoreChar"
                                        value="{{ $view_score_student->score_char }}">
                                    </div>
                                    <input type="hidden" name="inputScoreLadderFour" id="LadderFour" value="{{ $view_score_student->score_ladder_four }}">
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        function keyup_score() {

            var input_score_number = document.getElementById('ScoreNumber').value;

            if (input_score_number != ""){
                if ((input_score_number >= 9.0) && (input_score_number <= 10.0)){
                    document.getElementById('ScoreChar').value = "A";
                    document.getElementById('LadderFour').value = 4.0;
                }

                if ((input_score_number >= 8.0) && (input_score_number <= 8.9)){
                    document.getElementById('ScoreChar').value = 'B+';
                    document.getElementById('LadderFour').value = 3.5;
                }

                if ((input_score_number >= 7.0) && (input_score_number <= 7.9)){
                    document.getElementById('ScoreChar').value = 'B';
                    document.getElementById('LadderFour').value = 3.0;
                }

                if ((input_score_number >= 6.5) && (input_score_number <= 6.9)){
                    document.getElementById('ScoreChar').value = 'C+';
                    document.getElementById('LadderFour').value = 2.5;
                }

                if ((input_score_number >= 5.5) && (input_score_number <= 6.4)){
                    document.getElementById('ScoreChar').value = 'C';
                    document.getElementById('LadderFour').value = 2.0;
                }

                if ((input_score_number >= 5.0) && (input_score_number <= 5.4)){
                    document.getElementById('ScoreChar').value = 'D+';
                    document.getElementById('LadderFour').value = 1.5;
                }

                if ((input_score_number >= 4.0) && (input_score_number <= 4.9)){
                    document.getElementById('ScoreChar').value = 'D';
                    document.getElementById('LadderFour').value = 1.0;
                }

                if ((input_score_number <= 4.0)){
                    document.getElementById('ScoreChar').value = 'F';
                    document.getElementById('LadderFour').value = 0.0;
                }
            }else {
                document.getElementById('ScoreChar').value = "";
                document.getElementById('LadderFour').value = "";
            }
        }
    </script>

@endsection
