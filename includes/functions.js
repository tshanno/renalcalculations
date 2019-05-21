/*
  Created on MAy, 2019ß
  Javascript File for CircSim Program
  Based on Java CircSim program developed by T. Shannon & J. Michael (Rush University)

  ##Revision History
  ## 2019-05-11 Initial checkin and refactoring
*/

$(document).ready(function(){
	//This is also defined in problems.php.  If you change it here you have to change it there.
	var ProblemType = Object.freeze({"multiplechoice":0, "calculation":1, "lesson":2});
	
		$("#feedback").html("<p>In a normal patient, the values above were obtained <b>after expansion of their extracellular fluid " +
                "(ECF) volume with a hypotonic saline solution.</b> This expansion of ECF volume was designed to produce a " +
                "maximum diuresis.</p>" +
                "<p>Compared to typical non-volume expanded data in a normal patient the values listed above were evaluated:</p>" +
                "<ol><li>  [Creatinine]<sub>PLASMA</sub>: Normal</li>" +
                "<li>  [Creatinine]<sub>URINE</sub>: Normal</li>" +
                "<li>  [Na<sup>+</sup>]<sub>PLASMA</sub>: Slightly below normal</li>" +
                "<li>  [Na<sup>+</sup>]<sub>URINE</sub>: Below the usual range but urine composition is highly variable</li>" +
                "<li>  Plamsa Osmolarity: Below Normal</li>" +
                "<li>  Urine Osmolarity: Below the usual range but urine composition is highly variable</li>" +
                "<li>  Urine flow rate: Above normal</li></ol>" +
                "<p><b>Please choose a problem on the left.</b></p>");
		
		function setImageVisible(id, imgsrc, visible) {	
		var img = document.getElementById(id);
		img.src = imgsrc;
		img.style.visibility = (visible ? 'visible' : 'hidden');
		}
		
    setImageVisible('problemimage', './images/normal_patient_volume_expanded_data.png', 'visible');
    setImageVisible('logo', './images/Renal Calculaitons Logo.png', 'visible');
    function LoadProblem(problemid, subproblemid) {
	$.post('./includes/functions.php?fn=LoadProblem',{ProblemID: problemid, SubproblemID: subproblemid}).done(function(data){
		var results = JSON.parse(data);
	    var Attempts = 0;
	    attempts = Attempts.toString(10);
	    $("#checkanswers").attr("submitcount", attempts);
		$("#problemid").val(problemid);
		if (results['problemtype'] == ProblemType.multiplechoice) {
			ResetMultipleChoiceInterface(results);
		} else if (results['problemtype'] == ProblemType.calculation) {
			ResetCalculationInterface(results);
		}	else {
			ResetLessonInterface(results);
		}
	});
	
    }

    function ResetMultipleChoiceInterface(results) {
		$("#feedback").html(results['problemtext']);
		$("#problemname").html(results['name']);
		$('#checkanswers').attr('disabled',false);
		$('#nextproblem').attr('disabled',true);
		setImageVisible('problemimage',results['imgsrc'],'visible');
		
		$("#A").attr('type','radio');
		$("#B").attr('type','radio');
		$("#C").attr('type','radio');
		$("#label_A").attr('hidden',false);
		$("#label_B").attr('hidden',false);
		$("#label_C").attr('hidden',false);

		document.getElementById("A").checked = false;
		document.getElementById("B").checked = false;
		document.getElementById("C").checked = false;

		$('#numberanswer').attr('type', 'hidden');
		$('#label_numeral').attr('hidden', true);

		if (results['problemchoices'] == "AB") {
			document.getElementById("C").disabled = true;
			document.getElementById("label_C").className = 'disabled';
		} else {
			document.getElementById("C").disabled = false;
			document.getElementById("label_C").className = 'label';
		}
    }

	function ResetCalculationInterface(results) {
		$("#feedback").html(results['problemtext']);
		$("#problemname").html(results['name']);
		$('#checkanswers').attr('disabled',false);
		$('#nextproblem').attr('disabled',true);
		setImageVisible('problemimage',results['imgsrc'],'visible');
		
		$("#A").attr('type','hidden');
		$("#B").attr('type','hidden');
		$("#C").attr('type','hidden');
		document.getElementById("A").checked = false;
		document.getElementById("B").checked = false;
		document.getElementById("C").checked = false;
		$("#label_A").attr('hidden',true);
		$("#label_B").attr('hidden',true);
		$("#label_C").attr('hidden',true);

		$('#numberanswer').attr('type', 'number');
		$('#numberanswer').val(0);
		$('#label_numeral').attr('hidden', false);

		}
		
		function ResetLessonInterface(results) {
			subproblemid = $('#subproblemid').val();
			subproblemid = parseInt(subproblemid, 10);
			$("#problemname").html(results['name']);
			$('#checkanswers').attr('disabled',true);
			$('#nextproblem').attr('disabled',false);
			setImageVisible('problemimage',results['imgsrc'],'visible');
			
			$("#A").attr('type','hidden');
			$("#B").attr('type','hidden');
			$("#C").attr('type','hidden');
			$("#label_A").attr('hidden',true);
			$("#label_B").attr('hidden',true);
			$("#label_C").attr('hidden',true);
	
			$('#numberanswer').attr('type', 'hidden');
			$('#label_numeral').attr('hidden', true);

			if (subproblemid < parseInt((results['count']),10) -1) {
				$("#feedback").html(results['lessontext'] + "<p><b>Please click \"Next\" to load the next page</b></p>");
			} else {
				if (problemid < parseInt(results['sectioncount'],10) - 1) {
					$("#feedback").html(results['lessontext'] + '<p><b>Please choose another section on the left.</b></p>');
				} else {
				        $('#nextproblem').attr('disabled',true);
					$("#feedback").html(results['lessontext'] + '<p><b>We\'re done here.  Have a nice day!</b></p>');
				}
			}
	
			}

    function EvaluateAnswer(problemid, problemresponse, attempts) {
	$.post('./includes/functions.php?fn=CheckAnswers',{ProblemID: problemid, SubproblemID: subproblemid, ProblemResponse: problemresponse, Attempts: attempts}).done(function(data){
		$("#problemid").val(problemid);
		$('#subproblemid').val(subproblemid);
		var results = JSON.parse(data);
	    attempts = attempts + 1;
	    var Attempts = attempts.toString(10);
	    var Feedback = $("#feedback").html();
		var SectionCount = parseInt(results['sectioncount'],10);
		var shownextproblemalert = $('#shownextproblemalert').val();
		shownextproblemalert = ConvertToBoolean(shownextproblemalert);
		var shownewsectionalert = $('#shownewsectionalert').val();
		shownewsectionalert = ConvertToBoolean(shownewsectionalert);

	    $("#checkanswers").attr("submitcount", Attempts);
	    
	    if (results['evaluation'] == 'incorrect'){
			if (attempts < 2) {
				Feedback = results['attemptonefeedback'] + "<p>Please try again</p>" + Feedback;
				setImageVisible('problemimage',results['attemptonefeedbackimgsrc'],'visible');
			} else {
				Feedback = "<p><b>Sorry, that's incorrect.</b><p>" + results['problemexplanation'];
				setImageVisible('problemimage',results['problemexplanationimgsrc'],'visible');
				if (subproblemid < results['count'] - 1) {
					if (shownextproblemalert) {
						ShowNextProblemAlert("Sorry, that's incorrect.")
					}
					Feedback = SetInterfaceForNextProblem(Feedback);
				} else {
				if (shownewsectionalert && (problemid != (parseInt(results['sectioncount'],10) - 1))) {
					ShowNewSectionAlert("Sorry, that's incorrect.");
				}
					console.log(results['sectioncount']);
					Feedback = SetInterfaceForNewSection(Feedback, problemid, SectionCount);
				}

			}
	    } else {
			Feedback = "<p><b>Correct!</b></p>" + results['problemexplanation'];
			setImageVisible('problemimage',results['problemexplanationimgsrc'],'visible');
			if (subproblemid < results['count'] - 1) {
				if (shownextproblemalert) {
				ShowNextProblemAlert("Correct.")
				}
				Feedback = SetInterfaceForNextProblem(Feedback);
			} else {
				if (shownewsectionalert && (problemid != (parseInt(results['sectioncount'],10) - 1))) {
					ShowNewSectionAlert("Correct.");
				}
				console.log(results['sectioncount']);
				Feedback = SetInterfaceForNewSection(Feedback, problemid, SectionCount);		    
			}
		}
	    $("#feedback").html(Feedback);
	});
    }

	function ConvertToBoolean (showalert) {
		if (showalert == 'true') {
			showalert = true;
		} else if (showalert == 'false') {
			showalert = false;
		}
		return showalert;
	}
    function ShowNextProblemAlert(introductoryremark) {
		alert(introductoryremark + "  Please read the explanation and be sure to click \"Next\" at the upper right hand corner of the page to load the next page in this section.");
		$('#shownextproblemalert').val(false);
		//shownextproblemalert = false;
    }

    function SetInterfaceForNextProblem(feedback) {
	$('#nextproblem').attr('disabled',false);
	$('#checkanswers').attr('disabled',true);
	Feedback = feedback + '<p><b>Please click "Next" at the top of the page to move to the next page in this section.</b></p>';
	return Feedback;
    }

    function ShowNewSectionAlert(introductoryremark) {
		alert(introductoryremark + "  Please read the explanation and choose another section on the left.");
		//shownewsectionalert = false;
		$('#shownewsectionalert').val(false);
    }

    function SetInterfaceForNewSection(feedback, problemid, sectioncount) {
	$('#checkanswers').attr('disabled',true);
	if (problemid != sectioncount - 1) {
	    Feedback = feedback + '<p><b>Please choose another section on the left.</b></p>';
	} else {
	    Feedback = feedback + '<p><b>We\'re done here. Have a nice day!</b></p>';
	}
	return Feedback;
    }

    

    //This loads the list of problems	
    $("#menu").load('./includes/functions.php?fn=LoadMenu');
    
    //This loads the requested problem
    $(document).on('click',"button.problemselection",function() {
		var problemid = $(this).attr('problemid');
		$("button.problemselection").attr('activeproblem',0);
		$(this).attr('activeproblem',1);
		subproblemid = 0;
		$('#subproblemid').val(0);
		LoadProblem(problemid, subproblemid);
    });

    $(document).on('click',"#nextproblem",function(){
		var ProblemID = $("#problemid").val();
		problemid = parseInt(ProblemID,10);
		var SubproblemID = $('#subproblemid').val();
		subproblemid = parseInt(SubproblemID,10);
		subproblemid = subproblemid + 1;
		$('#subproblemid').val(subproblemid);
		LoadProblem(problemid, subproblemid);
    });
    
    
    //This submits the form data to the function php page for analyzing answers
    $(document).on('click',"#checkanswers",function(){
	
		var ProblemID = parseInt($("#problemid").val(),10);
		var Attempts = parseInt($("#checkanswers").attr("submitcount"),10);
		ProblemResponse = parseFloat($('#numberanswer').val(),10);
		if (document.getElementById("A").checked == true) {
			ProblemResponse = "A";
		} else if (document.getElementById("B").checked == true) {
			ProblemResponse = "B";
		} else if (document.getElementById("C").checked == true) {
			ProblemResponse = "C";	
		}

		EvaluateAnswer(ProblemID, ProblemResponse, Attempts);

    });
    

    //This allows the popup box to open when clicked on
    $(document).on("click","input.openpopup",function(){
		var divid = $(this).attr("divid");
		$('#' + divid).show();
    });
    
    //These functions allows the popup box to close when exit is pressed.	
    $(document).on("click",".popupCloseButton", function() {
		var divid = $(this).attr("divid");
		$('#' + divid).hide();
    });
    
});
