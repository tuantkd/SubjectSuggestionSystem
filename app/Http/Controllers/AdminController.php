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
}
