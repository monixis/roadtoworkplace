<link rel="stylesheet" type="text/css" href="./style/main.css" />
<div class="empdetails">
	<div id="empdetailsleft">
		<form name="empupdate" id="empupdate" action="#" method="post">

			<?php
			foreach ($result as $row) {
				$eid = $row -> eid;
				$employer = $row -> empname;
				$website = $row -> website;
				$corporatewebsite = $row -> corporatewebsite;
				$additionalwebsites = $row -> additionalwebsites;
				$leadership = $row -> leadership;
				$hrcontactinfo = $row -> hrcontactinfo;
				$jobfaircontactinfo = $row -> jobfaircontactinfo;
				$location = $row -> location;
				$region = $row -> region;
				$size = $row -> size;
				$noofemp = $row -> noofemp;
				$ticker = $row -> ticker;
				$affiliates = $row -> affiliates;
				$news = $row -> news;
				$budget = $row -> budget;
				$facebook = $row -> facebook;
				$twitter = $row -> twitter;
				$linkedin = $row -> linkedin;
				$taxforms = $row -> taxforms;
				$socialmedia = $row -> socialmedia;
				$missionstmt = $row -> missionstmt;
				$overview = $row -> overview;
				$culture = $row -> culture;
				$financials = $row -> financials;
				$citations = $row -> citations;
				$poi = $row -> poi;
			}

			$empurl = base_url("?c=rtw&m=getemployerdetails&eid=") . $eid;
			?>

			<h2 id="empname"><?php echo $employer; ?></h2>
			<a href="<?php echo $empurl; ?>" target="_blank" style="font-size: small; margin-left: 10px;">View employer's page</a>
			
			<input type="button" id="undo" value="Revert Back" style="float: right;"> 
			</input>

			<p>
				<strong>Employer's Name: </strong>
			</p>
			<textarea rows="4" cols="50" id='empname'>
						<?php echo $employer; ?> 
					</textarea>
			<input type="button" class="edit" id="empname" value="Edit"> 
			</input>
			
			<p>
				<strong>Points of Interest: </strong>
			</p>
			<textarea rows="4" cols="50" id='poi'>
						<?php echo $poi; ?> 
					</textarea>
			<input type="button" class="edit" id="poi" value="Edit"> 
			</input>
			

			<p>
				<strong>Employer Overview: </strong>
			</p>
			<textarea rows="4" cols="50" id='overview'>
						<?php echo $overview; ?>
					</textarea>
			<input type="button" class="edit" id="overview" value="Edit">
			</input>
			

			<p>
				<strong>Mission Statement: </strong>
			</p>
			<textarea rows="4" cols="50" id='missionstmt'>
						<?php echo $missionstmt; ?>
					</textarea>
			<input type="button" class="edit" id="missionstmt" value="Edit">
			</input>
			

			<p>
				<strong>Company Culture: </strong>
			</p>
			<textarea rows="4" cols="50" id='culture'>
						<?php echo $culture; ?>
					</textarea>
			<input type="button" class="edit" id="culture" value="Edit">
			</input>

			<p>
				<strong>Financials: </strong>
			</p>
			<textarea rows="4" cols="50" id='financials'>
						<?php echo $financials; ?>
					</textarea>
			<input type="button" class="edit" id="financials" value="Edit">
			</input>

			<p>
				<strong>990 Tax Forms: </strong>
			</p>
			<textarea rows="4" cols="50" id='taxforms'>
						<?php echo $taxforms; ?>
				    </textarea>
			<input type="button" class="edit" id="taxforms" value="Edit">
			</input>

			<p>
				<strong>Citations: </strong>
			</p>
			<textarea rows="4" cols="50" id='citations'>
						<?php echo $citations; ?>
				    </textarea>
			<input type="button" class="edit" id="citations" value="Edit">
			</input>
			
			<p><strong>Remove Associated Majors:</strong></p>
					<div id="maj">
					<?php
					foreach ($majors as $row1) {
						$mid = $row1 -> mid;
						$major = $row1 -> major;
					?>
						<div id="<?php echo $mid; ?>">
							<input class="majors" type="checkbox" name="<?php echo $major; ?>" id="<?php echo $mid; ?>" checked>
							<?php echo $major; ?>
							</input>
						</div>
						
					<?php } ?></br>
					</div>
			<input type="button" id="majors" value="Remove"></input>
						
			<p><strong>Add majors: </strong></p>
			<div id="addmaj">
				<?php
						foreach ($addmajors as $row2) {
						$mid = $row2 -> mid;
						$major = $row2 -> major;
						?>
						<div id="<?php echo $mid; ?>">
						<input class="addmajors" type="checkbox" name="<?php echo $major; ?>" id="<?php echo $mid; ?>">
						<?php echo $major; ?>
						</input>
					    </div>
					

						<?php } ?>

						<br/>
						<input type="button" class="LinkMajors" id="LinkMajors" value="Link associated majors">
						</input>
			</div>

			<p><strong>Remove Associated Industries:</strong></p>
					<div id="ind">
					<?php
					foreach ($industries as $row1) {
						$iid = $row1 -> iid;
						$industry = $row1 -> industry;
					?>
						<div id="<?php echo $iid; ?>">
							<input class="industry" type="checkbox" name="<?php echo $industry; ?>" id="<?php echo $iid; ?>" checked>
							<?php echo $industry; ?>
							</input>
						</div>
						
					<?php } ?></br>
					</div>
			<input type="button" id="industry" value="Remove"></input>
			
			<p><strong>Add Industries: </strong></p>
			<div id="addind">
				<?php
						foreach ($addindustry as $row2) {
						$iid = $row2 -> iid;
						$industry = $row2 -> industry;
						?>
						<div id="<?php echo $iid; ?>">
							<input class="addind" type="checkbox" name="<?php echo $industry; ?>" id="<?php echo $iid; ?>">
							<?php echo $industry; ?>
							</input>
					    </div>
					
				<?php } ?>

						<br/>
			</div>
			<input type="button" class="LinkIndustry" id="LinkIndustry" value="Link associated industries"></input>
			
			
	
	</div>

	<div id="empdetailsright">

		<p>
			<strong>Ticker: </strong>
		</p>		<textarea rows="4" cols="50" id='ticker'><?php echo $ticker; ?></textarea><br/>
<input type="button" class="edit" id="ticker" value="Edit">		</input>
		<p>
			<strong>Location: </strong>
		</p>		<textarea rows="4" cols="50" id='location'><?php echo $location; ?></textarea><br/>
<input type="button" class="edit" id="location" value="Edit">		</input>
		<p>
			<strong>Region: </strong>
		</p>		<textarea rows="4" cols="50" id='region'><?php echo $region; ?></textarea><br/>
<input type="button" class="edit" id="region" value="Edit">		</input>
		<p>
			<strong>No. of Employees: </strong>
		</p>		<textarea rows="4" cols="50" id='noofemp'><?php echo $noofemp; ?></textarea><br/>
<input type="button" class="edit" id="noofemp" value="Edit">		</input>
		<p>
			<strong>Affiliates: </strong>
		</p>		<textarea rows="4" cols="50" id='affiliates'><?php echo $affiliates; ?></textarea><br/>
<input type="button" class="edit" id="affiliates" value="Edit">		</input>
		<p>
			<strong>Budget: </strong>
		</p>		<textarea rows="4" cols="50" id='budget'><?php echo $budget; ?></textarea><br/>
<input type="button" class="edit" id="budget" value="Edit">		</input>

		<p>
			<strong>Websites:</strong>
		</p>
		<textarea rows="4" cols="50" id='website'>
					<?php echo $website; ?>
		</textarea><br/>
		<input type="button" class="edit" id="website" value="Edit">
		</input>

		<p>
			<strong>Corporate Websites:</strong>
		</p>
		<textarea rows="4" cols="50" id='corporatewebsite'>
				<?php echo $corporatewebsite; ?>
		</textarea><br/>
		<input type="button" class="edit" id="corporatewebsite" value="Edit">
		</input>

		<p>
			<strong>Additional Websites:</strong>
		</p>
		<textarea rows="4" cols="50" id='additionalwebsites'>
					<?php echo $additionalwebsites; ?>
		</textarea><br/>
		<input type="button" class="edit" id="additionalwebsites" value="Edit">
		</input>

		<p>
			<strong>HR Contact Information: </strong>
		</p>
		<textarea rows="4" cols="50" id='hrcontactinfo'>
					<?php echo $hrcontactinfo; ?>
				</textarea><br/>		
		<input type="button" class="edit" id="hrcontactinfo" value="Edit">
		</input>
		
		<p>
			<strong>Job Fair Contact Information: </strong>
		</p>
		<textarea rows="4" cols="50" id='jobfaircontactinfo'>
					<?php echo $jobfaircontactinfo; ?>
				</textarea><br/>		
		<input type="button" class="edit" id="jobfaircontactinfo" value="Edit">
		</input>
		
		<p>
			<strong>Leadership: </strong>
		</p>
		<textarea rows="4" cols="50" id='leadership'>
						<?php echo $leadership; ?>
		</textarea><br/>
		<input type="button" class="edit" id="leadership" value="Edit">
		</input>

		<p>
			<strong>News</strong>
		</p>
		<textarea rows="4" cols="50" id='news'>
						<?php echo $news; ?>
		</textarea><br/>		 
		<input type="button" class="edit" id="news" value="Edit">
		</input>

		<p>
			<strong>Facebook</strong>
		</p>
		<textarea rows="4" cols="50" id='facebook'>
						<?php echo $facebook; ?>
		</textarea><br/>		 
		<input type="button" class="edit" id="facebook" value="Edit">
		</input>
		
		<p>
			<strong>Twitter</strong>
		</p>
		<textarea rows="4" cols="50" id='twitter'>
						<?php echo $twitter; ?>
		</textarea><br/>		 
		<input type="button" class="edit" id="twitter" value="Edit">
		</input>
		
		<p>
			<strong>Linkedin</strong>
		</p>
		<textarea rows="4" cols="50" id='linkedin'>
						<?php echo $linkedin; ?>
		</textarea><br/>		 
		<input type="button" class="edit" id="linkedin" value="Edit">
		</input>
		
		<p>
			<strong>Other Social Media Links: </strong>
		</p>
		<textarea rows="4" cols="50" id='socialmedia'>
					<?php echo $socialmedia; ?>
		</textarea><br/>		
		<input type="button" class="edit" id="socialmedia" value="Edit">
		</input>
		
		

	<script type="text/javascript">
	var eid = <?php echo $eid ?>;
	$("input.edit").click(function(){
		var col = $(this).attr('id');
		var txt = "textarea#" + col;
		var val = $(txt).val();
				$.post("<?php echo base_url("?c=rtw&m=data_submitted"); ?>",{col: col, val: val, eid: eid}).done(function(data){
						if (data == 1){
								$(txt).css('border', '3px solid green');
										setTimeout(function(){
											$(txt).css('border', '1px solid grey');
										}, 2000)
						}
						else {
								$(txt).css('border', '3px solid red');
								alert ("Data update Failed. Contact Monish Singh.");
						}
				});
	});

	$("input#undo").click(function(){
	document.execCommand('undo', false, null);
	});
	
	
	$("input#majors").click(function(){
		$("input.majors").each(function(){
			if (!$(this).is(":checked")){
					var col1 = $(this).attr('id');
						$.post("<?php echo base_url("?c=rtw&m=majors_unselected"); ?>",{col1: col1, eid: eid}).done(function(data){
							if (data == 1){
											$("div#maj").children("div#" + col1).css("text-decoration", "line-through");
											$("div#maj").css('border', '3px solid green');
													setTimeout(function(){
																$("div#maj").css('border', '1px solid grey');
																		}, 2000)
							}else{
									$("div#maj").css('border', '3px solid red');
									alert ("Data update Failed. Contact Monish Singh.");
									}

							});

				}
			});
		});
	
	$("input#industry").click(function(){
		$("input.industry").each(function(){
			if (!$(this).is(":checked")){
					var col1 = $(this).attr('id');
						$.post("<?php echo base_url("?c=rtw&m=industry_unselected"); ?>",{col1: col1, eid: eid}).done(function(data){
							if (data == 1){
											$("div#ind").children("div#" + col1).css("text-decoration", "line-through");
											$("div#ind").css('border', '3px solid green');
													setTimeout(function(){
																$("div#ind").css('border', '1px solid grey');
																		}, 2000)
							}else{
									$("div#ind").css('border', '3px solid red');
									alert ("Data update Failed. Contact Monish Singh.");
									}

							});

				}
			});
		});
	
	$("input#LinkMajors").click(function(){
		$("input.addmajors").each(function(){
			if ($(this).is(":checked")){
					var col = $(this).attr('id');
					alert(col);
						$.post("<?php echo base_url("?c=rtw&m=majors_selected"); ?>",{col: col, eid: eid}).done(function(data){
							if (data == 1){
											$("div#addmaj").children("div#" + col).css("text-decoration", "line-through");
											$("div#addmaj").css('border', '3px solid green');
													setTimeout(function(){
																$("div#addmaj").css('border', '1px solid grey');
																		}, 2000)
							}else{
									$("div#addmaj").css('border', '3px solid red');
									alert ("Data Entry Failed. Contact Monish Singh.");
									}

							});

				}
			});
		});
		
		$("input#LinkIndustry").click(function(){
		$("input.addind").each(function(){
			if ($(this).is(":checked")){
					var col = $(this).attr('id');
						$.post("<?php echo base_url("?c=rtw&m=industries_selected"); ?>",{col: col, eid: eid}).done(function(data){
							if (data == 1){
											$("div#addind").children("div#" + col).css("text-decoration","line-through");
											$("div#addind").css('border', '3px solid green');
													setTimeout(function(){
																$("div#addind").css('border', '1px solid grey');
																		}, 2000)
																		
							}else{
									$("div#addind").css('border', '3px solid red');
									alert ("Data Entry Failed. Contact Monish Singh.");
									}

							});

				}
				
			});
		});


	</script>
		</form>
	</div>
</div>
