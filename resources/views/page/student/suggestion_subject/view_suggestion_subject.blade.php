@extends('page.student.view_infor_student')
@section('view-suggestion-subject')

    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 70%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid gainsboro;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>

    <div id="loader"></div>

    <div class="card animate-bottom" style="display:none;" id="myDiv">
        <div class="card-header p-2 text-center">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i> <b>GỢI Ý CÁC HỌC PHẦN</b>
            </h3>
        </div><!-- /.card-header -->
        <div class="card-body p-1">

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" style="width:10%;">STT</th>
                        <th scope="col" style="width:20%;">Mã SV</th>
                        <th scope="col" style="width:20%;">Mã HP</th>
                        <th scope="col" style="width:30%;">Tên HP</th>
                        <th scope="col" style="width:20%;">Học kỳ - Năm học</th>
                    </tr>
                    </thead>
                    <tbody>


                    @php($detail_scores = DB::table('detail_scores')->where('student_id', '=', $infor_students->id)->get())
                    @foreach($detail_scores as $detail_score)
                        @if ($loop->first)
                            @php($class_subjects = DB::table('class_subjects')->where('id', '<>', $detail_score->class_subject_id)->get())
                            @foreach($class_subjects as $key => $class_subject)
                                @php($subjects = DB::table('subjects')->where('id','=',$class_subject->subject_id)->get())
                                @foreach ($subjects as $subject)

                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã SV">
                                                @php($get_student = DB::table('students')->where('id', $infor_students->id)->first())
                                                <b>{{ $get_student->student_code }}</b>
                                            </td>
                                            <td data-label="Mã HP">
                                                <b>{{ $subject->subject_code }}</b>
                                            </td>
                                            <td data-label="Tên HP">
                                                <b>{{ $subject->subject_name }}</b>
                                            </td>
                                            <td data-label="Học kỳ - Năm học">
                                                @php($semester_year = DB::table('semester_years')->where('id', $class_subject->semester_year_id)->first())
                                                <?php
                                                $semesteryear = str_split($semester_year->semesteryear);
                                                echo $semester = "HK ".$semesteryear[0];
                                                echo $year = " - NH ".$semester_year->semester_year;
                                                ?>
                                            </td>
                                        </tr>

                                @endforeach
                            @endforeach
                        @endif
                    @endforeach



                    {{--@php($detail_scores = DB::table('detail_scores')->where('student_id','=', $infor_students->id)->get())
                    @foreach($detail_scores as $detail_score)
                        @php($class_subs = DB::table('class_subjects')->where('id', $detail_score->class_subject_id)->get())
                        @foreach ($class_subs as $class_sub)
                            @php($subject_learned = DB::table('subjects')->where('id',$class_sub->subject_id)->get())
                            @foreach($subject_learned->unique('subject_code') as $key => $value)

                            @endforeach
                        @endforeach
                    @endforeach--}}



                    </tbody>
                </table>
            </div>

            {{--{{ $result }}--}}

        </div>
    </div>




    <script>
        var myVar;
        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }
        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
    </script>

@endsection
