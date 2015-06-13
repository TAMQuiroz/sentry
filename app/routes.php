<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home',  function()
{
	if(Auth::check())
	{
		if(Auth::user()->role_id == Config::get('constants.BUSINESS_PARTNER'))
		{
			return Redirect::to('/business_partner/home');
		}
		elseif (Auth::user()->role_id == Config::get('constants.BOSS'))
		{
			return Redirect::to('/boss/home');
		}
		elseif (Auth::user()->role_id == Config::get('constants.COLABORATOR_INFRA'))
		{
			return Redirect::to('/colaborator/infra/home');
		}
		elseif (Auth::user()->role_id == Config::get('constants.COLABORATOR_ADMIN'))
		{
			return Redirect::to('/colaborator/admin/home');
		}
		elseif (Auth::user()->role_id == Config::get('constants.ENABLER'))
		{
			return Redirect::to('/enabler/home');
		}
	}
	else
	{
		return Redirect::to('/login');
	}
}));

Route::get('/login', array('as' => 'login', 'uses' => 'HomeController@home'));
Route::post('/login', array('as' => 'login.post', 'uses' => 'AuthController@login'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::get('/signup', array('as' => 'signup', 'uses' => 'HomeController@signUp'));
Route::post('/signup', array('as' => 'signup.post', 'uses' => 'SignupController@signUp'));

Route::get('/business_partner/home', array('as' => 'business_partner.home', 'uses' => 'BusinessPartnerController@home'));
Route::post('/business_partner/home', array('as' => 'business_partner.home.post', 'uses' => 'BusinessPartnerController@homePost'));
Route::get('/business_partner/new_requirement', array('as' => 'business_partner.requirement.new', 'uses' => 'BusinessPartnerController@newRequirement'));
Route::post('/business_partner/new_requirement', array('as' => 'business_partner.requirement.new.post', 'uses' => 'BusinessPartnerController@newRequirementPost'));
Route::post('/business_partner/modify_requirement', array('as' => 'business_partner.requirement.modify', 'uses' => 'BusinessPartnerController@modifyRequirement'));
Route::post('/business_partner/send_requirement', array('as' => 'business_partner.requirement.send', 'uses' => 'BusinessPartnerController@sendRequirement'));
Route::get('/business_partner/resume_requirement/{formId}', array('as' => 'business_partner.requirement.resume', 'uses' => 'BusinessPartnerController@resumeRequirement'));
Route::post('/business_partner/search', array('as' => 'business_partner.home.search', 'uses' => 'BusinessPartnerController@search'));

Route::get('/boss/home', array('as' => 'boss.home', 'uses' => 'BossController@home'));
Route::post('/boss/home', array('as' => 'boss.home.post', 'uses' => 'BossController@homePost'));
Route::get('/boss/requirement/{formId}', array('as' => 'boss.requirement', 'uses' => 'BossController@requirement'));


Route::get('/enabler/home', array('as' => 'enabler.home', 'uses' => 'EnablerController@home'));

Route::get('/colaborator/infra/home', array('as' => 'colaborator.infra.home', 'uses' => 'ColaboratorInfraController@home'));

Route::get('/colaborator/admin/home', array('as' => 'colaborator.admin.home', 'uses' => 'ColaboratorAdminController@home'));
		
