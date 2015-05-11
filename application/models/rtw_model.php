<?php
class rtw_model extends CI_Model {

	function __construct() {
		// Call the Model constructor
		parent::__construct();
		// $this->load->database();
	}

	function getemployerdetails($eid) {
		$sql = "SELECT empname, website, corporatewebsite, additionalwebsites, leadership, hrcontactinfo, jobfaircontactinfo, location, region, geo, noofemp, emptype, ticker, affiliates, news, budget, facebook, twitter, socialmedia, missionstmt, overview, culture, financials, citations, poi, size, linkedin, taxforms from employer where eid = $eid";
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

	function getspecificemployer($qry){
		$sql = "SELECT * FROM employer INNER JOIN employertype ON employer.emptype = employertype.tid WHERE eid = " . $qry;
		$results = $this -> db -> query($sql);
		return $results -> result();
	}

	function getempresults($qry){
		$sql = "SELECT DISTINCT eid, empname FROM employer WHERE empname LIKE '%" . $qry . "%'";
		$results = $this -> db -> query($sql);
		return $results -> result();
	}

	function deleteEmp($eid){
		if ($this -> db -> simple_query("DELETE FROM employer WHERE eid = $eid")) {
			$this -> db -> query("DELETE FROM employer WHERE eid = $eid");
			return "Delete Successful";
		} 
		else {
			return "Delete Unsuccessful";
		}
	}

	function updateEmp($emp){
		$this -> db -> where('eid' , $emp['eid']);
		$this -> db -> update("employer", $emp);
	}

	function addEmp($emp){
		// $sql = "INSERT INTO employer VALUES ('" . $emp['timestamp'] . "', " . $emp['eid'] . 
		// 	", '" . $emp['empname'] . "', '" . $emp['missionstmt'] . "', '" . $emp['overview'] . 
		// 	"', '" . $emp['website'] . "', '" . $emp['corporatewebsite'] . "', '" . $emp['additionalwebsites'] . 
		// 	"', '" . $emp['leadership'] . "', '" . $emp['culture'] . "', '" . $emp['hrcontactinfo'] . 
		// 	"', '" . $emp['jobfaircontactinfo'] . "', '" . $emp['location'] . "', '" . $emp['region'] . 
		// 	"', '" . $emp['geo'] . "', '" . $emp['size'] . "', '" . $emp['noofemp'] . "', '" . $emp['emptype'] . 
		// 	"', '" . $emp['ticker'] . "', '" . $emp['affiliates'] . "', '" . $emp['financials'] . "', '" . $emp['industry'] .
		// 	 "', '" . $emp['majors'] . "', '" . $emp['news'] . "', '" . $emp['citations'] . "', '" . 
		// 	 "', '" . $emp['yourName'] . "', '" . $emp['budget'] . "', '" . $emp['facebook'] . "', '" . $emp['twitter'] . 
		// 	 "', '" . $emp['socialmedia'] . "', '" . $emp['taxforms'] . "', '" . $emp['linkedin'] . "', '" . $emp['poi'] . "')" ;

		// $query = $this -> db -> query($sql);
		$this -> db -> insert('employer', $emp);
		return $emp['empname'] . " Added";
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
		$sql = "SELECT DISTINCT eid, empname FROM employertype INNER JOIN employer ON employertype.tid = employer.emptype INNER JOIN empind on employer.eid = empind.empid INNER JOIN empmaj on employer.eid = empmaj.empid where ";
		$sql = $sql . $qry;
		$results = $this -> db -> query($sql);
		return $results -> result();
	}
	
}
?>