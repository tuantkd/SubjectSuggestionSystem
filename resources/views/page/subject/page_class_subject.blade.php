@extends('layout.layout')
@section('title', 'Lớp học phần')

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
                        <li class="breadcrumb-item active">Lớp học phần</li>
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
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>LỚP HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-subject') }}" role="button">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
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
                                        <th scope="col" style="width: 20%;">Giảng viên</th>
                                        <th scope="col" style="width: 15%;">HK - NH</th>
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
                                                $semester_year = str_split($semester_year->semester_year);
                                                echo $semester = "HK ".$semester_year[0];
                                                echo $year = " - Năm ".$semester_year[1].$semester_year[2].$semester_year[3].$semester_year[4];
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
                <!--  End col 6-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @if (Session::has('add_class_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm lớp học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('delete_class_subject'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa lớp học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('update_class_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật lớp học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

@endsection
