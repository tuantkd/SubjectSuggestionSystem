@extends('layout.layout')
@section('title', 'Chức danh')

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
                        <li class="breadcrumb-item active">Chức danh</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-add-title') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>THÊM CHỨC DANH</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Tên chức danh</label>
                                <input type="text" name="inputTitleName" class="form-control" placeholder="Nhập tên chức danh" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="inputTitleDescription"
                                rows="3" placeholder="Nhập mô tả chức danh" required></textarea>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!--  col 12-->
                <section class="col-lg-12">
                    <!-- Report message -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger p-2" role="alert">
                            <strong>
                                {{ $errors->first('inputTitleName') }}
                            </strong>
                        </div>
                    @endif
                    <!-- /Report message -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                <b>CHỨC DANH</b>
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
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:15%;">Tên chức danh</th>
                                        <th scope="col" style="width:65%;">Mô tả</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_titles as $key => $show_title)
                                    <tr>
                                        <td data-label="STT"><b>{{ ++$key }}</b></td>
                                        <td data-label="Tên quyền">
                                            <b>{{ $show_title->title_name }}</b>
                                        </td>
                                        <td data-label="Chức vụ">
                                            <p class="text-justify">
                                                {!! $show_title->title_description !!}
                                            </p>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?');"
                                            href="{{ url('delete-title/'.$show_title->id) }}" role="button">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td data-label="Chọn">
                                            <a class="btn btn-primary btn-sm"
                                            href="{{ url('edit-title/'.$show_title->id) }}" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- pagination -->
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_titles->links() }}
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
    </script>

    @if (Session::has('update_title_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Cập nhật chức danh'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('add_title_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Thêm chức danh'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_title_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã Xóa chức danh'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
