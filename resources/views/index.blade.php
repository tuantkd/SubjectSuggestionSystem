@extends('layout.layout')
@section('title', 'Trang chủ')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <style>
        @-webkit-keyframes bake-pie {
            from {
                transform: rotate(0deg) translate3d(0, 0, 0);
            }
        }

        @keyframes bake-pie {
            from {
                transform: rotate(0deg) translate3d(0, 0, 0);
            }
        }
        .pie-chart {
            font-family: "Open Sans", Arial;
        }
        .pie-chart--wrapper {
            width: 500px;
            margin: 30px auto;
            text-align: center;
        }
        .pie-chart__pie, .pie-chart__legend {
            display: inline-block;
            vertical-align: top;
        }
        .pie-chart__pie {
            position: relative;
            height: 200px;
            width: 200px;
            margin: 10px auto 35px;
        }
        .pie-chart__pie::before {
            content: "";
            display: block;
            position: absolute;
            z-index: 1;
            width: 100px;
            height: 100px;
            background: #EEE;
            border-radius: 50%;
            top: 50px;
            left: 50px;
        }
        .pie-chart__pie::after {
            content: "";
            display: block;
            width: 150px;
            height: 2px;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            box-shadow: 0 0 3px 4px rgba(0, 0, 0, 0.1);
            margin: 220px auto;
        }

        .slice {
            position: absolute;
            width: 200px;
            height: 200px;
            clip: rect(0px, 200px, 200px, 100px);
            -webkit-animation: bake-pie 1s;
            animation: bake-pie 1s;
        }
        .slice span {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background-color: black;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            clip: rect(0px, 200px, 200px, 100px);
        }

        .pie-chart__legend {
            display: block;
            list-style-type: none;
            padding: 0;
            margin: 0 auto;
            background: #FFF;
            padding: 0.75em 0.75em 0.05em;
            font-size: 13px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            text-align: left;
            width: 65%;
        }
        .pie-chart__legend li {
            height: 1.25em;
            margin-bottom: 0.7em;
            padding-left: 0.5em;
            border-left: 1.25em solid black;
        }
        .pie-chart__legend em {
            font-style: normal;
        }
        .pie-chart__legend span {
            float: right;
        }

        .pie-charts {
            display: flex;
            flex-direction: row;
        }
        @media (max-width: 500px) {
            .pie-charts {
                flex-direction: column;
            }
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">



            <!-- row -->
            <div class="row">
                <!-- score -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                <b>THỐNG KÊ ĐIỂM SINH VIÊN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="wrapper">
                                <div class="pie-charts">
                                    <div class="pieID--operations pie-chart--wrapper">
                                        <div class="pie-chart">
                                            <div class="pie-chart__pie"></div>
                                            <ul class="pie-chart__legend">
                                                <li>
                                                    <em>Điểm A</em>
                                                    @php($count_score_a = DB::table('detail_scores')->where('score_char', 'A')->count())
                                                    <span>{{ $count_score_a }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm B+</em>
                                                    @php($count_score_b_plus = DB::table('detail_scores')->where('score_char', 'B+')->count())
                                                    <span>{{ $count_score_b_plus }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm B</em>
                                                    @php($count_score_b = DB::table('detail_scores')->where('score_char', 'B')->count())
                                                    <span>{{ $count_score_b }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm C+</em>
                                                    @php($count_score_c_plus = DB::table('detail_scores')->where('score_char', 'C+')->count())
                                                    <span>{{ $count_score_c_plus }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm C</em>
                                                    @php($count_score_c = DB::table('detail_scores')->where('score_char', 'C')->count())
                                                    <span>{{ $count_score_c }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm D+</em>
                                                    @php($count_score_d_plus = DB::table('detail_scores')->where('score_char', 'D+')->count())
                                                    <span>{{ $count_score_d_plus }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm D</em>
                                                    @php($count_score_d = DB::table('detail_scores')->where('score_char', 'D')->count())
                                                    <span>{{ $count_score_d }}</span>
                                                </li>
                                                <li>
                                                    <em>Điểm F</em>
                                                    @php($count_score_f = DB::table('detail_scores')->where('score_char', 'F')->count())
                                                    <span>{{ $count_score_f }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /score -->

                <!-- classification learning -->
                <div class="col-lg-6">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        @php($count_subject = DB::table('subjects')->count())
                                        {{ $count_subject }}
                                    </h3>
                                    <p>Học phần</p>
                                </div>
                                <div class="icon">
                                    <i class=" fa fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        @php($count_class_major = DB::table('class_majors')->count())
                                        {{ $count_class_major }}
                                    </h3>
                                    <p>Lớp chuyên ngành</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        @php($count_student = DB::table('students')->count())
                                        {{ $count_student }}
                                    </h3>
                                    <p>Sinh viên</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        @php($count_class_subject = DB::table('class_subjects')->count())
                                        {{ $count_class_subject }}
                                    </h3>
                                    <p>Lớp học phần</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-th-list"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /classification learning -->
            </div>
            <!-- /.row -->


            <!-- row -->
            <div class="row">
                <!-- col -->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>LỚP HỌC PHẦN MỚI</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">STT</th>
                                        <th scope="col" style="width: 10%;">Mã lớp</th>
                                        <th scope="col" style="width: 25%;">Tên lớp</th>
                                        <th scope="col" style="width: 15%;">Giảng viên</th>
                                        <th scope="col" style="width: 20%;">Học Kỳ - Năm Học</th>
                                        <th scope="col" style="width: 20%;">Ghi chú</th>
                                        <th scope="col" style="width: 5%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_class_subjects as $key => $show_class_subject)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã lớp">
                                                <b>{{ $show_class_subject->class_subject_code }}</b>
                                            </td>
                                            <td data-label="Tên lớp">
                                                <b style="text-transform: uppercase;">{{ $show_class_subject->class_subject_name }}</b>
                                            </td>
                                            <td data-label="Giảng viên">
                                                @if ($show_class_subject->teacher_id != null)
                                                    @php($teachers = DB::table('teachers')->where('id', $show_class_subject->teacher_id)->get())
                                                    @foreach($teachers as $teacher)
                                                        <b>{{ $teacher->fullname }}</b>
                                                    @endforeach
                                                @else
                                                    <b>Giảng viên khác</b>
                                                @endif

                                            </td>
                                            <td data-label="Học kỳ - Năm học">
                                                @php($semester_year = DB::table('semester_years')->where('id', $show_class_subject->semester_year_id)->first())
                                                <?php
                                                $semesteryear = str_split($semester_year->semesteryear);
                                                echo $semester = "HK ".$semesteryear[0];
                                                echo $year = " - NH ".$semester_year->semester_year;
                                                ?>
                                            </td>
                                            <td data-label="Ghi chú" class="text-justify">
                                                @if ($show_class_subject->class_subject_note != null)
                                                    <p>{{ $show_class_subject->class_subject_note }}</p>
                                                @else
                                                    <b>Không có</b>
                                                @endif
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')"
                                                   href="{{ url('delete-class-subject/'.$show_class_subject->id) }}" role="button">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-xs"
                                                   href="{{ url('edit-class-subject/'.$show_class_subject->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td><td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                   href="{{ url('view-detail-class-subject/'.$show_class_subject->id) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        function sliceSize(dataNum, dataTotal) {
            return (dataNum / dataTotal) * 360;
        }

        function addSlice(id, sliceSize, pieElement, offset, sliceID, color) {
            $(pieElement).append(
                "<div class='slice " + sliceID + "'><span></span></div>"
            );
            var offset = offset - 1;
            var sizeRotation = -179 + sliceSize;

            $(id + " ." + sliceID).css({
                transform: "rotate(" + offset + "deg) translate3d(0,0,0)"
            });

            $(id + " ." + sliceID + " span").css({
                transform: "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
                "background-color": color
            });
        }

        function iterateSlices(
            id,
            sliceSize,
            pieElement,
            offset,
            dataCount,
            sliceCount,
            color
        ) {
            var maxSize = 179,
                sliceID = "s" + dataCount + "-" + sliceCount;

            if (sliceSize <= maxSize) {
                addSlice(id, sliceSize, pieElement, offset, sliceID, color);
            } else {
                addSlice(id, maxSize, pieElement, offset, sliceID, color);
                iterateSlices(
                    id,
                    sliceSize - maxSize,
                    pieElement,
                    offset + maxSize,
                    dataCount,
                    sliceCount + 1,
                    color
                );
            }
        }

        function createPie(id) {
            var listData = [],
                listTotal = 0,
                offset = 0,
                i = 0,
                pieElement = id + " .pie-chart__pie";
            dataElement = id + " .pie-chart__legend";

            color = [
                "cornflowerblue",
                "olivedrab",
                "orange",
                "tomato",
                "crimson",
                "purple",
                "turquoise",
                "forestgreen",
                "navy"
            ];

            color = shuffle(color);

            $(dataElement + " span").each(function () {
                listData.push(Number($(this).html()));
            });

            for (i = 0; i < listData.length; i++) {
                listTotal += listData[i];
            }

            for (i = 0; i < listData.length; i++) {
                var size = sliceSize(listData[i], listTotal);
                iterateSlices(id, size, pieElement, offset, i, 0, color[i]);
                $(dataElement + " li:nth-child(" + (i + 1) + ")").css(
                    "border-color",
                    color[i]
                );
                offset += size;
            }
        }

        function shuffle(a) {
            var j, x, i;
            for (i = a.length; i; i--) {
                j = Math.floor(Math.random() * i);
                x = a[i - 1];
                a[i - 1] = a[j];
                a[j] = x;
            }
            return a;
        }

        function createPieCharts() {
            createPie(".pieID--micro-skills");
            createPie(".pieID--categories");
            createPie(".pieID--operations");
        }

        createPieCharts();

    </script>


@endsection
