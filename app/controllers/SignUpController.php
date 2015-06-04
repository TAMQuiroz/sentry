<?php

class SignupController extends \BaseController {
	public function signUp()
    {
        $input = Input::all();

        $attributes = array(
            'email'     => $input['email'],
            'name'      => $input['name'],
            'password'  => $input['password'],
            'role'		=> $input['role'],
        );

        $user = new User;

        $user->name     = $attributes['name'];
        $user->email    = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->role_id  = $attributes['role'];
        $user->save();

        return Redirect::to('/business_partner/home');
    }
}