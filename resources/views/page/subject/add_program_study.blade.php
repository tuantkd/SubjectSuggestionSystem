@extends('layout.layout')
@section('title', 'Thêm chương trình học')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-admin') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-program-train') }}">Chương trình đào tạo</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-program-study/'.$program_train->id) }}">Chương trình học</a></li>
                        <li class="breadcrumb-item active">Thêm chương trình học</li>
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
                <!--  col 6-->
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b style="text-transform: uppercase;">THÊM CHƯƠNG TRÌNH HỌC</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('post-add-program-study/'.$program_train->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf

                                @if($errors->count() > 0)
                                    <div class="alert alert-danger p-2">
                                        <span><b>{{ $errors->first('inputSubjectId') }}</b></span>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="">Học phần</label>
                                    <select class="form-control selectpicker" name="inputSubjectId" data-size="10" required data-live-search="true" data-title="- - Chọn - -" data-width="100%">

                                        {{--@php($subjects = DB::table('subjects')->get())
                                        @foreach($subjects as $subject)
                                            @php($pre_paras = DB::table('prerequisite_parallels')
                                                ->join('subject_prerequisite_parallels', 'prerequisite_parallels.id', '=', 'subject_prerequisite_parallels.prerequisite_parallel_id')
                                                ->where('subject_prerequisite_parallels.subject_id', '=', $subject->id)
                                                ->select('prerequisite_parallels.*')
                                                ->get())
                                            @foreach($pre_paras as $pre_para)
                                                <option value="{{ $subject->id }}" style="color: orange;">
                                                    {{ $subject->subject_code }} -
                                                    {{ $subject->subject_name }} ->
                                                    (HP {{ $pre_para->prerequisite_parallel_note }} Mã {{ $pre_para->subject_code }})
                                                </option>
                                            @endforeach
                                        @endforeach--}}

                                        @php($subject = DB::table('subjects')->get())
                                        @foreach($subject as $data)
                                            <option value="{{ $data->id }}" onchange="myFunction()">
                                                {{ $data->subject_code }} -
                                                {{ $data->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <input type="text" name="inputNote" class="form-control" placeholder="Nhập ghi chú ... Nếu có">
                                </div>

                                <div class="form-group">
                                    <label for="">Loại học phần</label><br>
                                    @php($categorys = DB::table('category_subjects')->get())
                                    @foreach($categorys as $category)
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="inputCategorySubjectId" value="{{ $category->id }}"> {{ $category->category_subject_name }}
                                            </label>
                                        </div>
                                    @endforeach
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
                <!--  End col 6-->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        function myFunction() {
            document.getElementById("category_subject").style.display = 'none';
        }
    </script>


    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

    @if (Session::has('add_program_study_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm chương trình học'
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
