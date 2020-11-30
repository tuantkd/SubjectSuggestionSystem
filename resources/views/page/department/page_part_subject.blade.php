@extends('layout.layout')
@section('title', 'Bộ môn')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-teacher') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Bộ môn</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-part-subject') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM BỘ MÔN</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Khoa</label>
                            <select name="inputDepartmentId" class="form-control">
                                <option value="">- - Chọn - -</option>

                                @php($get_departments = DB::table('departments')->latest()->get())
                                @foreach($get_departments as $get_department)
                                    <option value="{{ $get_department->id }}">
                                        {{ $get_department->department_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên bộ môn</label>
                            <input type="text" name="inputPartSubjectName" class="form-control" placeholder="Nhập tên bộ môn">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="form-control" name="inputPartSubjectDescription" rows="10" placeholder="Nhập mô tả bộ môn"></textarea>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 12-->
                <section class="col-lg-12">

                    <!-- message -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <strong>
                                {{ $errors->first('inputPartSubjectName') }}
                            </strong>
                        </div>
                    @endif
                    <!-- /message -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>BỘ MÔN</b>
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
                                        <th scope="col" style="width:20%;">Khoa</th>
                                        <th scope="col" style="width:15%;">Tên bộ môn</th>
                                        <th scope="col" style="width:55%;">Mô tả</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_part_subjects as $key => $show_part_subject)
                                        <tr>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Khoa">
                                                @php($get_departments = DB::table('departments')->where('id',$show_part_subject->department_id)->get())
                                                @foreach($get_departments as $get_department)
                                                <b>{{ $get_department->department_name }}</b>
                                                @endforeach
                                            </td>
                                            <td data-label="Tên bộ môn">
                                                <b>{{ $show_part_subject->part_subject_name }}</b>
                                            </td>
                                            <td data-label="Mô tả">
                                                <p class="text-justify">
                                                    {!! $show_part_subject->part_subject_description !!}
                                                </p>
                                            </td>
                                            <td data-label="Chọn">
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?');"
                                                href="{{ url('delete-part-subject/'.$show_part_subject->id) }}" role="button">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-xs"
                                                href="{{ url('edit-part-subject/'.$show_part_subject->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm" style="margin:20px 0">
                                {{ $show_part_subjects->links() }}
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
    </script>

    {{--Thông báo box--}}
    @if (Session::has('add_part_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm Bộ môn'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_part_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa Bộ môn'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_part_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã cập nhật Bộ môn'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
