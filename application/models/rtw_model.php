<?php
class rtw_model extends CI_Model {

	function __construct() {
		// Call the Model constructor
		parent::__construct();
		// $this->load->database();
	}

	function getemployerdetails($eid) {
		$sql = "SELECT empname, website, corporatewebsite, additionalwebsites, leadership, hrcontactinfo, jobfaircontactinfo, location, region, geo, noofemp, emptype, ticker, affiliates, news, budget, facebook, twitter, socialmedia, missionstmt, overview, culture, financials, citations, poi, size from employer where eid = $eid";
		$results = $this -> db -> query($sql, array($eid));
		return $results -> result();
	}

   function getassociatedmajors($eid) {
		$sql = "SELECT majors.mid, major FROM majors INNER JOIN empmaj ON majors.mid = empmaj.mid INNER JOIN employer ON empmaj.empid = employer.eid WHERE employer.eid = $eid";
		$results = $this -> db -> query($sql, array($eid));
		return $results -> result();
	}
	
	function getassociatedindustry($eid) {
		$sql = "SELECT industry.iid, industry.industry FROM industry INNER JOIN empind ON industry.iid = empind.iid INNER JOIN employer ON empind.empid = employer.eid WHERE employer.eid = $eid";
		$results = $this -> db -> query($sql, array($eid));
		return $results -> result();
	}
   
   function getemployers() {
		$sql = "SELECT eid, empname from employer ORDER BY empname ASC";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getemployerstype() {
		$sql = "SELECT tid, type from employertype ORDER BY type ASC";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getmajors() {
		$sql = "SELECT mid, major from majors ORDER BY major ASC LIMIT 10";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getmajors1() {
		$sql = "SELECT mid, major from majors WHERE mid > 7";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	
	function getindustry() {
		$sql = "SELECT iid, industry from industry ORDER BY industry ASC LIMIT 10";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	
	function getindustry1() {
		$sql = "SELECT iid, industry from industry industry WHERE iid > 10";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	function getrefinedemployers($qry){
		//$qry1 = "emptype in (1,2)";
		$sql = "SELECT DISTINCT eid, empname FROM employertype INNER JOIN employer ON employertype.tid = employer.emptype INNER JOIN empind on employer.eid = empind.empid INNER JOIN empmaj on employer.eid = empmaj.empid where ";
		//$sql = "SELECT DISTINCT eid, empname FROM ((employertype INNER JOIN employer ON employertype.tid = employer.emptype) INNER JOIN empind ON employer.eid = empind.empid) INNER JOIN empmaj ON employer.eid = empmaj.empid WHERE where emptype = 1";
	   //$sql = "SELECT eid, empname FROM empdetails";
		// if($qry == "emptype%20in%20(1,2,3,4)"){
		// 	$sql = 
		// }
		// else{
			$sql = $sql . $qry;
		// }
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
	/*function getrefinedemployers(){
		$sql = "SELECT eid, empname FROM employer where eid%20in%20(1,2)";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}*/
	
	
	
}
?>