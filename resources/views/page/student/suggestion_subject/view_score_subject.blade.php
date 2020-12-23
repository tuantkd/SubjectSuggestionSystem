@extends('page.student.view_infor_student')
@section('view-score-subject')

    <div class="card">
        <div class="card-header p-2 text-center">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                @foreach($class_subs as $value_class_sub)
                    @php($scores = DB::table('detail_scores')->where([['class_subject_id','=',$value_class_sub->id], ['student_id', $infor_students->id]])->get())
                    @forelse($scores as $score)
                        @if ($loop->first)
                            @php($class_subs = DB::table('class_subjects')->where('id', $score->class_subject_id)->first())
                            @php($semester_years = DB::table('semester_years')->where('id', $class_subs->semester_year_id)->first())
                            <b>
                                XEM ĐIỂM
                                <?php
                                $year = str_split($semester_years->semesteryear);
                                echo $semester_arr = "HỌC KỲ ".$year[0];
                                echo $year_arr = " - NĂM HỌC ".$semester_years->semester_year;
                                ?>
                            </b>
                        @endif
                    @empty
                        <b>XEM ĐIỂM </b>
                    @endforelse
                @endforeach
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
                    <?php $total_credit_semester = 0; ?>
                    @foreach($class_subs as $value_sub)
                        @php($subjects = DB::table('subjects')->where('id', $value_sub->subject_id)->get())
                        @foreach($subjects as $value_subject)
                            <tr>
                                <td data-label="STT"><b>{{ ++$key }}</b></td>
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
                                    @if ($score_student->score_ladder_four != null)
                                        <b>{{ round($score_student->score_ladder_four, 2) }}</b>
                                    @endif
                                </td>
                                <td data-label="Điểm chữ">
                                    @if ($score_student->score_char != null)
                                        <b>{{ $score_student->score_char }}</b>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                    <tr>
                        <td colspan="4">
                            <b>ĐIỂM TRUNG BÌNH HỌC KỲ:</b>
                        </td>
                        <td colspan="3">
                            <?php $score_avg = 0; ?>
                            @foreach($class_subs as $classsubject)
                                @php($subject_scores = DB::table('subjects')->where('id', $classsubject->subject_id)->get())
                                @foreach($subject_scores as $data_subject)
                                    <?php
                                    $credit = $data_subject->subject_number_credit;
                                    $score = $score_value->score_number;
                                    $credit_score = ($credit * $score)/$total_credit_semester;
                                    $score_avg = $score_avg + $credit_score;
                                    $score_avg_percent = ($score_avg * 40)/100;
                                    ?>
                                @endforeach
                            @endforeach

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
            {{--@if(!empty($score_avg_percent))
            @else--}}
            <a class="btn btn-warning btn-sm"
               href="{{ url('run-script-python/'.$infor_students->id) }}" role="button">
                <i class="fa fa-book"></i> GỢI Ý HỌC PHẦN
            </a>
            {{--@endif--}}
        </div>
    </div>

@endsection
