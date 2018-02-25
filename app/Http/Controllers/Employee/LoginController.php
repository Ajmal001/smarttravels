<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\TourCountry;
use App\TourLocation;
use App\Options;

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
    protected $redirectTo = '/employeehome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }



    public function showLoginForm()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        return view('frontend.employee.login',compact('countryList','locationList','current_option'));
    }

    public function register(){

      $countryList = TourCountry::get();
      $locationList = TourLocation::get();
      $current_option = Options::get()->first();

      return view('frontend.employee.register',compact('countryList','locationList','current_option'));

    }

    public function logout(Request $request){

        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'frontend.employee.login' ));
    }


    protected function guard()
    {
        return Auth::guard('employee');
    }


}
