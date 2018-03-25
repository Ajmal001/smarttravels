<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\CustomerLogin;
use App\ErpCustomers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/customerhome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('guest:employee');
=======
        $this->middleware('guest:customer');
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(\Illuminate\Http\Request $request)
    {
<<<<<<< HEAD
      $employeeid = EmployeeLogin::create([
=======
      $customerid = CustomerLogin::create([
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => bcrypt($request->password)
      ])->id;

<<<<<<< HEAD
      ErpEmployee::create([
        'employee_id'           => $employeeid,
        'employee_name'         => $request->name,
        'employee_email'        => $request->email,
        'employee_phone'        => $request->employee_phone,
        'employee_designation'  => $request->employee_designation,
        'employee_image'        => 'employee_dafault.png',
      ]);

      return redirect('/employeehome');
=======
      ErpCustomers::create([
        'customer_id'           => $customerid,
        'customer_name'         => $request->name,
        'customer_email'        => $request->email,
        'customer_phone'        => $request->customer_phone,
        'customer_profession'   => $request->customer_profession,
        'customer_image'        => 'customer_dafault.png',
      ]);

      return redirect('/customerlogin');
>>>>>>> 4669e8530e61c1f20661aadfb78c97e3551cfaa5
    }
}
