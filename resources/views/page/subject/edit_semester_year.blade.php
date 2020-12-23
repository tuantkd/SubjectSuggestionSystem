@extends('layout.layout')
@section('title', 'Chỉnh sửa Học kỳ - Năm học')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-semester-year') }}">Học kỳ - Năm học</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa Học kỳ - Năm học</li>
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
                                <b>CHỈNH SỬA HỌC KỲ - NĂM HỌC</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">

                            <form action="{{ url('update-semester-year/'.$edit_semester_year->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Học kỳ</label>
                                        <select name="inputSemester" class="form-control" required>
                                            <?php
                                            $semester = str_split($edit_semester_year->semesteryear);
                                            echo '<option value="'.$semester_arr = $semester[0].'">'.'Học kỳ '.$semester_arr = $semester[0].'</option>'
                                            ?>
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
                                            print '<option value="'.$edit_semester_year->semester_year.'">'
                                                .$edit_semester_year->semester_year.'</option>';

                                            print '<option value="">'."- - Chọn - -".'</option>';

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
                                        <input type="date" name="inputDateBegin" class="form-control" required value="{{ $edit_semester_year->date_begin }}">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Ngày kết thúc</label>
                                        <input type="date" name="inputDateEnd" class="form-control" required value="{{ $edit_semester_year->date_end }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
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
