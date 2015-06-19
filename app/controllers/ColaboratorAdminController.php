<?php

class ColaboratorAdminController extends \BaseController {

	public function home()
    {

    	$requirements = Requirement::where('role', 4)->where('status', 0)->orWhere('status', 1)->get();

    	$data = array(
    		'reqs'	=> $requirements
    	);

    	return View::make('colaborator.administration.home',$data);
    }

    public function updateReqs()
    {
    	$input = Input::all();
    	unset($input['_token']);
    	foreach($input as $key => $value){	
			$requirement = Requirement::where('id',$key)->first();
            if($value == 1 || $value == 2) $requirement->initDate = date('Y-m-d');
			$requirement->status = $value;
			$requirement->save();
    	}
    		
    	return Redirect::to('/colaborator/admin/home');
    }

    public function search()
    {
    	$input = Input::all();

		if(isset($input['filter']))
		{
            $requirements = Requirement::where('role', 4)->where('status', $input['filter'])->get();
            $filter = $input['filter'];
        }
        else
        {
            $requirements = Requirement::where('role', 4)->where('status', 0)->get();
            unset($input['_token']);
            foreach($input as $key => $value){
                            
                $requirement = Requirement::where('id',$key)->first();
                if($value == 1 || $value == 2) $requirement->initDate = date('Y-m-d');
                $requirement->status = $value;
                $requirement->save();
            }
            $filter = 0;
        }

        $data = array (
            'reqs' 		=> $requirements,
            'filter' 	=> $filter
        );
        return View::make('colaborator.administration.home', $data);
    }
}