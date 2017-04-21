<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function doLogin()
    {
        $data = [
            'Username' => Input::get('Username'),
            'Password' => Input::get('Password'),
        ];

        $remember = Input::get('remember');

        $messages = [
            'Username' => 'User does not exist.',
            'Password' => 'Incorrect password.',
        ];

        $rules = array(
            'Username' => 'required', // make sure the email is an actual email
            'Password' => 'required|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            dd("failed");
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('Password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            echo("okaaay?");
            if(Auth::attempt($data))
            {
                return redirect()->intended('/');
            }
            else{
                echo "<pre>";
                print_r($data);
            }
        }
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function doRegister()
    {
        $data = Input::all();

        $messages = [
            'Password'  => 'Both the passwords must match.',
            'email'      => 'Both the email addresses must match.',
        ];

        $rules = [
            'Username' => 'required|min:4|max:30|unique:users',
            'Email' => 'required|email|max:50|confirmed',
            'Email_confirmation' => 'required|email|max:50',
            'DisplayName' => 'required|min:3|max:30',
            'Password' => 'required|min:6|confirmed',
            'Password_confirmation' => 'required|min:6',
            'BirthDate' => 'required|date',
            'Gender' => 'nullable',
            'Location' => 'nullable',
            'Timezone' => 'nullable|timezone'
        ];

        $validator = Validator::make($data, $rules, $messages);

        $validator->after(function ($validator){
            if($this->checkPasswords())
            {
                $validator->errors()->add('Password', 'Passwords do not match.');
            }
            if($this->checkEmails())
            {
                $validator->errors()->add('Email', 'Emails do not match.');
            }
        });

        
        if($validator->fails())
        {
            return redirect('register')
                ->withErrors($validator)
                ->withInput(Input::except(['Password', 'Password_confirmation']));
        }
        else
        {
            $data['BirthDate'] = Carbon::createFromFormat('m/d/Y', $data['BirthDate'])->toDateString();
            $data['Password'] = bcrypt($data['Password']);
            return User::create($data);
        }
    }


    private function checkPasswords()
    {
        return Input::get('Password') != Input::get('Password_confirmation');
    }

    private function checkEmails()
    {
        return Input::get('Email') != Input::get('Email_confirmation');
    }
}
