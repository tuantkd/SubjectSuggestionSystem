@extends('layout.layout')
@section('title', 'Xem lớp học phần')

@section('link_cdn')
    <link rel="stylesheet" href="{{ url('public/dist/css/select.css') }}">
    <script src="{{ url('public/dist/js/select.js') }}"></script>
@endsection

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        @if (Auth::user()->role_id == 1)
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        @endif
                        <li class="breadcrumb-item"><a href="{{ url('page-class-subject') }}">Lớp học phần</a></li>
                        <li class="breadcrumb-item active">
                            {{ $class_subject_id->class_subject_code }} - {{ $class_subject_id->class_subject_name }}
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal Add Detail Score-->
    <div class="modal fade" id="modelAddToClassSubject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-detail-score/'.$class_subject_id->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h5 class="modal-title"><b>THÊM SINH VIÊN LỚP HỌC PHẦN</b></h5>
                    </div>
                    <div class="modal-body p-2">

                        <div class="input-group mt-2">
                            <select class="form-control select2bs4" name="inputStudentId" required data-title="">
                                <option value="">- - Sinh viên - -</option>
                                @php($students = DB::table('students')->get())
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student_code }} - {{ $student->student_fullname }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-user-plus"></i>
                                </button>
                            </div>
                        </div>

                        <hr>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" style="width:2%;"><input type="checkbox" id="master"></th>
                                <th scope="col" style="width:3%;">STT</th>
                                <th scope="col" style="width:10%;">Mã SV</th>
                                <th scope="col" style="width:18%;">Họ tên</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($get_students = DB::table('students')->get())
                            @forelse($get_students as $key => $show_student)
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary btn-sm delete_all"
                        data-url="{{ url('add-student-class-subject') }}">
                            Thêm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Add Detail Score-->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 6-->
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b style="text-transform: uppercase;">{{ $class_subject_id->class_subject_code }} - {{ $class_subject_id->class_subject_name }}</b>
                            </h3>
                            <div class="card-tools">
                                @if (Auth::user()->role_id == 1)
                                    <a class="btn btn-primary btn-xs" href="#" role="button"
                                       data-toggle="modal" data-target="#modelAddToClassSubject">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Mã SV</th>
                                        <th scope="col" style="width:45%;">Họ tên</th>
                                        <th scope="col" style="width:15%;">Điểm số</th>
                                        <th scope="col" style="width:15%;">Điểm chữ</th>
                                        @if (Auth::user()->role_id == 1)
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                        @else
                                        <th scope="col" style="width:5%;">Chọn</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($student_class_subjects as $key => $student)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã sinh viên">
                                            @php($students = DB::table('students')->where('id',$student->student_id)->first())
                                            <b>{{ $students->student_code }}</b>
                                        </td>
                                        <td data-label="Họ tên">
                                            <b>{{ $students->student_fullname }}</b>
                                        </td>
                                        <td data-label="Điểm số">
                                            @if($student->score_ladder_four != null)
                                                <b class="text-secondary" style="font-size:16px;">{{ round($student->score_ladder_four, 2) }}</b>
                                            @else
                                                <b class="text-danger">...</b>
                                            @endif
                                        </td>
                                        <td data-label="Điểm chữ">
                                            @if($student->score_char != null)
                                                <b class="text-secondary" style="font-size:16px;">{{ $student->score_char }}</b>
                                            @else
                                                <b class="text-danger">...</b>
                                            @endif
                                        </td>

                                        @if (Auth::user()->role_id == 1)
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('delete-score-student/'.$student->id) }}" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        @endif

                                        <td data-label="Chọn">
                                            <a class="btn btn-warning btn-xs"
                                            href="{{ url('view-score-student/'.$class_subject_id->id.'/'.$student->id) }}" role="button" title="Cập nhật điểm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $student_class_subjects->links() }}
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

    <script>
        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    @if (Session::has('delete_score_student_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa'
                , showConfirmButton: false
                , timer: 1500
            });
        </script>
    @endif

    @if (Session::has('update_score_student_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật điểm'
                , showConfirmButton: false
                , timer: 1500
            });
        </script>
    @endif

    @if (Session::has('message_error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Lỗi! Sinh viên đã tồn tại'
                , showConfirmButton: false
                , timer: 3000
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
                    var check = confirm("Bạn có muốn thêm mới không ?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
                        var class_subject_id = <?php echo $class_subject_id->id; ?>;
                        $.ajax({
                            type:'GET',
                            url: $(this).data('url'),
                            data:{join_selected_values:join_selected_values, class_subject_id:class_subject_id},
                            success: function(data){
                                if (data['success']) {
                                    Swal.fire({
                                        position: 'center'
                                        , icon: 'success'
                                        , title: 'Đã Thêm sinh viên'
                                        , showConfirmButton: false
                                        , timer: 2000
                                    });
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Rất tiếc, đã xảy ra lỗi!');
                                }
                                location.reload();
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
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
