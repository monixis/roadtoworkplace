<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>Add a New Employer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="http://library.marist.edu/images/jac.png" />
		<link rel="stylesheet" type="text/css" href="./style/main.css" />
		<link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/menuStyle.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script src="http://library.marist.edu/js/libraryMenu.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="http://library.marist.edu/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="http://library.marist.edu/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script src="./js/jquery.rss.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$("a[rel^='prettyPhoto']").prettyPhoto();
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
	</head>

	<body>
		<div id="headerContainer">
			<a href="<?php echo base_url(); ?>" target="_self"> <div id="header"></div> </a>
		</div>

		<div id="menu">
			<div id="menuItems">

			</div>
		</div>

		<div class = "container_home">
			<div class="empdetails">
				<div style="width: 12px; float:left;"><img src="./icons/beta.gif" />
				</div>
				<div id="rtwoptions" style="margin-bottom: 5px;">
					<h1 style="color: #b31b1b; text-align: center;">Admin - Road to the Workplace</h1>
				</div>
				<h2>Add a New Employer</h2>
				<div id="empDetails" style="margin-left: 50px;">

					<form name="newemp" id="newemp" action="#" method="post">
						<?php 
						$admin = base_url("?c=rtw&m=admin");
						?>
						<p>
							<strong>Employer Name: </strong>
						</p>
						<input type="text" name='emp' id='emp'></input>
						<br/>

						<p>
							<strong>Select the Employer Type:</strong>
						</p>
						<input class="refiner" type="radio" name="emptype" value="0" checked >
						All
						</br>
						<?php
						foreach ($emptype as $row1) {
						$tid = $row1 -> tid;
						$type = $row1 -> type;
						?>
						<input class="refiner" type="radio" name="emptype" value="<?php echo $tid; ?>">
						<?php echo $type; ?>
						</br>
						<?php } ?>
						<p>
							<strong>Your Name: </strong>
						</p>
						<input type="text" name='yourname' id='yourname'></input>
						<br/><br/>
						<input type="button" class="Add" id="empname" value="Add an Employer">
				</input><br /><br />
						<a href="<?php echo $admin ?>">Go to Admin Page to add remaining information</a>
						<br/>
						<br/>
						
					</form>
				</div>
			</div>

		</div>
		<div class="bottom">
			<p class = "foot">
				Marist College, 3399 North Road, Poughkeepsie, NY 12601; 845-575-3000
				<br />
				&#169; Copyright 2007-2014 Marist College. All Rights Reserved.

				<a href="http://www.marist.edu/disclaimers.html" target="_blank" rel="prettyphoto[iframes]">Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy </a>
			</p>

		</div>
		
		<script type="text/javascript">
		$("input#empname").click(function(){
		
		var empname = $("input#emp").val();
		var emptype = $("input[name='emptype']:checked").val();
		var yourname = $("input#yourname").val();
		$.post("<?php echo base_url("?c=rtw&m=newentry"); ?>
			",{empname: empname, emptype: emptype, yourname: yourname})
			.done(function(data){
				
			if (data == 1){
			alert (empname + " added successfully. PLease go to the admin page to add remaining information.");
			}else{
	
			alert ("Data update Failed. Contact Monish Singh.");
			}

			});
	
		
			});
		</script>
	</body>
</html>
