<?php
session_start();
if (!isset($_SESSION["userid"])) {
header("Location: index.php");
exit();
}

if(isset($_POST['submit']))
{
	if(isset($_POST['clgcb'])){
		$selectedclgidsarr = $_POST['clgcb'];
		$selectedclgids =implode(",",$selectedclgidsarr);
		$selectedclgids =rtrim($selectedclgids, ",");
	}
	else
	$selectedclgids = '';
	
	
	if(isset($_POST['state'])){
		$statearr = $_POST['state'];
		$state =implode(",",$statearr);
		$state =rtrim($state, ",");
	}
	else
		$state = '';
	
	if(isset($_POST['parts'])){
		$partsarr = $_POST['parts'];
		$parts =implode(",",$partsarr);
		$parts =rtrim($parts, ",");
	}
	else{
		$parts = '';
	}
	
	if(isset($_POST['campusSetting'])){
		$campusSettingarr = $_POST['campusSetting'];
		$campusSetting =implode(",",$campusSettingarr);
		$campusSetting =rtrim($campusSetting, ",");
	}
	else
		$campusSetting = '';
	
	if(isset($_POST['level_of_award'])){
		$level_of_awardarr = $_POST['level_of_award'];
		$level_of_award =implode(",",$level_of_awardarr);
		$level_of_award =rtrim($level_of_award, ",");
	}
	else
		$level_of_award = '';
	if(isset($_POST['institution_type'])){
		$institution_typearr = $_POST['institution_type'];
		$institution_type =implode(",",$institution_typearr);
		$institution_type =rtrim($institution_type, ",");
	}
	else
		$institution_type = '';
	
	if(isset($_POST['housing'])){ $housing = $_POST['housing'];}else{$housing = '';}
	if(isset($_POST['inputZip'])){ $inputZip = $_POST['inputZip'];}else{$inputZip = '';}
	if(isset($_POST['miles'])){ $miles = $_POST['miles'];}else{$miles = '';}
	if(isset($_POST['enrollment_min'])){ $enrollment_min = $_POST['enrollment_min'];}else{$enrollment_min = '';}
	if(isset($_POST['enrollment_max'])){ $enrollment_max = $_POST['enrollment_max'];}else{$enrollment_max = '';}
	if(isset($distance_learning_only))
	{
		$distance_learning_only = 1;
	}
	else
	{
		$distance_learning_only = 0;
	}
	if(isset($offer_all))
	{
		$offer_all = 1;
	}
	else
	{
		$offer_all = 0;
	}
	
	if(isset($program_majors)){
		$program_majorsarr = $_POST['program_majors'];
		$program_majors =implode(",",$program_majorsarr);
		$program_majors =rtrim($program_majors, ",");	
	}
	else
		$program_majors = '';

	// Specialized Mission
	if(isset($specialized_mission)){ $specialized_mission = $_POST['specialized_mission'];}else{$specialized_mission = '';}
		
	// Extended Learning	
	if(isset($extended_learning)){		
		$extended_learningarr = $_POST['extended_learning'];
		$extended_learning =implode(",",$extended_learningarr);
		$extended_learning =rtrim($extended_learning, ",");			
	}
	else
		$extended_learning = '';
	// Religious Affiliation
	if(isset($ReligiousAffilation)){ $ReligiousAffilation = $_POST['ReligiousAffilation'];}else{$ReligiousAffilation = '';}	
		
	// Varsity Athletic Teams
	if(isset($athletic_team)){ $athletic_team = $_POST['athletic_team'];}else{$athletic_team = '';}
	if(isset($athletic_team_g)){		
		$athletic_team_garr = $_POST['athletic_team_g'];
		$athletic_team_g =implode(",",$athletic_team_garr);
		$athletic_team_g =rtrim($athletic_team_g, ",");	
	}
	else
		$athletic_team_g = '';
}
else
{
	header('Location: search.php');
}
include "headerapp.php";
?>

<div class="container">
  <h2>Student Data <a  href="logout.php" style="float:right;font-size: 20px;">Logout</a></h2>
  <form  method="post" id="collegeForm">
	<input type="hidden" value="<?php echo $state; ?>" name="state" id="state" />
	<input type="hidden" value="<?php echo $parts; ?>" name="parts" id="parts" />
	<input type="hidden" value="<?php echo $campusSetting; ?>" name="campusSetting" id="campusSetting" />
	<input type="hidden" value="<?php echo $level_of_award; ?>" name="level_of_award" id="level_of_award" />
	<input type="hidden" value="<?php echo $institution_type; ?>" name="institution_type" id="institution_type" />
	<input type="hidden" value="<?php echo $housing; ?>" name="housing" id="housing" />
	<input type="hidden" value="<?php echo $inputZip; ?>" name="inputZip" id="inputZip" />
	<input type="hidden" value="<?php echo $miles; ?>" name="miles" id="miles" />
	<input type="hidden" value="<?php echo $enrollment_min; ?>" name="enrollment_min" id="enrollment_min" />
	<input type="hidden" value="<?php echo $enrollment_max; ?>" name="enrollment_max" id="enrollment_max" />
	<input type="hidden" value="<?php echo $program_majors; ?>" name="program_majors" id="program_majors" />
	<input type="hidden" value="<?php echo $distance_learning_only; ?>" name="distance_learning_only" id="distance_learning_only" />
	<input type="hidden" value="<?php echo $offer_all; ?>" name="offer_all" id="offer_all" />
	<input type="hidden" value="<?php echo $specialized_mission; ?>" name="specialized_mission" id="specialized_mission" />
	<input type="hidden" value="<?php echo $extended_learning; ?>" name="extended_learning" id="extended_learning" />
	<input type="hidden" value="<?php echo $ReligiousAffilation; ?>" name="ReligiousAffilation" id="ReligiousAffilation" />
	<input type="hidden" value="<?php echo $athletic_team; ?>" name="athletic_team" id="athletic_team" />
	<input type="hidden" value="<?php echo $athletic_team_g; ?>" name="athletic_team_g" id="athletic_team_g" />
	
	<input type="hidden" value="<?php echo $selectedclgids; ?>" name="selectedclgids" id="selectedclgids" />
	<div class="form-row">
		<div class="form-group col-md-2">
		   <label for="hsgradyear">H.S. Graduation Year<span style="color:red;" >*</span></label>     
		</div>
		<div class="form-group col-md-2">     
			<select name="hsgradyear" id="hsgradyear" class="form-control" required>
				<option value="" >Please Fill</option>
				<option value="2021" selected>2021</option>
				<option value="2022" >2022</option>
				<option value="2023" >2023</option>
				<option value="2024" >2024</option>
				<option value="2025" >2025</option>
			</select>
		</div>	

		<div class="form-group col-md-2">
		   <label for="testchoice">Test Choice</label>     
		</div>
		<div class="form-group col-md-2">     
			<select name="testchoice" id="testchoice" class="form-control" >
				<option value="">Please Fill</option>
				<option value="SAT">SAT</option>
				<option value="ACT">ACT</option>
			</select>
		</div>
			
		<div id="satfields">
			<div class="form-group col-md-2">
			   <label for="testsatscore">SAT <i>(out of 1600)</i><span style="color:red;" >*</span></label>     
			</div>
			<div class="form-group col-md-2">     
				<input type="number" class="form-control" id="testsatscore" name="testsatscore" max="1600">
			</div>
		</div>
		
		<div id="actfields">
			<div class="form-group col-md-1">
			   <label for="testactscore">ACT <i>(out of 36)</i><span style="color:red;" >*</span></label>     
			</div>
			<div class="form-group col-md-2">     
				<input type="number" class="form-control" id="testactscore"  name="testactscore" max="36">
			</div>
		</div>
	</div>
	<!-- Rigor of Coursework and Applying Early Decision? Fields -->
	<div class="form-row">
		<div class="form-group col-md-1">
		  <label for="gpa">GPA<span style="color:red;" >*</span></label>    
		</div>
		<div class="form-group col-md-1">     
			<input type="text" class="form-control" id="gpa"  name="gpa" required>
		</div>		
		<div class="form-group col-md-1">
		   <label for="rcapclscnt"># of AP Classes<span style="color:red;" >*</span></label>     
		</div>
		<div class="form-group col-md-2">     
			<select name="rcapclscnt" id="rcapclscnt" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4" >4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
			</select>
		</div>
		<div class="form-group col-md-2">
		   <label for="rcothhrnclscnt"># of other Honors Classes<span style="color:red;" >*</span></label>     
		</div>
		<div class="form-group col-md-2">     
			<select name="rcothhrnclscnt" id="rcothhrnclscnt" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
			</select>
		</div>
		<div class="form-group col-md-1">
		   <label for="earlyapplydecs">Applying Early?<span style="color:red;" >*</span></label>     
		</div>
		<div class="form-group col-md-2">     
			<select name="earlyapplydecs"  id="earlyapplydecs" class="form-control" required>
				<option value="">Please Select</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
		</div>
	</div>
	<!-- Extra Curricular Involvement Fields -->
	<div class="form-row">
		<div class="form-group col-md-2">
		   <label for="ecact4yr">Activities with 4 years+ commitment<span style="color:red;" >*</span></label>    
		</div>
		<div class="form-group col-md-4">     
		  <select name="ecact4yr" id="ecact4yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		
		<div class="form-group col-md-2">
		   <label for="eclr4yr"># of Leadership Roles?<span style="color:red;" >*</span></label>   
		</div>
		<div class="form-group col-md-4">     
		  <select name="eclr4yr" id="eclr4yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-2">
		   <label for="ecact3yr">Activities with 3 years+ commitment<span style="color:red;" >*</span></label>    
		</div>
		<div class="form-group col-md-4">     
		  <select name="ecact3yr" id="ecact3yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		
		<div class="form-group col-md-2">
		   <label for="eclr3yr"># of Leadership Roles?<span style="color:red;" >*</span></label>
		</div>
		<div class="form-group col-md-4">     
		  <select name="eclr3yr" id="eclr3yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-2">
		   <label for="ecact2yr">Activities with 2 years+ commitment<span style="color:red;" >*</span></label>  
		</div>
		<div class="form-group col-md-4">     
		  <select name="ecact2yr" id="ecact2yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		
		<div class="form-group col-md-2">
		   <label for="eclr2yr"># of Leadership Roles?<span style="color:red;" >*</span></label>
		</div>
		<div class="form-group col-md-4">     
		  <select name="eclr2yr" id="eclr2yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-2">
		   <label for="ecact1yr">Activities with 1 years+ commitment<span style="color:red;" >*</span></label>
		</div>
		<div class="form-group col-md-4">     
		  <select name="ecact1yr"  id="ecact1yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		
		<div class="form-group col-md-2">
		   <label for="eclr1yr"># of Leadership Roles?<span style="color:red;" >*</span></label>
		</div>
		<div class="form-group col-md-4">     
		  <select name="eclr1yr"  id="eclr1yr" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-2">
		  <label for="awardscnt">Awards Recieved<span style="color:red;" >*</span></label>
		</div>
		<div class="form-group col-md-4">     
		  <select name="awardscnt"  id="awardscnt" class="form-control" required>
				<option value="">Please Select</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		
	</div>
	
    <div style="width: 100%;clear: both;">
		<button id="searchanalyze" class="btn btn-info">Search & Analyze</button>
		<a id="clearSearch" class="btn btn-default">Clear Search</a>	  
    </div> 
  
	  
  </form>
 <div class="loader"></div>
  <div class="result">
   
  </div>


</div>

 
<?php
include "footerapp.php";
?>
<script type="text/javascript">
//search and analyze both
$('#searchanalyze').click( function(event) {
    event.preventDefault();
    var data = $('form#collegeForm').serialize();
    $.ajax({
        url: 'searchAnalyzeFunctionvb.php',
        type: 'post',       
        data: data,
         beforeSend: function() {
            // setting a timeout
            $(".loader").css('display','block');
           
        },
        success: function(response) {
		$(".loader").css('display','none');
          console.log(response);
          $(".result").html(response);
          
        }
    });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

 $('#clearSearch').click( function(event) {
	 event.preventDefault();
	 $('form#collegeForm')[0].reset();
	 console.log("Testing");
 });
	
</script>

<script>
function savelist(){
	var selectedclgids = '';
	$('input[type=checkbox]:checked').each(function () {
			var value = (this.checked ? $(this).val() : "");
			var id = $(this).attr("id");
			selectedclgids = selectedclgids + value + ",";
		});
	
	if(selectedclgids.length > 0){
		//get all input elements both from search filter and student input data
		//search filter fields
		var selstate = '';
		var selparts = '';
		var selzip = '';
		var selmiles = '';
		var selcampset = '';
		var selenroll_min = '';
		var selenroll_max = '';
		var selloa = '';
		var selinsttype = '';
		var selhousing = '';
		
		
		$.ajax({
			url: 'savelist.php',
			type: 'post',       
		data: {selclgids:selectedclgids},
			 beforeSend: function() {
				// setting a timeout
				$(".loader").css('display','block');
			   
			},
			success: function(response) {
			$(".loader").css('display','none');
			  console.log(response);
			  $(".result").html(response);
			  
			}
		});
	}
	else{
		alert('Please select atleast one college to save the list !!');
	}
	
}
</script>

<script>
  $(function () {
	  
	$('#gpa').keyup(function() {
		var raw_text =  $(this).val();
		var return_text = raw_text.replace(/[^0-9.]/g,'');
		$(this).val(return_text);
	});
	  
	  
	var testchoice = $("#testchoice").val();
	if(testchoice == 'ACT')
	{
		$('#testactscore').prop('required',true);
		$('#actfields').show();
		$('#testactscore').val('');
		
		$('#testsatscore').prop('required',false);
		$('#satfields').hide();
		$('#testsatscore').val('');
	}
	else if(testchoice == 'SAT')
	{
		$('#testsatscore').prop('required',true);
		$('#satfields').show();
		$('#testsatscore').val('');
		
		
		$('#testactscore').prop('required',false);
		$('#actfields').hide();
		$('#testactscore').val('');
	}
	else
	{
		$('#testsatscore').prop('required',false);
		$('#satfields').hide();
		$('#testsatscore').val('');
		
		$('#testactscore').prop('required',false);
		$('#actfields').hide();
		$('#testactscore').val('');
	}
	
	$("#testchoice").change(function () {
		var testchoice = $("#testchoice").val();
		if(testchoice == 'ACT')
		{
			$('#testactscore').prop('required',true);
			$('#actfields').show();
			$('#testactscore').val('');
			
			$('#testsatscore').prop('required',false);
			$('#satfields').hide();
			$('#testsatscore').val('');
		}
		else if(testchoice == 'SAT')
		{
			$('#testsatscore').prop('required',true);
			$('#satfields').show();
			$('#testsatscore').val('');
			
			
			$('#testactscore').prop('required',false);
			$('#actfields').hide();
			$('#testactscore').val('');
		}
		else
		{
			$('#testsatscore').prop('required',false);
			$('#satfields').hide();
			$('#testsatscore').val('');
			
			$('#testactscore').prop('required',false);
			$('#actfields').hide();
			$('#testactscore').val('');
		}
	});
  });
</script>


    
