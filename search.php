<?php
include "includes/config.php";
  session_start();
  if (!isset($_SESSION["userid"])) {
    header("Location: index.html");
    exit();
  }
  
include "headerapp.php";
?>

<div class="container">
<h2>Location <a  href="logout.php" style="float:right;font-size: 20px;">Logout</a></h2>
  <form  method="post" id="collegeForm" onsubmit="return validateForm()" action='search2.php'>

    <div class="form-group row">
      <label for="State" class="col-sm-2 col-form-label" style="padding-top:10px;">State:</label>
      <div class="col-sm-10">
        <select class="js-example-basic-multiple form-control" name="state[]" multiple="multiple">  
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
          <option value="AS">American Samoa</option>
          <option value="FM">Fed. St. Micronesia</option>
          <option value="GU">Guam</option>
          <option value="MH">Marshall Islands</option>
          <option value="MP">Northern Marianas</option>
          <option value="PW">Palau</option>
          <option value="PR">Puerto Rico</option>
          <option value="VI">Virgin Islands</option>
        </select>        
      </div>
    </div>    
  
  
  <div class="form-group parts col-sm-12" style="margin-top: 30px;">
    <label class="heading">Parts of the United States :</label>
	<ul>
	  <li><input type="checkbox" id="midwest" name="parts[]" value="IL,IN,IA,KS,MI,MN,MO,NE,OH,WI">
		<label for="midwest">Midwest</label> </li>

	  <li><input type="checkbox" id="southeast" name="parts[]" value="AL,FL,GA,KY,MS,NC,SC,TN">
		<label for="southeast">Southeast</label> </li>

	  <li><input type="checkbox" id="southwest" name="parts[]" value="AR,CO,LA,MT,NM,ND,OK,SD,TX,UT,WY">
		<label for="southwest">Southwest</label> </li>

	  <li><input type="checkbox" id="west" name="parts[]" value="AK,AZ,CA,GU,HI,ID,NV,OR.WA">
		<label for="west">west</label> </li>

	  <li><input type="checkbox" id="northeast" name="parts[]" value="CT,DE,DC,ME,MD,MA,NH,NJ,NY,PA,PR,RI,VT,VI,WV,WV">
		<label for="northeast">Northeast</label> </li> 
	  
	</ul>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
       <label for="zipCode">ZIP Code:</label>     
    </div>
    <div class="form-group col-md-4">     
      <input type="text" class="form-control" id="inputZip" name="inputZip">
    </div>
    <div class="form-group col-md-6">      
      <select id="miles" class="form-control" id="miles" name="miles">
        <option selected="selected" value="0">Miles from</option>
        <option value="5">5 miles</option>
        <option value="10">10 miles</option>
        <option value="15">15 miles</option>
        <option value="20">20 miles</option>
        <option value="25">25 miles</option>
        <option value="50">50 miles</option>
        <option value="100">100 miles</option>
        <option value="150">150 miles</option>
        <option value="200">200 miles</option>
        <option value="250">250 miles</option>
      </select>
    </div>    
  </div>
	<div class="form-row">
    <div class="form-group col-md-2">
       <label for="zipCode">Campus Setting: </label>     
    </div>
    <div class="form-group col-md-10">
      <input type="checkbox" name="campusSetting[]" id="rural" value="rural">
      <label class="form-check-label" for="rural">Rural</label>
      &nbsp; &nbsp; 

      <input type="checkbox" name="campusSetting[]" id="town" value="town">
      <label class="form-check-label" for="town">Town</label>
       &nbsp; &nbsp;

      <input type="checkbox" name="campusSetting[]" id="suburban" value="suburban">
      <label class="form-check-label" for="suburban">Suburban</label>
       &nbsp; &nbsp;

      <input type="checkbox" name="campusSetting[]" id="city" value="city">
      <label class="form-check-label" for="city">City</label>
       &nbsp; &nbsp;
       
    </div>
  </div>
	 
  <div class="row">
      <div class="form-group col-md-2">
         <label for="zipCode">Student Enrollment: </label>     
      </div>
      <div class="form-group col-md-3">
        <select  class="form-control" name="enrollment_min">        
          <option value="">Minimum</option>
          <option value="100">100</option>
          <option value="500">500</option>
          <option value="1000">1,000</option>
          <option value="5000">5,000</option>
          <option value="10000">10,000</option>
          <option value="20000">20,000</option>
          <option value="30000">30,000</option>
        </select>
      </div>  
      <div class="form-group col-md-1" style="width: 5%;padding-top: 5px;">
        <label>To</label>
      </div>
      <div class="form-group col-md-3">
        <select  class="form-control" name="enrollment_max">        
          <option value="">Maximum</option>
          <option value="100">100</option>
          <option value="500">500</option>
          <option value="1000">1,000</option>
          <option value="5000">5,000</option>
          <option value="10000">10,000</option>
          <option value="20000">20,000</option>
          <option value="30000">30,000</option>
        </select>
      </div>   
    </div>

	 <div class="form-group row">
      <label for="program_majors" class="col-md-2 col-form-label">Programs/Majors:</label>
      <div class="col-sm-4">
        <select class="js-example-basic-multiple form-control" name="program_majors[]" multiple="multiple">  
           <?php				  			
				$queryvertical = "SELECT * FROM `valuesets18` WHERE `TableName` = 'C2018DEP' AND `varName` = 'CIPCODE'  ORDER BY `valuesets18`.`valueLabel` ASC ";					
				$resultvertical = mysqli_query($con,$queryvertical);
				if(mysqli_num_rows($resultvertical) > 0) {
						while($row = mysqli_fetch_array($resultvertical))
						{
							echo " <option   value='".$row['Codevalue']."''>".$row['valueLabel']."</option>";
						}							
				}
			?>          
        </select>        
      </div>
	  
	   <div class="form-group col-md-6">        
        <input type="checkbox" name="distance_learning_only" id="distance_learning_only" value="1">
        <label class="form-check-label" for="distance_learning_only">Only find schools that offer these selections as Distance Education</label>
        <br>
        <input type="checkbox" name="offer_all" id="offer_all" value="1">
        <label class="form-check-label" for="offer_all">Only find schools that offer ALL these selections</label>
         &nbsp; &nbsp;

      </div>
	  
	  
    </div>    
  
	  <div class="form-row">
      <div class="form-group col-md-2">
         <label for="zipCode">Level of Award: </label>     
      </div>
      <div class="form-group col-md-10">        
        <input type="checkbox" name="level_of_award[]" id="certificate" value="certificate">
        <label class="form-check-label" for="certificate">Certificate</label>
        &nbsp; &nbsp; 

        <input type="checkbox" name="level_of_award[]" id="bachelor" value="bachelor">
        <label class="form-check-label" for="bachelor">Bachelor's</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="level_of_award[]" id="associates" value="associates">
        <label class="form-check-label" for="associates">Associates</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="level_of_award[]" id="advanced" value="advanced">
        <label class="form-check-label" for="advanced">Advanced</label>
         &nbsp; &nbsp;
      </div>
    </div>
	  
    <div class="form-row">
      <div class="form-group col-md-2">
         <label for="zipCode">Institution Type: </label>     
      </div>
      <div class="form-group col-md-10">        
        <input type="checkbox" name="institution_type[]" id="public" value="1,4,7">
        <label class="form-check-label" for="public">Public</label>
        &nbsp; &nbsp; 

        <input type="checkbox" name="institution_type[]" id="privat_non_profit" value="2,5,8">
        <label class="form-check-label" for="privat_non_profit">Private non-profit</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="institution_type[]" id="privat_for_profit" value="3,6,9">
        <label class="form-check-label" for="privat_for_profit">Private for-profit</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="institution_type[]" id="4_year" value="1,2,3">
        <label class="form-check-label" for="4_year">4-year</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="institution_type[]" id="2_year" value="4,5,6">
        <label class="form-check-label" for="2_year">2-year</label>
         &nbsp; &nbsp;

        <input type="checkbox" name="institution_type[]" id="less_2_year" value="7,8,9">
        <label class="form-check-label" for="less_2_year"> < 2-year </label>
         &nbsp; &nbsp;
      </div>
    </div>
		
	<div class="form-row">
      <div class="form-group col-md-2">
         <label for="zipCode">Housing?   </label>     
      </div>
      <div class="form-group col-md-10">        
        <input type="checkbox" name="housing" id="housing" value="1">
        <label class="form-check-label" for="housing">Yes</label>
        &nbsp; &nbsp; 
      </div>
    </div>
    
	<div class="form-row">
		<div class="form-group col-md-2">
		  <label for="specialized-mission">Specialized Mission:</label> 
		</div>
		<div class="form-group col-md-10">
		  <select class="form-control" title="Specialized Mission" name="specialized_mission">
			<option selected="selected" value="0">No Preference</option>
			<!--<option value="1">Single-sex: Men</option>
			<option value="2">Single-sex: Women</option>-->
			<option value="4">Historically Black College or University</option>
			<option value="8">Tribal College</option>
		  </select>
		</div>      
	</div>
	
	<div class="form-row">
        <div class="form-group col-md-2">
          <label for="specialized-mission">Extended Learning:</label> 
        </div>
        <div class="form-group col-md-10">
          <input type="checkbox" name="extended_learning[]" id="distance_learning" value="DISTNCED">
          <label class="form-check-label" for="distance_learning">Distance learning only</label>
			&nbsp; &nbsp;
          <input type="checkbox" name="extended_learning[]" id="weekend_evening" value="SLO7">
          <label class="form-check-label" for="weekend_evening">Weekend/evening</label>
			&nbsp; &nbsp;
          <input type="checkbox" name="extended_learning[]" id="credit_life_exp" value="CREDITS2">
          <label class="form-check-label" for="credit_life_exp">Credit for life experience</label>
			&nbsp; &nbsp;      
        </div>      
      </div>  
	
	<div class="form-row">
        <div class="form-group col-md-2 labeldiv">
          <label for="ReligiousAffilation">Religious Affiliation:</label> 
        </div>
        <div class="form-group col-md-10">        
          <select class="form-control" name="ReligiousAffilation" id="ReligiousAffilation" title="Religious Affiliation">
            <option value="">No Preference</option>
            <!-- <option value="-2">Not applicable</option> -->
            <option value="51">African Methodist Episcopal</option>
            <option value="24">African Methodist Episcopal Zion Church</option>
            <option value="52">American Baptist</option>
            <option value="22">American Evangelical Lutheran Church</option>
            <option value="53">American Lutheran</option>
            <option value="27">Assemblies of God Church</option>
            <option value="54">Baptist</option>
            <option value="28">Brethren Church</option>
            <option value="34">Christ and Missionary Alliance Church</option>
            <option value="61">Christian Church (Disciples of Christ)</option>
            <option value="48">Christian Churches and Churches of Christ</option>
            <option value="55">Christian Methodist Episcopal</option>
            <option value="35">Christian Reformed Church</option>
            <option value="58">Church of Brethren</option>
            <option value="57">Church of God</option>
            <option value="59">Church of the Nazarene</option>
            <option value="74">Churches of Christ</option>
            <option value="60">Cumberland Presbyterian</option>
            <option value="101">Ecumenical Christian</option>
            <option value="50">Episcopal Church, Reformed</option>
            <option value="102">Evangelical Christian</option>
            <option value="36">Evangelical Congregational Church</option>
            <option value="37">Evangelical Covenant Church of America</option>
            <option value="38">Evangelical Free Church of America</option>
            <option value="39">Evangelical Lutheran Church</option>
            <option value="64">Free Methodist</option>
            <option value="41">Free Will Baptist Church</option>
            <option value="65">Friends</option>
            <option value="105">General Baptist</option>
            <option value="91">Greek Orthodox</option>
            <option value="42">Interdenominational</option>
            <option value="40">International United Pentecostal Church</option>
            <option value="80">Jewish</option>
            <option value="68">Lutheran Church - Missouri Synod</option>
            <option value="67">Lutheran Church in America</option>
            <option value="43">Mennonite Brethren Church</option>
            <option value="69">Mennonite Church</option>
            <option value="87">Missionary Church Inc</option>
            <option value="44">Moravian Church</option>
            <option value="78">Multiple Protestant Denomination</option>
            <option value="106">Muslim</option>
            <option value="108">Non-Denominational</option>
            <option value="45">North American Baptist</option>
            <option value="-1">Not reported</option>
            <option value="100">Original Free Will Baptist</option>
            <option value="79">Other Protestant</option>
            <option value="47">Pentecostal Holiness Church</option>
            <option value="107">Plymouth Brethren</option>
            <option value="103">Presbyterian</option>
            <option value="66">Presbyterian Church (USA)</option>
            <option value="73">Protestant Episcopal</option>
            <option value="77">Protestant, not specified</option>
            <option value="49">Reformed Church in America</option>
            <option value="81">Reformed Presbyterian Church</option>
            <option value="30">Roman Catholic</option>
            <option value="92">Russian Orthodox</option>
            <option value="95">Seventh Day Adventist</option>
            <option value="75">Southern Baptist</option>
            <option value="94">The Church of Jesus Christ of Latter-day Saints</option>
            <option value="97">The Presbyterian Church in America</option>
            <option value="88">Undenominational</option>
            <option value="93">Unitarian Universalist</option>
            <option value="84">United Brethren Church</option>
            <option value="76">United Church of Christ</option>
            <option value="71">United Methodist</option>
            <option value="104">Virginia Baptist General Association</option>
            <option value="89">Wesleyan</option>
            <option value="33">Wisconsin Evangelical Lutheran Synod</option>
            <option value="99">Other (none of the above)</option>
          </select>
        </div>      
      </div>
	
	  <div class="form-row">
        <div class="form-group col-md-2">
          <label for="specialized-mission">Varsity Athletic Teams:</label> 
        </div>
        <div class="form-group col-md-10">
          <input type="checkbox" name="athletic_team_g[]" id="PARTIC_MEN_" value="PARTIC_MEN_">
          <label class="form-check-label" for="PARTIC_MEN_">Men</label>
          &nbsp; &nbsp;

          <input type="checkbox" name="athletic_team_g[]" id="PARTIC_WOMEN_" value="PARTIC_WOMEN_">
          <label class="form-check-label" for="PARTIC_WOMEN_">Women</label>
          &nbsp; &nbsp;
          <select class="form-control" title="Varsity Athletic Teams" name="athletic_team"> 
            <option value="">No Preference</option> 
            <option value="Archery">Archery</option>
            <option value="Badminton">Badminton</option>
            <option value="Bskball">Baseball</option>
            <option value="Bskball">Basketball</option>
            <option value="BchVoll">Beach Volleyball</option>
            <option value="Bowling">Bowling</option>
            <option value="Diving">Diving</option>
            <option value="Eqstrian">Equestrian</option>
            <option value="Fencing">Fencing</option>
            <option value="FldHcky">Field Hockey</option>
            <option value="Football">Football</option>
            <option value="Golf">Golf</option>
            <option value="Gymn">Gymnastics</option>
            <option value="IceHcky">Ice Hockey</option>
            <option value="Lacrsse">Lacrosse</option>
            <option value="Rifle">Rifle</option>
            <option value="Rodeo">Rodeo</option>
            <option value="Rowing">Rowing</option>
            <option value="Sailing">Sailing</option>
            <option value="Skiing">Skiing</option>
            <option value="Soccer">Soccer</option>
            <option value="Softball">Softball</option>
            <option value="Squash">Squash</option>
            <option value="Swimming">Swimming</option>
            <option value="SwimDivng">Swimming and Diving</option>
            <option value="SynSwim">Synchronized Swimming</option>
            <option value="TblTennis">Table Tennis</option>
            <!-- <option value="21">Team Handball</option> -->
            <option value="Tennis">Tennis</option>
            <option value="TrkFldIn">Track and Field, Indoor</option>
            <option value="TrkFldOut">Track and Field, Outdoor</option>
            <option value="XCountry">Track and Field, X-Country</option>
            <option value="Vollball">Volleyball</option>
            <option value="WaterPolo">Water Polo</option>
            <option value="WgtLift">Weight Lifting</option>
            <option value="Wrestling">Wrestling</option>       
          </select>
        </div>      
      </div>
	
    <div style="width: 100%;clear: both;">
      <button id="searchonly" class="btn btn-info">Search Only</button>
      <a id="clearSearch" class="btn btn-default">Clear Search</a>
    </div> 
  
  <div class="loader"></div>
  <div class="result">   
  </div>
  <br/>
	<div class="colegeInfo">
	</div>  
  </form>
 

</div>


<?php
include "footerapp.php";
include "includes/close.php";
?>

<script type="text/javascript">
 
//only search function
 $('#searchonly').click( function(event) {
    event.preventDefault();
    var data = $('form#collegeForm').serialize();
    $.ajax({
        url: 'searchFunction.php',
        type: 'post',
       
        data: data,
         beforeSend: function() {
            // setting a timeout
            $(".loader").css('display','block');
           
        },
        success: function(response) {
      $(".loader").css('display','none');
          console.log('testing data');
          $(".result").html(response);
          
          console.log(response);
        }
    });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

 $('#clearSearch').click( function(event) {
	 event.preventDefault();
	 $('form#collegeForm')[0].reset();
	 
 });

function getSchoolInfo(value){
  
  var myKeyVals = { unitid :value};
  $.ajax({
    url: 'getSchoolInforation.php',
    type: 'post',       
    data: myKeyVals,
    beforeSend: function() {                     
    },
    success: function(response) {  
      console.log(response);
      $(".result").css("display","none");
      $(".colegeInfo").html(response);
    }
  });
}

function backtoResult(){
  $(".colegeInfo").html("");
  $(".result").css("display","block");
}

function expendAll(){    
  $('.detailOff').show("slow");
  $( ".detail-box" ).children( ".detailOff" ).toggleClass('detailOff detailOn'); 
 
  $(".detail-box").each(function(){
    var id =  $(this).children(".heading").attr("id");
    var iconName = $("#ICON"+id);      
    $(iconName).addClass('Minus').removeClass('Plus');
  })
  
  
}
function collapseAll(){
  $('.detailOn').hide("slow");
  $( ".detail-box" ).children( ".detailOn" ).toggleClass('detailOn detailOff');
  $(".detail-box").each(function(){
    var id =  $(this).children(".heading").attr("id");
    var iconName = $("#ICON"+id);      
    $(iconName).addClass('Plus').removeClass('Minus');
  })  
}

function stoggle(id){  
  var iconName = $("#ICON"+id);   
  var container = $("#collapse"+id); 
  var iddd = $(container).attr("class");
  if($(container).attr("class") == 'detailOff'){    
    $(iconName).addClass('Minus').removeClass('Plus');
    $(container).addClass('detailOn').removeClass('detailOff'); 
    $(container).show();

  }else if($(container).attr("class") == 'detailOn'){
    $(iconName).addClass('Plus').removeClass('Minus');
    $(container).addClass('detailOff').removeClass('detailOn');
    $(container).hide();
  }  
}

function validateForm() {
	
	var selectedclgids1 = [];
    $.each($("input[name='clgcb[]']:checked"), function () {
      selectedclgids1.push($(this).val());
    });
	var selectedclgids = selectedclgids1.join(",");
	if (selectedclgids.length > 0) {
		
	}
	else{
		alert('please select some colleges to analyze !!');
		return false;
	}
	
}

</script>