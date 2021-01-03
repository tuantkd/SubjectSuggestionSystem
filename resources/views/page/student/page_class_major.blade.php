@extends('layout.layout')
@section('title', 'Lớp chuyên ngành')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Lớp chuyên ngành</li>
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
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>LỚP CHUYÊN NGÀNH</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-major') }}" role="button">
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
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Mã lớp</th>
                                        <th scope="col" style="width:30%;">Tên lớp</th>
                                        <th scope="col" style="width:10%;">Khóa học</th>
                                        <th scope="col" style="width:20%;">Chuyên ngành</th>
                                        <th scope="col" style="width:10%;">Sỉ số</th>
                                        <th scope="col" style="width:10%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_class_majors as $key => $show_class_major)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã lớp">
                                            <a href="{{ url('view-class-major/'.$show_class_major->id) }}">
                                                <h6><b>{{ $show_class_major->class_major_code }}</b></h6>
                                            </a>
                                        </td>
                                        <td data-label="Tên lớp">
                                            <h6>{{ $show_class_major->class_major_name }}</h6>
                                        </td>
                                        <td data-label="Khóa học">
                                            @php($get_courses = DB::table('courses')->where('id', $show_class_major->course_id)->get())
                                            @foreach($get_courses as $get_course)
                                                <h6>{{ $get_course->course_name }}</h6>
                                            @endforeach
                                        </td>
                                        <td data-label="Chuyên ngành">
                                            @php($get_majors = DB::table('majors')->where('id', $show_class_major->major_id)->get())
                                            @foreach($get_majors as $get_major)
                                                <h6>{{ $get_major->major_name }}</h6>
                                            @endforeach
                                        </td>
                                        <td data-label="Sỉ số">
                                            @if ($show_class_major->class_major_total_number != null)
                                                <h6>{{ $show_class_major->class_major_total_number }}</h6>
                                            @else
                                                <b>...</b>
                                            @endif
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('delete-class-major/'.$show_class_major->id) }}" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                            href="{{ url('edit-class-major/'.$show_class_major->id) }}" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-sm"
                                            href="{{ url('view-class-major/'.$show_class_major->id) }}" role="button">
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

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_class_majors->links() }}
                            </ul>
                            <!-- /pagination -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @if (Session::has('add_class_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm lớp chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_class_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa lớp chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_class_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật lớp chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
