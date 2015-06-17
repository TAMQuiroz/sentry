<?php

class BusinessPartnerController extends \BaseController {

	public function home()
    {
	        $user = Auth::user();

			$forms = Forms::where('status', 0)->get();

	        $dataParent = array();

	        if($forms)
	        {
	        	foreach ($forms as $form) {
	        		$employee = Employee::where('id', $form->employeeID)->first();
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
    		$input = Input::all();
    		if(isset($input['formId']))
    		{
    			$form = Forms::where('id',$input['formId'])->first();
	    		$areas = Area::all();
	    		$area = Area::where('id',$form->areaID)->first();
	    		$employees = Employee::all();
	    		$employee = Employee::where('id',$form->employeeID)->first();
	    		$positions = Position::all();
	    		$sapR3 = Position::where('id', $form->sapR3)->first();
	        	$sapDP = Position::where('id', $form->sapDP)->first();
	        	$sapBW = Position::where('id', $form->sapBW)->first();

		        $corpList = CorpList::all();

		        $data = array(
		        	'area'		=>		$area,
		        	'areas'		=>		$areas,
		        	'employee'	=>		$employee,
		        	'employees'	=>		$employees,
		        	'corpList'	=>		$corpList,
		        	'form'		=>		$form,
		        	'positions'	=>		$positions,
		        	'sapR3'		=>		$sapR3,
		        	'sapDP'		=>		$sapDP,
		        	'sapBW'		=>		$sapBW
		        );
    		}
    		else
    		{
    			$employees = Employee::all();
    			$areas = Area::all();
		        $corpList = CorpList::all();
		        $positions = Position::all();

		        $data = array(
		        	'areas'		=>		$areas,
		        	'corpList'	=>		$corpList,
		        	'employees'	=>		$employees,
		        	'positions'	=>		$positions
		        );
    		}
	        
	        return View::make('businessPartner.newRequirement', $data);
    }

    public function newRequirementPost()
    {
	        $input = Input::all();

	        if(!isset($input['formId'])){
	        	$form = new Forms;
	        	$area = Area::where('id',$input['area'])->first();
	        	$corpList = CorpList::where('id',$input['listaCorporativa'])->first();
	        	
	        	$sapR3 = Position::where('id', $input['sapR3'])->first();
	        	$sapDP = Position::where('id', $input['sapDP'])->first();
	        	$sapBW = Position::where('id', $input['sapBW'])->first();
	        }else{
				$form = Forms::where('id',$input['formId'])->first();
				$area = Area::where('id',$form->areaID)->first();
				
	        	$corpList = CorpList::where('id',$form->listaCorporativa)->first();
	        	$sapR3 = Position::where('id', $form->sapR3)->first();
	        	$sapDP = Position::where('id', $form->sapDP)->first();
	        	$sapBW = Position::where('id', $form->sapBW)->first();
			}
			$employee = Employee::where('id', $input['employee'])->first();
			$boss = Employee::where('id', $employee->boss_id)->first();

			$form->employeeID = $employee->id;
			$form->bossID = $boss->id;
			$form->areaID=$input['area'];
			$form->sapR3=$input['sapR3'];
			$form->sapR3Just=$input['sapR3Just'];
			$form->sapDP=$input['sapDP'];
			$form->sapDPJust=$input['sapDPJust'];
			$form->sapBW=$input['sapBW'];
			$form->sapBWJust=$input['sapBWJust'];
			$form->equipo=$input['group2'];	//No equipo 0 Laptop 1 PC 2
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
			$form->rpm = $input['group8'];
			$form->nivelClaveTelefonica=$input['claveTelefonica'];
			$form->anexo = $input['group9'];
			$form->automovil=$input['group10'];
			$form->status = 0; 	//Borrador 0 | Llenado 1
			$form->registryDate = date('Y-m-d H:i:s');
			$form->statusEnd = 0; //No ha terminado

			$form->save();

	        $data = array(
	        	'form' 		=>		$form,
	        	'area'		=>		$area,
	        	'corpList'	=>		$corpList,
	        	'employee'	=>		$employee,
	        	'boss'		=>		$boss,
	        	'sapR3'		=>		$sapR3,
	        	'sapDP'		=>		$sapDP,
	        	'sapBW'		=>		$sapBW
	        );

	        return View::make('businessPartner.resumeRequirement', $data);
    }

    public function resumeRequirement($formId)
    {
    		
    		$form = Forms::where('id',$formId)->first();
    		$area = Area::where('id',$form->areaID)->first();
    		$employee = Employee::where('id', $form->employeeID)->first();
	        $corpList = CorpList::where('id',$form->listaCorporativa)->first();
	        $boss = Employee::where('id', $employee->boss_id)->first();
        	$sapR3 = Position::where('id', $form->sapR3)->first();
        	$sapDP = Position::where('id', $form->sapDP)->first();
        	$sapBW = Position::where('id', $form->sapBW)->first();

	        $data = array(
	        	'area'		=>		$area,
	        	'corpList'	=>		$corpList,
	        	'form'		=>		$form,
	        	'employee'	=>		$employee,
	        	'boss'		=>		$boss,
	        	'sapR3'		=>		$sapR3,
	        	'sapDP'		=>		$sapDP,
	        	'sapBW'		=>		$sapBW
	        );

    		return View::make('businessPartner.resumeRequirement', $data);
    }

    public function checkFull($form){

    	if($form->mail!="" && $form->usuarioConecta!="" && $form->sapR3Just!="" &&
    		$form->sapDPJust!="" && $form->sapBWJust!="" ){
    		return 1;	
    	}

    	return 0;
    }

    public function sendRequirement()
    {
    		$input = Input::all();
    		$form = Forms::where('id',$input['formId'])->first();

    		if($this->checkFull($form)){
    			$this->createRequirements($form);
    			$form->status = 1;
    			$form->save();
    			return Redirect::route('home');
    		}else{
    			return Redirect::back()->with('error','Complete todos los campos obligatorios por favor!');
    		}

    }

    public function createRequirements($form){

    	$tiempo1 = Tasktype::where('id',1)->first();
    	$tiempo2 = Tasktype::where('id',2)->first();
            
        $requirement = new Requirement;
        $requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
        $requirement->registerDate = Date('y:m:d');
        $requirement->status = 0;
        $requirement->employeeID = $form->employeeID;
        $requirement->role = Config::get('constants.ENABLER');
        $requirement->formID = $form->id;
        $requirement->name = "Conseguir permiso SAP R3";
        $requirement->description = $form->sapR3Just;
        $requirement->goodCheck = 0;
        $requirement->SAPType = $form->sapR3;
        $requirement->save();

        $requirement = new Requirement;
        $requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
        $requirement->registerDate = Date('y:m:d');
        $requirement->status = 0;
        $requirement->employeeID = $form->employeeID;
        $requirement->role = Config::get('constants.ENABLER');
        $requirement->formID = $form->id;
        $requirement->name = "Conseguir permiso SAP DP";
        $requirement->description = $form->sapDPJust;
        $requirement->goodCheck = 0;
        $requirement->SAPType = $form->sapDP;
        $requirement->save();

        $requirement = new Requirement;
        $requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
        $requirement->registerDate = Date('y:m:d');
        $requirement->status = 0;
        $requirement->employeeID = $form->employeeID;
        $requirement->role = Config::get('constants.ENABLER');
        $requirement->formID = $form->id;
        $requirement->name = "Conseguir permiso SAP BW";
        $requirement->description = $form->sapBWJust;
        $requirement->goodCheck = 0;
        $requirement->SAPType = $form->sapBW;
        $requirement->save();

        $requirement = new Requirement;
        $requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
        $requirement->registerDate = Date('y:m:d');
        $requirement->status = 0;
        $requirement->employeeID = $form->employeeID;
        $requirement->role = Config::get('constants.COLABORATOR_INFRA');
        $requirement->formID = $form->id;
        $requirement->name = "Ingresar informacion de ubicacion";
        $requirement->save();

        $requirement = new Requirement;
        $requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
        $requirement->registerDate = Date('y:m:d');
        $requirement->status = 0;
        $requirement->employeeID = $form->employeeID;
        $requirement->role = Config::get('constants.COLABORATOR_INFRA');
        $requirement->formID = $form->id;
        $requirement->name = "Enviar correo electronico a Colaborador";
        $requirement->save();

    	if($form->equipo != 0){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->formID = $form->id;
    		if($form->equipo == 1){
	    		$requirement->name = "Conseguir Laptop";
	    		$requirement->description = "Conseguir la laptop para el nuevo empleado";
	    		
	    	}elseif($form->equipo == 2){
	    		$requirement->name = "Conseguir PC";
	    		$requirement->description = "Conseguir la PC de escritorio para el nuevo empleado";
	    	}	
	    	$requirement->save();
    	}

    	if($form->puntoRed == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Habilitar punto de red";
    		$requirement->description = "Habilitar punto de red para el nuevo empleado";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->accesoInternet == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Acceder a internet";
    		$requirement->description = "Habilitar el internet para el nuevo empleado";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->accesoCarpetas == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Acceder a carpetas";
    		$requirement->description = "Acceso a carpetas en unidades P y L";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}
    	
    	if($form->conexionImpresora != ""){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Conexion a impresora";
    		$requirement->description = "Control sobre uso de computadora";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->incluirDirectorio == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Incluir en Directorio";
    		$requirement->description = "Incluir a la persona en el directorio";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->lync == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "LYNC";
    		$requirement->description = "Movimientos de LYNC";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->rpm == 1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Conseguir RPM";
    		$requirement->description = "Conseguir RPM para el nuevo empleado";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->anexo==1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Conseguir anexo";
    		$requirement->description = "Conseguir anexo para el nuevo empleado";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}

    	if($form->automovil==1){
    		$requirement = new Requirement;
    		$requirement->limitDate = Date('y:m:d', strtotime("+".$tiempo1->duracionEstimada." days"));
    		$requirement->registerDate = Date('y:m:d');
    		$requirement->status = 0;
    		$requirement->employeeID = $form->employeeID;
    		$requirement->formID = $form->id;
    		$requirement->name = "Conseguir plaza de carro";
    		$requirement->description = "Conseguir plaza de carro para el nuevo empleado";
            $requirement->role = Config::get('constants.COLABORATOR_ADMIN');
    		$requirement->save();
    	}
    }

    public function search(){
    	$input = Input::all();


		$forms = Forms::where('status', $input['filter'])->get();

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

}