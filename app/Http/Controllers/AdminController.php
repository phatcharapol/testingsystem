<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\User ;
use App\Role ;
use Session ;

class AdminController extends Controller
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
     
        // $user_admin=User::where('role_id',1)->paginate(5,['*'],'t1') ;
        // $user_teacher=User::where('role_id',2)->paginate(10,['*'],'t2') ;
        // $user_student=User::where('role_id',3)->paginate(10,['*'],'t3') ; 

        $cnt_user_admin=User::where('role_id',1)->count() ;
        $cnt_user_teacher=User::where('role_id',2)->count() ;
        $cnt_user_student=User::where('role_id',3)->count() ; 

        return view('admin.dashboard',compact('cnt_user_admin','cnt_user_teacher','cnt_user_student')) ;
    }

    public function chgpwd(){
        dd('aaa') ;
        $user=User::findOrFail($id) ;
        return view('changepassword') ;
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
