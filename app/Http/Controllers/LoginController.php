<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{

    



    public function index(Request $request)
    {
        $logins = Login::WithUser()->search($request->q)->orderBy('login_at', 'desc')->paginate(10);

        return view('admin.login.index', ['logins' => $logins]);
    }




    public function show($id)
    {
        $logins = Login::Paginate(6);

        return view('admin.login.index', ['logins' => $logins]);

    }


}
