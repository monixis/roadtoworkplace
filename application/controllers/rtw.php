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
	
	public function getemployers(){
		$this -> load -> model('rtw_model');
		$data['result'] = $this -> rtw_model -> getemployers();
		$this -> load -> view('main_view', $data);	
	}	
	
	public function disclaimer(){
		$this -> load -> view('disclaimer');	
	}	

	/* For Admin page */

	public function admin() {
		$this -> load -> model('rtw_model');
		$data['result'] = $this -> rtw_model -> getemployers();
		$data['passcode'] = $this -> rtw_model -> getpasscode();
		$this -> load -> view('admin', $data);
	}

	public function getemployerdetailsforAdmin() {
		$this -> load -> model('rtw_model');
		$eid = $this -> input -> get('eid');
		$data['title'] = "Admin - Road to the Workplace";
		$data['result'] = $this -> rtw_model -> getemployerdetails($eid);
		$data['majors'] = $this -> rtw_model -> getassociatedmajors($eid);
		$data['industries'] = $this -> rtw_model -> getassociatedindustry($eid);
		$data['addmajors'] = $this -> rtw_model -> getmajorsforadmin($eid);
		$data['addindustry'] = $this -> rtw_model -> getindustryforadmin($eid);
		$this -> load -> view('admin_view', $data);
	}

	public function form_show() {
		$this -> load -> view("admin_view.php");
	}
	
	public function data_submitted(){
		$col = $_POST['col'];
		$val = $_POST['val'];
		$eid = $_POST['eid'];
		$this -> load -> model('rtw_model');
		$result = $this -> rtw_model -> updaterecords($eid, $col, $val);
		echo $result;
	}

	public function newemployer() {
		$this -> load -> model('rtw_model');
		$data['emptype'] = $this -> rtw_model -> getemployerstype();
		//$data['empid'] = $this -> rtw_model -> getempid();
		$this -> load -> view('newemployer', $data);
	}
	
	public function newentry(){
		$empname = $_POST['empname'];
		$emptype = $_POST['emptype'];
		$yourname = $_POST['yourname'];
		$this -> load -> model('rtw_model');
		$eid = $this -> rtw_model -> getmaxid('eid', 'employer');
		$result = $this -> rtw_model -> insertnewemployer($eid, $empname, $emptype, $yourname);
		echo $result;
	}
		
	public function majors_unselected(){
		$col1 = $_POST['col1'];
		$eid = $_POST['eid'];
		$this -> load -> model('rtw_model');
		$result = $this -> rtw_model -> removerecords($eid, $col1, 1);
		echo $result;
	}
	
	public function majors_selected(){
		$col = $_POST['col'];
		$eid = $_POST['eid'];
		$this -> load -> model('rtw_model');
		$id = $this -> rtw_model -> getmaxid('id', 'empmaj');
		$result = $this -> rtw_model -> addrecords($eid, $col, $id, 1);
		echo $result;
	}
	
	public function industry_unselected(){
		$col1 = $_POST['col1'];
		$eid = $_POST['eid'];
		$this -> load -> model('rtw_model');
		$result = $this -> rtw_model -> removerecords($eid, $col1, 2);
		echo $result;
	}
	
	public function industries_selected(){
		$col = $_POST['col'];
		$eid = $_POST['eid'];
		$this -> load -> model('rtw_model');
		$id = $this -> rtw_model -> getmaxid('id', 'empind');
		$result = $this -> rtw_model -> addrecords($eid, $col, $id, 2);
		echo $result;
	}
	// just for testing 
	/*public function getpasscode(){
		$this -> load -> model('rtw_model');
		$result = $this -> rtw_model -> getpasscode();
		echo $result ;
	}
	
	public function getmax(){
		$this -> load -> model('rtw_model');
		$result = $this -> rtw_model -> getmaxid('eid', 'employer');
		echo $result ;
	}*/
	
}
?>