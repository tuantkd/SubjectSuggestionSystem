<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //TRANG ĐĂNG NHẬP
    protected function page_login()
    {
        return view('page.login');
    }

    //TRANG CHỦ GIẢNG VIÊN
    protected function page_home_admin()
    {
        return view('index');
    }


    /*=================================================================*/
    //TRANG CHỨC VỤ
    protected function page_position()
    {
        return view('page.position.page_position');
    }

    //TRANG HỌC VỊ
    protected function page_degree()
    {
        return view('page.degree.page_degree');
    }

    //TRANG HỌC VỊ
    protected function page_title()
    {
        return view('page.title.page_title');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG QUYỀN TRUY CẬP
    protected function page_role()
    {
        return view('page.role.page_role');
    }

    //TRANG QUYỀN NGƯỜI DÙNG TRUY CẬP
    protected function page_role_user_access()
    {
        return view('page.role.page_role_user');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG KHOA
    protected function page_department()
    {
        return view('page.department.page_department');
    }

    //TRANG CHỈNH SỬA KHOA
    protected function edit_department()
    {
        return view('page.department.edit-department');
    }

    //TRANG BỘ MÔN
    protected function page_part_subject()
    {
        return view('page.department.page_part_subject');
    }

    //TRANG CHỈNH SỬA BỘ MÔN
    protected function edit_part_subject()
    {
        return view('page.department.edit_part_subject');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG DANH SÁCH QUẢN TRỊ
    protected function page_list_admin()
    {
        return view('page.teacher.list_admin');
    }

    //TRANG THÊM QUẢN TRỊ
    protected function add_admin()
    {
        return view('page.teacher.add_admin');
    }

    //TRANG DANH SÁCH GIẢNG VIÊN
    protected function page_list_teacher()
    {
        return view('page.teacher.list_teacher');
    }

    //TRANG THÔNG TIN GIẢNG VIÊN
    protected function view_infor_reacher()
    {
        return view('page.teacher.infor_teacher');
    }

    //TRANG THÊM GIẢNG VIÊN
    protected function add_teacher()
    {
        return view('page.teacher.add_teacher');
    }

    //TRANG TẠO TÀI KHOẢN
    protected function create_account()
    {
        return view('page.teacher.create_account');
    }
    /*=================================================================*/



    /*=================================================================*/
    //TRANG KHÓA HỌC
    protected function page_course()
    {
        return view('page.student.page_course');
    }

    //TRANG CHUYÊN NGÀNH
    protected function page_major()
    {
        return view('page.student.page_major');
    }

    //TRANG LỚP CHUYÊN NGÀNH
    protected function page_class_major()
    {
        return view('page.student.page_class_major');
    }

    //TRANG THÊM CHUYÊN NGÀNH
    protected function add_class_major()
    {
        return view('page.student.add_class_major');
    }

    //TRANG CHỈNH SỬA CHUYÊN NGÀNH
    protected function edit_class_major()
    {
        return view('page.student.edit_class_major');
    }

    //TRANG DANH SÁCH SINH VIÊN
    protected function page_list_student()
    {
        return view('page.student.page_list_student');
    }

    //TRANG THÊM SINH VIÊN
    protected function add_student()
    {
        return view('page.student.add_student');
    }

    //TRANG CHỈNH SỬA SINH VIÊN
    protected function edit_student()
    {
        return view('page.student.edit_student');
    }

    //TRANG THÔNG TIN SINH VIÊN
    protected function view_infor_student()
    {
        return view('page.student.view_infor_student');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG HỌC KỲ NĂM HỌC
    protected function page_semester_year()
    {
        return view('page.subject.page_semester_year');
    }

    //TRANG LOẠI HỌC PHẦN
    protected function page_category_subject()
    {
        return view('page.subject.page_category_subject');
    }
    /*=================================================================*/

}
