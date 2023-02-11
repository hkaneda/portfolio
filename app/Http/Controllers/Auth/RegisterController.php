<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:32', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:256', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'postal_code' => ['required', 'string', 'max:256'],
            'prefectures' => ['required', 'string', 'max:256'],
            'municipality' => ['required', 'string', 'max:256'],
            'block' => ['required', 'string', 'max:256'],
            'address' => ['required', 'string', 'max:256'],
            'phone_number' => ['required', 'string', 'max:256']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'postal_code'=>$data['postal_code'],
            'prefectures'=>$data['prefectures'],
            'municipality'=>$data['municipality'],
            'block'=>$data['block'],
            'address'=>$data['address'],
            'phone_number'=>$data['phone_number']
        ]);
    }
// ユーザー情報の登録確認画面を表示させる
    public function register_confirm(HttpRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $postal_code = $request->postal_code;
        $prefectures = $request->prefectures;
        $municipality = $request->municipality;
        $block = $request->block;
        $address = $request->address;
        $phone_number = $request->phone_number;

        $input = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'postal_code' => $postal_code,
            'prefectures' => $prefectures,
            'municipality' => $municipality,
            'block' => $block,
            'address' => $address,
            'phone_number' => $phone_number
        ];

        return view('register_confirm', $input);
    }

}
