<?php
//$problemlist = [];
$problemlist = array();
$subproblemlist = array();
$uparrow = "&uarr;";
$downarrow = "&darr;";
$rightarrow = "&rarr;";

//This is also defined in functions.js.  If you change it here you have to change it there.
abstract class ProblemType {
	const multiplechoice = 0;
	const calculation = 1;
	const lesson = 2;
}

function CreateMultipleChoice ($name, $problemtype, $imgsrc, $problemtext, $problemanswer, $problemchoices, $attemptonefeedbackimgsrc, $attemptonefeedback, $problemexplanationimgsrc, $problemexplanation) {
	$problem = array();
	$problem['name'] = $name;
	$problem['problemtype'] = $problemtype;
	$problem['imgsrc'] = $imgsrc;
	$problem['problemtext'] = $problemtext;
	$problem['problemanswer'] = $problemanswer;
	$problem['problemchoices'] = $problemchoices;
	$problem['attemptonefeedback'] = $attemptonefeedback;
	$problem['attemptonefeedbackimgsrc'] = $attemptonefeedbackimgsrc;
	$problem['problemexplanation'] = $problemexplanation;
	$problem['problemexplanationimgsrc'] = $problemexplanationimgsrc;
	return $problem;
}

function CreateCalculation ($name, $problemtype, $imgsrc, $problemtext, $problemanswer, $problemtolerance, $attemptonefeedbackimgsrc, $attemptonefeedback, $problemexplanationimgsrc, $problemexplanation) {
	$problem = array();
	$problem['name'] = $name;
	$problem['problemtype'] = $problemtype;
	$problem['imgsrc'] = $imgsrc;
	$problem['problemtext'] = $problemtext;
	$problem['problemanswer'] = $problemanswer;
	$problem['problemtolerance'] = $problemtolerance;
	$problem['attemptonefeedback'] = $attemptonefeedback;
	$problem['attemptonefeedbackimgsrc'] = $attemptonefeedbackimgsrc;
	$problem['problemexplanation'] = $problemexplanation;
	$problem['problemexplanationimgsrc'] = $problemexplanationimgsrc;
	return $problem;
}

function CreateLesson ($name, $problemtype, $imgsrc, $lessontext) {
	$problem = array();
	$problem['name'] = $name;
	$problem['problemtype'] = $problemtype;
	$problem['imgsrc'] = $imgsrc;
	$problem['lessontext'] = $lessontext;
	return $problem;
}
//Begin section 1
$ProblemName = "1.  Volume Expanded GFR";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ProblemText = '<p>Calculate the glomerular filtration rate (ml/min) using the data provided for the 
volume-expanded normal patient above.</p>
<p><b>Enter you answer on the upper right and Evaluate.</b></p>';
$ProblemAnswer = '124.6';
$ProblemTolerance = '2';
$AttmeptOne = "<p>Sorry.  That's incorrect.  The GFR can be calculated from the creatinine clearance (C<sub>CR</sub>) using the following 
formula:</p>
<center><b>C<sub>CR</sub> = (U<sub>CR</sub> X V)/P<sub>CR</sub></b></center>
<p>Where U<sub>CR</sub> is urinary creatinine concentration, V is urine flow rate and P<sub>CR</sub> is plasma creatinine.</p>";
$AttmeptOneImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ExplanationImgSrc = "./images/normal_patient_volume_expanded_data.png";
$Explanation = "<p>Ideally, GFR would be calculated as inulin clearance but inulin data is not 
provided. The next best way to access GFR is to calculate creatinine clearance (C<sub>CR</sub>).</p>
                <center><b>C<sub>CR</sub> = (U<sub>CR</sub> X V)/P<sub>CR</sub></b></center>
<p>Where U<sub>CR</sub> is urinary creatinine concentration, V is urine flow rate and P<sub>CR</sub> is plasma creatinine.</p>
<p>For the data given:</p>
<center><b>C<sub>CR</sub> = (12 X 13.5)/1.3 = 12.6 ml/min</b></center>
<p>Normal GFR is 125 ml/min and the value calculated for this subject is very similar to this.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//End section 1

//being section 2
$ProblemName = "2.  Volume Expanded FE for Na";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ProblemText = '<p>Calculate the fractional excretion of Na<sup>+</sup> (FE<sub>Na</sub>) using the data provided for the volume-expanded normal patient above.</p><p><b>Please enter your answer and Evaluate.</b></p>';
$ProblemAnswer = '0.01';
$ProblemTolerance = '0.005';
$AttmeptOne = "<p><b>Sorry.  No.</b></p> <p>First calculate how much Na<sup>+</sup> (mg/min) enters the nephrons. Then, calculate how much 
Na<sup>+</sup> is excreted by the nephrons. Excreted divided by how much entered will 
give you FE<sub>Na</sub>.</p>";
$AttmeptOneImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ExplanationImgSrc = "./images/normal_patient_volume_expanded_data.png";
$Explanation = "<p>First calculate how much Na<sup>+</sup> (mg/min) enters the nephrons. Then, calculate how much 
Na<sup>+</sup> is excreted by the nephrons. Excreted divided by how much entered will 
give you FE<sub>Na</sub>.</p>
<p>The filtered Na load = P<sub>Na</sub> x GFR</br>
The amount Na Excreted = U<sub>Na</sub> x V</p>
<p>Using the values given above:</p>
<center>FE<sub>Na</sub> = (U<sub>Na</sub> C V)/(P<sub>Na</sub> X GFR) = (12.5 X 13.5)/(135 X 125) = 0.01 </center></br>
<p>Normally, FE<sub>Na</sub> is 0.01 or less and the value calculated for this subject is also quite normal.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//End section 2


//Begin section 3
$ProblemName = "3.  Volume Expanded C<sub>H2O</sub>";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ProblemText = '<p>Calculate the free water clearance (C<sub>H2O</sub>, ml/min) using the data provided 
for the volume-expanded normal patient above.</p>
<p><b>Enter your answer in the in the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '10.8';
$ProblemTolerance = '1';
$AttmeptOne = "<p><b>That's incorrect.</b>.<p>Free water clearance = V – C<sub>OSM</sub></p>
<p>The C<sub>OSM</sub> is the osmolar clearance and represents the volume of isomotic solution (isosmotic to plasma) 
that was cleared.  Thus, urine volume flow rate (V) minus C<sub>OSM</sub> is the volume of solute  free H<sub>2</sub>O 
(C<sub>H2O</sub>) cleared from the body.</p>";
$AttmeptOneImgSrc = "./images/normal_patient_volume_expanded_data.png";
$ExplanationImgSrc = "./images/normal_patient_volume_expanded_data.png";
$Explanation = "<p>Free water clearance = V – C<sub>OSM</sub></p>
<p>The C<sub>OSM</sub> is the osmolar clearance and represents the volume of isomotic solution (isosmotic to plasma)
 that was cleared.  Thus, urine volume (V) minus C<sub>OSM</sub> is the volume of solute  free H<sub>2</sub>O (C<sub>H2O</sub>) 
cleared from the body.</p>
<p>Again using the values given above:</p>
<p><center>C<sub>OSM</sub> = (U<sub>OSM</sub> X V)/P<sub>OSM</sub> = 55 X 13.5/274 = 2.7 ml/min</center></p>
<p>Free water clearance can vary depending on water ingestion. A typical value is -1 ml/min which 
indicates that water is being conserved by the body. Here, the value is +10.8 ml/min which means 
10.8 ml/min of solute-free water is being excreted in the urine of this subject.  This would be natural
 for a patient being given intravenous fluids.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);


array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 3

//begin section 4
$ProblemName = '4.  Post-surgical C<sub>Na</sub>';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = '<p>A 60 year old male developed pneumonia following abdominal surgery.  Antibiotics 
(cephalothin and gentamicin) were given intravenously over a period of 7 days to combat this condition.  
Plasma creatinine concentration before surgery was 1.3 mg/100 ml and BUN (blood urea nitrogen) was 
16 mg/100 ml.  Serum creatinine rose to 2.6 mg/100 ml and BUN rose to 28 mg/100 ml during the antibiotic 
treatment. The uremia (high plasma urea level) continued and a few days later a hypotonic volume expansion 
(hypotonic NaCl solution applied intravenously) was done to help diagnose the cause of the uremia. Some 
lab values obtained following the hypotonic volume expansion are listed below. This volume expansion 
procedure is identical to the one preformed on the normal patient in the previous example problem.</p>
<p>Post volume expansion lab values for the post-surgery patient are as above. One thing to notice 
right away is that this post-surgical patient has a measurable quantity of protein in his urine. The 
previous normal patient did not. Protein in the urine is an indication that there is some sort of 
nephritic damage present.</p>
<p>Calculate Clearance of Na<sup>+</sup> (C<sub>Na</sub>, ml/min).</p>';
$ProblemAnswer = '2.35';
$ProblemTolerance = '0.2';
$AttmeptOne = "<p><b>Hmmm...  I don't think we're getting the hang of this, yet</b></p>
<p>The formula to calculate Na<sup>+</sup> clearance (C<sub>Na</sub>) is:</p>
<center>C<sub>Na</sub> = (U<sub>Na</sub> X V)/P<sub>Na</sub></center></br>";
$AttmeptOneImgSrc = "./images/disease_patient_lab_values.png";
$ExplanationImgSrc = "./images/disease_patient_lab_values.png";
$Explanation = "<p>Using the values provided above:</p>
<center>C<sub>Na</sub> = (U<sub>Na</sub> X V)/P<sub>Na</sub> = (70.5 X 4.4)/132 = 2.35 ml/min</center></br>
<p>This value is roughly the same as the first patient who had under gone volume expansion.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 4

//begin section 5
$ProblemName = '5.  Post-surgical C<sub>CR</sub>';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = '<p>Calculate Clearance of Creatinine (C<sub>CR</sub>, ml/min)</p>';
$ProblemAnswer = '20.4';
$ProblemTolerance = '2';
$AttmeptOne = "<p><b>That's incorrect</b>.  The formula to calculate C<sub>CR</sub> is:</p>
<center>C<sub>CR</sub> = (U<sub>CR</sub> X V)/P<sub>CR</sub></center></br>";
$AttmeptOneImgSrc = "./images/disease_patient_lab_values.png";
$ExplanationImgSrc = "./images/disease_patient_lab_values.png";
$Explanation = "<p>Using the values provided above:</p>
<center>C<sub>CR</sub> = (U<sub>CR</sub> X V)/P<sub>CR</sub> = 20.9 X 4.4/4.5 = 20.4 ml/min</center>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 5

//begin section 6
$ProblemName = '6. Post-surgical Physiology';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = "<p>A normal GFR is roughly 125 ml/min.  You should be able to recognize 
that the C<sub>CR</sub> value is very low and therefore the GFR in this patient is grossly abnormally low.  Which of the 
following would NOT be a potential cause for this?</br></br>
A)  renal artery stenosis</br>
B)  kidney stone</br>
C)  reduced sympathetic input to the kidney</p>
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>";

$ProblemAnswer = 'C';
$ProblemChoices = 'ABC';
$AttmeptOne = "<p><b>No.</b></p> 
<p><ceneter>NFP = P<sub>GC</sub> – (π<sub>GC</sub> + P<sub>BS</sub>)</center></p> 
<p>where:</p>
<p>P<sub>GC</sub> is the average glomerular capillary hydrostatic pressure.</br>
π<sub>GC</sub> is the average plasma oncotic (or colloid osmotic) pressure.</br>
P<sub>BS</sub> is the average hydrostatic pressure in Bowman’s space.</p>
<p>GFR = K<sub>f</sub> x NFP where K<sub>f</sub> is the filtration coefficient</p>
<p> Which of the choices will not either decrease NFP or K<sub>f</sub>?</p>";
$AttmeptOneImgSrc = "./images/net_filtration_pressure_parameters.png";
$ExplanationImgSrc = "./images/net_filtration_pressure_parameters.png";
$Explanation = "<p><center>NFP = P<sub>GC</sub> – (π<sub>GC</sub> + P<sub>BS</sub>)</center></p> <p>where:</p>
<p>P<sub>GC</sub> is the average glomerular capillary hydrostatic pressure.</br>
π<sub>GC</sub> is the average plasma oncotic (or colloid osmotic) pressure.</br>
P<sub>BS</sub> is the average hydrostatic pressure in Bowman’s space.</p>
<p>GFR = K<sub>f</sub> x NFP where K<sub>f</sub> is the filtration coefficient</p>
<p>The GFR of this post-surgical patient can be estimated from the C<sub>CR</sub> and in this case it is 
20.4 ml/min. This is a surprisingly low value. A decreased GFR could be caused by many different things. 
Some possibilities include:</p>
<ol>
<li>  low blood pressure pressure (reduced P<sub>GC</sub>)</li>
<li>  locally low arterial pressure (reduced P<sub>GC</sub>) e.g. caused by renal artery stenosis)</li>
<li>  elevated hydrostatic pressure in Bowman’s capsule (increased P<sub>BS</sub>, e.g. caused by a kidney stone)</li>
<li>  ELEVATED (not reduced) sympathetic input to the kidney constricting afferent arteriole (reduced 
P<sub>GC</sub>) and/or inducing constriction of mesangial cells (reduced K<sub>f</sub>)</li>
<li>  nephritic disease that reduces the number of working nephrons (reduced K<sub>f</sub>)</li></ol>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 6

//begin section 7 
$ProblemName = '7.  Post-Surgical FE<sub>Na</sub>';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = '<p>Calculate the fraction excretion of Na<sup>+</sup> (FE<sub>Na</sub>) for the 
post-surgical patient and compare this value to that of the normal patient (0.01).</p>';
$ProblemAnswer = '0.115';
$ProblemTolerance = '0.1';
$AttmeptOne = "<p><b>That's incorrect</b>.</p>
<p>First calculate how much Na<sup>+</sup> (mg/min) enters the nephrons. Then, calculate how much 
Na<sup>+</sup> is excreted by the nephrons. Excreted divided by how much entered will 
give you FE<sub>Na</sub>.</p>";
$AttmeptOneImgSrc = "./images/disease_patient_lab_values.png";
$ExplanationImgSrc = "./images/disease_patient_lab_values.png";
$Explanation = "<p>Using the equation described in the previous problem and the values given above for this patient:</p>
<p><center>FE<sub>Na</sub> = (U<sub>Na</sub> C V)/(P<sub>Na</sub> X GFR) = (70.5 X 4.4)/(132 X 20.4) = 0.115</center></p>
<p>This is very high and means that 11.5% of the filtered Na load is being excreted in the urine. The same 
value for the previous patient was 1% which is typical for a health person. There is clearly some 
problem with the renal Na handling in the present patient.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 7

//begin section 8 
$ProblemName = '7.  Post-Surgical C<sub>H2O</sub>';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = '<p>Calculate free water clearance (C<sub>H2O</sub>) for the post-surgical patient and compare 
this value to that of the normal, volume expanded patient (10.8 ml/min).</p>';
$ProblemAnswer = '1.2';
$ProblemTolerance = '0.2';
$AttmeptOne = "<p><b>That's incorrect</b>.</p>
<p>Free water clearance = V – C<sub>OSM</sub></p>
<p>The C<sub>OSM</sub> is the osmolar clearance and represents the volume of isomotic solution (isosmotic to plasma) 
that was cleared.  Thus, urine volume flow rate (V) minus C<sub>OSM</sub> is the volume of solute  free H<sub>2</sub>O 
(C<sub>H2O</sub>) cleared from the body.</p>";
$AttmeptOneImgSrc = "./images/disease_patient_lab_values.png";
$ExplanationImgSrc = "./images/disease_patient_lab_values.png";
$Explanation = "<p>Free water clearance = V – C<sub>OSM</sub></p>
<p>The C<sub>OSM</sub> is the osmolar clearance and represents the volume of isomotic solution (isosmotic to plasma) 
that was cleared.  Thus, urine volume (V) minus C<sub>OSM</sub> is the volume of solute  free H<sub>2</sub>O 
(C<sub>H2O</sub>) cleared from the body.</p>
<p>Using the equation described in the previous problem and the values given above for this patient:</p>
<p><center>C<sub>OSM</sub> = (U<sub>OSM</sub> X V)/P<sub>OSM</sub> = 218 X 4.4/300 = 2.7 ml/min</center></p>
<p>The C<sub>H2O</sub> = V- C<sub>OSM</sub>, so for this subject C<sub>H2O</sub> = 4.4 - 3.2 = 1.2 ml/min which means that 1.2 ml/min 
of solute-free H<sub>2</sub>O is being cleared from the body. This is substantially less than for the 
previous patient (1.2 vs. 10.8) and surprisingly low considering both subjects under went the same 
type of volume expansion. This suggests that there is some problem with the renal H<sub>2</sub>O handling in the 
present patient.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 8

//begin section 9
$ProblemName = '9. Post-surgical Diagnosis';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/disease_patient_lab_values.png";
$ProblemText = "<p>On the basis of the data you have, try to form a preliminary 
diagnosis that explains the persistent uremia of the post-surgical patient.</p>
<p>A) Low circulating blood volume (plus low MAP), or </br>
B) Tubular necrosis </p>
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>";

$ProblemAnswer = 'B';
$ProblemChoices = 'AB';
$AttmeptOne = "<p><b>That's incorrect.</b></p> 
<p>Bet you get it right this time.</p>";
$AttmeptOneImgSrc = "./images/disease_patient_lab_values.png";
$ExplanationImgSrc = "./images/disease_patient_lab_values.png";
$Explanation = "<p>The low GFR could be caused by many factors (some were listed previously) and among 
these is low blood volume and low mean arterial pressure (pre-renal acute kidney injury). However, the high fractional Na excretion and 
the protein in the urine are not consistent with this. Instead, all the observations are consistent with 
some sort of <b>tubular necrosis</b> being present. This would explain the high fractional excretion of Na 
(due to reduced reabsorbtion) in a way that simple reduced circulating blood volume without necrosis wouldn't.  </p>
<p>The persistent uremia is a consequence of the low GFR. </p>
<p>One possibility is that antibiotic toxicity has led to tubular necrosis. The GFR is low because there 
are fewer operational nephrons.</p>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '9. Post-surgical Diagnosis';
$ProblemType = ProblemType::lesson;
$ImgSrc = "./images/Happy-Quote.png";
$LessonText = "";

$NewProblem = CreateLesson($ProblemName, $ProblemType, $ImgSrc, $LessonText);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 9


?>
