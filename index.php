<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html>
<head>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src='./includes/functions.js'></script>
	<link rel="stylesheet" href="./includes/stylesheet.css">
	<title>Renal Calculations</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<p class='alignleft'>
               <img id='logo' />
			<input type='submit' class='openpopup' id='opendirections' value='Directions' divid='directions' />
			<input type='submit' class='openpopup' id='openabout' value='About' divid='about' />
			</p>
			<p class='alignright'>
			<input type="hidden" id="A" name="choice" value="A"><span class='label' id='label_A' value='enabled' hidden=true>A</span> 
  			<input type="hidden" id="B" name="choice" value="B"><span class='label' id='label_B' value='enabled' hidden=true>B</span> 
			<input type="hidden" id="C" name="choice" value="C"><span class='label' id='label_C' value='enabled' hidden=true>C</span>
			<span class='label' id='label_numeral' hidden=true >Answer:</span><input type="hidden" id="numberanswer" name="numeral" value=0 step="Any">
			<input type='submit' id='checkanswers' value='Evaluate' submitcount='0' disabled=true/>
			<input type='submit' id='nextproblem' value='Next' disabled=true /> 
			</p>
			<div style="clear: both;"></div>
		</div>
		<div id="menu"></div>
		<div id="main">
			<input type='hidden' id='problemid' value='' />
			<input type='hidden' id='subproblemid' value='' />
			<input type='hidden' id='shownewsectionalert' value=true />
			<input type='hidden' id='shownextproblemalert' value=true />
			<div id='problemname'></div>
			<div id='problemstem'></div>
			<div id='problemimagediv'>
			<img id='problemimage' />
			</div>
			<div id='feedback'></div>
			<div class='hover_popup' id='directions'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='directions'>X</div>
					<p>In a normal patient, the values above were obtained <b>after expansion of their extracellular fluid 
                (ECF) volume with a hypotonic saline solution.</b> This expansion of ECF volume was designed to produce a 
                maximum diuresis.</p>
                <p>Compared to typical non-volume expanded data in a normal patient the values listed above were evaluated:</p>
                <ol>
                <li>  [Creatinine]<sub>PLASMA</sub>: Normal</li>
                <li>  [Creatinine]<sub>URINE</sub>: Normal</li>
                <li>  [Na<sup>+</sup>]<sub>PLASMA</sub>: Slightly below normal</li>
                <li>  [Na<sup>+</sup>]<sub>URINE</sub>: Below the usual range but urine composition is highly variable</li>
                <li>  Plamsa Osmolarity: Below Normal</li>
                <li>  Urine Osmolarity: Below the usual range but urine composition is highly variable</li>
                <li>  Urine flow rate: Above normal</li>
                </ol>
                <p><b>Please choose a problem on the left.</b></p>
               
				</div>
			</div>
			<div class='hover_popup' id='about'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='about'>X</div>
					Osmolarity and Cell Volume Regulation<br />
					version 1<br /><br />
					Designed and written by Thomas R. Shannon<br /><br />
					Rush University<br />
					Chicago, IL<br /><br />
					Some of the problems are based upon those designed by Richard Levis
				</div>
			</div>
			<div class='hover_popup' id='about'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='about'>X</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
