<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ĐĂNG NHẬP
Route::get('page-login', [AdminController::class, 'page_login']);

//TRANG CHỦ GIẢNG VIÊN
Route::get('page-home-admin', [AdminController::class, 'page_home_admin']);

/*============================================================================*/
//TRANG CHỨC VỤ
Route::get('page-position', [AdminController::class, 'page_position']);

//TRANG HỌC VỊ
Route::get('page-degree', [AdminController::class, 'page_degree']);

//TRANG CHỨC DANH
Route::get('page-title', [AdminController::class, 'page_title']);
/*============================================================================*/


/*============================================================================*/
//TRANG QUYỀN TRUY CẬP
Route::get('page-role', [AdminController::class, 'page_role']);

//TRANG QUYỀN NGƯỜI DÙNG TRUY CẬP
Route::get('page-role-user-access', [AdminController::class, 'page_role_user_access']);
/*============================================================================*/


/*============================================================================*/
//TRANG KHOA
Route::get('page-department', [AdminController::class, 'page_department']);

//TRANG CHỈNH SỬA KHOA
Route::get('edit-department', [AdminController::class, 'edit_department']);

//TRANG CHỈNH SỬA BỘ MÔN
Route::get('page-part-subject', [AdminController::class, 'page_part_subject']);

//TRANG BỘ MÔN
Route::get('edit-part-subject', [AdminController::class, 'edit_part_subject']);
/*============================================================================*/


/*============================================================================*/
//TRANG DANH SÁCH QUẢN TRỊ
Route::get('page-list-admin', [AdminController::class, 'page_list_admin']);

//TRANG THÊM QUẢN TRỊ
Route::get('add-admin', [AdminController::class, 'add_admin']);

//TRANG DANH SÁCH GIẢNG VIÊN
Route::get('page-list-teacher', [AdminController::class, 'page_list_teacher']);

//TRANG THÔNG TIN GIẢNG VIÊN
Route::get('view-infor-reacher', [AdminController::class, 'view_infor_reacher']);

//TRANG THÊM GIẢNG VIÊN
Route::get('add-teacher', [AdminController::class, 'add_teacher']);

//TRANG TẠO TÀI KHOẢN
Route::get('create-account', [AdminController::class, 'create_account']);
/*============================================================================*/



/*============================================================================*/
//TRANG KHÓA HỌC
Route::get('page-course', [AdminController::class, 'page_course']);
/*============================================================================*/


/*============================================================================*/
//TRANG CHUYÊN NGÀNH
Route::get('page-major', [AdminController::class, 'page_major']);
/*============================================================================*/
