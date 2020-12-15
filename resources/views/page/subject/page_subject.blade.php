@extends('layout.layout')
@section('title', 'Học phần')

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
                        <li class="breadcrumb-item active">Học phần</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal Add Subject -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-subject') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM HỌC PHẦN</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mã học phần</label>
                            <input type="text" name="inputSubjectCode" class="form-control" placeholder="Nhập mã học phần" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tên học phần</label>
                            <input type="text" name="inputSubjectName" class="form-control" placeholder="Nhập tên học phần" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="">Tín chỉ</label>
                                <input type="number" name="inputSubjectCredit" class="form-control" placeholder="Số tín chỉ" required>
                            </div>
                            <div class="col-4">
                                <label for="">Số tiết LT</label>
                                <input type="number" name="inputSubjectNumberTheory" class="form-control" placeholder="Số tiết LT" required>
                            </div>
                            <div class="col-4">
                                <label for="">Số tiết TH</label>
                                <input type="number" name="inputSubjectNumberPractice" class="form-control" placeholder="Số tiết TH" required>
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
    <!-- /Modal Add Subject -->


    <!-- Modal Add Excel -->
    <div class="modal fade" id="modelAddExcel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('import-excel-to-subject') }}" method="POST" name="AddExcel"
            onsubmit="return validateExcel()" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>NHẬP FILE EXCEL</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Chọn file Excel</label><br>
                            <input type="file" name="inputFileExcel">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal Add Excel -->



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 6-->
                <section class="col-lg-12">

                    <!-- Message Errors-->
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $errors->first('inputFileExcel') }}</strong>
                            <strong>{{ $errors->first('inputSubjectCode') }}</strong>
                        </div>
                    @endif
                    <!-- /Message Errors-->

                    <!-- SEARCH FORM -->
                    <form action="{{ url('page-subject') }}" method="GET">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Nhập tìm kiếm học phần" name="inputSearch">
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
                                <b>HỌC PHẦN</b>
                            </h3>
                            <div class="card-tools">
                                <button class="btn btn-danger btn-xs delete_all" data-url="{{ url('delete-subject') }}">
                                    <i class="fa fa-trash"></i> Xóa đã chọn
                                </button>

                                <a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelAddExcel">
                                    <i class="fa fa-file-excel"></i> Nhập Excel
                                </a>

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
                                        <th scope="col" style="width:2%;"><input type="checkbox" id="master"></th>
                                        <th scope="col" style="width: 5%;">STT</th>
                                        <th scope="col" style="width: 20%;">Mã HP</th>
                                        <th scope="col" style="width: 33%;">Tên học phần</th>
                                        <th scope="col" style="width: 15%;">Tín chỉ</th>
                                        <th scope="col" style="width: 10%;">Số LT</th>
                                        <th scope="col" style="width: 10%;">Số TH</th>
                                        <th scope="col" style="width: 5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_subjects as $key => $show_subject)
                                    <tr id="tr_{{ $show_subject->id }}">
                                        <td data-label="Chọn">
                                            <input type="checkbox" class="sub_chk" data-id="{{ $show_subject->id }}">
                                        </td>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã học phần">
                                            <b>{{ $show_subject->subject_code }}</b>
                                        </td>
                                        <td data-label="Tên học phần">
                                            <b>{{ $show_subject->subject_name }}</b>
                                        </td>
                                        <td data-label="Tín chỉ">
                                            <span>{{ $show_subject->subject_number_credit }}</span>
                                        </td>
                                        <td data-label="Số LT">
                                            @if ($show_subject->subject_number_theory != null)
                                                <span>{{ $show_subject->subject_number_theory }}</span>
                                            @else
                                                <b class="text-danger">...</b>
                                            @endif
                                        </td><td data-label="Số TH">
                                            @if ($show_subject->subject_number_practice != null)
                                                <span>{{ $show_subject->subject_number_practice }}</span>
                                            @else
                                                <b class="text-danger">...</b>
                                            @endif
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-xs"
                                            href="{{ url('edit-subject/'.$show_subject->id) }}" role="button" title="Chỉnh sửa học phần">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                            href="{{ url('add-prerequisite-parallel/'.$show_subject->id) }}" role="button"
                                            title="Thêm tiên quyết hoặc song hành">
                                                <i class="fa fa-plus"></i>
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
                                {{ $show_subjects->links() }}
                            </ul>
                            <!-- /pagination -->

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
                , icon: 'error'
                , title: 'Lỗi! Mã Học phần đã tồn tại. Vui lòng kiểm tra lại'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

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

    @if (Session::has('delete_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('add_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif


    @if (Session::has('update_subject_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật học phần'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif


    <script>
        function validateExcel() {
            var x = document.forms["AddExcel"]["inputFileExcel"].value;
            if (x == "") {
                alert("Bạn chưa chọn file Excel!");
                return false;
            }
        }
    </script>



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
                                        , title: 'Đã Xóa học phần'
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

@endsection
