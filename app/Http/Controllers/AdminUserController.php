<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\User ;
use App\Role ;
use Session ;

class AdminUserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
     
        $users=User::where('role_id','<>',"")->orderBy('role_id')->paginate(10) ;

        return view('admin.user.index',compact('users')) ;
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::all() ;
        return view('admin.user.createuser',compact('roles')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all() ;
        $input['group_access'] = '0' ;
        $input['created_by'] = getUser() ;
        $input['updated_by'] = getUser() ;
        $input['email_verified_at'] = date("Y-m-d H:i:s");
        $input['remember_token'] = str_random(10) ;
        User::create($input) ;
        Session::flash('msg','User has been created..') ;
        return redirect('admin/user/') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user=User::findOrFail($id) ;
      return view('admin.user.viewuser',compact('user')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user=User::findOrFail($id) ;
      $roles = Role::pluck('name','id')->all() ;
      // $roles = Role::all() ;
      // dd($roles) ;
      return view('admin.user.edituser',compact('user','roles')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
         $user = User::findOrFail($id) ;
         $input=$request->except('email') ;
         $input['updated_by'] = getUser() ;
         $user->update($input) ;
         Session::flash('msg','User has been updated..') ;
          return redirect('admin/user/') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user=User::findOrFail($id) ;
        $user->delete() ;
        Session::flash('msg','User has been deleted..') ;
        return redirect('admin/user/') ;
       
    }


}
