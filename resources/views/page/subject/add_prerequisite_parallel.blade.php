@extends('layout.layout')
@section('title', 'Thêm HPTQ hoặc HPSH')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-admin') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-subject') }}">Học phần</a></li>
                        <li class="breadcrumb-item active">Thêm HP Tiên quyết hoặc HP Song hành</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('link_cdn')
    <link rel="stylesheet" href="{{ url('public/dist/css/select.css') }}">
    <script src="{{ url('public/dist/js/select.js') }}"></script>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-5">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="text-transform: uppercase;">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>THÊM HỌC PHẦN TQ & SH</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('post-add-prerequisite-parallel/'.$subject_id->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="">Chọn Học phần Tiên quyết hoặc Song hành</label>
                                    <select class="form-control selectpicker" name="inputSubjectCode" data-size="10" required
                                    data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                        @php($subjects = DB::table('subjects')->where('id','<>',$subject_id->id)->get())
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->subject_code }}">
                                                {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <select name="inputNote" class="form-control" required>
                                        <option value="Tiên quyết">Tiên quyết</option>
                                        <option value="Song hành">Song hành</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group text-right mb-0">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>


                <!-- TO DO List -->
                <section class="col-lg-7">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="text-transform: uppercase;">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>{{ $subject_id->subject_code }} - {{ $subject_id->subject_name }}</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã học phần</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($subject_prerequisite_parallels = DB::table('subject_prerequisite_parallels')->where('subject_id',$subject_id->id)->get())
                                    @forelse($subject_prerequisite_parallels as $key => $value)
                                        @php($prerequisite_parallels = DB::table('prerequisite_parallels')->where('id',$value->prerequisite_parallel_id)->get())
                                        @foreach($prerequisite_parallels as $data)
                                            <tr>
                                                <td data-label="STT"><b>{{ ++$key }}</b></td>
                                                <td data-label="Mã học phần">
                                                    <b>{{ $data->subject_code }}</b>
                                                </td>
                                                <td data-label="Ghi chú">
                                                    <b>{{ $data->prerequisite_parallel_note }}</b>
                                                </td>
                                                <td data-label="Chọn">
                                                    <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')"
                                                    href="{{ url('delete-subject-prerequisite-parallel/'.$value->id) }}" role="button">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="4">
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
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

    @if (Session::has('add_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm học phần'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa học phần'
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
    </script>

@endsection
