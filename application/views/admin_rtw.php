
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>Road To The Workplace</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="http://library.marist.edu/images/jac.png" />
		<link rel="stylesheet" type="text/css" href="./style/main.css" />
		<link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/menuStyle.css" />
		<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script src="http://library.marist.edu/js/libraryMenu.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="http://library.marist.edu/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="http://library.marist.edu/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script src="./js/jquery.rss.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>
		<script type="text/javascript">	
		
			$(document).ready(function() {
			
				$('#refine, #emplist').hover(function() {
					$(this).css('overflow-y', 'auto');
				}, function() {
					$(this).css('overflow-y', 'hidden');
				});
				
				$('#majmore, #indmore').hide();
				
               $('#emplist').load('http://localhost/roadtoworkplace/?c=rtw&m=getemployers');
			});
		</script>
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] ||
				function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o), m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-55162672-1', 'auto');
			ga('send', 'pageview');

       </script>
       <style>
			@-moz-document url-prefix() {
				#searching {
				margin-left: 270px;
			}
			}
		</style>
	</head>
	<body>
		<div id="headerContainer">
			<a href="<?php echo base_url(); ?>" target="_self"> 
				<div id="header">		
				</div> 
			</a>
		</div>

		<div id="menu">
			<div id="menuItems">

			</div>
		</div>

		<div class = "container_home">
			<div class="empdetails">
				<div style="width: 12px; float:left;">
					<img src="./icons/beta.gif" />
				</div>

				<div id="rtwoptions" style="margin-bottom: 5px;">
					<h1 style="color: #b31b1b; text-align: center;">Road to the Workplace Admin Page</h1>
					<div id="options"><a href="<?php echo base_url(); ?>" title="Home" target="_self"><img class="mainoptions" src="./icons/home.png" /></a><a href="http://libguides.marist.edu/RoadtotheWorkplace" title="Road to the Workplace: Research Tools" target="_blank"><img class="mainoptions" src="./icons/libguides.png" /></a><a href="http://library.marist.edu/forms/ask.php" title="Ask-a-Librarian" target="_blank"><img class="mainoptions" src="./icons/contact.png" /></a><a href="<?php echo base_url("?c=rtw&m=disclaimer?iframe=true&width=47%&height=55%"); ?>" rel="prettyPhoto"><img class="mainoptions" src="./icons/disclaimer.png" /></a></div>
				</div>

				<section style="padding-bottom: 130px; border-bottom: solid 1px">
					<div style="width: 50%; float: left; margin: 0px; border-right: solid 1px;">
						<h2>Search:</h2>
							<input id="empSearch" type="text" placeholder="Search Employer...">
							<button id="btn" onclick="empSearch()">Search</button>
						<br>
						<h2 style="width: 230px;">Or find: </h2>
						<select name="employers">
							<?php
								foreach ($allemployers as $row) {
									$allempname = $row -> empname;
									$alleid = $row -> eid;
									echo "<option value='$alleid' name='$allempname'>$allempname</option>\n";
								}
							?>
						</select>
						<button onclick="editEntry()">Edit</button>
					</div>

					<div style="float: left;">
						<h2>Add New Entry:</h2>
						<button id="btn_entry" onclick="newEntry()">New Entry</button>
					</div>
				</section>

				<div id="editor" style="padding-top: 10px">

					<!-- Load all details about specific employer -->
					<?php
						if(isset($specificemployer)){
							foreach ($specificemployer as $row) {
								$eid = $row -> eid;
								$empname = $row -> empname;
								$missionstmt = $row -> missionstmt;
								$overview = $row -> overview;
								$website = $row -> website;
								$corporatewebsite = $row -> corporatewebsite;
								$additionalwebsites = $row -> additionalwebsites;
								$leadership = $row -> leadership;
								$culture = $row -> culture;
								$hrcontactinfo = $row -> hrcontactinfo;
								$jobfaircontactinfo = $row -> jobfaircontactinfo;
								$location = $row -> location;
								$geo = $row -> geo;
								$region = $row -> region;
								$size = $row -> size;
								$noofemp = $row -> noofemp;
								$emptype = $row -> type;
								$ticker = $row -> ticker;
								$affiliates = $row -> affiliates;
								$financials = $row -> financials;
								$industry = $row -> industry;
								$majors = $row -> majors;
								$news = $row -> news;
								$citations = $row -> citations;
								$name = $row -> yourName;
								$budget = $row -> budget;
								$facebook = $row -> facebook;
								$twitter = $row -> twitter;
								$socialmedia = $row -> socialmedia;
								$taxforms = $row -> taxforms;
								$linkedin = $row -> linkedin;
								$poi = $row -> poi;
								$tid = $row -> tid;
							}
						}
					?>

					<form id='empdetails' action="?c=rtw&m=dbResultToAdmin" method="post" hidden>
						<p>* Required</p>
						<br>
						<label for="eid"><b>*Employer ID:</b></label>
						<input type="text" id="eid" name="eid" size="3" value="<?php if(isset($eid)) echo $eid; ?>" style="margin-right: 50px" required>

						<label for="empname"><b>*Employer Name:</b></label>
						<input type="text" id="empname" name="empname" size="35" value="<?php if(isset($empname)) echo $empname; ?>" style="margin-right: 50px" required>

						<label for="emptype"><b>*Employer Type:</b></label>
						<select id="emptype" name="emptype" required>
							<?php if(isset($emptype)){ echo "<option value='$tid'>Current -- $emptype</option>";} ?>
							<option value="1">Non Profit Organization</option>
							<option value="2">Government Agency</option>
							<option value="3">Company - Public</option>
							<option value="4">Company - Private</option>
						</select>

						<br><br>
						<section style="padding-bottom: 175px">
							<div style="width: 50%; float: left; margin: 0px;">
								<label for="missionstmt"><b>Mission Statement:</b></label>
								<br>
								<textarea id="misionstmt" name="missionstmt" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if(isset($missionstmt)){
											echo $missionstmt;
										}
									?></textarea>
							</div>

							<div style="width: 50%; float:left">
								<label for="overview"><b>*Overview:</b></label>
								<br>
								<textarea id="overview" name="overview" wrap="soft" style="resize: none" rows="10" cols="50" required><?php
										if(isset($overview)){
											echo $overview;
										}
									?></textarea>
							</div>
						</section>

						<div id="websites" style="padding-bottom: 15px">
							<label for="website" style="padding-right: 66px"><b>Website:</b></label>
							<input type="text" id="website" name="website" size='50' value='<?php if(isset($website)){echo str_replace("'", "\"", $website); } ?>'>
							<label for="leadership" style="margin-left: 29px"><b>Leadership:</b></label>
							<br><br>
							<label for="corporatewebsite" style="padding-right: 4px"><b>Coporate Website:</b></label>
							<input type="text" id="corporatewebsite" name="corporatewebsite" size='50' value='<?php if(isset($corporatewebsite)){echo str_replace("'", "\"", $corporatewebsite); } ?>'>
							<br><br>
							<label for="additionalwebsites"><b>Additional Website:</b></label>
							<input type="text" id="additionalwebsites" name="additionalwebsites" size='50' value='<?php if(isset($additionalwebsites)){echo str_replace("'", "\"", $additionalwebsites); } ?>'>
							
							<textarea style="resize: none; float: right; margin-right: 142px; margin-top: -50px" wrap="soft" rows="5" cols="50" id="leadership" name="leadership"><?php
									if (isset($leadership)) {
										echo $leadership;
									}
								?></textarea>
						</div>

						<section style="padding-bottom: 55px">
							<div style="width: 40%; float: left; margin: 0px;">
								<label for="culture"><b>Culture:</b></label>
								<br>
								<textarea id="culture" name="culture" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if(isset($culture)){
											echo $culture;
										}
									?></textarea>
							</div>

							<div style="margin-top: 3px;">
								<label for="hrcontactinfo" style="padding-right: 30px"><b>HR Contact Info:</b></label>
								<input type="text" id="hrcontactinfo" name="hrcontactinfo" size="50" value='<?php if(isset($hrcontactinfo)){echo str_replace("'", "\"", $hrcontactinfo);} ?>' style="">
								<br><br>
								<label for="jobfair"><b>Job Fair Contact Info</b>:</label>
								<input type="text" id="jobfaircontactinfo" name="jobfaircontactinfo" size="50" value='<?php if(isset($jobfaircontactinfo)){echo str_replace("'", "\"", $jobfaircontactinfo); } ?>'>
								<br><br>
								<label for="location" style="padding-right: 77px"><b>Location:</b></label>
								<input type="text" id="location" name="location" value="<?php if(isset($location)){echo $location;} ?>" size="50">
								<br><br>
								<label for="geo"><b>*Geographic Scope of Operactions:</b></label>
								<select id="geo" name="geo" required>
									<?php
										if (isset($geo)) {
											echo "<option value='$geo'>Current -- $geo</option>";
										}
									?>
									<option value="Local">Local</option>
									<option value="State-Wide">State-Wide</option>
									<option value="Regional">Regional</option>
									<option value="National">National</option>
									<option value="International">International</option>
								</select>
							</div>
						</section>

						<section style="padding-bottom: 210px">
							<div style="width: 20%; float: left">
								<label for="region[]"><b>*Region:</b></label>
								<br>
								<!-- <input type="checkbox" id="selectAllRegs">Select All Regions<br> -->
								<?php 
									$regionChecks = array('New England' => '<input class="reg" type="checkbox" name="region[]" value="New England" ',
										'Middle Atlantic' => '<input class="reg" type="checkbox" name="region[]" value="Middle Atlantic" ',
										'South Atlantic' => '<input class="reg" type="checkbox" name="region[]" value="South Atlantic" ',
							 			'East North Central' => '<input class="reg" type="checkbox" name="region[]" value="East North Central" ',
							 			'East South Central' => '<input class="reg" type="checkbox" name="region[]" value="East South Central" ',
							 			'West North Central' => '<input class="reg" type="checkbox" name="region[]" value="West North Central" ',
							 			'West South Central' => '<input class="reg" type="checkbox" name="region[]" value="West South Central" ',
							 			'Mountain' => '<input class="reg" type="checkbox" name="region[]" value="Mountain" ',
							 			'Pacific (includes Hawaii and Alaska)' => '<input class="reg" type="checkbox" name="region[]" value="Pacific (includes Hawaii and Alaska)" ',
						 				'Outside U.S.' => '<input class="reg" type="checkbox" name="region[]" value="Outside U.S." ');

									if(isset($region)){
										$regions = explode(", ", $region);
										foreach ($regions as $value) { 
											if(in_array($value, array_keys($regionChecks))){
												$regionChecks[$value] .= 'checked';
											}
										}
										for ($i = 0; $i < count(array_keys($regionChecks)); $i++) {
											if ($i == 8) {
												echo(array_values($regionChecks)[$i] . '>Pacific<br>');
											}
											else{
												echo(array_values($regionChecks)[$i] . '>' . array_keys($regionChecks)[$i] . '<br>');
											}
										}
									}
									else{
										for ($i = 0; $i < count(array_keys($regionChecks)); $i++) {
											if ($i == 8) {
												echo(array_values($regionChecks)[$i] . '>Pacific<br>');
											}
											else{
												echo(array_values($regionChecks)[$i] . '>' . array_keys($regionChecks)[$i] . '<br>');
											}
										}
									}
								?>
							</div>
							
							<div style="width: 40%; float: left">
								<label for="size"><b>Size:</b></label>
								<select id="size" name="size">
								 	<?php 
								 		if (isset($size)) {
								 			echo "<option value='$size'>Current -- $size</option>";
								 		}
								 	 ?>
								 	<option value="Small (Under 500 employees)">Small (Under 500 employees)</option>
								 	<option value="Medium (500-9,999 employees)">Medium (500 - 9,999 employees)</option>
								 	<option value="Large (More than 10,000 employees)">Large (More than 10,000 employees)</option>
								</select>
								<br><br>
								<label for="noofemp"><b>Number of Employees:</b></label>
								<input type="text" id="noofemp" name="noofemp" value="<?php if (isset($noofemp)){ echo $noofemp; } ?>" size="15">
								<br><br>
								<label for="ticker"><b>Ticker:</b></label>
								<input type="text" id="ticker" name="ticker" value="<?php if (isset($ticker)) { echo $ticker; } ?>" size="15">
							</div>

							<div style="width: 40%; float: left">
								<label for="affiliates"><b>Affiliates and Subsidiaries:</b></label>
								<br>
								<textarea id="affiliates" name="affiliates" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if (isset($affiliates)) {
											echo $affiliates;
										}
									?></textarea>
							</div>
						</section>

						<section style="padding-bottom: 175px">
							<div style="width: 50%; float: left">
								<label for="citations"><b>Citations:</b></label>
								<br>
								<textarea id="citations" name="citations" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if (isset($citations)) {
											echo $citations;
										}
									?></textarea>
							</div>

							<div style="width: 50%; float: left">
								<label for="poi"><b>Points of Interest:</b></label>
								<br>
								<textarea id="poi" name="poi" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if (isset($poi)) {
											echo $poi;
										}
									?></textarea>
							</div>
						</section>

						<section style="padding-bottom: 175px">
							<div style="width: 40%; float: left">
								<label for="financials"><b>Financials:</b></label>
								<br>
								<textarea id="financials" name="financials" wrap="soft" style="resize: none" rows="10" cols="50"><?php
										if (isset($financials)) {
											echo $financials;
										}
									?></textarea>
							</div>
							
							<div style="width: 50%; float: left">
								<label for="facebook" style="margin-right: 57px"><b>Facebook:</b></label>
								<input type="text" id="facebook" name="facebook" value='<?php if (isset($facebook)) { echo str_replace("'", "\"", $facebook); } ?>' size="50">
								<br><br>
								<label for="twitter" style="margin-right: 77px"><b>Twitter:</b></label>
								<input type="text" id="twitter" name="twitter" value='<?php if (isset($twitter)) { echo str_replace("'", "\"", $twitter); } ?>' size="50">
								<br><br>
								<label for="socialmedia"><b>Other Social Media:</b></label>
								<input type="text" id="socialmedia" name="socialmedia" value='<?php if (isset($socialmedia)) { echo str_replace("'", "\"", $socialmedia); } ?>' size="50">
								<br><br>
								<label for="linkedin" style="margin-right: 66px"><b>LinkedIn:</b></label>
								<input type="text" id="linkedin" name="linkedin" value='<?php if (isset($linkedin)) { echo str_replace("'", "\"", $linkedin); } ?>' size="50">
							</div>
						</section>

						<label for="taxforms"><b>990 Tax Forms:</b></label>
						<input type="text" id="taxforms" name="taxforms"  size="30" value='<?php if(isset($taxforms)) { echo str_replace("'", "\"", $taxforms); } ?>'>

						<label for="budget"><b>Budget:</b></label>
						<input type="text" id="budget" name="budget" size="30" value="<?php if(isset($budget)) { echo $budget; } ?>">
						
						<label for="news"><b>*Employer in the News:</b></label>
						<input type="text" id="news" name="news" size="30" value='<?php if(isset($news)) echo str_replace("'", "\"", $news); ?>' required>
						<br><br>

						<section style="padding-bottom: 620px">
							<div style="width: 50%; float: left">
								<label for="industry[]"><b>*Employer Industry or Field:</b></label>
								<br>
								<!-- <input type="checkbox" id="selectAllInds">Select All Industries<br> -->
								<?php 
									$inds = array('Accounting, Tax Preparation, Bookkeeping, and Payroll' => '<input class="ind" type="checkbox" name="industry[]" value="Accounting, Tax Preparation, Bookkeeping, and Payroll" ',
										'Advertising, Public Relations and Related Services' => '<input class="ind" type="checkbox" name="industry[]" value="Advertising, Public Relations and Related Services" ',
										'Agriculture, Food, Nutrition' => '<input class="ind" type="checkbox" name="industry[]" value="Agriculture, Food, Nutrition" ',
										'Arts, Culture, and Humanities' => '<input class="ind" type="checkbox" name="industry[]" value="Arts, Culture, and Humanities" ',
										'Alliance/Advocacy Organizations' => '<input class="ind" type="checkbox" name="industry[]" value="Alliance/Advocacy Organizations" ',
										'Alliance/Advocacy Organizations' => '<input class="ind" type="checkbox" name="industry[]" value="Alliance/Advocacy Organizations" ',
										'Animal Protection and Welfare' => '<input class="ind" type="checkbox" name="industry[]" value="Animal Protection and Welfare" ',
										'Broadcasting (Television and Radio)' => '<input class="ind" type="checkbox" name="industry[]" value="Broadcasting (Television and Radio)" ',
										'Children and Youth Services' => '<input class="ind" type="checkbox" name="industry[]" value="Children and Youth Services" ',
										'Computer Systems Design' => '<input class="ind" type="checkbox" name="industry[]" value="Computer Systems Design" ',
										'Disease, Disorders, Medical Disciplines' => '<input class="ind" type="checkbox" name="industry[]" value="Disease, Disorders, Medical Disciplines" ',
										'Educational Services and Schools' => '<input class="ind" type="checkbox" name="industry[]" value="Educational Services and Schools" ',
										'Employement Procurement Assistance and Job Training' => '<input class="ind" type="checkbox" name="industry[]" value="Employement Procurement Assistance and Job Training" ',
										'Financial Institutions (banks and credit unions)' => '<input class="ind" type="checkbox" name="industry[]" value="Financial Institutions (banks and credit unions)" ',
										'Financial Services (financial advice and planning)' => '<input class="ind" type="checkbox" name="industry[]" value="Financial Services (financial advice and planning)" ',
										'Health Support Services' => '<input class="ind" type="checkbox" name="industry[]" value="Health Support Services" ',
										'Human Services' => '<input class="ind" type="checkbox" name="industry[]" value="Human Services" ',
										'Insurance' => '<input class="ind" type="checkbox" name="industry[]" value="Insurance" ',
										'International, Foreign Affairs, and National Security' => '<input class="ind" type="checkbox" name="industry[]" value="International, Foreign Affairs, and National Security" ',
										'Law Enforcement' => '<input class="ind" type="checkbox" name="industry[]" value="Law Enforcement" ',
										'Legal Services' => '<input class="ind" type="checkbox" name="industry[]" value="Legal Services" ',
										'Management of Companies and Enterprises' => '<input class="ind" type="checkbox" name="industry[]" value="Management of Companies and Enterprises" ',
										'Mental Health, Crisis Intervention' => '<input class="ind" type="checkbox" name="industry[]" value="Mental Health, Crisis Intervention" ',
										'Museums & Museum Activities' => '<input class="ind" type="checkbox" name="industry[]" value="Museums & Museum Activities" ',
										'Real Estate' => '<input class="ind" type="checkbox" name="industry[]" value="Real Estate" ',
										'Rental and Leasing Services' => '<input class="ind" type="checkbox" name="industry[]" value="Rental and Leasing Services" ',
										'Retail and Wholesale--Clothing and Clothing Accessories' => '<input class="ind" type="checkbox" name="industry[]" value="Retail and Wholesale--Clothing and Clothing Accessories" ',
										'Retail and Wholesale--Furnishings and Home Furnishing' => '<input class="ind" type="checkbox" name="industry[]" value="Retail and Wholesale--Furnishings and Home Furnishing" ',
										'Retail and Wholesale--General Merchandise ' => '<input class="ind" type="checkbox" name="industry[]" value="Retail and Wholesale--General Merchandise" ',
										'Retail and Wholesale--Health and Personal Care' => '<input class="ind" type="checkbox" name="industry[]" value="Retail and Wholesale--Health and Personal Care" ',
										'Scientific Research and Development Services' => '<input class="ind" type="checkbox" name="industry[]" value="Scientific Research and Development Services" ',
										'Telecommunications' => '<input class="ind" type="checkbox" name="industry[]" value="Telecommunications" ',
										'Utilities' => '<input class="ind" type="checkbox" name="industry[]" value="Utilities" ');

									if(isset($industry)){
										$i = explode(", ", $industry);

										$empInds = array();

										// Appends the different industries that have commas
										for ($j = 0; $j < count($i); $j++) {
											if($i[$j] == "Accounting"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1] . ", " . $i[$j + 2] . ", " . $i[$j + 3]);
												$j += 3;
											}

											else if($i[$j] == "Advertising"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1]);
												$j += 1;
											}

											else if($i[$j] == "Agriculture"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1] . ", " . $i[$j + 2]);
												$j += 2;
											}

											else if($i[$j] == "Arts"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1] . ", " . $i[$j + 2]);
												$j += 2;
											}

											else if($i[$j] == "Disease"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1] . ", " . $i[$j + 2]);
												$j += 2;
											}

											else if($i[$j] == "International"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1] . ", " . $i[$j + 2]);
												$j += 2;
											}

											else if($i[$j] == "Mental Health"){
												array_push($empInds, $i[$j] . ", " . $i[$j + 1]);
												$j += 1;
											}

											else{
												array_push($empInds, $i[$j]);
											}
										}

										foreach ($empInds as $value) { 
											if(in_array($value, array_keys($inds))){
												$inds[$value] .= 'checked';
											}
											// if ($value == "Retail and Wholesale--General Merchandise ") {
											// 	echo "true";
											// }
										}

										for ($k = 0; $k < count(array_keys($inds)); $k++) {
											echo(array_values($inds)[$k] . '>' . array_keys($inds)[$k] . '<br>');
										}
									}
									else{
										for ($k = 0; $k < count(array_keys($inds)); $k++) {
											echo(array_values($inds)[$k] . '>' . array_keys($inds)[$k] . '<br>');
										}
									}
									
								?>
							</div>

							<div style="width: 50%; float: left">
								<label for="majors[]"><b>Majors:</b></label>
								<br>
								<!-- <input type="checkbox" id="selectAllMajs">Select All Majors<br> -->
								<?php
									// if(isset($majors)){ 
										$majs = array('Accounting' => '<input class="maj" type="checkbox" name="majors[]" value="Accounting" ',
											'Biomedical Sciences' => '<input class="maj" type="checkbox" name="majors[]" value="Biomedical Sciences" ',
											'Business ' => '<input class="maj" type="checkbox" name="majors[]" value="Business " ',
											'Communications' => '<input class="maj" type="checkbox" name="majors[]" value="Communications" ',
											'Computer Science' => '<input class="maj" type="checkbox" name="majors[]" value="Computer Science" ',
											'Criminal Justice' => '<input class="maj" type="checkbox" name="majors[]" value="Criminal Justice" ',
											'Digital Media' => '<input class="maj" type="checkbox" name="majors[]" value="Digital Media" ',
											'Economics' => '<input class="maj" type="checkbox" name="majors[]" value="Economics" ',
											'Education' => '<input class="maj" type="checkbox" name="majors[]" value="Education" ',
											'Environmental Science' => '<input class="maj" type="checkbox" name="majors[]" value="Environmental Science" ',
											'Fashion' => '<input class="maj" type="checkbox" name="majors[]" value="Fashion" ',
											'Information Technology and Systems' => '<input class="maj" type="checkbox" name="majors[]" value="Information Technology and Systems" ',
											'Liberal Arts' => '<input class="maj" type="checkbox" name="majors[]" value="Liberal Arts" ',
											'Mathematics' => '<input class="maj" type="checkbox" name="majors[]" value="Mathematics" ',
											'Medical Technology' => '<input class="maj" type="checkbox" name="majors[]" value="Medical Technology" ',
											'Natural Science' => '<input class="maj" type="checkbox" name="majors[]" value="Natural Science" ',
											'Psychology' => '<input class="maj" type="checkbox" name="majors[]" value="Psychology" ',
											'Social Work' => '<input class="maj" type="checkbox" name="majors[]" value="Social Work" ');
									
									if(isset($majors)){
										$empMajs = explode(", ", $majors);

										foreach ($empMajs as $value) { 
												if(in_array($value, array_keys($majs))){
													$majs[$value] .= 'checked';
												}
											}

										for ($k = 0; $k < count(array_keys($majs)); $k++) {
											echo(array_values($majs)[$k] . '>' . array_keys($majs)[$k] . '<br>');
										}
									}
									else{
										for ($k = 0; $k < count(array_keys($majs)); $k++) {
											echo(array_values($majs)[$k] . '>' . array_keys($majs)[$k] . '<br>');
										}
									}
								?>
							</div>
						</section>

						<label for="yourName"><b>*Name:</b></label>
						<input type="text" id="yourName" name="yourName" size="40" value="<?php if(isset($name)){ echo $name; } ?>" required>
						<br><br>
						<div style="text-align: center">
							<input type="submit" id="submit" name="type" value="Add" style="margin: 0 auto">
							<input type="submit" id="delete" name="type" value="Delete" style="margin: 0 auto" hidden>
						</div>
					</form>
				</div>

				<div id="results" hidden><?php
						if(isset($res)){
							foreach ($res as $value) {
								$speceid = $value -> eid;
								$specempname = $value -> empname;
								echo "<a href='?c=rtw&m=getAdminPage&eid=$speceid'><h2>$specempname</h2></a>";
							}
						}
					?>
				</div>

				<div id="dbInsert" style="text-align: center" hidden>
					<h2><?php if(isset($success)){ echo print_r($success); } ?></h2>
				</div>
			</div>

			<div class="bottom">
				<p class = "foot">
					Marist College, 3399 North Road, Poughkeepsie, NY 12601; 845-575-3000
					<br />
					&#169; Copyright 2007-2014 Marist College. All Rights Reserved.

					<a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> 
				</p>

			</div>
		</div>
		<script type="text/javascript">
			window.onload = function(){
				if(getUrlVars()['m'] == 'getResultsAdmin'){
					$("#results").removeAttr('hidden');
					if($("#results").html().trim() == ""){
						$("#results").html("<h2 style='text-align: center'>No Results</h2>")
					}
				}
				else if(getUrlVars()['eid'] != null && getUrlVars()['eid'] != '0'){
					$('#empdetails').removeAttr('hidden');
					if (getUrlVars()['eid'] > -1) {
						$("#submit").val('Update');
						$("#delete").removeAttr('hidden');
					}
				}
				else if(getUrlVars()['m'] == 'dbResultToAdmin'){
					$("#dbInsert").removeAttr('hidden');
				}
			}

			// $(document).ready(function() {
			//     var $checkedInds = $(':checkbox[name="industry[]"]:checked'),
			//     $indCheckboxes = $(':checkbox[name="industry[]"]');

			// 	$indCheckboxes.click(function() {
			// 		if($checkedCheckboxes.length) {
			// 		        $indCheckboxes.removeAttr('required');
			// 	    } 
			// 	    else {
			// 	        $indCheckboxes.attr('required', 'required');
			// 	    }

			// 	});
			// });

			function getUrlVars() {
			    var vars = {};
			    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			        vars[key] = value;
			    });
			    return vars;
			}

			var empSearch = function(){
				var qry = $("#empSearch").val();
				window.location.href = '?c=rtw&m=getResultsAdmin&qry=' + qry;
			}

			function newEntry(){
				window.location.href = '?c=rtw&m=getAdminPage&eid=-1';
			}

			function editEntry(){
				var eid = $("select['name=employer'] option:selected").val();
				window.location.href = '?c=rtw&m=getAdminPage&eid=' + eid;
			}
		</script>
	</body>
</html>
