<?php
class rtw extends CI_Controller {
	public function index() {
		$this -> load -> model('rtw_model');
		//$data['result'] = $this -> rtw_model -> getemployers();
		$data['title'] = "Road to the Workplace";		
		$data['emptype'] = $this -> rtw_model -> getemployerstype();
		$data['majors'] = $this -> rtw_model -> getmajors();
		$data['majors1'] = $this -> rtw_model -> getmajors1();
		$data['industry'] = $this -> rtw_model -> getindustry();
		$data['industry1'] = $this -> rtw_model -> getindustry1();
		$this -> load -> view('rtw_view', $data); 
	}
	

	public function getemployerdetails() {
		$this -> load -> model('rtw_model');
		$eid = $this -> input -> get('eid');	
		$data['title'] = "Road to the Workplace";
		$data['result'] = $this -> rtw_model -> getemployerdetails($eid);	
		$data['majors'] = $this -> rtw_model -> getassociatedmajors($eid);	
		$data['industries'] = $this -> rtw_model -> getassociatedindustry($eid);				
		$this -> load -> view('employer_view', $data);
	}
	
	public function getrefinedemployers() {
		$this -> load -> model('rtw_model');
		$qry = $this -> input -> get('qry');
		$data['title'] = "Road to the Workplace";
		$data['result'] = $this -> rtw_model -> getrefinedemployers($qry);
		//$data['emptype'] = $this -> rtw_model -> getemployerstype();
		//$data['majors'] = $this -> rtw_model -> getmajors();
		//$data['industry'] = $this -> rtw_model -> getindustry();
		$this -> load -> view('main_view', $data);		
	}

	public function getAdminPage(){
		$this -> load -> model('rtw_model');
		$data['allemployers'] = $this -> rtw_model -> getemployers();
		$eid = $this -> input -> get('eid');
		$data['specificemployer'] = $this -> rtw_model -> getspecificemployer($eid);
		$this -> load -> view('admin_rtw', $data);
	}

	public function getResultsAdmin(){
		$this -> load -> model('rtw_model');
		$search = $this -> input -> get('qry');
		$data['res'] = $this -> rtw_model -> getempresults($search);
		// $eid = $this -> input -> get('eid');
		// $data['specificemployer'] = $this -> rtw_model -> getspecificemployer($eid);
		$data['allemployers'] = $this -> rtw_model -> getemployers();
		$this -> load -> view('admin_rtw', $data);
	}

	public function dbResultToAdmin(){
		$this -> load -> model('rtw_model');
		if($this -> input -> post("type") == "Update"){
			$emp = $this -> input -> post();
			$emp['timestamp'] = "DATE_FORMAT(NOW(), '%m-%d-%y %T')";
			$emp['region'] = implode(", ", $emp['region']);
			$emp['industry'] = implode(", ", $emp['industry']);
			$emp['majors'] = implode(", ", $emp['majors']);
			// $data['success'] = $this -> rtw_model -> updateEmp($emp);
		}
		else if($this -> input -> post("type") == "Delete"){
			$eid = $this -> input -> post("eid");
			$data['success'] = $this -> rtw_model -> deleteEmp($eid);
		}
		else if($this -> input -> post("type") == "Add"){
			$emp = $this -> input -> post();
			$emp['timestamp'] = "DATE_FORMAT(NOW(), '%m-%d-%y %T')";
			$emp['region'] = implode(", ", $emp['region']);
			$emp['industry'] = implode(", ", $emp['industry']);
			$emp['majors'] = implode(", ", $emp['majors']);
			$data['success'] = $this -> rtw_model -> addEmp($emp);
		}
		$data['success'] = $this -> input -> post();
		$data['allemployers'] = $this -> rtw_model -> getemployers();
		$this -> load -> view('admin_rtw', $data);
	}
		
	public function getemployers(){
		$this -> load -> model('rtw_model');
		$data['result'] = $this -> rtw_model -> getemployers();
		$this -> load -> view('main_view', $data);	
	}	
	
	public function disclaimer(){
		$this -> load -> view('disclaimer');	
	}	
}
?>