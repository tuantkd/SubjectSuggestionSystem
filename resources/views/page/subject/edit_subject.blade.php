@extends('layout.layout')
@section('title', 'Chỉnh sửa Học phần')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-subject') }}">Học phần</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa Học phần</li>
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
                <section class="col-lg-6 offset-lg-3">

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <form action="{{ url('update-subject/'.$edit_subject->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Mã học phần</label>
                                    <input type="text" name="inputSubjectCode" class="form-control" disabled value="{{ $edit_subject->subject_code }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên học phần</label>
                                    <input type="text" name="inputSubjectName" class="form-control" placeholder="Nhập tên học phần" value="{{ $edit_subject->subject_name }}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="">Tín chỉ</label>
                                        <input type="number" name="inputSubjectCredit" class="form-control" placeholder="Nhập số tín chỉ" value="{{ $edit_subject->subject_number_credit }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Số tiết LT</label>
                                        <input type="number" name="inputSubjectNumberTheory" class="form-control" placeholder="Số tiết LT" value="{{ $edit_subject->subject_number_theory }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Số tiết TH</label>
                                        <input type="number" name="inputSubjectNumberPractice" class="form-control" placeholder="Số tiết TH" value="{{ $edit_subject->subject_number_practice }}">
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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

    @if (Session::has('message_error_excel'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã nhập File Excel thành công'
                , showConfirmButton: false
                , timer: 3000
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
