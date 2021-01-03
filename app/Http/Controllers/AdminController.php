<?php

namespace App\Http\Controllers;

use App\Exports\PropertyStudentExport;
use App\Models\PropertyStudent;
use App\Models\SubjectStudentStudy;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Models\CategorySubject;
use App\Models\ClassMajor;
use App\Models\ClassSubject;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Department;
use App\Models\DetailScore;
use App\Models\Major;
use App\Models\PartSubject;
use App\Models\Position;
use App\Models\PrerequisiteParallel;
use App\Models\ProgramStudy;
use App\Models\ProgramTrain;
use App\Models\Role;
use App\Models\SemesterYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectPrerequisiteParallel;
use App\Models\Teacher;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //TRANG ĐĂNG NHẬP
    protected function page_login()
    {
        if (!Auth::check()) {
            return view('page.login');
        }elseif((Auth::check() && Auth::user()->role_id == 1) || (Auth::check() && Auth::user()->role_id == 2)){
            return redirect('/');
        }else{
            return redirect('view-infor-student/'.Auth::id());
        }
    }

    //ĐĂNG XUẤT
    protected function logout()
    {
        Auth::logout();
        return redirect('page-login');
    }

    //XỬ LÝ ĐĂNG NHẬP
    protected function post_login(Request $request)
    {
        $username = $request->input('inputUsername');
        $password = $request->input('inputPassword');
        $remember_me = (!empty($request->input('remember_me')))? true : false;

        if (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 1], $remember_me)) {
            return redirect('/');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 2], $remember_me)){
            return redirect('/');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 3], $remember_me)){
            return redirect('view-infor-student/'.Auth::id());
        }else{
            $error_login_session = $request->session()->get('error_login_session');
            return redirect()->back()->with('error_login_session','');
        }
    }

    //TRANG CHỦ GIẢNG VIÊN
    protected function page_home_admin()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            $show_class_subjects = ClassSubject::latest()->take(5)->get();
        }elseif (Auth::check() && Auth::user()->role_id == 2){
            $teachers = Teacher::where('id', Auth::user()->teacher_id)->first();
            $show_class_subjects = ClassSubject::where('teacher_id',$teachers->id)->latest()->take(5)->get();
        }
        return view('index',['show_class_subjects'=>$show_class_subjects]);
    }


    /*=================================================================*/
    //TRANG CHỨC VỤ
    protected function page_position()
    {
        $show_positions = Position::latest()->paginate(10);
        return view('page.position.page_position',['show_positions'=>$show_positions]);
    }

    //XÓA CHỨC VỤ
    protected function delete_position(Request $request, $id_position)
    {
        Position::destroy($id_position);
        $delete_position_session = $request->session()->get('delete_position_session');
        return redirect()->back()->with('delete_position_session','');
    }

    //CHỈNH SỬA CHỨC VỤ
    protected function edit_position(Request $request, $id_position)
    {
        $edit_position = Position::find($id_position);
        return view('page.position.edit_position',['edit_position'=>$edit_position]);
    }

    //THÊM CHỨC VỤ CSDL
    protected function post_add_position(Request $request)
    {
        $this->validate($request,[
            'inputPositionName'=>'unique:positions,position_name'
        ],[
            'inputPositionName.unique'=>'Tên chức vụ đã tồn tại'
        ]);

        $add_position = new Position();
        $add_position->position_name = $request->input('inputPositionName');
        $add_position->position_description = $request->input('inputPositionDescription');
        $add_position->save();

        $add_position_session = $request->session()->get('add_position_session');
        return redirect()->back()->with('add_position_session','');
    }

    //CẬP NHẬT CHỨC VỤ CSDL
    protected function update_position(Request $request, $id_position)
    {
        $update_position = Position::find($id_position);
        $update_position->position_name = $request->input('inputPositionName');
        $update_position->position_description = $request->input('inputPositionDescription');
        $update_position->save();

        $update_position_session = $request->session()->get('update_position_session');
        return redirect('page-position')->with('update_position_session','');
    }

    //TRANG HỌC VỊ
    protected function page_degree()
    {
        $show_degrees = Degree::latest()->paginate(10);
        return view('page.degree.page_degree',['show_degrees'=>$show_degrees]);
    }

    //CHỈNH SỬA HỌC VỊ
    protected function edit_degree($id_degree)
    {
        $edit_degree = Degree::find($id_degree);
        return view('page.degree.edit_degree',['edit_degree'=>$edit_degree]);
    }

    //XÓA HỌC VỊ
    protected function delete_degree(Request $request, $id_degree)
    {
        Degree::destroy($id_degree);

        $delete_degree_session = $request->session()->get('delete_degree_session');
        return redirect()->back()->with('delete_degree_session','');
    }

    //THÊM HỌC VỊ CSDL
    protected function post_add_degree(Request $request)
    {
        $this->validate($request,[
            'inputDegreeName'=>'unique:degrees,degree_name'
        ],[
            'inputDegreeName.unique'=>'Tên học vị đã tồn tại'
        ]);

        $add_degree = new Degree();
        $add_degree->degree_name = $request->input('inputDegreeName');
        $add_degree->degree_description = $request->input('inputDegreeDescription');
        $add_degree->save();

        $add_degree_session = $request->session()->get('add_degree_session');
        return redirect()->back()->with('add_degree_session','');
    }

    //CẬP NHẬT HỌC VỊ CSDL
    protected function update_degree(Request $request, $id_degree)
    {
        $update_degree = Degree::find($id_degree);
        $update_degree->degree_name = $request->input('inputDegreeName');
        $update_degree->degree_description = $request->input('inputDegreeDescription');
        $update_degree->save();

        $update_degree_session = $request->session()->get('update_degree_session');
        return redirect('page-degree')->with('update_degree_session','');
    }

    //TRANG HỌC VỊ
    protected function page_title()
    {
        $show_titles = Title::latest()->paginate(10);
        return view('page.title.page_title',['show_titles'=>$show_titles]);
    }

    //CHỈNH SỬA HỌC VỊ
    protected function edit_title($id_title)
    {
        $edit_title = Title::find($id_title);
        return view('page.title.edit_title',['edit_title'=>$edit_title]);
    }

    //XÓA HỌC VỊ
    protected function delete_title(Request $request, $id_title)
    {
        Title::destroy($id_title);
        $delete_title_session = $request->session()->get('delete_title_session');
        return redirect()->back()->with('delete_title_session','');
    }

    //THÊM HỌC VỊ CSDL
    protected function post_add_title(Request $request)
    {
        $this->validate($request,[
            'inputTitleName'=>'unique:titles,title_name'
        ],[
            'inputTitleName.unique'=>'Tên chức danh đã tồn tại'
        ]);

        $add_title = new Title();
        $add_title->title_name = $request->input('inputTitleName');
        $add_title->title_description = $request->input('inputTitleDescription');
        $add_title->save();

        $add_title_session = $request->session()->get('add_title_session');
        return redirect()->back()->with('add_title_session','');
    }

    //CẬP NHẬT HỌC VỊ CSDL
    protected function update_title(Request $request, $id_title)
    {
        $add_title = Title::find($id_title);
        $add_title->title_name = $request->input('inputTitleName');
        $add_title->title_description = $request->input('inputTitleDescription');
        $add_title->save();

        $update_title_session = $request->session()->get('update_title_session');
        return redirect('page-title')->with('update_title_session','');
    }
    /*=================================================================*/



    /*=================================================================*/
    //THAY ĐỔI MẬT KHẨU
    protected function update_password(Request $request, $id_user)
    {
        $users = DB::table('users')->where('id',$id_user)->get();

        $old_pass = $request->input('inputPasswordOld');
        $new_pass = $request->input('inputPasswordNew');
        $new_pass_confirm = $request->input('inputPasswordComfirmNew');

        $change = User::find($id_user);
        foreach($users as $val_users){
            $db_pass = $val_users->password;
            if(password_verify($old_pass,$db_pass)){
                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('inputPasswordComfirmNew'));
                    $change->save();
                    $change_password_user = $request->session()->get('change_password_user');
                    return redirect()->back()->with('change_password_user','');
                }else{
                    $change_password_user_fail = $request->session()->get('change_password_user_fail');
                    return redirect()->back()->with('change_password_user_fail','');
                }
            }else{
                $old_pass_fail = $request->session()->get('old_pass_fail');
                return redirect()->back()->with('old_pass_fail','');
            }
        }
    }

    //TRANG THAY ĐỔI MẬT KHẨU
    protected function change_password($id_user)
    {
        $user= User::find($id_user);
        return view('page.profile.change_password',['user'=>$user]);
    }

    //TRANG THÔNG TIN NGƯỜI DÙNG
    protected function page_profile_user($id_teacher)
    {
        $teachers = Teacher::find($id_teacher);
        $class_subjects = ClassSubject::where('teacher_id', $id_teacher)->latest()->get();
        return view('page.profile.profile_user',['teachers'=>$teachers, 'class_subjects'=>$class_subjects]);
    }

    //CẬP NHẬT THÔNG TIN NGƯỜI DÙNG
    protected function update_profile_teacher(Request $request, $id_teacher)
    {
        $update_teacher = Teacher::find($id_teacher);
        $update_teacher->email = $request->input('inputEmail');
        $update_teacher->phone = $request->input('inputPhone');
        $update_teacher->address = $request->input('inputAddress');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('upload_avatar'), $imageName);
            $update_teacher->avatar = $imageName;
        }
        $update_teacher->save();

        $update_profile_session = $request->session()->get('update_profile_session');
        return redirect()->back()->with('update_profile_session','');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG QUYỀN TRUY CẬP
    protected function page_role()
    {
        $show_roles = Role::latest()->get();
        return view('page.role.page_role',['show_roles'=>$show_roles]);
    }

    //THÊM QUYỀN TRUY CẬP CSDL
    protected function post_add_role(Request $request)
    {
        $this->validate($request,[
            'inputRoleName'=>'unique:titles,title_name'
        ],[
            'inputRoleName.unique'=>'Tên chức danh đã tồn tại'
        ]);

        $add_role = new Role();
        $add_role->role_name = $request->input('inputRoleName');
        $add_role->position_id = $request->input('inputPositionId');
        $add_role->save();

        $add_role_session = $request->session()->get('add_role_session');
        return redirect()->back()->with('add_role_session','');
    }

    //TRANG QUYỀN NGƯỜI DÙNG TRUY CẬP
    protected function page_role_user_access()
    {
        $show_user_roles = User::latest()->paginate(10);
        return view('page.role.page_role_user',['show_user_roles'=>$show_user_roles]);
    }

    //TRANG QUYỀN NGƯỜI DÙNG TRUY CẬP
    protected function change_role($id_user)
    {
        $user_ids = User::find($id_user);
        return view('page.role.change_role',['user_ids'=>$user_ids]);
    }

    //CẬP NHẬT QUYỀN NGƯỜI DÙNG TRUY CẬP
    protected function update_change_role(Request $request, $id_user)
    {
        $update = User::find($id_user);
        $update->role_id = $request->input('inputRoleId');
        $update->save();

        $update_change_role_session = $request->session()->get('update_change_role_session');
        return redirect('page-role-user-access')->with('update_change_role_session','');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG KHOA
    protected function page_department()
    {
        $show_departments = Department::latest()->paginate(5);
        return view('page.department.page_department',['show_departments'=>$show_departments]);
    }

    //XÓA KHOA
    protected function delete_department(Request $request, $id_department)
    {
        Department::destroy($id_department);
        $delete_department_session = $request->session()->get('delete_department_session');
        return redirect()->back()->with('delete_department_session','');
    }

    //THÊM KHOA KHOA
    protected function post_add_department(Request $request)
    {
        $this->validate($request,[
            'inputDepartmentName'=>'unique:departments,department_name'
        ],[
            'inputDepartmentName.unique'=>'Tên khoa đã tồn tại'
        ]);

        $add_department = new Department();
        $add_department->department_name = $request->input('inputDepartmentName');
        $add_department->department_description = $request->input('inputDepartmentDescription');
        $add_department->save();

        $add_department_session = $request->session()->get('add_department_session');
        return redirect()->back()->with('add_department_session','');
    }

    //TRANG CHỈNH SỬA KHOA
    protected function edit_department($id_department)
    {
        $edit_departments = Department::find($id_department);
        return view('page.department.edit-department',['edit_departments'=>$edit_departments]);
    }

    //CẬP NHẬT KHOA
    protected function update_department(Request $request, $id_department)
    {
        $update_department = Department::find($id_department);
        $update_department->department_name = $request->input('inputDepartmentName');
        $update_department->department_description = $request->input('inputDepartmentDescription');
        $update_department->save();

        $update_department_session = $request->session()->get('update_department_session');
        return redirect('page-department')->with('update_department_session','');
    }

    //TRANG BỘ MÔN
    protected function page_part_subject()
    {
        $show_part_subjects = PartSubject::latest()->paginate(5);
        return view('page.department.page_part_subject',['show_part_subjects'=>$show_part_subjects]);
    }

    //XÓA BỘ MÔN
    protected function delete_part_subject(Request $request, $id_part_subject)
    {
        PartSubject::destroy($id_part_subject);
        $delete_part_subject_session = $request->session()->get('delete_part_subject_session');
        return redirect()->back()->with('delete_part_subject_session','');
    }

    //THÊM BỘ MÔN
    protected function post_add_part_subject(Request $request)
    {
        $this->validate($request,[
            'inputPartSubjectName'=>'unique:part_subjects,part_subject_name'
        ],[
            'inputPartSubjectName.unique'=>'Tên Bộ môn đã tồn tại'
        ]);

        $add_part_subject = new PartSubject();
        $add_part_subject->department_id = $request->input('inputDepartmentId');
        $add_part_subject->part_subject_name = $request->input('inputPartSubjectName');
        $add_part_subject->part_subject_description = $request->input('inputPartSubjectDescription');
        $add_part_subject->save();

        $add_part_subject_session = $request->session()->get('add_part_subject_session');
        return redirect()->back()->with('add_part_subject_session','');
    }

    //CẬP NHẬT BỘ MÔN
    protected function update_part_subject(Request $request, $id_department)
    {
        $update_part_subject = PartSubject::find($id_department);
        $update_part_subject->department_id = $request->input('inputDepartmentId');
        $update_part_subject->part_subject_name = $request->input('inputPartSubjectName');
        $update_part_subject->part_subject_description = $request->input('inputPartSubjectDescription');
        $update_part_subject->save();

        $update_part_subject_session = $request->session()->get('update_part_subject_session');
        return redirect('page-part-subject')->with('update_part_subject_session','');
    }

    //TRANG CHỈNH SỬA BỘ MÔN
    protected function edit_part_subject($id_department)
    {
        $edit_part_subjects = PartSubject::find($id_department);
        return view('page.department.edit_part_subject',['edit_part_subjects'=>$edit_part_subjects]);
    }

    //TRANG CHUYÊN NGÀNH
    protected function page_major()
    {
        $show_majors = Major::latest()->paginate(10);
        return view('page.student.page_major',['show_majors'=>$show_majors]);
    }

    //XÓA CHUYÊN NGÀNH
    protected function delete_major(Request $request, $id_major)
    {
        Major::destroy($id_major);
        $delete_major_session = $request->session()->get('delete_major_session');
        return redirect()->back()->with('delete_major_session','');
    }

    //CHỈNH SỬA CHUYÊN NGÀNH
    protected function edit_major($id_major)
    {
        $edit_major = Major::find($id_major);
        return view('page.student.edit_major',['edit_major'=>$edit_major]);
    }

    //CẬP NHẬT CHUYÊN NGÀNH CSDL
    protected function update_major(Request $request, $id_major)
    {
        $update_major = Major::find($id_major);
        $update_major->part_subject_id = $request->input('inputPartSubjectId');
        $update_major->major_name = $request->input('inputMajorName');
        $update_major->major_note = $request->input('inputMajorNote');
        $update_major->save();

        $update_major_session = $request->session()->get('update_major_session');
        return redirect('page-major')->with('update_major_session','');
    }

    //THÊM CHUYÊN NGÀNH CSDL
    protected function post_add_major(Request $request)
    {
        $this->validate($request,[
            'inputMajorName'=>'unique:majors,major_name'
        ],[
            'inputMajorName.unique'=>'Tên chuyên ngành đã tồn tại'
        ]);
        $add_major = new Major();
        $add_major->part_subject_id = $request->input('inputPartSubjectId');
        $add_major->major_name = $request->input('inputMajorName');
        $add_major->major_note = $request->input('inputMajorNote');
        $add_major->save();

        $add_major_session = $request->session()->get('add_major_session');
        return redirect()->back()->with('add_major_session','');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG DANH SÁCH QUẢN TRỊ
    protected function page_list_admin()
    {
        $show_admins = DB::table('teachers')
            ->join('users', 'teachers.id', '=', 'users.teacher_id')
            ->select('teachers.*', 'users.username')
            ->where('users.role_id', '=', 1)
            ->paginate(5);
        return view('page.teacher.list_admin',['show_admins'=>$show_admins]);
    }

    //TRANG THÊM QUẢN TRỊ
    protected function add_admin()
    {
        return view('page.teacher.add_admin');
    }

    //TRANG THÊM QUẢN TRỊ CSDL
    protected function post_add_admin(Request $request)
    {
        $this->validate($request,[
            'inputFullname'=>'unique:teachers,fullname',
            'inputEmail'=>'unique:teachers,email',
        ],[
            'inputFullname.unique'=>'Họ tên đã tồn tại',
            'inputEmail.unique'=>'Email đã tồn tại',
        ]);

        $add_admin = new Teacher();
        /*$add_admin->title_id = $request->input('inputTitleId');
        $add_admin->degree_id = $request->input('inputDegreeId');*/
        $add_admin->position_id = $request->input('inputPositionId');
        $add_admin->fullname = $request->input('inputFullname');
        $add_admin->birthday = $request->input('inputBirthday');
        $add_admin->sex = $request->input('inputSex');
        $add_admin->phone = $request->input('inputPhone');
        $add_admin->email = $request->input('inputEmail');
        $add_admin->address = $request->input('inputAddress');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('upload_avatar'), $imageName);
            $add_admin->avatar = $imageName;
        }
        $add_admin->save();

        //Tiếp tục
        $get_max_id_admin = DB::table('teachers')->max('id');

        return redirect('create-account/'.$get_max_id_admin);
    }

    //TRANG DANH SÁCH GIẢNG VIÊN
    protected function page_list_teacher(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_teachers = Teacher::where(function ($query) use ($search){
                $query->where('fullname','like', '%'.$search.'%');
            })->paginate(2);
            $show_teachers->appends(['inputSearch' => $search]);
        }
        else{
            $show_teachers = DB::table('teachers')
                ->join('users', 'teachers.id', '=', 'users.teacher_id')
                ->select('teachers.*', 'users.username')
                ->where('users.role_id', '=', 2)
                ->paginate(10);
        }
        return view('page.teacher.list_teacher',['show_teachers'=>$show_teachers]);
    }

    //TRANG THÔNG TIN GIẢNG VIÊN
    protected function view_infor_reacher($id_teacher)
    {
        $infor_teachers = Teacher::find($id_teacher);
        $class_subjects = ClassSubject::where('teacher_id', $id_teacher)->latest()->get();
        return view('page.teacher.infor_teacher',['infor_teachers'=>$infor_teachers, 'class_subjects'=>$class_subjects]);
    }

    //TRANG THÊM GIẢNG VIÊN
    protected function add_teacher()
    {
        return view('page.teacher.add_teacher');
    }

    //XÓA GIẢNG VIÊN
    protected function delete_teacher(Request $request, $id_teacher)
    {
        $delete_teacher = Teacher::findOrFail($id_teacher);
        if (!(empty($delete_teacher->avatar))){
            unlink(public_path('upload_avatar/').$delete_teacher->avatar);
        }
        $delete_teacher->delete();

        $delete_teacher_session = $request->session()->get('delete_teacher_session');
        return redirect()->back()->with('delete_teacher_session','');
    }

    //TRANG THÊM GIẢNG VIÊN CSDL
    protected function post_add_teacher(Request $request)
    {
        $this->validate($request,[
            'inputFullname'=>'unique:teachers,fullname',
            'inputEmail'=>'unique:teachers,email',
        ],[
            'inputFullname.unique'=>'Họ tên đã tồn tại',
            'inputEmail.unique'=>'Email đã tồn tại',
        ]);

        $add_teacher = new Teacher();
        $add_teacher->part_subject_id = $request->input('inputPartSubjectId');
        $add_teacher->title_id = $request->input('inputTitleId');
        $add_teacher->degree_id = $request->input('inputDegreeId');
        $add_teacher->position_id = $request->input('inputPositionId');
        $add_teacher->fullname = $request->input('inputFullname');
        $add_teacher->birthday = $request->input('inputBirthday');
        $add_teacher->sex = $request->input('inputSex');
        $add_teacher->phone = $request->input('inputPhone');
        $add_teacher->email = $request->input('inputEmail');
        $add_teacher->address = $request->input('inputAddress');

        //Upload hình ảnh
        if ($request->hasFile('inputFileImage')) {
            $file_image = $request->file('inputFileImage');
            $imageName = time().'-'.$file_image->getClientOriginalName();
            $file_image->move(public_path('upload_avatar'), $imageName);
            $add_teacher->avatar = $imageName;
        }
        $add_teacher->save();

        //Tiếp tục
        $get_max_id_teacher = DB::table('teachers')->max('id');

        return redirect('create-account/'.$get_max_id_teacher);

    }

    //TRANG TẠO TÀI KHOẢN
    protected function create_account($id)
    {
        $account = Teacher::find($id);
        return view('page.teacher.create_account',['account'=>$account]);
    }

    //TRANG TẠO TÀI KHOẢN
    protected function post_create_account_student(Request $request, $id_student)
    {
        $create_account_student = new User();
        $create_account_student->student_id = $id_student;
        $create_account_student->username = $request->input('inputUsername');
        $create_account_student->username = $request->input('inputUsername');
        $create_account_student->password = bcrypt($request->input('inputPassword'));
        $create_account_student->role_id = 3;
        $create_account_student->save();

        $mes_success = $request->session()->get('mes_success');
        return redirect('page-list-student')->with('mes_success','');
    }

    //TRANG TẠO TÀI KHOẢN CSDL
    protected function post_create_account(Request $request, $id)
    {
        $create_account = new User();
        $create_account->teacher_id = $id;
        $create_account->role_id = $request->input('inputRoleId');
        $create_account->username = $request->input('inputUsername');
        $create_account->password = bcrypt($request->input('inputPassword'));
        $create_account->save();

        return redirect()->back();
    }
    /*=================================================================*/



    /*=================================================================*/
    //TRANG KHÓA HỌC
    protected function page_course()
    {
        $show_courses = Course::latest()->paginate(10);
        return view('page.student.page_course',['show_courses'=>$show_courses]);
    }

    //CHỈNH SỬA KHÓA HỌC
    protected function edit_course($id_course)
    {
        $edit_course = Course::find($id_course);
        return view('page.student.edit_course',['edit_course'=>$edit_course]);
    }

    //TRANG KHÓA HỌC
    protected function delete_course(Request $request, $id_course)
    {
        Course::destroy($id_course);
        $delete_course_session = $request->session()->get('delete_course_session');
        return redirect()->back()->with('delete_course_session','');
    }

    //THÊM KHÓA HỌC CSDL
    protected function post_add_page_course(Request $request)
    {
        $this->validate($request,[
            'inputCourseName'=>'unique:courses,course_name'
        ],[
            'inputCourseName.unique'=>'Khóa học đã tồn tại'
        ]);

        $add_course = new Course();
        $add_course->course_name = $request->input('inputCourseName');
        $add_course->course_note = $request->input('inputCourseNote');
        $add_course->save();

        $add_course_session = $request->session()->get('add_course_session');
        return redirect()->back()->with('add_course_session','');
    }

    //CẬP NHẬT KHÓA HỌC CSDL
    protected function update_course(Request $request, $id_course)
    {
        $update_course = Course::find($id_course);
        $update_course->course_name = $request->input('inputCourseName');
        $update_course->course_note = $request->input('inputCourseNote');
        $update_course->save();

        $update_course_session = $request->session()->get('update_course_session');
        return redirect('page-course')->with('update_course_session','');
    }


    //TRANG LỚP CHUYÊN NGÀNH
    protected function page_class_major()
    {
        $show_class_majors = ClassMajor::latest()->paginate(10);
        return view('page.student.page_class_major',['show_class_majors'=>$show_class_majors]);
    }

    //XÓA LỚP CHUYÊN NGÀNH
    protected function delete_class_major(Request $request, $id_class_major)
    {
        ClassMajor::destroy($id_class_major);
        $delete_class_major_session = $request->session()->get('delete_class_major_session');
        return redirect()->back()->with('delete_class_major_session','');
    }

    //TRANG THÊM LỚP CHUYÊN NGÀNH
    protected function add_class_major()
    {
        return view('page.student.add_class_major');
    }

    //TRANG THÊM LỚP CHUYÊN NGÀNH CSDL
    protected function post_add_class_major(Request $request)
    {
        $this->validate($request,[
            'inputClassMajorCode'=>'unique:class_majors,class_major_code'
        ],[
            'inputClassMajorCode.unique'=>'Mã lớp đã tồn tại'
        ]);

        $add_class_major = new ClassMajor();
        $add_class_major->major_id = $request->input('inputMajorId');
        $add_class_major->course_id = $request->input('inputCourseId');
        $add_class_major->class_major_code = $request->input('inputClassMajorCode');
        $add_class_major->class_major_name = $request->input('inputClassMajorName');
        $add_class_major->class_major_total_number = $request->input('inputTotalNumber');
        $add_class_major->save();

        $add_class_major_session = $request->session()->get('add_class_major_session');
        return redirect('page-class-major')->with('add_class_major_session','');
    }

    //CẬP NHẬT LỚP CHUYÊN NGÀNH CSDL
    protected function update_class_major(Request $request, $id_class_major)
    {
        $update_class_major = ClassMajor::find($id_class_major);
        $update_class_major->major_id = $request->input('inputMajorId');
        $update_class_major->course_id = $request->input('inputCourseId');
        $update_class_major->class_major_name = $request->input('inputClassMajorName');
        $update_class_major->class_major_total_number = $request->input('inputTotalNumber');
        $update_class_major->save();

        $update_class_major_session = $request->session()->get('update_class_major_session');
        return redirect('page-class-major')->with('update_class_major_session','');
    }

    //TRANG CHỈNH SỬA LỚP CHUYÊN NGÀNH
    protected function edit_class_major($id_class_major)
    {
        $edit_class_major = ClassMajor::find($id_class_major);
        return view('page.student.edit_class_major',['edit_class_major'=>$edit_class_major]);
    }

    //TRANG XEM LỚP CHUYÊN NGÀNH
    protected function view_class_major(Request $request, $id_class_major)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_student_classes = Student::where(function ($query) use ($search){
                $query->where('student_code','like', '%'.$search.'%')
                    ->orWhere('student_fullname', 'like', '%'.$search.'%');
            })->paginate(2);
        }else{
            $show_student_classes = Student::where('class_major_id', $id_class_major)->latest()->paginate(20);
        }
        $class_majors = ClassMajor::find($id_class_major);
        return view('page.student.view_class_major',['class_majors'=>$class_majors,'show_student_classes'=>$show_student_classes]);
    }

    //NHẬP FILE EXCEL SINH VIÊN
    protected function import_file_excel(Request $request, $id_class_major)
    {
        $this->validate($request, [
            'inputFileExcel'  => 'mimes:xls,xlsx,csv'
        ],[
            'inputFileExcel.mimes' => 'Bắt buộc file có phần mở rộng: xls, xlsx, csv'
        ]);

        $objPHPExcel = \PHPExcel_IOFactory::load($request->file('inputFileExcel')); // load file ra object PHPExcel
        $provinceSheet = $objPHPExcel->setActiveSheetIndex(0); // Set sheet sẽ được đọc dữ liệu
        $highestRow    = $provinceSheet->getHighestRow(); // Lấy số row lớn nhất trong sheet
        for ($row = 2; $row <= $highestRow; $row++) { // For chạy từ 2 vì row 1 là title
            Student::create([
                'student_code' => $provinceSheet->getCellByColumnAndRow(0, $row)->getValue(), // lấy dữ liệu từng ô theo col và row
                'student_fullname' => $provinceSheet->getCellByColumnAndRow(1, $row)->getValue(),
                'student_birthday' => $provinceSheet->getCellByColumnAndRow(2, $row)->getValue(),
                'student_phone' => $provinceSheet->getCellByColumnAndRow(3, $row)->getValue(),
                'student_sex' => $provinceSheet->getCellByColumnAndRow(4, $row)->getValue(),
                'student_address' => $provinceSheet->getCellByColumnAndRow(5, $row)->getValue(),
                'student_email' => $provinceSheet->getCellByColumnAndRow(6, $row)->getValue(),
                'class_major_id' => $id_class_major
            ]);
        }

        $import_file_excel_session = $request->session()->get('import_file_excel_session');
        return redirect('view-class-major/'.$id_class_major)->with('import_file_excel_session','');
    }

    //THÊM SINH VIÊN TRONG LỚP HỌC
    public function post_add_student_to_class_major(Request $request, $id_class_major)
    {
        $this->validate($request, [
            'inputStudentCode'  => 'unique:students,student_code'
        ],[
            'inputStudentCode.unique' => 'Mã số Sinh viên đã tồn tại !'
        ]);

        $add_student_class = new Student();
        $add_student_class->class_major_id = $id_class_major;
        $add_student_class->student_code = $request->input('inputStudentCode');
        $add_student_class->student_fullname = $request->input('inputStudentFullName');
        $add_student_class->student_birthday = $request->input('inputStudentBirthday');
        $add_student_class->student_sex = $request->input('inputStudentSex');
        $add_student_class->student_phone = $request->input('inputStudentPhone');
        $add_student_class->student_email = $request->input('inputStudentEmail');
        $add_student_class->student_address = $request->input('inputStudentAddress');
        $add_student_class->save();

        $add_student_to_class_major = $request->session()->get('add_student_to_class_major');
        return redirect()->back()->with('add_student_to_class_major','');
    }

    //XÓA SINH VIÊN TRONG LỚP HỌC
    public function delete_check_all_student_class(Request $request)
    {
        $ids = $request->ids;
        DB::table('students')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Đã Xóa sinh viên trong lớp"]);
    }


    //XÓA SINH VIÊN
    public function delete_student(Request $request)
    {
        $ids = $request->ids;
        DB::table('students')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Đã Xóa sinh viên"]);
    }

    //TRANG DANH SÁCH SINH VIÊN
    protected function page_list_student(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_students = Student::where(function ($query) use ($search){
                $query->where('student_code','like', '%'.$search.'%')
                    ->orWhere('student_fullname', 'like', '%'.$search.'%');
            })->paginate(2);
        }else{
            $show_students = Student::latest()->paginate(40);
        }

        return view('page.student.page_list_student',['show_students'=>$show_students]);
    }

    //NHẬP EXCEL VÀO DANH SÁCH SINH VIÊN
    protected function import_excel_to_list_student(Request $request)
    {
        $this->validate($request, [
            'inputFileExcel'  => 'mimes:xls,xlsx,csv'
        ],[
            'inputFileExcel.mimes' => 'Bắt buộc file có phần mở rộng: xls, xlsx, csv'
        ]);

        // load file ra object PHPExcel
        $objPHPExcel = \PHPExcel_IOFactory::load($request->file('inputFileExcel'));
        // Set sheet sẽ được đọc dữ liệu
        $provinceSheet = $objPHPExcel->setActiveSheetIndex(0);
        // Lấy số row lớn nhất trong sheet
        $highestRow    = $provinceSheet->getHighestRow();
        // For chạy từ 2 vì row 1 là title
        for ($row = 2; $row <= $highestRow; $row++) {
            $student_code_excel = $provinceSheet->getCellByColumnAndRow(0, $row)->getValue();
            $count_student_code = DB::table('students')->where('student_code',$student_code_excel)->count();
            if ($count_student_code >= 1) {
                $message_error_excel = $request->session()->get('message_error_excel');
                return redirect()->back()->with('message_error_excel','');
            }else {
                // lấy dữ liệu từng ô theo col và row
                Student::create([
                    'student_code' => $provinceSheet->getCellByColumnAndRow(0, $row)->getValue(),
                    'student_fullname' => $provinceSheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'student_birthday' => $provinceSheet->getCellByColumnAndRow(2, $row)->getValue(),
                    'student_phone' => $provinceSheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'student_sex' => $provinceSheet->getCellByColumnAndRow(4, $row)->getValue(),
                    'student_address' => $provinceSheet->getCellByColumnAndRow(5, $row)->getValue(),
                    'student_email' => $provinceSheet->getCellByColumnAndRow(6, $row)->getValue(),
                    'class_major_id' => $request->input('inputClassMajorId')
                ]);
            }
        }

        $import_file_excel_list_student = $request->session()->get('import_file_excel_list_student');
        return redirect()->back()->with('import_file_excel_list_student','');
    }

    //TRANG THÊM SINH VIÊN
    protected function add_student()
    {
        return view('page.student.add_student');
    }

    //TRANG THÊM SINH VIÊN CSDL
    protected function post_add_student(Request $request)
    {
        $this->validate($request, [
            'inputStudentCode'  => 'unique:students,student_code'
        ],[
            'inputStudentCode.unique' => 'Mã số Sinh viên đã tồn tại !'
        ]);

        $add_student = new Student();
        $add_student->class_major_id = $request->input('inputClassMajorId');
        $add_student->student_code = $request->input('inputStudentCode');
        $add_student->student_fullname = $request->input('inputStudentFullName');
        $add_student->student_birthday = $request->input('inputStudentBirthday');
        $add_student->student_sex = $request->input('inputStudentSex');
        $add_student->student_phone = $request->input('inputStudentPhone');
        $add_student->student_email = $request->input('inputStudentEmail');
        $add_student->student_address = $request->input('inputStudentAddress');
        $add_student->save();

        $add_student_session = $request->session()->get('add_student_session');
        return redirect('page-list-student')->with('add_student_session','');
    }

    //TRANG THÊM SINH VIÊN CSDL
    protected function update_student(Request $request, $id_student)
    {
        $update_student = Student::find($id_student);
        $update_student->student_birthday = $request->input('inputStudentBirthday');
        $update_student->student_sex = $request->input('inputStudentSex');
        $update_student->student_phone = $request->input('inputStudentPhone');
        $update_student->student_email = $request->input('inputStudentEmail');
        $update_student->student_address = $request->input('inputStudentAddress');
        $update_student->save();

        $update_student_session = $request->session()->get('update_student_session');
        return redirect('page-list-student')->with('update_student_session','');
    }

    //TRANG CHỈNH SỬA SINH VIÊN
    protected function edit_student($id_student)
    {
        $edit_student = Student::find($id_student);
        return view('page.student.edit_student',['edit_student'=>$edit_student]);
    }

    //TRANG THÔNG TIN SINH VIÊN
    protected function view_infor_student(Request $request, $id_student)
    {
        $search = $request->input('inputSearchSemesterYear');

        if ($search != "") {

            if ((Auth::user()->role_id == 1) || (Auth::user()->role_id == 2)) {
                $infor_students = Student::find($id_student);
                $semester_year_class_subs = DB::table('semester_years')->where('id','=',$search)->latest()->get();
            }else{
                $user = User::where('id', Auth::id())->first();
                $infor_students = Student::where('id',$user->student_id)->first();
                $semester_year_class_subs = DB::table('semester_years')->where('id','=',$search)->latest()->get();
            }

        }else{

            if ((Auth::user()->role_id == 1) || (Auth::user()->role_id == 2)) {
                $infor_students = Student::find($id_student);
                $score = DB::table('detail_scores')->where('student_id', $id_student)->latest()->get();
                foreach ($score as $score_value){
                    $class_subjects = DB::table('class_subjects')->where('id', $score_value->class_subject_id)->latest()->get();
                    foreach ($class_subjects as $class_subject_value){
                        $semester_year_class_subs = DB::table('semester_years')->where('id',$class_subject_value->semester_year_id)->latest()->get();
                    }
                }
            }else{
                $user = User::where('id', Auth::id())->first();
                $infor_students = Student::where('id',$user->student_id)->first();

                $score = DB::table('detail_scores')->where('student_id', $infor_students->id)->latest()->get();
                foreach ($score as $score_value){
                    $class_subjects = DB::table('class_subjects')->where('id', $score_value->class_subject_id)->latest()->get();
                    foreach ($class_subjects as $class_subject_value){
                        $semester_year_class_subs = DB::table('semester_years')->where('id',$class_subject_value->semester_year_id)->latest()->get();
                    }
                }
            }

        }

        return view('page.student.view_infor_student',
        [
            'infor_students'=>$infor_students,
            'semester_year_class_subs'=>$semester_year_class_subs
        ]);
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG CHƯƠNG TRÌNH ĐÀO TẠO
    protected function page_program_train()
    {
        $show_program_trains = ProgramTrain::latest()->paginate(10);
        return view('page.program_train.page_program_train',['show_program_trains'=>$show_program_trains]);
    }

    //CHỈNH SỬA SỬA CHƯƠNG TRÌNH ĐÀO TẠO
    protected function page_edit_program_train($id_program_train)
    {
        $edit_program_train = ProgramTrain::find($id_program_train);
        return view('page.program_train.page_edit_program_train',['edit_program_train'=>$edit_program_train]);
    }

    //XÓA CHƯƠNG TRÌNH ĐÀO TẠO
    protected function delete_program_train(Request $request, $id_program_train)
    {
        ProgramTrain::destroy($id_program_train);
        $delete_program_train_session = $request->session()->get('delete_program_train_session');
        return redirect()->back()->with('delete_program_train_session','');
    }

    //THÊM CHƯƠNG TRÌNH ĐÀO TẠO
    protected function post_add_program_train(Request $request)
    {
        $this->validate($request, [
            'inputProgramCourseId'  => 'unique:program_trains,course_id'
        ],[
            'inputProgramCourseId.unique' => 'Chương trình đào tạo đã tồn tại!'
        ]);

        $add_program_train = new ProgramTrain();
        $add_program_train->course_id = $request->input('inputProgramCourseId');
        $add_program_train->major_id = $request->input('inputMajorId');
        $add_program_train->program_train_name = $request->input('inputProgramName');
        $add_program_train->program_train_date_begin = $request->input('inputProgramDateBegin');
        $add_program_train->save();

        $add_program_train_session = $request->session()->get('add_program_train_session');
        return redirect()->back()->with('add_program_train_session','');
    }

    //CẬP NHẬT CHƯƠNG TRÌNH ĐÀO TẠO
    protected function update_program_train(Request $request, $id_program_train)
    {
        $update_program_train = ProgramTrain::find($id_program_train);
        $update_program_train->course_id = $request->input('inputProgramCourseId');
        $update_program_train->major_id = $request->input('inputMajorId');
        $update_program_train->program_train_name = $request->input('inputProgramName');
        $update_program_train->program_train_date_begin = $request->input('inputProgramDateBegin');
        $update_program_train->save();

        $update_program_train_session = $request->session()->get('update_program_train_session');
        return redirect('page-program-train')->with('update_program_train_session','');
    }
    /*=================================================================*/


    /*=================================================================*/
    //TRANG HỌC KỲ NĂM HỌC
    protected function page_semester_year()
    {
        $show_semester_years = SemesterYear::latest()->paginate(5);
        return view('page.subject.page_semester_year',['show_semester_years'=>$show_semester_years]);
    }

    //CHỈNH SỬA HỌC KỲ NĂM HỌC
    protected function edit_semester_year($id_semester_year)
    {
        $edit_semester_year = SemesterYear::find($id_semester_year);
        return view('page.subject.edit_semester_year',['edit_semester_year'=>$edit_semester_year]);
    }

    //XÓA HỌC KỲ NĂM HỌC
    protected function delete_semester_year(Request $request, $id_semester_year)
    {
        SemesterYear::destroy($id_semester_year);
        $delete_semester_year_session = $request->session()->get('delete_semester_year_session');
        return redirect()->back()->with('delete_semester_year_session','');
    }

    //THÊM HỌC KỲ NĂM HỌC
    protected function post_add_semester_year(Request $request)
    {
        $semester = $request->input('inputSemester');
        $semester_year = $request->input('inputYearStudy');

        //Tách năm học
        $semesteryear = explode(" - ", $semester_year);

        //Năm học ký tự đầu mảng thứ 0
        $year = $semesteryear[0];

        //Học kỳ nối năm học ký tự đầu
        $se_year = $semester.$year;

        $count_semester_year  = DB::table('semester_years')->where('semesteryear',$se_year)->count();
        if ($count_semester_year >= 1) {
            $message_error = $request->session()->get('message_error');
            return redirect()->back()->with('message_error','');
        }else{
            $add_semester_year = new SemesterYear();
            $add_semester_year->semester_year = $semester_year;
            $add_semester_year->semesteryear = $se_year;
            $add_semester_year->date_begin = $request->input('inputDateBegin');
            $add_semester_year->date_end = $request->input('inputDateEnd');
            $add_semester_year->save();

            $add_semester_year_session = $request->session()->get('add_semester_year_session');
            return redirect()->back()->with('add_semester_year_session','');
        }
    }

    //CẬP NHẬT HỌC KỲ NĂM HỌC
    protected function update_semester_year(Request $request, $id_semester_year)
    {
        $semester = $request->input('inputSemester');
        $semester_year = $request->input('inputYearStudy');

        //Tách năm học
        $semesteryear = explode(" - ", $semester_year);

        //Năm học ký tự đầu mảng thứ 0
        $year = $semesteryear[0];

        //Học kỳ nối năm học ký tự đầu
        $se_year = $semester.$year;

        $update_semester_year = SemesterYear::find($id_semester_year);
        $update_semester_year->semester_year = $semester_year;
        $update_semester_year->semesteryear = $se_year;
        $update_semester_year->date_begin = $request->input('inputDateBegin');
        $update_semester_year->date_end = $request->input('inputDateEnd');
        $update_semester_year->save();

        $update_semester_year_session = $request->session()->get('update_semester_year_session');
        return redirect('page-semester-year')->with('update_semester_year_session','');
    }

    //TRANG LOẠI HỌC PHẦN
    protected function page_category_subject()
    {
        $show_category_subjects = CategorySubject::latest()->paginate(5);
        return view('page.subject.page_category_subject',['show_category_subjects'=>$show_category_subjects]);
    }

    //XÓA LOẠI HỌC PHẦN
    protected function delete_category_subject(Request $request, $id_category_subject)
    {
        CategorySubject::destroy($id_category_subject);

        $delete_category_subjectsession = $request->session()->get('delete_category_subjectsession');
        return redirect()->back()->with('delete_category_subjectsession','');
    }

    //THÊM LOẠI HỌC PHẦN CSDL
    protected function post_add_category_subject(Request $request)
    {
        $this->validate($request, [
            'inputCategoryName'  => 'unique:category_subjects,category_subject_name'
        ],[
            'inputCategoryName.unique' => 'Tên loại học phần đã tồn tại!'
        ]);

        $add_category_subject = new CategorySubject();
        $add_category_subject->category_subject_name = $request->input('inputCategoryName');
        $add_category_subject->category_subject_note = $request->input('inputCategoryNote');
        $add_category_subject->save();

        $add_category_subject_session = $request->session()->get('add_category_subject_session');
        return redirect()->back()->with('add_category_subject_session','');
    }

    //CẬP NHẬT LOẠI HỌC PHẦN CSDL
    protected function update_subject(Request $request, $id_subject)
    {
        $update_subject = Subject::find($id_subject);
        $update_subject->subject_name = $request->input('inputSubjectName');
        $update_subject->subject_number_credit = $request->input('inputSubjectCredit');
        $update_subject->subject_number_theory = $request->input('inputSubjectNumberTheory');
        $update_subject->subject_number_practice = $request->input('inputSubjectNumberPractice');
        $update_subject->save();

        $update_subject_session = $request->session()->get('update_subject_session');
        return redirect('page-subject')->with('update_subject_session','');
    }

    //TRANG HỌC PHẦN
    protected function page_subject(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_subjects = Subject::where(function ($query) use ($search){
                $query->where('subject_code','like', '%'.$search.'%')
                    ->orWhere('subject_name', 'like', '%'.$search.'%');
            })->paginate(2);
        }else{
            $show_subjects = Subject::latest()->paginate(40);
        }
        return view('page.subject.page_subject',['show_subjects'=>$show_subjects]);
    }

    //CHỈNH SỬA HỌC PHẦN
    protected function edit_subject(Request $request, $id_subject)
    {
        $edit_subject = Subject::find($id_subject);
        return view('page.subject.edit_subject',['edit_subject'=>$edit_subject]);
    }

    //THÊM TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN
    protected function add_prerequisite_parallel(Request $request, $id_subject)
    {
        $subject_id = Subject::find($id_subject);
        return view('page.subject.add_prerequisite_parallel',['subject_id'=>$subject_id]);
    }

    //XÓA TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN
    protected function delete_subject_prerequisite_parallel(Request $request, $id)
    {
        SubjectPrerequisiteParallel::destroy($id);
        $delete_session = $request->session()->get('delete_session');
        return redirect()->back()->with('delete_session','');
    }

    //THÊM TIÊN QUYẾT HOẶC SONG HÀNH HỌC PHẦN CSDL
    protected function post_add_prerequisite_parallel(Request $request, $id_subject)
    {
        //Run one
        $add_prerequisite_parallel = new PrerequisiteParallel();
        $add_prerequisite_parallel->subject_code = $request->input('inputSubjectCode');
        $add_prerequisite_parallel->prerequisite_parallel_note = $request->input('inputNote');
        $add_prerequisite_parallel->save();

        //Run two
        $max_id_prerequisite_parallel = DB::table('prerequisite_parallels')->max('id');

        //Run three
        $add_sub_pre_para = new SubjectPrerequisiteParallel();
        $add_sub_pre_para->subject_id = $id_subject;
        $add_sub_pre_para->prerequisite_parallel_id = $max_id_prerequisite_parallel;
        $add_sub_pre_para->save();

        $add_session = $request->session()->get('add_session');
        return redirect()->back()->with('add_session','');
    }

    //THÊM HỌC PHẦN CSDL
    protected function post_add_subject(Request $request)
    {
        $this->validate($request, [
            'inputSubjectCode'  => 'unique:subjects,subject_code'
        ],[
            'inputSubjectCode.unique' => 'Mã Học Phần này đã tồn tại!'
        ]);

        $add_subject = new Subject();
        $add_subject->subject_code = $request->input('inputSubjectCode');
        $add_subject->subject_name = $request->input('inputSubjectName');
        $add_subject->subject_number_credit = $request->input('inputSubjectCredit');
        $add_subject->subject_number_theory = $request->input('inputSubjectNumberTheory');
        $add_subject->subject_number_practice = $request->input('inputSubjectNumberPractice');
        $add_subject->subject_status = 0;
        $add_subject->save();

        $add_subject_session = $request->session()->get('add_subject_session');
        return redirect()->back()->with('add_subject_session','');
    }

    //XÓA HỌC PHẦN
    protected function delete_subject(Request $request)
    {
        $ids = $request->ids;
        DB::table('subjects')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Đã Xóa sinh viên"]);
    }

    //NHẬP FILE EXCEL VÀO HỌC PHẦN
    protected function import_excel_to_subject(Request $request)
    {
        $this->validate($request, [
            'inputFileExcel'  => 'mimes:xls,xlsx,csv'
        ],[
            'inputFileExcel.mimes' => 'Bắt buộc file có phần mở rộng: xls, xlsx, csv'
        ]);

        // load file ra object PHPExcel
        $objPHPExcel = \PHPExcel_IOFactory::load($request->file('inputFileExcel'));

        // Set sheet sẽ được đọc dữ liệu
        $provinceSheet = $objPHPExcel->setActiveSheetIndex(0);

        // Lấy số row lớn nhất trong sheet
        $highestRow    = $provinceSheet->getHighestRow();

        // For chạy từ 2 vì row 1 là title
        for ($row = 2; $row <= $highestRow; $row++) {

            //Lấy mã học phần trong hàng đầu tiên
            $subject_code_excel = $provinceSheet->getCellByColumnAndRow(0, $row)->getValue();
            $count_subject_code = DB::table('subjects')->where('subject_code',$subject_code_excel)->count();

            if ($count_subject_code >= 1) {
                $message_error_excel = $request->session()->get('message_error_excel');
                return redirect()->back()->with('message_error_excel','');
            }else {
                // lấy dữ liệu từng ô theo col và row
                Subject::create([
                    'subject_code' => $provinceSheet->getCellByColumnAndRow(0, $row)->getValue(),
                    'subject_name' => $provinceSheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'subject_number_credit' => $provinceSheet->getCellByColumnAndRow(2, $row)->getValue(),
                    'subject_number_theory' => $provinceSheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'subject_number_practice' => $provinceSheet->getCellByColumnAndRow(4, $row)->getValue(),
                    'subject_status' => 0,
                ]);
            }
        }
        $import_file_excel_subject = $request->session()->get('import_file_excel_subject');
        return redirect()->back()->with('import_file_excel_subject','');
    }

    //TRANG LỚP HỌC PHẦN
    protected function page_class_subject(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_class_subjects = ClassSubject::where(function ($query) use ($search){
                $query->where('class_subject_code','like', '%'.$search.'%')
                    ->orWhere('class_subject_name', 'like', '%'.$search.'%');
            })->paginate(2);
        }else{
            if (Auth::user()->role_id == 1) {
                $show_class_subjects = ClassSubject::latest()->paginate(40);
            }else{
                $show_class_subjects = ClassSubject::where('teacher_id', Auth::user()->teacher_id)->latest()->paginate(40);
            }
        }

        return view('page.subject.page_class_subject',['show_class_subjects'=>$show_class_subjects]);
    }

    //TRANG THÊM LỚP HỌC PHẦN
    protected function add_class_subject()
    {
        return view('page.subject.add_class_subject');
    }

    //XÓA THÊM LỚP HỌC PHẦN
    protected function delete_class_subject(Request $request, $id_class_subject)
    {
        ClassSubject::destroy($id_class_subject);
        $delete_class_subject = $request->session()->get('delete_class_subject');
        return redirect()->back()->with('delete_class_subject','');
    }

    //THÊM LỚP HỌC PHẦN CSDL
    protected function post_add_class_subject(Request $request)
    {
        $inputSubjectId = $request->input('inputSubjectId');
        $inputClassSubjectCode = $request->input('inputClassSubjectCode');

        $count_class_subject = DB::table('class_subjects')
            ->where([
                ['class_subject_code','=',$inputClassSubjectCode],
                ['subject_id','=',$inputSubjectId]
            ])->count();

        if ($count_class_subject >= 1) {
            $message_error = $request->session()->get('message_error');
            return redirect()->back()->with('message_error','');
        }else {

            $add_class_subject = new ClassSubject();
            $add_class_subject->teacher_id = $request->input('inputTeacherId');
            $add_class_subject->semester_year_id = $request->input('inputSemesterYearId');
            $add_class_subject->subject_id = $request->input('inputSubjectId');
            $add_class_subject->class_subject_code = $request->input('inputClassSubjectCode');
            $add_class_subject->class_subject_name = $request->input('inputClassSubjectName');
            $add_class_subject->class_subject_note = $request->input('inputClassSubjectNote');
            $add_class_subject->save();

            $add_class_subject_session = $request->session()->get('add_class_subject_session');
            return redirect('page-class-subject')->with('add_class_subject_session', '');
        }
    }

    //THÊM LỚP HỌC PHẦN CSDL
    protected function update_class_subject(Request $request, $id_class_subject)
    {
        $update_class_subject = ClassSubject::find($id_class_subject);
        $update_class_subject->teacher_id = $request->input('inputTeacherId');
        $update_class_subject->semester_year_id = $request->input('inputSemesterYearId');
        $update_class_subject->subject_id = $request->input('inputSubjectId');
        $update_class_subject->class_subject_name = $request->input('inputClassSubjectName');
        $update_class_subject->class_subject_note = $request->input('inputClassSubjectNote');
        $update_class_subject->save();

        $update_class_subject_session = $request->session()->get('update_class_subject_session');
        return redirect('page-class-subject')->with('update_class_subject_session','');
    }

    //TRANG CHỈNH SỬA LỚP HỌC PHẦN
    protected function edit_class_subject($id_class_subject)
    {
        $edit_class_subject = ClassSubject::find($id_class_subject);
        return view('page.subject.edit_class_subject',['edit_class_subject'=>$edit_class_subject]);
    }

    //TRANG XEM LỚP HỌC PHẦN
    protected function view_detail_class_subject($id_class_subject)
    {
        $class_subject_id = ClassSubject::find($id_class_subject);
        $student_class_subjects = DetailScore::where('class_subject_id',$id_class_subject)->latest()->paginate(30);
        return view('page.subject.view_detail_class_subject',
        ['class_subject_id'=>$class_subject_id, 'student_class_subjects'=>$student_class_subjects]);
    }

    //THÊM CHI TIẾT ĐIỂM KÈM SINH VIÊN
    protected function post_add_detail_score(Request $request, $id_class_subject)
    {
        $inputStudentId = $request->input('inputStudentId');

        $count_detail_score = DB::table('detail_scores')
            ->where([
                ['class_subject_id','=',$id_class_subject],
                ['student_id','=',$inputStudentId]
            ])->count();

        if ($count_detail_score >= 1) {
            $message_error = $request->session()->get('message_error');
            return redirect()->back()->with('message_error','');
        }else{
            $add_detail_score = new DetailScore();
            $add_detail_score->class_subject_id = $id_class_subject;
            $add_detail_score->student_id = $inputStudentId;
            $add_detail_score->save();

            $add_detail_score_session = $request->session()->get('add_detail_score_session');
            return redirect()->back()->with('add_detail_score_session','');
        }
    }

    //TRANG XEM ĐIỂM HỌC PHẦN SINH VIÊN
    protected function view_score_student($id_class_subject, $id_detail_score)
    {
        $class_subject_id = ClassSubject::find($id_class_subject);
        $view_score_student = DetailScore::find($id_detail_score);
        return view('page.subject.view_score_student',
        ['class_subject_id'=>$class_subject_id, 'view_score_student'=>$view_score_student, ]);
    }

    //CẬP NHẬT ĐIỂM HỌC PHẦN SINH VIÊN
    protected function update_score_student(Request $request, $id_class_subject, $id_detail_score)
    {
        $update_score = DetailScore::find($id_detail_score);
        $update_score->score_number = $request->input('inputScoreNumber');
        $update_score->score_char = $request->input('inputScoreChar');
        $update_score->score_ladder_four = $request->input('inputScoreLadderFour');
        $update_score->save();

        $update_score_student_session = $request->session()->get('update_score_student_session');
        return redirect('view-detail-class-subject/'.$id_class_subject)->with('update_score_student_session','');
    }

    //TRANG CHƯƠNG TRÌNH HỌC
    protected function page_program_study(Request $request, $id_program_train)
    {
        $search = $request->input('inputSearch');
        $program_train = ProgramTrain::find($id_program_train);

        if($search != ""){
            $show_program_studys = ProgramStudy::where('subject_id','=', $search)->paginate(3);
        }else{
            $show_program_studys = ProgramStudy::where('program_train_id', $id_program_train)->latest()->paginate(80);
        }
        return view('page.subject.page_program_study',
        ['program_train'=>$program_train,'show_program_studys'=>$show_program_studys]);
    }

    //THÊM CHƯƠNG TRÌNH HỌC
    protected function add_program_study(Request $request, $id_program_train)
    {
        $program_train = ProgramTrain::find($id_program_train);
        return view('page.subject.add_program_study',
        ['program_train'=>$program_train]);
    }

    //THÊM SINH VIÊN VÀO LỚP HỌC PHẦN CHECKBOX
    protected function add_student_class_subject(Request $request)
    {
        $id_class_subject = $request->class_subject_id;
        $join_selected_values = $request->join_selected_values;

        $ids = explode(",", $join_selected_values);
        foreach ($ids as $id_student){
            $count_detail_score = DB::table('detail_scores')
                ->where([
                    ['class_subject_id','=',$id_class_subject],
                    ['student_id','=',$id_student]
                ])->count();
        }

        if ($count_detail_score >= 1) {
            return response()->json(['error'=>'Lỗi! Sinh viên đã tồn tại']);
        }else{

            foreach($ids as $id) {
                $add_detail_score = new DetailScore();
                $add_detail_score->class_subject_id = $id_class_subject;
                $add_detail_score->student_id = $id;
                $add_detail_score->save();
            }

            return response()->json(['success'=>$id_class_subject]);
        }
    }

    //XÓA CHƯƠNG TRÌNH HỌC
    protected function delete_score_student(Request $request, $id_detail_score)
    {
        DetailScore::destroy($id_detail_score);
        $delete_score_student_session = $request->session()->get('delete_score_student_session');
        return redirect()->back()->with('delete_score_student_session','');
    }

    //XÓA CHƯƠNG TRÌNH HỌC
    protected function delete_program_study(Request $request)
    {
        $ids = $request->ids;
        DB::table('program_studies')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Đã Xóa chương trình học"]);
    }

    //THÊM CHƯƠNG TRÌNH HỌC CSDL
    protected function post_add_program_study(Request $request, $id_program_train)
    {
        $this->validate($request, [
            'inputSubjectId'  => 'unique:program_studies,subject_id'
        ],[
            'inputSubjectId.unique' => 'Học phần đã tồn tại'
        ]);

        $add_program_study = new ProgramStudy();
        $add_program_study->subject_id = $request->input('inputSubjectId');
        $add_program_study->category_subject_id = $request->input('inputCategorySubjectId');
        $add_program_study->program_train_id = $id_program_train;
        $add_program_study->program_studie_note = $request->input('inputNote');
        $add_program_study->save();

        $add_program_study_session = $request->session()->get('add_program_study_session');
        return redirect('page-program-study/'.$id_program_train)->with('add_program_study_session','');
    }
    /*=================================================================*/




    /*=================================================================*/
    //RUN PYTHON
    protected function run_script_python(Request $request, $id_student)
    {
        //Lấy ID sinh viên
        $infor_students = Student::find($id_student);

        //Lấy học kỳ năm học
        $score = DB::table('detail_scores')->where('student_id', $id_student)->latest()->get();
        foreach ($score as $score_value){
            $class_subjects = DB::table('class_subjects')->where('id', $score_value->class_subject_id)->latest()->get();
            foreach ($class_subjects as $class_subject_value){
                $semester_year_class_subs = DB::table('semester_years')->where('id',$class_subject_value->semester_year_id)->latest()->get();
            }
        }


        //Làm rỗng bảng "subject_student_studies" môn học sinh viên đã học để add mới vào
        DB::table('subject_student_studies')->truncate();

        //Lọc các môn học sinh viên đã học vào bảng "subject_student_studies"
        $scores = DB::table('detail_scores')->where('student_id', $infor_students->id)->get();
        foreach ($scores->unique('class_subject_id') as $score){
            $class_subjects = DB::table('class_subjects')->where('id', $score->class_subject_id)->get();
            foreach ($class_subjects as $class_subject){
                $subject_stus = DB::table('subjects')->where('id', $class_subject->subject_id)->get();
                foreach ($subject_stus as $data){

                    $add = new SubjectStudentStudy();
                    $add->class_subject_id = $score->class_subject_id;
                    $add->save();

                }
            }
        }

        //Làm rỗng bảng "property_students" xóa DB trước
        DB::table('property_students')->truncate();

        //lọc các môn học chưa học của sinh viên vào bảng "property_students"
        $diff = DB::table('subject_student_studies')->pluck('class_subject_id')->toArray();

        $class_subject_all = DB::table('class_subjects')
            ->whereNotIn('id', $diff)->latest()->orderBy('semester_year_id', 'desc')->get();
        foreach ($class_subject_all->unique('subject_id') as $class_sub){

            //Lấy mã số sinh viên
            $get_student = DB::table('students')->where('id', $infor_students->id)->first();

            //Lấy học kỳ năm học
            $semester_year = DB::table('semester_years')
                ->where('id', $class_sub->semester_year_id)->orderBy('semester_year', 'desc')->first();
            $semester = str_split($semester_year->semesteryear);
            $years = $semester_year->semester_year; //Lấy năm học
            $semester_arr = $semester[0]; //Lấy học kỳ
            $semester_year_new = "Hoc_ky " . $semester_arr . " - Nam_hoc " . $years;

            //Lấy môn học
            $subject_alls = DB::table('subjects')->where('id', $class_sub->subject_id)->latest()->get();
            foreach ($subject_alls->unique('subject_code') as $value_subject) {

                //add new property_students
                $add_property = new PropertyStudent();
                $add_property->student_code = $get_student->student_code;
                $add_property->subject_code = $value_subject->subject_code;
                $add_property->semester_year = $semester_year_new;
                $add_property->save();

            }
        }


        //Lưu Excel vào folder
        Excel::store(new PropertyStudentExport(), 'test_property_student.xlsx', 'public');


        //Thực hiện chạy Python
        $process = new Process(['python', 'C:/xampp/htdocs/subjectsuggestionsystem/storage/app/public/run_file_export.py']);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        //Kết quả chạy python
        $result = $process->getOutput();
        //echo $process->getOutput();

        return view('page.student.suggestion_subject.view_suggestion_subject',
        ['infor_students'=>$infor_students, 'semester_year_class_subs'=>$semester_year_class_subs, 'result'=>$result]);

    }
    /*=================================================================*/


    /*=================================================================*/
    //VIEW TABLE
    /*public function test_demo($id_student)
    {
        $infor_students = Student::find($id_student);

        $i=1;

        DB::table('subject_student_studies')->truncate();

        $scores = DB::table('detail_scores')->where('student_id', $id_student)->get();
        foreach ($scores as $score){
            $class_subjects = DB::table('class_subjects')->where('id', $score->class_subject_id)->get();
            foreach ($class_subjects as $class_subject){
                $subjects = DB::table('subjects')->where('id', $class_subject->subject_id)->get();
                foreach ($subjects as $data){
                    DB::table('subject_student_studies')->insert([
                        'class_subject_id' => $class_subject->id,
                        'subject_code' => $data->subject_code,
                        'subject_name' => $data->subject_name
                    ]);
                }
            }
        }

        $class_subject_all = DB::table('class_subjects')
            ->whereNotIn('id', DB::table('subject_student_studies')->pluck('class_subject_id')->toArray())
            ->get();

        foreach ($class_subject_all as $class_sub){

            //Lấy môn học
            $value_subject = DB::table('subjects')->where('id','=',$class_sub->subject_id)->first();

            //Lấy mã số sinh viên
            $get_student = DB::table('students')->where('id', $infor_students->id)->first();

            //Lấy học kỳ năm học
            $semester_year = DB::table('semester_years')->where('id', $class_sub->semester_year_id)->first();
            $semester = str_split($semester_year->semesteryear);
            $years = $semester_year->semester_year; //Lấy năm học
            $semester_arr = $semester[0]; //Lấy học kỳ
            $semester_year_new = "Hoc_ky ".$semester_arr." - Nam_hoc ".$years;

            print $i++." - ".$get_student->student_code." - ".$value_subject->subject_code." - ".$semester_year_new."<br>";
        }



    }*/
    /*=================================================================*/

}
