@extends('page.profile.profile_user_layout')
@section('card_col_9')

    <style>
        .body-infor{
            display: none;
        }
    </style>

    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="Show_infor()"><b>Chỉnh sửa thông tin</b></a>
                </li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body body-infor" id="body-infor">
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal needs-validation" method="POST" action="{{ url('update-profile-teacher/'.$teachers->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="inputEmail" placeholder="Nhập địa chỉ email" required
                                value="{{ $teachers->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Điện thoại</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="inputPhone" placeholder="Nhập số điện thoại" required
                                       value="{{ $teachers->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Quê quán</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="inputAddress" placeholder="Nhập địa chỉ quê quán" required>{{ $teachers->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-6">
                                <input type="file" name="inputFileImage" id="file" onchange="return fileValidation()">
                            </div>
                            <div class="col-4">
                                <!-- Image preview -->
                                <div id="imagePreview"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10 text-right">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



    <!-- card -->
    <div class="card">
        <div class="card-header p-2">
            <h3 class="card-title"><b>LỚP GIẢNG DẠY</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-1">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">STT</th>
                        <th scope="col" style="width: 10%;">Mã lớp</th>
                        <th scope="col" style="width: 25%;">Tên lớp</th>
                        <th scope="col" style="width: 15%;">HK - NH</th>
                        <th scope="col" style="width: 40%;">Ghi chú</th>
                        <th scope="col" style="width: 5%;">Chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($class_subjects as $key => $show_class_subject)
                        <tr>
                            <td data-label="STT"><b>{{ ++$key }}</b></td>
                            <td data-label="Mã lớp">
                                <b>{{ $show_class_subject->class_subject_code }}</b>
                            </td>
                            <td data-label="Tên lớp">
                                <a href="{{ url('view-detail-class-subject/'.$show_class_subject->id) }}">
                                    <b style="text-transform: uppercase;">{{ $show_class_subject->class_subject_name }}</b>
                                </a>
                            </td>
                            <td data-label="Học kỳ - Năm học">
                                @php($semester_year = DB::table('semester_years')->where('id', $show_class_subject->semester_year_id)->first())
                                <?php
                                $semester_year = str_split($semester_year->semester_year);
                                echo $semester = "HK ".$semester_year[0];
                                echo $year = " - NH ".$semester_year[1].$semester_year[2].$semester_year[3].$semester_year[4];
                                ?>
                            </td>
                            <td data-label="Ghi chú" class="text-justify">
                                <p>{{ $show_class_subject->class_subject_note }}</p>
                            </td>

                            <td data-label="Chọn">
                                <a class="btn btn-success btn-sm"
                                   href="{{ url('view-detail-class-subject/'.$show_class_subject->id) }}" role="button">
                                    <i class="fa fa-eye"></i>
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
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    @if (Session::has('update_profile_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật thông tin'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif



    <script>
        function Show_infor() {
            document.getElementById('body-infor').style.display = "block";
        }
    </script>

@endsection
