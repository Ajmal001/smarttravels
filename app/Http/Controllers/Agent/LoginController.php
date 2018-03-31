<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
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
    protected $redirectTo = '/agenthome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agent')->except('logout');
    }

    // Check Status before login
    protected function credentials(\Illuminate\Http\Request $request)
    {
        return [
          'email' => $request->email,
          'password' => $request->password
        ];
    }

    public function showLoginForm()
    {
        $countryList = TourCountry::get();
        $locationList = TourLocation::get();
        $current_option = Options::get()->first();
        return view('frontend.agent.login',compact('countryList','locationList','current_option'));
    }

    public function register(){

      $countryList = TourCountry::get();
      $locationList = TourLocation::get();
      $current_option = Options::get()->first();

      return view('frontend.agent.register',compact('countryList','locationList','current_option'));

    }

    public function logout(Request $request){

        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('agentlogin');
    }


    protected function guard()
    {
        return Auth::guard('agent');
    }


}
