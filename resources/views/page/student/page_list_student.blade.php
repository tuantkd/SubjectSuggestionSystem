@extends('layout.layout')
@section('title', 'Danh sách sinh viên')

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
                        <li class="breadcrumb-item active">Danh sách sinh viên</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection


@section('content')

    <!-- Modal Import Excel -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('import-excel-to-list-student') }}" onsubmit="return validateExcel()"
            method="POST" enctype="multipart/form-data" name="ImportExcel" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>NHẬP FILE EXCEL</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Lớp chuyên ngành</label><br>
                            <select class="form-control select2bs4" required name="inputClassMajorId">
                                <option value="">- - Chọn - -</option>
                                @php($class_majors = DB::table('class_majors')->get())
                                @foreach($class_majors as $class_major)
                                <option value="{{ $class_major->id }}">
                                    {{ $class_major->class_major_code }} - {{ $class_major->class_major_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn tệp File</label><br>
                            <input type="file" name="inputFileExcel">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary btn-sm">Nhập Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal Import Excel -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12">
                    <!-- Message Errors-->
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $errors->first('inputFileExcel') }}</strong>
                            <strong>{{ $errors->first('inputStudentCode') }}</strong>
                        </div>
                    @endif
                    <!-- /Message Errors-->

                    <!-- SEARCH FORM -->
                    <form action="{{ url('page-list-student') }}" method="GET">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Nhập tìm kiếm sinh viên" name="inputSearch">
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
                                <b>DANH SÁCH SINH VIÊN</b>
                            </h3>
                            <div class="card-tools">
                                <button class="btn btn-danger btn-xs delete_all" data-url="{{ url('delete-student') }}">
                                    <i class="fa fa-trash"></i> Xóa đã chọn
                                </button>
                                <a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel"></i> Nhập Excel
                                </a>
                                <a class="btn btn-primary btn-xs" href="{{ url('add-student') }}" role="button">
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
                                        <th scope="col" style="width:3%;">STT</th>
                                        <th scope="col" style="width:10%;">Mã SV</th>
                                        <th scope="col" style="width:18%;">Họ tên</th>
                                        <th scope="col" style="width:5%;">G.tính</th>
                                        <th scope="col" style="width:10%;">SĐT</th>
                                        <th scope="col" style="width:18%;">Email</th>
                                        <th scope="col" style="width:12%;">Ngày sinh</th>
                                        <th scope="col" style="width:18%;">Lớp C.Ngành</th>
                                        <th scope="col" style="width:4%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_students as $key => $show_student)
                                        <tr id="tr_{{ $show_student->id }}">
                                            <td data-label="Chọn">
                                                <input type="checkbox" class="sub_chk" data-id="{{ $show_student->id }}">
                                            </td>
                                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã sinh viên">
                                                @if ($show_student->student_code != null)
                                                    <b>{{ $show_student->student_code }}</b>
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Họ tên">
                                                @if ($show_student->student_fullname != null)
                                                    <b>{{ $show_student->student_fullname }}</b>
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Giới tính">
                                                @if ($show_student->student_sex != null)
                                                    {{ $show_student->student_sex }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Điện thoại">
                                                @if ($show_student->student_phone != null)
                                                    {{ $show_student->student_phone }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Email">
                                                @if ($show_student->student_email != null)
                                                    {{ $show_student->student_email }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>

                                            <td data-label="Ngày sinh">
                                                @if ($show_student->student_birthday != null)
                                                    <b>{{ date('d-m-Y', strtotime($show_student->student_birthday)) }}</b>
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Chuyên ngành">
                                                @php($class_majors = DB::table('class_majors')->where('id', $show_student->class_major_id)->get())
                                                @foreach($class_majors as $class_major)
                                                    <b>{{ $class_major->class_major_name }}</b>
                                                @endforeach
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-primary btn-xs"
                                                   href="{{ url('edit-student/'.$show_student->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>

                                            <td data-label="Chọn">
                                                <a class="btn btn-success btn-xs"
                                                   href="{{ url('view-infor-student/'.$show_student->id) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_students->links() }}
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

    @if (Session::has('message_error_excel'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Lỗi! Mã Sinh viên đã tồn tại. Vui lòng kiểm tra lại'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('import_file_excel_list_student'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã nhập File Excel thành công'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('mes_success'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Tạo tài khoản'
                , showConfirmButton: false
                , timer: 2000
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
                , timer: 2000
            });
        </script>
    @endif


    @if (Session::has('update_student_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật sinh viên'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('add_student_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm sinh viên'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

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
                                        , title: 'Đã Xóa sinh viên'
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

        function validateExcel() {
            var x = document.forms["ImportExcel"]["inputFileExcel"].value;
            if (x == "") {
                alert("Vui lòng chọn file Excel !");
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

@endsection
