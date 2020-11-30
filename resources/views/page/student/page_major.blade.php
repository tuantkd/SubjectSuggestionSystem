@extends('layout.layout')
@section('title', 'Chuyên ngành')

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
                        <li class="breadcrumb-item active">Chuyên ngành</li>
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
            <form action="{{ url('post-add-major') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM NGÀNH HỌC</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Bộ môn</label>
                                <select name="inputPartSubjectId" class="form-control" required>
                                    <option value="">- - Chọn Bộ môn - -</option>
                                    @php($get_part_subjects = DB::table('part_subjects')->get())
                                    @foreach($get_part_subjects as $get_part_subject)
                                    <option value="{{ $get_part_subject->id }}">
                                        {{ $get_part_subject->part_subject_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Tên Ngành</label>
                                <input type="text" name="inputMajorName" class="form-control" placeholder="Nhập tên chuyên ngành" required>
                                <small class="text-danger">{{ $errors->first('inputMajorName') }}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" name="inputMajorNote" rows="3" placeholder="Nhập ghi chú ngành" required></textarea>
                            </div>
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
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHUYÊN NGÀNH HỌC</b>
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
                                        <th scope="col" style="width:30%;">Bộ môn</th>
                                        <th scope="col" style="width:30%;">Tên ngành</th>
                                        <th scope="col" style="width:30%;">Mô tả</th>
                                        <th scope="col" style="width:5%;"colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_majors as $key => $show_major)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Bộ môn">
                                            @php($part_subjects = DB::table('part_subjects')->where('id',$show_major->part_subject_id)->get())
                                            @foreach($part_subjects as $part_subject)
                                            <b>{{ $part_subject->part_subject_name }}</b>
                                            @endforeach
                                        </td>
                                        <td data-label="Tên Ngành">
                                            <b>{{ $show_major->major_name }}</b>
                                        </td>
                                        <td data-label="Ghi chú">
                                            <p class="text-justify">
                                                {{ $show_major->major_note }}
                                            </p>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('delete-major/'.$show_major->id) }}" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ url('edit-major/'.$show_major->id) }}" role="button">
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
                                {{ $show_majors->links() }}
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

    @if (Session::has('add_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_major_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật chuyên ngành'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
