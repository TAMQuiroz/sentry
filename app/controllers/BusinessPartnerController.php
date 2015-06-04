<?php

class BusinessPartnerController extends \BaseController {

	public function home()
    {
	        $user = Auth::user();

			$forms = DB::table('form')->where('status', 0)->get();

	        $dataParent = array();

	        if($forms)
	        {
	        	foreach ($forms as $form) {
	        		$employee = DB::table('employees')->where('id', $form->employeeID)->first();
	        		$dataChild = array(
		        	'name'		=>	$employee->name,
		        	'lastName'	=>	$employee->lastname,
		        	'formID'	=>	$form->id,
		        	'date'		=>	$form->updated_at,
		        	'status'	=>	$form->status,
		        	'statusEnd'	=>	$form->statusEnd
		        	);
		        	array_push($dataParent,$dataChild);
	        	}
		        

				$data = array ('data' => $dataParent);
			}
			else
			{
				$data = array ('data' => null);
			}
	        return View::make('businessPartner.home', $data);
    }

	public function newRequirement()
    {
	        $areas = Area::all();
	        $corpList = CorpList::all();

	        $data = array(
	        	'areas'		=>		$areas,
	        	'corpList'	=>		$corpList
	        );

	        return View::make('businessPartner.newRequirement', $data);
    }

    public function newRequirementPost()
    {
	        $input = Input::all();

	        if(!isset($input['formId'])){
	        	$form = new Forms;
	        }else{
				
				$form = Form::where('id',$input['formId']);
			}

			$form->employeeID = 2; //CAMBIAR POR FUNCION QUE BUSCA EMPLOYEES
			$form->areaID=$input['area'];
			$form->equipo=$input['group2'];
			$form->puntoRed=$input['group3'];
			$form->mail=$input['email'];
			$form->accesoInternet=$input['group4'];
			$form->accesoCarpetas=$input['group5'];
			$form->usuarioConecta=$input['user'];
			$form->obsConecta=$input['observation'];
			$form->conexionImpresora=$input['conection'];
			$form->listaCorporativa=$input['listaCorporativa'];
			$form->incluirDirectorio=$input['group6'];
			$form->lync=$input['group7'];
			$form->rpm=$input['group8'];
			$form->nivelClaveTelefonica=$input['claveTelefonica'];
			$form->anexo=$input['group9'];
			$form->automovil=$input['group10'];
			$form->status=0; 	//Borrador
			$form->registryDate = date('Y-m-d H:i:s');
			$form->statusEnd=0; //No ha terminado

			$form->save();

	        $area = Area::where('id',$input['area'])->first();
	        $corpList = CorpList::where('id',$input['listaCorporativa'])->first();

	        $data = array(
	        	'form' 	=>			$form,
	        	'area'		=>		$area,
	        	'corpList'	=>		$corpList
	        );
	        return View::make('businessPartner.resumeRequirement', $data);
    }

    public function modifyRequirement()
    {
    		$input = Input::all();
    		$form = Form::where('id',$input['formId']);
    		$areas = Area::all();
	        $corpList = CorpList::all();

	        $data = array(
	        	'areas'		=>		$areas,
	        	'corpList'	=>		$corpList,
	        	'form'		=>		$form
	        );

    		return View::make('businessPartner.newRequirement', $data);
    }

    public function sendRequirement()
    {
    		//REVISAR SI ESTA LLENO
    		$input = Input::all();
    		var_dump($input['formId']);
    		die();
    }
}