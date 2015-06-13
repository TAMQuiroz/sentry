<?php

class AuthController extends \BaseController {

	public function login()
    {
        $input = Input::all();

        $user = User::where('email',$input['email'])->first();

        if(!$user)
        {
            return Redirect::to('/')->with('error','Invalid email or password');
        }

        $remember = Input::has('remember') ? true : false;

        $credentials = array(
            'email'     => $input['email'],
            'password'  => $input['password'],
        );

        $success = Auth::attempt($credentials, $remember);

        if($success)
        {
        	$role = Auth::user()->role_id;

        	if($role == Config::get('constants.BUSINESS_PARTNER'))
        	{
        		return Redirect::to('/business_partner/home');
        	}
        	elseif ($role == Config::get('constants.BOSS'))
        	{
        		return Redirect::to('/boss/home');
        	}
            elseif ($role == Config::get('constants.COLABORATOR_INFRA'))
            {
                return Redirect::to('/colaborator/infra/home');
            }
            elseif ($role == Config::get('constants.COLABORATOR_ADMIN')) 
            {
                return Redirect::to('/colaborator/admin/home');
            }
            elseif ($role == Config::get('constants.ENABLER'))
            {
                return Redirect::to('/enabler/home');
            }
            else
                return Redirect::to('/');
        }
        
        return Redirect::to('/')->with('error','Invalid email or password');
    }

    public function logout()
    {
    	Auth::logout();

    	return Redirect::to('/');
    }

}