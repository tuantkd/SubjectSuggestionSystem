@extends('layout.layout')
@section('title', 'Chương trình học tập')

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
                        <li class="breadcrumb-item active">Chương trình học tập</li>
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

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-program-study') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM CHƯƠNG TRÌNH HỌC</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Loại học phần</label>
                            <select name="inputCategorySubjectId" class="form-control" required>
                                @php($categorys = DB::table('category_subjects')->get())
                                <option value="">- - Chọn - -</option>
                                @foreach($categorys as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_subject_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Học phần</label>
                            <select class="form-control selectpicker" name="inputSubjectId" data-size="10" required
                            data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                @php($subjects = DB::table('subjects')->get())
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chương trình đào tạo</label>
                            <select class="form-control selectpicker" name="inputProgramTrainId" data-size="5" required
                            data-live-search="true" data-title="- - Chọn - -" data-width="100%">
                                @php($program_trains = DB::table('program_trains')->get())
                                @foreach($program_trains as $program_train)
                                    <option value="{{ $program_train->id }}">
                                        {{ $program_train->program_train_name }}
                                    </option>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 6-->
                <section class="col-lg-12">

                    <!-- SEARCH FORM -->
                    <form action="{{ url('page-program-study') }}" method="GET">
                        <div class="input-group mb-2">
                            <select class="form-control selectpicker" name="inputSearch" data-size="5"
                            data-live-search="true" data-title="- - Chọn hoặc nhập tìm kiếm môn học - -" data-width="90%">
                                @php($subject_searchs = DB::table('subjects')->get())
                                @foreach($subject_searchs as $subject_search)
                                    <option value="{{ $subject_search->id }}">
                                        {{ $subject_search->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- SEARCH FORM -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b style="text-transform: uppercase;">CHƯƠNG TRÌNH HỌC TẬP</b>
                            </h3>
                            <div class="card-tools">
                                <button class="btn btn-danger btn-xs delete_all" data-url="{{ url('delete-program-study') }}">
                                    <i class="fa fa-trash"></i> Xóa đã chọn
                                </button>

                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-subject') }}" data-toggle="modal" data-target="#modelId">
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
                                        <th scope="col" style="width:5%;"><input type="checkbox" id="master"></th>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Loại học phần</th>
                                        <th scope="col" style="width:45%;">Học phần</th>
                                        <th scope="col" style="width:30%;">Chương trình đào tạo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_program_studys as $key => $show_program_study)
                                    <tr id="tr_{{ $show_program_study->id }}">
                                        <td data-label="Chọn">
                                            <input type="checkbox" class="sub_chk" data-id="{{ $show_program_study->id }}">
                                        </td>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Loại học phần">
                                            @php($categorys = DB::table('category_subjects')->where('id',$show_program_study->category_subject_id)->first())
                                            <b>{{ $categorys->category_subject_name }}</b>
                                        </td>
                                        <td data-label="Họ tên">
                                            @php($subjects = DB::table('subjects')->where('id',$show_program_study->subject_id)->first())
                                            <b>{{ $subjects->subject_code }} - {{ $subjects->subject_name }}</b>
                                        </td>
                                        <td data-label="Giới tính">
                                            @php($program_trains = DB::table('program_trains')->where('id',$show_program_study->program_train_id)->first())
                                            <b>{{ $program_trains->program_train_name }}</b>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
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

    <script>
        $(document).ready(function () {
            $("#master").on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });

            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0){
                    alert("Vui lòng chọn hàng!.");
                }else{
                    var check = confirm("Bạn có chắc chắn muốn xóa hàng này không ?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    Swal.fire({
                                        position: 'center'
                                        , icon: 'success'
                                        , title: 'Đã Xóa Chương trình học'
                                        , showConfirmButton: false
                                        , timer: 2000
                                    });
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Rất tiếc, đã xảy ra lỗi!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });

                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });

            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });
        });
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
