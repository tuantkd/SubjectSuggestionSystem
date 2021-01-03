<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
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

//ĐĂNG XUẤT
Route::get('logout', [AdminController::class, 'logout']);

//XỬ LÝ ĐĂNG NHẬP
Route::post('post-login', [AdminController::class, 'post_login']);


Route::middleware([CheckLogin::class])->group(function () {
    //TRANG CHỦ
    Route::get('/', [AdminController::class, 'page_home_admin']);

    /*============================================================================*/
    //TRANG CHỨC VỤ
    Route::get('page-position', [AdminController::class, 'page_position']);

    //THÊM CHỨC VỤ CSDL
    Route::post('post-add-position', [AdminController::class, 'post_add_position']);

    //XÓA CHỨC VỤ
    Route::get('delete-position/{id_position}', [AdminController::class, 'delete_position']);

    //CHỈNH SỬA CHỨC VỤ
    Route::get('edit-position/{id_position}', [AdminController::class, 'edit_position']);

    //CẬP NHẬT CHỨC VỤ
    Route::put('update-position/{id_position}', [AdminController::class, 'update_position']);

    //TRANG HỌC VỊ
    Route::get('page-degree', [AdminController::class, 'page_degree']);

    //THÊM HỌC VỊ CSDL
    Route::post('post-add-degree', [AdminController::class, 'post_add_degree']);

    //XÓA HỌC VỊ
    Route::get('delete-degree/{id_degree}', [AdminController::class, 'delete_degree']);

    //CHỈNH SỬA HỌC VỊ
    Route::get('edit-degree/{id_degree}', [AdminController::class, 'edit_degree']);

    //CẬP NHẬT HỌC VỊ
    Route::put('update-degree/{id_degree}', [AdminController::class, 'update_degree']);

    //TRANG CHỨC DANH
    Route::get('page-title', [AdminController::class, 'page_title']);

    //THÊM CHỨC DANH CSDL
    Route::post('post-add-title', [AdminController::class, 'post_add_title']);

    //XÓA CHỨC DANH
    Route::get('delete-title/{id_title}', [AdminController::class, 'delete_title']);

    //CHỈNH SỬA CHỨC DANH
    Route::get('edit-title/{id_title}', [AdminController::class, 'edit_title']);

    //CẬP NHẬT CHỨC DANH
    Route::put('update-title/{id_title}', [AdminController::class, 'update_title']);
    /*============================================================================*/


    /*============================================================================*/
    //TRANG QUYỀN TRUY CẬP
    Route::get('page-role', [AdminController::class, 'page_role']);

    //THÊM QUYỀN TRUY CẬP CSDL
    Route::post('post-add-role', [AdminController::class, 'post_add_role']);

    //TRANG QUYỀN NGƯỜI DÙNG TRUY CẬP
    Route::get('page-role-user-access', [AdminController::class, 'page_role_user_access']);

    //TRANG THAY ĐỔI QUYỀN TRUY CẬP
    Route::get('change-role/{id_user}', [AdminController::class, 'change_role']);

    //CẬP NHẬT THAY ĐỔI QUYỀN TRUY CẬP
    Route::put('update-change-role/{id_user}', [AdminController::class, 'update_change_role']);
    /*============================================================================*/


    /*============================================================================*/
    //TRANG KHOA
    Route::get('page-department', [AdminController::class, 'page_department']);

    //XÓA KHOA
    Route::get('delete-department/{id_department}', [AdminController::class, 'delete_department']);

    //THÊM KHOA CSDL
    Route::post('post-add-department', [AdminController::class, 'post_add_department']);

    //TRANG CHỈNH SỬA KHOA
    Route::get('edit-department/{id_department}', [AdminController::class, 'edit_department']);

    //CẬP NHẬT KHOA
    Route::put('update-department/{id_department}', [AdminController::class, 'update_department']);

    //TRANG CHỈNH SỬA BỘ MÔN
    Route::get('edit-part-subject/{id_department}', [AdminController::class, 'edit_part_subject']);

    //CẬP NHẬT BỘ MÔN
    Route::put('update-part-subject/{id_department}', [AdminController::class, 'update_part_subject']);

    //TRANG BỘ MÔN
    Route::get('page-part-subject', [AdminController::class, 'page_part_subject']);

    //XÓA BỘ MÔN
    Route::get('delete-part-subject/{id_part_subject}', [AdminController::class, 'delete_part_subject']);

    //THÊM BỘ MÔN CSDL
    Route::post('post-add-part-subject', [AdminController::class, 'post_add_part_subject']);

    //TRANG CHUYÊN NGÀNH
    Route::get('page-major', [AdminController::class, 'page_major']);

    //XÓA CHUYÊN NGÀNH
    Route::get('delete-major/{id_major}', [AdminController::class, 'delete_major']);

    //CHỈNH SỬA CHUYÊN NGÀNH
    Route::get('edit-major/{id_major}', [AdminController::class, 'edit_major']);

    //CẬP NHẬT CHUYÊN NGÀNH
    Route::put('update-major/{id_major}', [AdminController::class, 'update_major']);

    //THÊM CHUYÊN NGÀNH
    Route::post('post-add-major', [AdminController::class, 'post_add_major']);
    /*============================================================================*/


    /*============================================================================*/
    //TRANG DANH SÁCH QUẢN TRỊ
    Route::get('page-list-admin', [AdminController::class, 'page_list_admin']);

    //TRANG THÊM QUẢN TRỊ
    Route::get('add-admin', [AdminController::class, 'add_admin']);

    //TRANG THÊM QUẢN TRỊ CSDL
    Route::post('post-add-admin', [AdminController::class, 'post_add_admin']);

    //---------------------------
    //TRANG DANH SÁCH GIẢNG VIÊN
    Route::get('page-list-teacher', [AdminController::class, 'page_list_teacher']);

    //TRANG THÔNG TIN GIẢNG VIÊN
    Route::get('view-infor-teacher/{id_teacher}', [AdminController::class, 'view_infor_reacher']);

    //TRANG THÊM GIẢNG VIÊN
    Route::get('add-teacher', [AdminController::class, 'add_teacher']);

    //XÓA GIẢNG VIÊN
    Route::get('delete-teacher/{id_teacher}', [AdminController::class, 'delete_teacher']);

    //TRANG THÊM GIẢNG VIÊN CSDL
    Route::post('post-add-teacher', [AdminController::class, 'post_add_teacher']);

    //---------------------------
    //TRANG TẠO TÀI KHOẢN
    Route::get('create-account/{id}', [AdminController::class, 'create_account']);

    //TRANG TẠO TÀI KHOẢN SINH VIÊN
    Route::post('post-create-account-student/{id_student}', [AdminController::class, 'post_create_account_student']);

    //TRANG TẠO TÀI KHOẢN CSDL
    Route::post('post-create-account/{id}', [AdminController::class, 'post_create_account']);
    /*============================================================================*/



    /*============================================================================*/
    //TRANG THÔNG TIN NGƯỜI DÙNG
    Route::get('page-profile-user/{id_teacher}', [AdminController::class, 'page_profile_user']);

    //TRANG THAY ĐỔI MẬT KHẨU
    Route::get('change-password/{id_user}', [AdminController::class, 'change_password']);

    //THAY ĐỔI MẬT KHẨU
    Route::put('update-password/{id_user}', [AdminController::class, 'update_password']);

    //CẬP NHẬT THÔNG TIN NGƯỜI DÙNG
    Route::put('update-profile-teacher/{id_teacher}', [AdminController::class, 'update_profile_teacher']);
    /*============================================================================*/



    /*============================================================================*/
    //TRANG KHÓA HỌC
    Route::get('page-course', [AdminController::class, 'page_course']);

    //XÓA KHÓA HỌC
    Route::get('delete-course/{id_course}', [AdminController::class, 'delete_course']);

    //CHỈNH SỬA KHÓA HỌC
    Route::get('edit-course/{id_course}', [AdminController::class, 'edit_course']);

    //CẬP NHẬT KHÓA HỌC
    Route::put('update-course/{id_course}', [AdminController::class, 'update_course']);

    //THÊM KHÓA HỌC
    Route::post('post-add-page-course', [AdminController::class, 'post_add_page_course']);

    //TRANG LỚP CHUYÊN NGÀNH
    Route::get('page-class-major', [AdminController::class, 'page_class_major']);

    //TRANG THÊM LỚP CHUYÊN NGÀNH
    Route::get('add-class-major', [AdminController::class, 'add_class_major']);

    //XÓA LỚP CHUYÊN NGÀNH
    Route::get('delete-class-major/{id_class_major}', [AdminController::class, 'delete_class_major']);

    //TRANG THÊM LỚP CHUYÊN NGÀNH CSDL
    Route::post('post-add-class-major', [AdminController::class, 'post_add_class_major']);

    //TRANG CHỈNH SỬA LỚP CHUYÊN NGÀNH
    Route::get('edit-class-major/{id_class_major}', [AdminController::class, 'edit_class_major']);

    //TRANG XEM LỚP CHUYÊN NGÀNH
    Route::get('view-class-major/{id_class_major}', [AdminController::class, 'view_class_major']);

    //THÊM SINH VIÊN TRONG LỚP HỌC
    Route::post('post-add-student-to-class-major/{id_class_major}', [AdminController::class, 'post_add_student_to_class_major']);

    //XÓA SINH VIÊN TRONG LỚP HỌC
    Route::delete('delete-check_all-student-class', [AdminController::class, 'delete_check_all_student_class']);

    //NHẬP FILE EXCEL SINH VIÊN
    Route::post('import-file-excel/{id_class_major}', [AdminController::class, 'import_file_excel']);

    //CẬP NHẬT LỚP CHUYÊN NGÀNH
    Route::put('update-class-major/{id_class_major}', [AdminController::class, 'update_class_major']);

    //TRANG DANH SÁCH SINH VIÊN
    Route::get('page-list-student', [AdminController::class, 'page_list_student']);

    //XÓA SINH VIÊN
    Route::delete('delete-student', [AdminController::class, 'delete_student']);

    //NHẬP EXCEL VÀO DANH SÁCH SINH VIÊN
    Route::post('import-excel-to-list-student', [AdminController::class, 'import_excel_to_list_student']);

    //TRANG THÊM SINH VIÊN
    Route::get('add-student', [AdminController::class, 'add_student']);

    //TRANG CHỈNH SỬA SINH VIÊN
    Route::get('edit-student/{id_student}', [AdminController::class, 'edit_student']);

    //CẬP NHẬT SINH VIÊN
    Route::put('update-student/{id_student}', [AdminController::class, 'update_student']);

    //THÊM SINH VIÊN CSDL
    Route::post('post-add-student', [AdminController::class, 'post_add_student']);

    //TRANG CHỈNH SỬA SINH VIÊN
    Route::get('edit-student', [AdminController::class, 'edit_student']);

    //TRANG THÔNG TIN SINH VIÊN
    Route::get('view-infor-student/{id_student}', [AdminController::class, 'view_infor_student']);
    /*============================================================================*/


    /*============================================================================*/
    //TRANG CHƯƠNG TRÌNH ĐÀO TẠO
    Route::get('page-program-train', [AdminController::class, 'page_program_train']);

    //XÓA CHƯƠNG TRÌNH ĐÀO TẠO
    Route::get('delete-program-train/{id_program_train}', [AdminController::class, 'delete_program_train']);

    //CHỈNH SỬA CHƯƠNG TRÌNH ĐÀO TẠO
    Route::get('page-edit-study/{id_program_train}', [AdminController::class, 'page_edit_program_train']);

    //CẬP NHẬT CHƯƠNG TRÌNH ĐÀO TẠO
    Route::put('update-program-train/{id_program_train}', [AdminController::class, 'update_program_train']);

    //THÊM CHƯƠNG TRÌNH ĐÀO TẠO
    Route::post('post-add-program-train', [AdminController::class, 'post_add_program_train']);
    /*============================================================================*/


    /*============================================================================*/
    //TRANG HỌC KỲ NĂM HỌC
    Route::get('page-semester-year', [AdminController::class, 'page_semester_year']);

    //XÓA HỌC KỲ NĂM HỌC
    Route::get('delete-semester-year/{id_semester_year}', [AdminController::class, 'delete_semester_year']);

    //CHỈNH SỬA HỌC KỲ NĂM HỌC
    Route::get('edit-semester-year/{id_semester_year}', [AdminController::class, 'edit_semester_year']);

    //CẬP NHẬT HỌC KỲ NĂM HỌC
    Route::put('update-semester-year/{id_semester_year}', [AdminController::class, 'update_semester_year']);

    //THÊM HỌC KỲ NĂM HỌC CSDL
    Route::post('post-add-semester-year', [AdminController::class, 'post_add_semester_year']);

    //TRANG LOẠI HỌC PHẦN
    Route::get('page-category-subject', [AdminController::class, 'page_category_subject']);

    //XÓA LOẠI HỌC PHẦN
    Route::get('delete-category-subject/{id_category_subject}', [AdminController::class, 'delete_category_subject']);

    //THÊM LOẠI HỌC PHẦN
    Route::post('post-add-category-subject', [AdminController::class, 'post_add_category_subject']);

    //TRANG HỌC PHẦN
    Route::get('page-subject', [AdminController::class, 'page_subject']);

    //THÊM HỌC PHẦN
    Route::post('post-add-subject', [AdminController::class, 'post_add_subject']);

    //CHỈNH SỬA HỌC PHẦN
    Route::get('edit-subject/{id_subject}', [AdminController::class, 'edit_subject']);

    //THÊM TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN
    Route::get('add-prerequisite-parallel/{id_subject}', [AdminController::class, 'add_prerequisite_parallel']);

    //XÓA TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN
    Route::get('delete-subject-prerequisite-parallel/{id}', [AdminController::class, 'delete_subject_prerequisite_parallel']);

    //THÊM TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN CSDL
    Route::post('post-add-prerequisite-parallel/{id_subject}', [AdminController::class, 'post_add_prerequisite_parallel']);

    //CẬP NHẬT HỌC PHẦN
    Route::put('update-subject/{id_subject}', [AdminController::class, 'update_subject']);

    //XÓA HỌC PHẦN
    Route::delete('delete-subject', [AdminController::class, 'delete_subject']);

    //NHẬP FILE EXCEL VÀO HỌC PHẦN
    Route::post('import-excel-to-subject', [AdminController::class, 'import_excel_to_subject']);

    //TRANG LỚP HỌC PHẦN
    Route::get('page-class-subject', [AdminController::class, 'page_class_subject']);

    //XÓA LỚP HỌC PHẦN
    Route::get('delete-class-subject/{id_class_subject}', [AdminController::class, 'delete_class_subject']);

    //TRANG THÊM LỚP HỌC PHẦN
    Route::get('add-class-subject', [AdminController::class, 'add_class_subject']);

    //THÊM LỚP HỌC PHẦN CSDL
    Route::post('post-add-class-subject', [AdminController::class, 'post_add_class_subject']);

    //TRANG CHỈNH SỬA LỚP HỌC PHẦN
    Route::get('edit-class-subject/{id_class_subject}', [AdminController::class, 'edit_class_subject']);

    //CẬP NHẬT LỚP HỌC PHẦN
    Route::put('update-class-subject/{id_class_subject}', [AdminController::class, 'update_class_subject']);

    //TRANG XEM LỚP HỌC PHẦN
    Route::get('view-detail-class-subject/{id_class_subject}', [AdminController::class, 'view_detail_class_subject']);

    //THÊM CHI TIẾT ĐIỂM KÈM SINH VIÊN
    Route::post('post-add-detail-score/{id_class_subject}', [AdminController::class, 'post_add_detail_score']);

    //TRANG XEM ĐIỂM VÀ CẬP NHẬT HỌC PHẦN SINH VIÊN
    Route::get('view-score-student/{id_class_subject}/{id_detail_score}', [AdminController::class, 'view_score_student']);

    //XÓA CHI TIẾT ĐIỂM
    Route::get('delete-score-student/{id_detail_score}', [AdminController::class, 'delete_score_student']);

    //CẬP NHẬT ĐIỂM HỌC PHẦN SINH VIÊN
    Route::put('update-score-student/{id_class_subject}/{id_detail_score}', [AdminController::class, 'update_score_student']);

    //TRANG CHƯƠNG TRÌNH HỌC.....................
    Route::get('page-program-study/{id_program_train}', [AdminController::class, 'page_program_study']);

    //THÊM SINH VIÊN VÀO LỚP HỌC PHẦN CHECKBOX
    Route::get('add-student-class-subject', [AdminController::class, 'add_student_class_subject']);

    //XÓA CHƯƠNG TRÌNH HỌC
    Route::delete('delete-program-study', [AdminController::class, 'delete_program_study']);

    //THÊM CHƯƠNG TRÌNH HỌC
    Route::get('add-program-study/{id_program_train}', [AdminController::class, 'add_program_study']);

    //THÊM CHƯƠNG TRÌNH HỌC
    Route::post('post-add-program-study/{id_program_train}', [AdminController::class, 'post_add_program_study']);
    /*============================================================================*/


    /*============================================================================*/
    //RUN PYTHON
    Route::get('run-script-python/{id_student}', [AdminController::class, 'run_script_python']);

    //VIEW TABLE
    Route::get('test-demo/{id_student}', [AdminController::class, 'test_demo']);
    /*============================================================================*/
});
