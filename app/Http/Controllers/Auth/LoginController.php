<?php

namespace App\Http\Controllers\Auth;

// ValidateLogin  Request
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email',
            'password' => 'required|string',
        ]);
    }
    public function redirectTo(){
         // User role
        $role = Auth::user()->role->id;
        // Check user role
        switch ($role) {
            // Administrators
            case '1':
                    return '/admin';
                break;
            // Teacher
            case '2':
                    return '/teacher';
                break;
            // Student
            case '3':
                return '/student';
                break;
            default:
                return '/login';
                break;
        }
    }
    public function username()
    {
        return 'email';
    }


}
