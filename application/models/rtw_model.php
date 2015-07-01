<?php
class rtw_model extends CI_Model {

	function __construct() {
		// Call the Model constructor
		parent::__construct();
		// $this->load->database();
	}

	function getemployerdetails($eid) {
		$sql = "SELECT eid, empname, website, corporatewebsite, additionalwebsites, leadership, hrcontactinfo, jobfaircontactinfo, location, region, geo, noofemp, emptype, ticker, affiliates, news, budget, facebook, twitter, socialmedia, missionstmt, overview, culture, financials, citations, poi, size, linkedin, taxforms from employer where eid = $eid";
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
	
	function updaterecords($eid,$col,$val){
		/*$sql ="UPDATE employer SET $col = '$val' WHERE eid = $eid";
		$result = $this -> db -> query($sql, array($col, $val, $eid));
		return $result;
		*/
		$data = array(
				$col => $val
		);
		
		$this -> db -> where('eid', $eid);
		$result = $this -> db -> update('employer', $data);
		return $result;
	}
	
	function removerecords($eid,$col1, $val){
		if ($val == 1){
			$sql ="DELETE FROM empmaj where empid = '$eid' and mid = '$col1'";
		}else if ($val == 2){
			$sql ="DELETE FROM empind where empid = '$eid' and iid = '$col1'";
		}
		$result = $this -> db -> query($sql, array($eid, $col1));
		return $result;
	}
	
	function addrecords($eid, $col, $id, $val){
		if ($val == 1){
			$sql ="INSERT into empmaj (id, empid, mid) values ('$id', '$eid', '$col')";
		}else if ($val == 2){
			$sql ="INSERT into empind (id, empid, iid) values ('$id', '$eid', '$col')";
		}
		$result = $this -> db -> query($sql, array($id, $eid, $col));
		return $result;
	}
	
	function insertnewemployer($eid, $empname, $emptype, $yourname){
		$sql = "INSERT into employer (eid, empname, emptype, yourName) values ($eid, '$empname', '$emptype', '$yourname')";
		$result = $this -> db -> query($sql, array($eid, $empname, $emptype, $yourname));
		return $result;
	}
	
	function getmaxid($col, $table){
		$this -> db -> select_max($col);
		$query = $this -> db -> get($table);
		foreach ($query -> result() as $row){
			$maxval = $row -> $col;
		}
		$maxval = $maxval + 1;
		return $maxval;
	}
		
	function getpasscode(){
		$this -> db -> select('passcode');
		$query = $this -> db -> get('passcode');
		foreach ($query -> result() as $row){
			$passcode = $row -> passcode;
		}
		return $passcode;
	}
	
	function getmajorsforadmin($eid) {
		$sql = "SELECT mid, major from majors WHERE mid not in (SELECT mid FROM empmaj WHERE empid = $eid) ORDER BY major ASC";
		$results = $this -> db -> query($sql, array($eid));
		return $results -> result();
	}
	
	function getindustryforadmin($eid) {
		$sql = "SELECT iid, industry from industry WHERE iid not in (SELECT iid FROM empind WHERE empid = $eid) ORDER BY industry ASC";
		$results = $this -> db -> query($sql, array($eid));
		return $results -> result();
	}
	
}
?>