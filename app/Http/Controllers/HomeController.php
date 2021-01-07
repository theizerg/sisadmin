<?php

namespace App\Http\Controllers;
use App\Models\Pastor;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Role::get();
         return view('admin.home.index',compact('roles'));


   
    }




    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
