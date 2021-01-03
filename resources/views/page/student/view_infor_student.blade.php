@extends('layout.layout')
@section('title', 'Thông tin sinh viên')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if (Auth::check() && Auth::user()->role_id == 1)
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('page-list-student') }}">Danh sách sinh viên</a></li>
                        @else
                            <li class="breadcrumb-item active">Thông tin sinh viên</li>
                        @endif

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('content')

    <style>
        .text-muted{
            font-size:13px;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('public/dist/img/user_avatar.png') }}">
                            </div>
                            <h3 class="profile-username text-center"><b>{{ $infor_students->student_fullname }}</b></h3>
                            <p class="text-muted text-center">MSSV {{ $infor_students->student_code }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b class="text-success">Tổng số HP</b>
                                    <a class="float-right">
                                        @php($class_majors = DB::table('class_majors')->where('id', $infor_students->class_major_id)->get())
                                        @foreach($class_majors as $class_major)
                                            @php($courses = DB::table('courses')->where('id', $class_major->course_id)->get())
                                            @foreach($courses as $course)
                                                @php($trains = DB::table('program_trains')->where('course_id', $course->id)->get())
                                                @foreach($trains as $train)
                                                    @php($total_subject_studies = DB::table('program_studies')->where('program_train_id', $train->id)->count())
                                                    <b>{{ $total_subject_studies }}</b> HP
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b class="text-success">HP đã học</b>
                                    <a class="float-right">
                                        <?php
                                            $total_subject_study = 0;
                                            $total_subject = 0;
                                        ?>
                                        @php($class_majors = DB::table('class_majors')->where('id', $infor_students->class_major_id)->get())
                                        @foreach($class_majors as $class_major)
                                            @php($courses = DB::table('courses')->where('id', $class_major->course_id)->get())
                                            @foreach($courses as $course)
                                                @php($trains = DB::table('program_trains')->where('course_id', $course->id)->get())
                                                @foreach($trains as $train)
                                                    @php($studies = DB::table('program_studies')->where('program_train_id', $train->id)->get())
                                                    @foreach($studies as $studie)
                                                        @php($count_subjects = DB::table('subjects')->where('id', $studie->subject_id)->count())
                                                        @php($subjects = DB::table('subjects')->where('id', $studie->subject_id)->get())
                                                        @foreach($subjects as $subject)
                                                            @php($class_subjects = DB::table('class_subjects')->where('subject_id', $subject->id)->get())
                                                            @foreach($class_subjects as $class_subject)
                                                                @php($count_subjects = DB::table('detail_scores')
                                                                ->where([['class_subject_id','=',$class_subject->id],['student_id','=',$infor_students->id]])->count())
                                                                <?php $total_subject_study = $total_subject_study + $count_subjects; ?>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        <b>{{ $total_subject_study }}</b> HP
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b class="text-danger">HP chưa học</b>
                                    <a class="float-right">
                                        <b><?php echo $subject_unstudy = $total_subject_studies - $total_subject_study; ?></b> HP
                                    </a>
                                </li>
                                <hr>
                                <li class="list-group-item">
                                    <b class="text-primary">Tổng tín chỉ</b> <a class="float-right"><b>155</b> TC</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-primary">Tín chỉ tích lũy</b>
                                    <a class="float-right">
                                        <?php $total_credit_accumulation = 0; ?>
                                        @php($detail_scores = DB::table('detail_scores')->where('student_id','=',$infor_students->id)->get())
                                        @foreach($detail_scores as $detail_score)
                                            @php($class_subjects = DB::table('class_subjects')->where('id', $detail_score->class_subject_id)->get())
                                            @foreach($class_subjects as $class_subject)
                                                @php($sum_subjects = DB::table('subjects')->where('id', $class_subject->subject_id)->sum('subject_number_credit'))
                                                <?php $total_credit_accumulation = $total_credit_accumulation + $sum_subjects; ?>
                                            @endforeach
                                        @endforeach
                                        <b>{{ $total_credit_accumulation }}</b> TC
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-danger">Tín chỉ còn lại</b>
                                    <a class="float-right"><b><?php $total_credit = 155; echo $credit_remaining = $total_credit - $total_credit_accumulation; ?></b> TC</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cá nhân</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <strong>
                                @if ($infor_students->student_sex == 'Nam')
                                    <i class="fas fa-male mr-1"></i>
                                @else
                                    <i class="fas fa-female mr-1"></i>
                                @endif
                                Giới tính
                            </strong>
                            <p class="text-muted">{{ $infor_students->student_sex }}</p>
                            <hr>

                            <strong><i class="fa fa-calendar mr-1"></i> Ngày sinh</strong>
                            <p class="text-muted">{{ date('d-m-Y', strtotime($infor_students->student_birthday)) }}</p>
                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Điện thoại</strong>
                            <p class="text-muted">{{ $infor_students->student_phone }}</p>
                            <hr>

                            <strong><i class="fa fa-envelope mr-1"></i> Email</strong>
                            <p class="text-muted">{{ $infor_students->student_email }}</p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Quê quán</strong>
                            <p class="text-muted">{{ $infor_students->student_address }}</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                HỌC KỲ - NĂM HỌC
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('view-infor-student/'.$infor_students->id) }}" method="GET">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-3 text-right">
                                        <label for="">Học kỳ - Năm học</label>
                                    </div>
                                    <div class="col-12 col-sm-6 text-left">
                                        <select class="form-control" name="inputSearchSemesterYear">

                                            @if (isset($semester_year_class_subs))
                                                @foreach($semester_year_class_subs as $semes_years)
                                                    @if ($loop->first)
                                                        <?php
                                                        $se_year = str_split($semes_years->semesteryear);
                                                        $semester_arr = "HK ".$se_year[0];
                                                        $year_arr = " - Năm học ".$semes_years->semester_year;
                                                        echo '<option value="'.$semes_years->id.'">'.$semester_arr.$year_arr.'</option>';
                                                        ?>
                                                    @endif
                                                @endforeach
                                            @endif


                                            <option value="">- - Chọn khác - -</option>

                                            @php($get_semester_years = DB::table('semester_years')->latest()->get())
                                            @foreach($get_semester_years as $year)
                                                <option value="{{ $year->id }}">
                                                    <?php
                                                    $year_split = str_split($year->semesteryear);
                                                    echo $semester_arr = "HK ".$year_split[0];
                                                    echo $year_arr = " - Năm học ".$year->semester_year;
                                                    ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <button type="submit" class="btn btn-primary"><b><i class="fa fa-list-ul"></i> Liệt kê</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                @if (isset($semester_year_class_subs))
                                    @forelse($semester_year_class_subs as $semester_year)
                                        XEM ĐIỂM
                                        <b>
                                            <?php
                                            $year = str_split($semester_year->semesteryear);
                                            echo $semester_arr = "HỌC KỲ ".$year[0];
                                            echo $year_arr = " - NĂM HỌC ".$semester_year->semester_year;
                                            ?>
                                        </b>
                                    @empty
                                        <b>XEM ĐIỂM </b>
                                    @endforelse
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Nhóm lớp</th>
                                        <th scope="col" style="width:10%;">Mã HP</th>
                                        <th scope="col" style="width:37%;">Tên học phần</th>
                                        <th scope="col" style="width:10%;">Tín chỉ</th>
                                        <th scope="col" style="width:10%;">Điểm số</th>
                                        <th scope="col" style="width:18%;">Điểm chữ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if (isset($semester_year_class_subs))
                                    <?php $total_credit_semester = 0; $i=1; ?>
                                    @php($scores = DB::table('detail_scores')->where('student_id','=',$infor_students->id)->get())
                                    @foreach($scores as $score_sub)
                                        @foreach($semester_year_class_subs as $value_sub)
                                            @php($class_sub = DB::table('class_subjects')->where([['id','=',$score_sub->class_subject_id], ['semester_year_id','=',$value_sub->id]])->get())
                                            @foreach($class_sub as $value_sub)
                                                @php($subjects = DB::table('subjects')->where('id', $value_sub->subject_id)->get())
                                                @foreach($subjects as $value_subject)
                                                    <tr>
                                                        <td data-label="STT"><b><?php echo $i++; ?></b></td>
                                                        <td data-label="Nhóm lớp">
                                                            {{ $value_sub->class_subject_code }}
                                                        </td>
                                                        <td data-label="Mã học phần">
                                                            {{ $value_subject->subject_code }}
                                                        </td>
                                                        <td data-label="Tên học phần">
                                                            {{ $value_subject->subject_name }}
                                                        </td>
                                                        <td data-label="Tín chỉ">
                                                            {{ $value_subject->subject_number_credit }}
                                                            <?php $total_credit_semester = $total_credit_semester + $value_subject->subject_number_credit; ?>
                                                        </td>
                                                        <td data-label="Điểm số">
                                                            @if ($score_sub->score_ladder_four != null)
                                                                <b>{{ round($score_sub->score_ladder_four, 2) }}</b>
                                                            @endif
                                                        </td>
                                                        <td data-label="Điểm chữ">
                                                            @if ($score_sub->score_char != null)
                                                                <b>{{ $score_sub->score_char }}</b>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="4">
                                            <b>ĐIỂM TRUNG BÌNH HỌC KỲ:</b>
                                        </td>
                                        <td colspan="3">
                                            <?php $score_avg = 0; ?>
                                            @if (isset($semester_year_class_subs))
                                                @foreach($semester_year_class_subs as $key => $value_subs)
                                                    @foreach($scores as $score_sub)
                                                        @php($class_sub = DB::table('class_subjects')->where([['id','=',$score_sub->class_subject_id], ['semester_year_id','=',$value_subs->id]])->get())
                                                        @foreach($class_sub as $classsubject)
                                                            @php($subject_scores = DB::table('subjects')->where('id', $classsubject->subject_id)->get())
                                                            @foreach($subject_scores as $data_subject)
                                                                <?php
                                                                $credit = $data_subject->subject_number_credit;
                                                                $score = $score_sub->score_number;
                                                                $credit_score = ($credit * $score)/$total_credit_semester;
                                                                $score_avg = $score_avg + $credit_score;
                                                                $score_avg_percent = ($score_avg * 40)/100;
                                                                ?>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endif

                                            @if(!empty($score_avg_percent))
                                                <b style="font-size:14px;"><?php echo round($score_avg_percent,2); ?></b>
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-2 text-right">
                            {{--<a class="btn btn-warning btn-sm"
                               href="{{ url('test-demo/'.$infor_students->id) }}" role="button">
                                <i class="fa fa-book"></i> DEMO TEST
                            </a>--}}

                            <a class="btn btn-warning btn-sm"
                               href="{{ url('run-script-python/'.$infor_students->id) }}" role="button">
                                <i class="fa fa-book"></i> GỢI Ý HỌC PHẦN
                            </a>
                        </div>
                    </div>


                    <!-- Xem các môn gợi ý điểm -->
                    @yield('view-suggestion-subject')
                    <!-- /Xem các môn gợi ý điểm -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@endsection
