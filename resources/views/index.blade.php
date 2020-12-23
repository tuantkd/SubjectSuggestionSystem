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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
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
                <div class="col-lg-3 col-6">
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
                <div class="col-lg-3 col-6">
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
                <div class="col-lg-3 col-6">
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

            <!-- Main row -->
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
                                                @php($teachers = DB::table('teachers')->where('id', $show_class_subject->teacher_id)->get())
                                                @foreach($teachers as $teacher)
                                                    <b>{{ $teacher->fullname }}</b>
                                                @endforeach
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
                                                <p>{{ $show_class_subject->class_subject_note }}</p>
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
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
