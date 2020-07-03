<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterCustomerController extends Controller
{
    public function  index()
    {
        return view('resgister');

    }

    public function register()
    {
        $data = $this->validateCustomerDetails();
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Role::create(['routes_ids' => "[4]", 'user_id' => $newUser['id']]);
        return redirect('/')->with('msg','account created successfully, kindly login');

    }
    public function validateCustomerDetails()
    {
        return request()->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }
}
