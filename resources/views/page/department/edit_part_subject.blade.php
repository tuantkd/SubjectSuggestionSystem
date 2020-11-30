@extends('layout.layout')
@section('title', 'Chỉnh sửa')

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
                        <li class="breadcrumb-item"><a href="{{ url('page-part-subject') }}">Bộ môn</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỈNH SỬA BỘ MÔN</b>
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-part-subject/'.$edit_part_subjects->id) }}" method="POST"
                            class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Khoa</label>
                                    <select name="inputDepartmentId" class="form-control">
                                        @php($departments = DB::table('departments')->where('id',$edit_part_subjects->department_id)->get())
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->department_name }}
                                            </option>
                                        @endforeach

                                        <option value="">- - Chọn - -</option>
                                        @php($get_departments = DB::table('departments')
                                        ->where([['id','<>',$edit_part_subjects->department_id]])->get())
                                        @foreach($get_departments as $get_department)
                                            <option value="{{ $get_department->id }}">
                                                {{ $get_department->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên bộ môn</label>
                                    <input type="text" name="inputPartSubjectName" class="form-control" placeholder="Nhập tên bộ môn"
                                    value="{{ $edit_part_subjects->part_subject_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" name="inputPartSubjectDescription" rows="10" placeholder="Nhập mô bộ môn">{!! $edit_part_subjects->part_subject_description !!}</textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
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

@endsection
