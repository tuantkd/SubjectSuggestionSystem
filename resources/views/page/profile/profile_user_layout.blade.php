@extends('layout.layout')
@section('title', 'Hồ sơ thông tin')

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
                        <li class="breadcrumb-item active">Hồ sơ thông tin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @php($teachers = DB::table('teachers')->where('id', Auth::user()->teacher_id)->first())
                                @if ($teachers->avatar != null)
                                    <img class="profile-user-img img-fluid img-circle" src="{{ url('public/upload_avatar/'.$teachers->avatar) }}">
                                @else
                                    <img src="{{ url('public/dist/img/user_avatar.png') }}" class="profile-user-img img-fluid img-circle">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{ $teachers->fullname }}</h3>
                            @php($get_positions = DB::table('positions')->where('id', $teachers->position_id)->get())
                            @foreach($get_positions as $get_position)
                                <p class="text-muted text-center">{{ $get_position->position_name }}</p>
                            @endforeach

                            <a href="{{ url('change-password/'.Auth::id()) }}" class="btn btn-warning btn-block"><b>Đổi mật khẩu</b></a>
                            <a href="{{ url('page-profile-user/'.$teachers->id) }}" class="btn btn-primary btn-block"><b>Chỉnh sửa thông tin</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cá nhân</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($teachers->sex == 'Nam')
                                <strong><i class="fa fa-male"></i> Giới tính: </strong>
                                <span class="text-muted">{{ $teachers->sex }}</span>
                                <hr>
                            @else
                                <strong><i class="fa fa-female"></i> Giới tính: </strong>
                                <span class="text-muted">{{ $teachers->sex }}</span>
                                <hr>
                            @endif

                            <strong><i class="fa fa-calendar"></i> Ngày sinh: </strong>
                            <span class="text-muted">{{ date('d-m-Y', strtotime($teachers->birthday)) }}</span>
                            <hr>

                            <strong><i class="fa fa-phone"></i> Điện thoại: </strong>
                            <span class="text-muted">{{ $teachers->phone }}</span>
                            <hr>

                            <strong><i class="fa fa-envelope-o"></i> Email: </strong>
                            <span class="text-muted">{{ $teachers->email }}</span>
                            <hr>

                            <strong><i class="fa fa-map-marker"></i> Quê quán: </strong>
                            <span class="text-muted">{{ $teachers->address }}</span>
                            <hr>



                            @php($degrees = DB::table('degrees')->where('id', $teachers->degree_id)->get())
                            @foreach($degrees as $degree)
                                @if ($degree->degree_name != null)
                                    <strong><i class="fa fa-graduation-cap"></i> Học vị: </strong>
                                    <span class="text-muted">{{ $degree->degree_name }}</span>
                                    <hr>
                                @endif
                            @endforeach



                            @php($titles = DB::table('titles')->where('id', $teachers->title_id)->get())
                            @foreach($titles as $title)
                                <strong><i class="fa fa-address-card"></i></i> Chức danh: </strong>
                                <span class="text-muted">{{ $title->title_name }}</span>
                                <hr>
                            @endforeach



                            @php($positions = DB::table('positions')->where('id', $teachers->position_id)->get())
                            @foreach($positions as $position)
                                <strong><i class="fa fa-address-card-o"></i> Chức vụ: </strong>
                                <span class="text-muted">{{ $position->position_name }}</span>
                                <hr>
                            @endforeach



                            @php($part_subjects = DB::table('part_subjects')->where('id', $teachers->part_subject_id)->get())
                            @foreach($part_subjects as $part_subject)
                                <strong><i class="fa fa-address-card-o"></i> Bộ môn: </strong>
                                <span class="text-muted">{{ $part_subject->part_subject_name }}</span>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">

                    @yield('card_col_9')

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
    </script>

@endsection
