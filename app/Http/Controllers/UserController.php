<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{

   


    public function index(Request $request)
    {
        $users = User::with('roles')->with('permissions')
                       ->search($request->q)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admin.user.index', ['users' => $users]);
    }




    public function create()
    {
        return view('admin.user.create');
    }




    public function store(Request $request)
    {
        $user = User::create($request->except('role'));

        if ($request->has('role'))
        {
            $user->assignRole($request->role);
        }

         $notification = array(
            'message' => 'Datos Ingresados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('user')->with($notification);
    }




    public function show($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);

        return view('admin.user.show', ['user' => $user]);
    }




    public function edit($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);
        dd($user);
        $roles = Role::get();
        return view('admin.user.edit', compact('roles','user'));
    }




    public function update(Request $request, $id)
    { 


      
        $user = User::find(\Hashids::decode($id)[0]);
        dd($user);
        $user->update($request->except('role'));

        if ($request->has('role'))
        {
            $user->syncRoles($request->role);
        }

         $notification = array(
            'message' => 'Datos Actualizados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('user')->with($notification);
    }




    public function destroy($id)
    {
        $user = User::find(\Hashids::decode($id)[0])->delete();

        return json_encode(['success' => true]);
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}