@extends('layout.layout')
@section('title', 'Xem Lớp chuyên ngành')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-class-major') }}">Lớp chuyên ngành</a></li>
                        <li class="breadcrumb-item active">Xem Lớp chuyên ngành</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('content')

    <!-- Modal Import Excel -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('import-file-excel/'.$class_majors->id) }}" onsubmit="return validateExcel()"
            method="POST" enctype="multipart/form-data" name="ImportExcel">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>NHẬP FILE EXCEL</b></h5>
                    </div>
                    <div class="modal-body">
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

    <!-- Modal Add Student -->
    <div class="modal fade" id="modelAddStudent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM SINH VIÊN</b></h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('post-add-student-to-class-major/'.$class_majors->id) }}" class="needs-validation" novalidate
                        method="POST" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 col-sm-6">
                                    <label for="">Mã sinh viên</label>
                                    <input type="text" name="inputStudentCode" class="form-control" placeholder="Nhập mã sinh viên" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="inputStudentFullName" class="form-control" placeholder="Nhập họ và tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-6">
                                    <label for="">Giới tính</label><br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="inputStudentSex" value="Nam">Nam
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="inputStudentSex" value="Nữ">Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" name="inputStudentBirthday" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 col-sm-6">
                                    <label for="">Điện thoại</label>
                                    <input type="number" name="inputStudentPhone" class="form-control" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="">Email</label>
                                    <input type="email" name="inputStudentEmail" class="form-control" placeholder="Nhập địa chỉ email">
                                </div>
                            </div>

                            {{--<div class="form-group row">
                                <div class="col-12 col-sm-12">
                                    <label for="">Lớp chuyên ngành</label>
                                    <select class="form-control" name="inputClassMajorId">
                                        <option value="{{ $class_majors->id }}">{{ $class_majors->class_major_name }}</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group row">
                                <div class="col-12 col-sm-12">
                                    <label for="">Quê quán</label>
                                    <textarea name="inputStudentAddress" rows="3" class="form-control" placeholder="Nhập địa chỉ quê quán"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 text-right">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Add Student -->



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
                    <form action="{{ url('view-class-major/'.$class_majors->id) }}" method="GET">
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
                                LỚP <b style="text-transform: uppercase;">[ {{ $class_majors->class_major_code }} - {{ $class_majors->class_major_name }} ]</b>
                            </h3>
                            <div class="card-tools">
                                <!-- row-option -->
                                <button class="btn btn-danger btn-xs delete_all" data-url="{{ url('delete-check_all-student-class') }}">
                                    <i class="fa fa-trash"></i> Xóa đã chọn
                                </button>
                                <!-- /row-option -->

                                <a class="btn btn-success btn-xs" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-excel"></i> Nhập Excel
                                </a>

                                <a class="btn btn-primary btn-xs" href="{{ url('add-class-major') }}"
                                role="button" data-toggle="modal" data-target="#modelAddStudent">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <!-- table-student -->
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:2%;"><input type="checkbox" id="master"></th>
                                        <th scope="col" style="width:3%;">STT</th>
                                        <th scope="col" style="width:10%;">Mã SV</th>
                                        <th scope="col" style="width:18%;">Họ tên</th>
                                        <th scope="col" style="width:5%;">G.tính</th>
                                        <th scope="col" style="width:10%;">Điện thoại</th>
                                        <th scope="col" style="width:20%;">Email</th>
                                        <th scope="col" style="width:10%;">Ngày sinh</th>
                                        <th scope="col" style="width:19%;">Địa chỉ</th>
                                        <th scope="col" style="width:3%;">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_student_classes as $key => $show_student_class)
                                    <tr id="tr_{{$show_student_class->id}}">
                                        <td data-label="Chọn"><input type="checkbox" class="sub_chk" data-id="{{$show_student_class->id}}"></td>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã sinh viên">
                                            @if ($show_student_class->student_code != null)
                                                <b>{{ $show_student_class->student_code }}</b>
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Họ tên">
                                            @if ($show_student_class->student_fullname != null)
                                                <b>{{ $show_student_class->student_fullname }}</b>
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Giới tính">
                                            @if ($show_student_class->student_sex != null)
                                                {{ $show_student_class->student_sex }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Điện thoại">
                                            @if ($show_student_class->student_phone != null)
                                                {{ $show_student_class->student_phone }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Email">
                                            @if ($show_student_class->student_email != null)
                                                {{ $show_student_class->student_email }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>

                                        <td data-label="Ngày sinh">
                                            @if ($show_student_class->student_birthday != null)
                                                <b>{{ date('d-m-Y', strtotime($show_student_class->student_birthday)) }}</b>
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Quê quán">
                                            @if ($show_student_class->student_address != null)
                                                <b>{{ $show_student_class->student_address }}</b>
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-success btn-xs"
                                               href="{{ url('view-infor-student/'.$show_student_class->id) }}" role="button">
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
                            <!-- /table-student -->

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_student_classes->links() }}
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

    @if (Session::has('import_file_excel_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Nhập File Excel thành công'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('add_student_to_class_major'))
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#master').on('click', function(e) {
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

        function validateForm() {
            var x = document.forms["myForm"]["inputStudentSex"].value;
            if (x == "") {
                alert("Vui lòng chọn giới tính");
                return false;
            }
        }

        function validateExcel() {
            var x = document.forms["ImportExcel"]["inputFileExcel"].value;
            if (x == "") {
                alert("Vui lòng chọn File Excel");
                return false;
            }
        }
    </script>

@endsection
