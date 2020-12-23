@extends('layout.layout')
@section('title', 'Chương trình đào tạo')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-admin') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Chương trình đào tạo</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal Add Program Train -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-program-train') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM CHƯƠNG TRÌNH ĐÀO TẠO</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên chương trình đào tạo</label>
                            <input type="text" name="inputProgramName" class="form-control" placeholder="Nhập tên chương trình đào tạo" required>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" name="inputProgramDateBegin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Khóa học</label>
                            <select name="inputProgramCourseId" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($courses = DB::table('courses')->get())
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chuyên ngành</label>
                            <select name="inputMajorId" class="form-control" required>
                                <option value="">- - Chọn - -</option>
                                @php($majors = DB::table('majors')->get())
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->major_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal Add Program Train -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">

                    <!-- Message Errors -->
                    @if($errors->count() > 0)
                        <div class="alert alert-warning " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $errors->first('inputProgramCourseId') }}</strong>
                        </div>
                    @endif
                    <!-- /Message Errors -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHƯƠNG TRÌNH ĐÀO TẠO</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
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
                                        <th scope="col" style="width:30%;">Tên chương trình</th>
                                        <th scope="col" style="width:15%;">Ngày bắt đầu</th>
                                        <th scope="col" style="width:10%;">Khóa học</th>
                                        <th scope="col" style="width:35%;">Chuyên ngành</th>
                                        <th scope="col" style="width:5%;" colspan="3">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_program_trains as $key => $show_program_train)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Tên chương trình">
                                                <b>{{ $show_program_train->program_train_name }}</b>
                                            </td>
                                            <td data-label="Ngày bắt đầu">
                                                <b>{{ date('d-m-Y', strtotime($show_program_train->program_train_date_begin)) }}</b>
                                            </td>
                                            <td data-label="Khóa học">
                                                @php($get_courses = DB::table('courses')->where('id',$show_program_train->course_id)->get())
                                                @foreach($get_courses as $get_course)
                                                    {{ $get_course->course_name }}
                                                @endforeach
                                            </td>
                                            <td data-label="Chuyên ngành">
                                                @php($get_majors = DB::table('majors')->where('id',$show_program_train->major_id)->get())
                                                @foreach($get_majors as $get_major)
                                                    {{ $get_major->major_name }}
                                                @endforeach
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')"
                                                href="{{ url('delete-program-train/'.$show_program_train->id) }}" role="button">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                href="{{ url('page-program-study/'.$show_program_train->id) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-xs"
                                                href="{{ url('page-edit-study/'.$show_program_train->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
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
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    @if (Session::has('add_program_train_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm CTĐT'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_program_train_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật CTĐT'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_program_train_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa CTĐT'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif


    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        $(".alert").alert();
    </script>

@endsection
