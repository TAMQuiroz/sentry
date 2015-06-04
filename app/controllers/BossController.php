<?php

class BossController extends \BaseController {

	public function home()
    {
	        $user = Auth::user();

	        return View::make('boss.home');
    }
}