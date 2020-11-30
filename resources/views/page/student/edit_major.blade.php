@extends('layout.layout')
@section('title', 'Chỉnh sửa Chuyên ngành học')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-major') }}">Chuyên ngành học</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa Chuyên ngành học</li>
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
                <!--  col 12-->
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA CHUYÊN NGÀNH</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-major/'.$edit_major->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Bộ môn</label>
                                        <select name="inputPartSubjectId" class="form-control" required>
                                            @php($part_subject = DB::table('part_subjects')->where('id',$edit_major->part_subject_id)->first())
                                            <option value="{{ $part_subject->id }}">{{ $part_subject->part_subject_name }}</option>

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
                                        <input type="text" name="inputMajorName" class="form-control" value="{{ $edit_major->major_name }}"
                                        placeholder="Nhập tên chuyên ngành" required>
                                        <small class="text-danger">{{ $errors->first('inputMajorName') }}</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control" name="inputMajorNote" rows="5"
                                        placeholder="Nhập ghi chú ngành" required>{{ $edit_major->major_note }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
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


@endsection
