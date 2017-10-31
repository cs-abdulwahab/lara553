<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use RegistersUsers;


    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function destroy( $user)
    {
        return User::destroy($user);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'sometimes|required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            //   'terms' => 'required',
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        //   $this->guard('api')->login($user);


        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $fields = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'api_token' => str_random(60),
        ];

        return User::create($fields);
    }


    protected function registered(Request $request, User $user)
    {
        $user->generateToken();

        return response()->json(['data' => $user->toArray()], 201);
    }


}
