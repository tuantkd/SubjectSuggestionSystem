@extends('layout.layout')
@section('title', 'Học kỳ - Năm học')

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
                        <li class="breadcrumb-item active">Học kỳ - Năm học</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal Add Semester Year -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-semester-year') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM HỌC KỲ - NĂM HỌC</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="">Học kỳ</label>
                                <select name="inputSemester" class="form-control" required>
                                    <option value="">- - Chọn - -</option>
                                    <option value="1">Học kỳ 1</option>
                                    <option value="2">Học kỳ 2</option>
                                    <option value="3">Học kỳ 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="">Năm học</label>
                                <?php
                                    // Sets the top option to be the current year. (IE. the option that is chosen by default).
                                    $currently_selected = date('Y');
                                    // Year to start available options at
                                    $earliest_year = 2010;
                                    // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                                    $latest_year = date('Y');

                                    print '<select class="form-control" name="inputYearStudy">';
                                        // Loops over each int[year] from current year, back to the $earliest_year [2000]
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            // Prints the option with the next year in range.
                                            print '<option value="' .$i. ' - ' .($i+1). '"' .($i === $currently_selected ? 'selected="selected"' : '').'>'
                                                    .$i.' - '.($i+1).
                                                  '</option>';
                                        }
                                    print '</select>';
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="">Ngày bắt đầu</label>
                                <input type="date" name="inputDateBegin" class="form-control" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="">Ngày kết thúc</label>
                                <input type="date" name="inputDateEnd" class="form-control" required>
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
    <!-- /Modal Add Semester Year -->


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
                                <b>HỌC KỲ - NĂM HỌC</b>
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
                                        <th scope="col">STT</th>
                                        <th scope="col">Năm học</th>
                                        <th scope="col">Học kỳ</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_semester_years as $key => $show_semester_year)
                                    <tr>
                                        <td data-label="STT">{{ ++$key }}</td>
                                        <td data-label="Năm học">
                                            <b>Năm Học {{ $show_semester_year->semester_year }}</b>
                                        </td>
                                        <td data-label="Học kỳ">
                                            <b>Học kỳ
                                                <?php
                                                    $semester = str_split($show_semester_year->semesteryear);
                                                    echo $semester_arr = $semester[0]
                                                ?>
                                            </b>
                                        </td>
                                        <td data-label="Ngày bắt đầu">
                                            <b>{{ date('d-m-Y', strtotime($show_semester_year->date_begin)) }}</b>
                                        </td><td data-label="Ngày kết thúc">
                                            <b>{{ date('d-m-Y', strtotime($show_semester_year->date_end)) }}</b>
                                        </td>

                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('delete-semester-year/'.$show_semester_year->id) }}" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>

                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                            href="{{ url('edit-semester-year/'.$show_semester_year->id) }}" role="button">
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
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_semester_years->links() }}
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

    @if (Session::has('message_error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Lỗi! Năm học và học kỳ đã tồn tại'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('add_semester_year_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_semester_year_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_semester_year_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa'
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
