@extends('layout.layout')
@section('title', 'Thêm giảng viên')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('page-home-teacher') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-list-teacher') }}">Danh sách giảng viên</a></li>
                        <li class="breadcrumb-item active">Thêm giảng viên</li>
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
                <!--  col 12-->
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>THÊM GIẢNG VIÊN</b>
                            </h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('post-add-teacher') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate name="myForm" onsubmit="return validateForm()">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="inputFullname" class="form-control" placeholder="Nhập họ và tên" required>
                                        <small class="text-danger font-italic">{{ $errors->first('inputFullname') }}</small>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" name="inputBirthday" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Giới tính</label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputSex" value="Nam">Nam
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputSex" value="Nữ">Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="inputPhone" class="form-control" placeholder="Nhập số điện thoại" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Email</label>
                                        <input type="email" name="inputEmail" class="form-control" placeholder="Nhập địa chỉ email" required>
                                        <small class="text-danger font-italic">{{ $errors->first('inputEmail') }}</small>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Chức vụ</label>
                                        <select class="form-control" name="inputPositionId" required>
                                            <option value="">- - Chọn - -</option>
                                            @php($get_positions = DB::table('positions')->get())
                                            @foreach($get_positions as $get_position)
                                                <option value="{{ $get_position->id }}">
                                                    {{ $get_position->position_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Chức danh</label>
                                        <select class="form-control" name="inputTitleId" required>
                                            <option value="">- - Chọn - -</option>
                                            @php($get_titles = DB::table('titles')->get())
                                            @foreach($get_titles as $get_title)
                                                <option value="{{ $get_title->id }}">
                                                    {{ $get_title->title_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Học vị</label>
                                        <select class="form-control" name="inputDegreeId" required>
                                            <option value="">- - Chọn - -</option>
                                            @php($get_degrees = DB::table('degrees')->get())
                                            @foreach($get_degrees as $get_degree)
                                                <option value="{{ $get_degree->id }}">
                                                    {{ $get_degree->degree_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Ảnh đại diện</label><br>
                                        <input type="file" name="inputFileImage" id="file" onchange="return fileValidation()">
                                        <br><br>
                                        <!-- Image preview -->
                                        <div id="imagePreview"></div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Bộ môn</label>
                                        <select class="form-control" name="inputPartSubjectId" required>
                                            <option value="">- - Chọn - -</option>
                                            @php($get_part_subjects = DB::table('part_subjects')->get())
                                            @foreach($get_part_subjects as $get_part_subject)
                                                <option value="{{ $get_part_subject->id }}">
                                                    {{ $get_part_subject->part_subject_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="">Quê quán</label>
                                        <input type="text" name="inputAddress" class="form-control" placeholder="Nhập quê quán" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!--  End col 12-->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
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

        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Vui lòng chọn file hình ảnh có phần mở rộng .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="max-width:100%;height:100px;border-radius:5px;border:1px solid grey;"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        function validateForm() {
            var x = document.forms["myForm"]["inputSex"].value;
            if (x == "") {
                alert("Vui lòng chọn giới tính !");
                return false;
            }
        }

    </script>

@endsection
