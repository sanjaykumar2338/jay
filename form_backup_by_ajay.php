<?php  include 'header.php'; 
?>
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/mform.css" rel="stylesheet">
	<style>
button.btn.btn-primary.next.skipbtn {
    width: 110px;
    padding: 10px;
}
	em.error {
    position: unset;
	float: left;
}
</style>
<div class="log-inpart">
<div class="container">
<!-- MultiStep Form -->
<div class="container-fluid" >
<div class="row justify-content-center mt-0">
<!--  <div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
<div class="cards px-0 pt-4 pb-0 mt-3 mb-3"> -->
<div class="col-11 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
	<div class="cards px-0 pt-4 pb-0 mt-3 mb-3 ">
		<div class="row ">			
			<div class="col-md-12 mx-0 col-sm-12">
				<form id="msform">
					<!-- progressbar -->
					 <ul id="progressbar">
                              <a href="form2.php" title="">
                                 <li class="active" id="payment"><strong>Your Profile</strong></li>
                              </a>
							  <a title="form.php">
                                 <li class="active" id="account" class="active"><strong>Your Filters</strong></li>
                              </a>
                              <a href="college-search.php" title="">
                                 <li id="personal"><strong>Your Results</strong></li>
                              </a>
                              <a title="">
                                 <li id="confirm"><strong>Your Chances?</strong></li>
                              </a>
                           </ul>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
	<div id="showtime"> 
	 <div class="text-center" id="timeleft"></div>
    <!--<div id='progress'><div id='progress-complete'></div></div>-->
	</div>
    <form id="SignupForm" method="post" action='college-search.php'>
	   <fieldset>
	   	<p style="font-size: 37px;text-align: center;"><span style="color: #019ff0;font-weight: bold;">Build</span> Your <span style="color: #019ff0;font-weight: bold;">Filters</span></p>
            <p class="legend-psub-tag">Location</p>
			   <div class="mform_field_wrap">
			    <label class="mod_style_outer mb-0" style="width:100%">
				<div class="radio custom-radio-style col-md-4" style="margin:0">
				  <label style="padding-left: 1px;"><input type="radio" style="position:inherit" value="States" name="serachby" id="States" <?php
				  if(isset($_SESSION['dataform1']['serachby']))
					{
						if($_SESSION['dataform1']['serachby'] == 'States')
						{
							echo " checked ";
						}
					}
				  ?>> States</label>
				</div>
				<div class="radio col-md-4" style="margin:0">
				  <label style="padding-left: 12px;"><input type="radio"  style="position:inherit" class="klradio" id="Regions" value="Regions" name="serachby" <?php
				  if(isset($_SESSION['dataform1']['serachby']))
					{
						if($_SESSION['dataform1']['serachby'] == 'Regions')
						{
							echo " checked ";
						}
					}
				  ?>> Regions</label>
				</div>
				<div class="radio col-md-4" style="margin:0">
				  <label><input type="radio"  style="position:inherit" class="klradio" id="zip"  value="ZIP Code" name="serachby" <?php
				  if(isset($_SESSION['dataform1']['serachby']))
				{
					if($_SESSION['dataform1']['serachby'] == 'ZIP Code')
					{
						echo " checked ";
					}
				}
				  ?>> ZIP Code</label>
				</div>
				 </label>
				</div>					
				 <div class="mform_field_wrap state" id="divstate">
			   <label>State :</label>
			     <select class="js-example-basic-multiple form-control" name="state[]" id="state" multiple="multiple">  
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
   <div class="mform_field_wrap" id="divregion">
				 <label class="mod_style_outer Midwest">
				 <input class="mod_style" type="checkbox" id="midwest" name="parts[]" value="IL,IN,IA,KS,MI,MN,MO,NE,OH,WI">
				 <span class="checkmark" id="chk_midwest">Midwest</span> </label>
				 <label class="mod_style_outer Southeast">
				 <input class="mod_style" type="checkbox" id="southeast" name="parts[]" value="AL,FL,GA,KY,MS,NC,SC,TN">
				 <span class="checkmark" id="chk_southeast">Southeast</span> </label>
				 <label class="mod_style_outer Southwest">
				<input class="mod_style" type="checkbox" id="southwest" name="parts[]" value="AR,CO,LA,MT,NM,ND,OK,SD,TX,UT,WY">
				 <span class="checkmark" id="chk_southwest">Southwest</span> </label>
				 <label class="mod_style_outer West">
				<input class="mod_style" type="checkbox" id="west" name="parts[]" value="AK,AZ,CA,GU,HI,ID,NV,OR.WA">
				 <span class="checkmark" id="chk_west">West</span> </label>
				  <label class="mod_style_outer Northeast">
				<input class="mod_style" type="checkbox" id="northeast" name="parts[]" value="CT,DE,DC,ME,MD,MA,NH,NJ,NY,PA,PR,RI,VT,VI,WV,WV">
				 <span class="checkmark" id="chk_northeast">Northeast</span> </label>
			  </div>
			  <div id="divzipcode">
			   <div class="mform_field_wrap">
				 <label class="mod_style_outer labelzipcode mb-0">
				    <input type="text" class="input1" id="inputZip" name="inputZip" Placeholder="Zip Code" >
				 </label>
			  </div>
             <div class="mform_field_wrap mt-22 mb-25">
            <label class="mod_style_outer mb-0" style="line-height: 35px;">
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
            </label>
			</div>
			  </div>
        </fieldset>
		 <fieldset>
            <legend>Campus Setting</legend>
			 <div class="mform_field_wrap">
				 <label class="mod_style_outer Rural">
				   <input class="mod_style" type="checkbox" name="campusSetting[]" id="rural" value="rural">
				 <span class="checkmark" id="chk_rural">Rural</span> </label>
				 <label class="mod_style_outer Town">
				  <input class="mod_style" type="checkbox" name="campusSetting[]" id="town" value="town">
				 <span class="checkmark" id="chk_town">Town</span> </label>
				 <label class="mod_style_outer Suburban">
				 <input class="mod_style" type="checkbox" name="campusSetting[]" id="suburban" value="suburban">
				 <span class="checkmark" id="chk_suburban">Suburban</span> </label>
				 <label class="mod_style_outer City">
			    	<input class="mod_style" type="checkbox" name="campusSetting[]" id="city" value="city">
				 <span class="checkmark" id="chk_city">City</span> </label>
			  </div>
        </fieldset>
		 <fieldset>
            <legend>Student Enrollment</legend>
			  <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;">
              <select  class="form-control" name="enrollment_min"  id="enrollment_min">        
				  <option value="">Minimum</option>
				  <option value="100">100</option>
				  <option value="500">500</option>
				  <option value="1000">1,000</option>
				  <option value="5000">5,000</option>
				  <option value="10000">10,000</option>
				  <option value="20000">20,000</option>
				  <option value="30000">30,000</option>
				</select>
            </label>
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
             <select  class="form-control" name="enrollment_max"  id="enrollment_max">        
				  <option value="">Maximum</option>
				  <option value="100">100</option>
				  <option value="500">500</option>
				  <option value="1000">1,000</option>
				  <option value="5000">5,000</option>
				  <option value="10000">10,000</option>
				  <option value="20000">20,000</option>
				  <option value="30000">30,000</option>
				  <option value="40000+">40,000 +</option>
				</select>
            </label>
			</div>
        </fieldset>
		<!--
		-->
		 <fieldset>
            <legend>Level of Award</legend>
			<div class="mform_field_wrap">
				<label class="mod_style_outer">
				 <input class="mod_style" type="checkbox" name="level_of_award[]" id="certificate" value="certificate">
				<span class="checkmark"  id="chk_certificate" >Certificate</span> </label>
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="level_of_award[]" id="bachelor" value="bachelor">
				<span class="checkmark"  id="chk_bachelor" >Bachelor's</span> </label>
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="level_of_award[]" id="associates" value="associates">
				<span class="checkmark"  id="chk_associates" >Associates</span> </label>
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="level_of_award[]" id="advanced" value="advanced">
				<span class="checkmark"  id="chk_advanced" >Advanced</span> </label>
			</div>
        </fieldset>
		 <fieldset>
            <legend>Institution Type</legend>
			<div class="mform_field_wrap">
				<label class="mod_style_outer" style="min-width: 225px;">
				 <input class="mod_style" type="checkbox" name="institution_type[]" id="public" value="1,4,7">
				<span class="checkmark" id="chk_public" >Public</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="institution_type[]" id="privat_non_profit" value="2,5,8">
				<span class="checkmark" id="chk_privat_non_profit" >Private non-profit</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="institution_type[]" id="privat_for_profit" value="3,6,9">
				<span class="checkmark" id="chk_privat_for_profit" >Private for-profit</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="institution_type[]" id="4_year" value="1,2,3">
				<span class="checkmark" id="chk_4_year" >4-year</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="institution_type[]" id="2_year" value="4,5,6">
				<span class="checkmark" id="chk_2_year" >2-year</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="institution_type[]" id="less_2_year" value="7,8,9">
				<span class="checkmark" id="chk_less_2_year" >< 2-year</span> </label>
			</div>
        </fieldset>
		 <fieldset>
            <legend>Programs/Majors</legend>
           <div class="mform_field_wrap">
              <select class="js-example-basic-multiple form-control" id="program_majors" name="program_majors[]" multiple="multiple">  
            <label class="mod_style_outer mb-0" style="width:100%;line-height: 35px;">
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
            </label>
            </div>
			<div class="mform_field_wrap apj-pm-pm">
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="distance_learning_only" id="distance_learning_only" value="1">
				<span class="checkmark"  id="chk_distance_learning_only"  style="font-size:12px">Only find schools that offer these selections as Distance Education</span> </label>
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="offer_all" id="offer_all" value="1">
				<span class="checkmark"  id="chk_offer_all" style="font-size:12px">Only find schools that offer ALL these selections</span> </label>
			</div>
        </fieldset>
		<!--		
		 <fieldset>
            <legend>Housing?</legend>
				<div class="mform_field_wrap">
				<label class="mod_style_outer" style="min-width: 225px;">
				  <input class="mod_style" type="checkbox" name="housing" id="housing" >
				<span class="checkmark" id="chk_housing" >No</span> </label>
            </div>
        </fieldset>
		 <fieldset>
            <legend>Specialized Mission</legend>
			 <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
              <select class="form-control" title="Specialized Mission" name="specialized_mission" id="specialized_mission">
			<option selected="selected" value="0">No Preference</option>
			<option value="4">Historically Black College or University</option>
			<option value="8">Tribal College</option>
		  </select>
            </label>
            </div>
        </fieldset>
		 <fieldset>
            <legend>Extended Learning</legend>
			 <div class="mform_field_wrap">
			   <label class="mod_style_outer" style="min-width: 300px;">
				 <input class="mod_style" type="checkbox" name="extended_learning[]" id="distance_learning" value="DISTNCED">
				<span class="checkmark" id="chk_distance_learning">Distance learning only</span> </label>
				<label class="mod_style_outer" style="min-width: 300px;">
				 <input class="mod_style" type="checkbox" name="extended_learning[]" id="weekend_evening" value="SLO7">
				<span class="checkmark" id="chk_weekend_evening">Weekend/evening</span> </label>
				<label class="mod_style_outer" style="min-width: 300px;">
				  <input class="mod_style" type="checkbox" name="extended_learning[]" id="credit_life_exp" value="CREDITS2">
				<span class="checkmark" id="chk_credit_life_exp">Credit for life experience</span> </label>
			</div>
        </fieldset>
		 <fieldset>
            <legend>Religious Affiliation</legend>
			 <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
               <select class="form-control" name="ReligiousAffilation" id="ReligiousAffilation" title="Religious Affiliation">
            <option value="">No Preference</option>
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
            </label>
            </div>
        </fieldset>
		<fieldset >
            <legend>Varsity Athletic Teams</legend>
			   <div class="mform_field_wrap">
			   <label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_MEN_" value="PARTIC_MEN_">
				<span class="checkmark" id="chk_PARTIC_MEN_">Men</span> </label>
				<label class="mod_style_outer" style="min-width: 225px;">
				<input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_WOMEN_" value="PARTIC_WOMEN_">
				<span class="checkmark" id="chk_PARTIC_WOMEN_">Women</span> </label>
            </div>
			 <div class="mform_field_wrap mb-20 mt-22">
			 <label class="mod_style_outer mb-0" style="line-height: 35px;">
               <select class="form-control" title="Varsity Athletic Teams" id="athletic_team" name="athletic_team"> 
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
				<option value="Tennis">Tennis</option>
				<option value="TrkFldIn">Track and Field, Indoor</option>
				<option value="TrkFldOut">Track and Field, Outdoor</option>
				<option value="XCountry">Track and Field, X-Country</option>
				<option value="Vollball">Volleyball</option>
				<option value="WaterPolo">Water Polo</option>
				<option value="WgtLift">Weight Lifting</option>
				<option value="Wrestling">Wrestling</option>       
			  </select>
            </label>
			</div>
        </fieldset>
		<fieldset class="form-horizontal" role="form">
            <legend>Tuition & Fees</legend>
			 <div class="mform_field_wrap">
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="tuitionMin"  id="tuitionMin">        
						<option value="">Minimum</option>
						<option value="500">$500</option>
						<option value="1000">$1,000</option>
						<option value="5000">$5,000</option>
						<option value="10000">$10,000</option>
						<option value="15000">$15,000</option>
						<option value="20000">$20,000</option>
						<option value="25000">$25,000</option>
						<option value="30000">$30,000</option>
						<option value="35000">$35,000</option>
						<option value="40000">$40,000</option>
						<option value="45000">$45,000</option>
						<option value="50000">$50,000</option>
						<option value="60000">$60,000</option>
					</select>
				</label>
				<label class="mod_style_outer mb-0" style="line-height: 35px;">
					<select class="form-control" name="tuitionMax" id="tuitionMax" >
						<option value="">Maximum</option>
						<option value="500">$500</option>
						<option value="1000">$1,000</option>
						<option value="5000">$5,000</option>
						<option value="10000">$10,000</option>
						<option value="15000">$15,000</option>
						<option value="20000">$20,000</option>
						<option value="25000">$25,000</option>
						<option value="30000">$30,000</option>
						<option value="35000">$35,000</option>
						<option value="40000">$40,000</option>
						<option value="45000">$45,000</option>
						<option value="50000">$50,000</option>
						<option value="60000">$60,000</option>
					</select>
				</label>
            </div>
        </fieldset>
		-->
        <p>
            <button id="SaveAccount" name="sub" class="btn btn-primary submit">Submit form</button>
        </p>
    </form>
</div></div>
</div>
<?php include 'footerapp.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="js/jquery.formtowizard.js"></script>
  <script>
   function skipstep(no)
   {
	  $("#step"+no+"Next").trigger("click");
   }
        $( function() {
            var $signupForm = $( '#SignupForm' );
            $signupForm.validate({errorElement: 'em'});
            $signupForm.formToWizard({
                submitButton: 'SaveAccount',
                nextBtnClass: 'btn btn-primary next',
                prevBtnClass: 'btn btn-default prev',
				nextBtnName: 'Next',
				prevBtnName: 'Back',
                buttonTag:    'button',
                validateBeforeNext: function(form, step) {
                    var stepIsValid = true;
                    var validator = form.validate();
                    $(':input', step).each( function(index) {
                        var xy = validator.element(this);
                        stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
                    });
                    return stepIsValid;
                },
                progress: function (i, count) {
                   //  $('#progress-complete').width('' + (i / count * 100) + '%');
					   console.log(i);
					   if(i <= '2'){
						  // $("#showtime").show();
						//   $('#timeleft').text('3 minutes from finish');
					   }else if(i <= '4'){
						  // $('#timeleft').text('2-3 minutes from finish');
					   }else if(i <= '8'){
						  // $('#timeleft').text('1-2 minutes from finish');
					   }else if(i <= '10'){
						  // $('#timeleft').text('Less than 1 minutes from finish');
					   }
                }
            });
        });
		$(document).ready(function () {  
		$("#divstate").hide();
		$("#divregion").hide();
		$("#divzipcode").hide();
		<?php 
	if(isset($_SESSION['dataform1']['serachby']))
	{
		if($_SESSION['dataform1']['serachby'] == 'Regions')
		{
			echo ' $("#divzipcode").hide();
				 $("#divregion").show();
				  $("#divstate").hide();';
		}
		if($_SESSION['dataform1']['serachby'] == 'States')
		{
			echo ' $("#divzipcode").hide();
				 $("#divregion").hide();
				  $("#divstate").show();';
		}
		if($_SESSION['dataform1']['serachby'] == 'ZIP Code')
		{
			echo ' $("#divzipcode").show();
				 $("#divregion").hide();
				  $("#divstate").hide();';
		}
	}	
	if(isset($_SESSION['dataform1']['state']))
	{
		$state = implode(",",$_SESSION['dataform1']['state']);
		echo 'var state = "'.$state.'";';
		//echo 'alert(state);';
		echo '$("#state").val(state.split(",")); ';
	}
	if(isset($_SESSION['dataform1']['parts']))
	{
		if (in_array("IL,IN,IA,KS,MI,MN,MO,NE,OH,WI",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_midwest" ).addClass( "selected" );';
			echo 'document.getElementById("midwest").checked = true;';
		}
		if (in_array("AL,FL,GA,KY,MS,NC,SC,TN",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_southeast" ).addClass( "selected" );';
			echo 'document.getElementById("southeast").checked = true;';
		}
		if (in_array("AR,CO,LA,MT,NM,ND,OK,SD,TX,UT,WY",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_southwest" ).addClass( "selected" );';
			echo 'document.getElementById("southwest").checked = true;';
		}
		if (in_array("AK,AZ,CA,GU,HI,ID,NV,OR.WA",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_west" ).addClass( "selected" );';
			echo 'document.getElementById("west").checked = true;';
		}
		if (in_array("CT,DE,DC,ME,MD,MA,NH,NJ,NY,PA,PR,RI,VT,VI,WV,WV",$_SESSION['dataform1']['parts']))
		{
			echo '$( "#chk_northeast" ).addClass( "selected" );';
			echo 'document.getElementById("northeast").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['campusSetting']))
	{
		if (in_array("city",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_city" ).addClass( "selected" );';
			echo 'document.getElementById("city").checked = true;';
		}
		if (in_array("rural",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_rural" ).addClass( "selected" );';
			echo 'document.getElementById("rural").checked = true;';
		}
		if (in_array("town",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_town" ).addClass( "selected" );';
			echo 'document.getElementById("town").checked = true;';
		}
		if (in_array("suburban",$_SESSION['dataform1']['campusSetting']))
		{
			echo '$( "#chk_suburban" ).addClass( "selected" );';
			echo 'document.getElementById("suburban").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['inputZip']))
	{
		echo '$("#inputZip").val("'.$_SESSION['dataform1']['inputZip'].'");';
	}
	if(isset($_SESSION['dataform1']['miles']))
	{
		echo '$("#miles").val("'.$_SESSION['dataform1']['miles'].'");';
	}
	if(isset($_SESSION['dataform1']['enrollment_max']))
	{
		echo '$("#enrollment_max").val("'.$_SESSION['dataform1']['enrollment_max'].'");';
	}
	if(isset($_SESSION['dataform1']['enrollment_min']))
	{
		echo '$("#enrollment_min").val("'.$_SESSION['dataform1']['enrollment_min'].'");';
	}
	if(isset($_SESSION['dataform1']['program_majors']))
	{
		$program_majors = implode(",",$_SESSION['dataform1']['program_majors']);
		echo 'var program_majors = "'.$program_majors.'";';
		//echo 'alert(program_majors);';
		echo '$("#program_majors").val(program_majors.split(",")); ';
	}
	if(isset($_SESSION['dataform1']['distance_learning_only']))
	{
		echo '$( "#chk_distance_learning_only" ).addClass( "selected" );';
		echo 'document.getElementById("distance_learning_only").checked = true;';
	}
	if(isset($_SESSION['dataform1']['offer_all']))
	{
		echo '$( "#chk_offer_all" ).addClass( "selected" );';
		echo 'document.getElementById("offer_all").checked = true;';
	}
	if(isset($_SESSION['dataform1']['level_of_award']))
	{
		if (in_array("certificate",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_certificate" ).addClass( "selected" );';
			echo 'document.getElementById("certificate").checked = true;';
		}
		if (in_array("bachelor",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_bachelor" ).addClass( "selected" );';
			echo 'document.getElementById("bachelor").checked = true;';
		}
		if (in_array("associates",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_associates" ).addClass( "selected" );';
			echo 'document.getElementById("associates").checked = true;';
		}
		if (in_array("advanced",$_SESSION['dataform1']['level_of_award']))
		{
			echo '$( "#chk_advanced" ).addClass( "selected" );';
			echo 'document.getElementById("advanced").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['institution_type']))
	{
		if (in_array("1,4,7",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_public" ).addClass( "selected" );';
			echo 'document.getElementById("public").checked = true;';
		}
		if (in_array("2,5,8",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_privat_non_profit" ).addClass( "selected" );';
			echo 'document.getElementById("privat_non_profit").checked = true;';
		}
		if (in_array("3,6,9",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_privat_for_profit" ).addClass( "selected" );';
			echo 'document.getElementById("privat_for_profit").checked = true;';
		}
		if (in_array("1,2,3",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_4_year" ).addClass( "selected" );';
			echo 'document.getElementById("4_year").checked = true;';
		}
		if (in_array("4,5,6",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_2_year" ).addClass( "selected" );';
			echo 'document.getElementById("2_year").checked = true;';
		}
		if (in_array("7,8,9",$_SESSION['dataform1']['institution_type']))
		{
			echo '$( "#chk_less_2_year" ).addClass( "selected" );';
			echo 'document.getElementById("less_2_year").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['housing']))
	{
		echo '$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append("Yes");
			document.getElementById("housing").checked = true;';
	}
	if(isset($_SESSION['dataform1']['specialized_mission']))
	{
		echo '$("#specialized_mission").val("'.$_SESSION['dataform1']['specialized_mission'].'");';
	}
	if(isset($_SESSION['dataform1']['extended_learning']))
	{
		if (in_array("DISTNCED",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_distance_learning" ).addClass( "selected" );';
			echo 'document.getElementById("distance_learning").checked = true;';
		}
		if (in_array("SLO7",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_weekend_evening" ).addClass( "selected" );';
			echo 'document.getElementById("weekend_evening").checked = true;';
		}
		if (in_array("CREDITS2",$_SESSION['dataform1']['extended_learning']))
		{
			echo '$( "#chk_credit_life_exp" ).addClass( "selected" );';
			echo 'document.getElementById("credit_life_exp").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['ReligiousAffilation']))
	{
		echo '$("#ReligiousAffilation").val("'.$_SESSION['dataform1']['ReligiousAffilation'].'");';
	}
	if(isset($_SESSION['dataform1']['athletic_team_g']))
	{
		if (in_array("PARTIC_MEN_",$_SESSION['dataform1']['athletic_team_g']))
		{
			echo '$( "#chk_PARTIC_MEN_" ).addClass( "selected" );';
			echo 'document.getElementById("PARTIC_MEN_").checked = true;';
		}
		if (in_array("PARTIC_WOMEN_",$_SESSION['dataform1']['athletic_team_g']))
		{
			echo '$( "#chk_PARTIC_WOMEN_" ).addClass( "selected" );';
			echo 'document.getElementById("PARTIC_WOMEN_").checked = true;';
		}
	}
	if(isset($_SESSION['dataform1']['athletic_team']))
	{
		echo '$("#athletic_team").val("'.$_SESSION['dataform1']['athletic_team'].'");';
	}
	if(isset($_SESSION['dataform1']['tuitionMin']))
	{
		echo '$("#tuitionMin").val("'.$_SESSION['dataform1']['tuitionMin'].'");';
	}
	if(isset($_SESSION['dataform1']['tuitionMax']))
	{
		echo '$("#tuitionMax").val("'.$_SESSION['dataform1']['tuitionMax'].'");';
	}
	?>
		 $("#step0Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(0)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p> ");
		 $("#step1Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(1)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 $("#step2Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(2)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 $("#step3Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(3)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 $("#step4Next").after("<div class='col-md-12'><button type='button' onclick='skipstep(4)' class='btn btn-primary next skipbtn'>Skip</button> </div> <p class='small mb-0 mt-3 text-center'></p>");
		 $("#step5Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(5)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 /*
		 $("#step6Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(6)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 $("#step7Next").after("<div class='col-md-12'><button type='button' onclick='skipstep(7)' class='btn btn-primary next skipbtn'>Skip</button> </div> <p class='small mb-0 mt-3 text-center'></p>");
		 $("#step8Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(8)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 $("#step9Next").after("<div class='col-md-12'><button type='button' onclick='skipstep(9)' class='btn btn-primary next skipbtn'>Skip</button> </div> <p class='small mb-0 mt-3 text-center'></p>");
		 $("#step10Next").after(" <div class='col-md-12'><button type='button' onclick='skipstep(10)' class='btn btn-primary next skipbtn'>Skip</button> </div><p class='small mb-0 mt-3 text-center'></p>");
		 */
		$('input[type=radio][name=serachby]').change(function() {
			 var serachby =   $(":radio[name=serachby]:checked").val();
			 if(serachby == 'ZIP Code')
			 {
				 $("#divzipcode").show();
				 $("#divregion").hide();
				  $("#divstate").hide();
			 }
			 else if(serachby == 'Regions')
			 {
				 $("#divzipcode").hide();
				 $("#divregion").show();
				  $("#divstate").hide();
			 }
			 else if(serachby == 'States')
			 {
				 $("#divzipcode").hide();
				 $("#divregion").hide();
				  $("#divstate").show();
			 }
			 else
			 {
			 }
			 $("#state").val('');
			 $("#miles").val('0');
			 $("#inputZip").val('');
			$( "#chk_midwest" ).removeClass( "selected" );
			$( "#chk_southeast" ).removeClass( "selected" );
			$( "#chk_southwest" ).removeClass( "selected" );
			$( "#chk_west" ).removeClass( "selected" );
			$( "#chk_northeast" ).removeClass( "selected" );
			$( "#chk_midwest" ).addClass( "apjselected" );
			$( "#chk_southeast" ).addClass( "apjselected" );
			$( "#chk_southwest" ).addClass( "apjselected" );
			$( "#chk_west" ).addClass( "apjselected" );
			$( "#chk_northeast" ).addClass( "apjselected" );
			document.getElementById("midwest").checked == false;
			document.getElementById("southeast").checked == false;
			document.getElementById("southwest").checked == false;
			document.getElementById("west").checked == false;
			document.getElementById("northeast").checked == false;
			$('.js-example-basic-multiple').select2({
				 matcher: matchStart
				});
				function matchStart(params, data) {
					params.term = params.term || '';
					if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
						return data;
					}
					return false;
				}
		 });
		//$("#showtime").hide();
		 $("#SaveAccount").html("Search");
		// $("#step0Next").html("I Understand");
 $("#chk_midwest").click(function () {
		var midwest = document.getElementById("midwest").checked;
		 if(midwest) 
		 {
			$( "#chk_midwest" ).removeClass( "selected" );
			$( "#chk_midwest" ).addClass( "apjselected" );
			document.getElementById("midwest").checked == false;
		} 
		else 
		{ 
			$( "#chk_midwest" ).addClass( "selected" );
			$( "#chk_midwest" ).removeClass( "apjselected" );
			document.getElementById("midwest").checked == true;
		} 
});
 $("#chk_southeast").click(function () {
		var southeast = document.getElementById("southeast").checked;
		 if(southeast) 
		 {
			$( "#chk_southeast" ).removeClass( "selected" );
			$( "#chk_southeast" ).addClass( "apjselected" );
			document.getElementById("southeast").checked == false;
		} 
		else 
		{ 
			$( "#chk_southeast" ).addClass( "selected" );
			$( "#chk_southeast" ).removeClass( "apjselected" );
			document.getElementById("southeast").checked == true;
		} 
});
 $("#chk_southwest").click(function () {
		var southwest = document.getElementById("southwest").checked;
		 if(southwest) 
		 {
			$( "#chk_southwest" ).removeClass( "selected" );
			$( "#chk_southwest" ).addClass( "apjselected" );
			document.getElementById("southwest").checked == false;
		} 
		else 
		{ 
			$( "#chk_southwest" ).addClass( "selected" );
			$( "#chk_southwest" ).removeClass( "apjselected" );
			document.getElementById("southwest").checked == true;
		} 
});
 $("#chk_west").click(function () {
		var west = document.getElementById("west").checked;
		 if(west) 
		 {
			$( "#chk_west" ).removeClass( "selected" );
			$( "#chk_west" ).addClass( "apjselected" );
			document.getElementById("west").checked == false;
		} 
		else 
		{ 
			$( "#chk_west" ).addClass( "selected" );
			$( "#chk_west" ).removeClass( "apjselected" );
			document.getElementById("west").checked == true;
		} 
});
 $("#chk_northeast").click(function () {
		var northeast = document.getElementById("northeast").checked;
		 if(northeast) 
		 {
			$( "#chk_northeast" ).removeClass( "selected" );
			$( "#chk_northeast" ).addClass( "apjselected" );
			document.getElementById("northeast").checked == false;
		} 
		else 
		{ 
			$( "#chk_northeast" ).addClass( "selected" );
			$( "#chk_northeast" ).removeClass( "apjselected" );
			document.getElementById("northeast").checked == true;
		} 
});
 $("#chk_rural").click(function () {
		var rural = document.getElementById("rural").checked;
		 if(rural) 
		 {
			$( "#chk_rural" ).removeClass( "selected" );
			$( "#chk_rural" ).addClass( "apjselected" );
			document.getElementById("rural").checked == false;
		} 
		else 
		{ 
			$( "#chk_rural" ).addClass( "selected" );
			$( "#chk_rural" ).removeClass( "apjselected" );
			document.getElementById("rural").checked == true;
		} 
});
 $("#chk_town").click(function () {
		var town = document.getElementById("town").checked;
		 if(town) 
		 {
			$( "#chk_town" ).removeClass( "selected" );
			$( "#chk_town" ).addClass( "apjselected" );
			document.getElementById("town").checked == false;
		} 
		else 
		{ 
			$( "#chk_town" ).addClass( "selected" );
			$( "#chk_town" ).removeClass( "apjselected" );
			document.getElementById("town").checked == true;
		} 
});
 $("#chk_suburban").click(function () {
		var suburban = document.getElementById("suburban").checked;
		 if(suburban) 
		 {
			$( "#chk_suburban" ).removeClass( "selected" );
			$( "#chk_suburban" ).addClass( "apjselected" );
			document.getElementById("suburban").checked == false;
		} 
		else 
		{ 
			$( "#chk_suburban" ).addClass( "selected" );
			$( "#chk_suburban" ).removeClass( "apjselected" );
			document.getElementById("suburban").checked == true;
		} 
});
 $("#chk_city").click(function () {
		var city = document.getElementById("city").checked;
		 if(city) 
		 {
			$( "#chk_city" ).removeClass( "selected" );
			$( "#chk_city" ).addClass( "apjselected" );
			document.getElementById("city").checked == false;
		} 
		else 
		{ 
			$( "#chk_city" ).addClass( "selected" );
			$( "#chk_city" ).removeClass( "apjselected" );
			document.getElementById("city").checked == true;
		} 
});
 $("#chk_distance_learning_only").click(function () {
		var distance_learning_only = document.getElementById("distance_learning_only").checked;
		 if(distance_learning_only) 
		 {
			$( "#chk_distance_learning_only" ).removeClass( "selected" );
			$( "#chk_distance_learning_only" ).addClass( "apjselected" );
			document.getElementById("distance_learning_only").checked == false;
		} 
		else 
		{ 
			$( "#chk_distance_learning_only" ).addClass( "selected" );
			$( "#chk_distance_learning_only" ).removeClass( "apjselected" );
			document.getElementById("distance_learning_only").checked == true;
		} 
});
 $("#chk_offer_all").click(function () {
		var offer_all = document.getElementById("offer_all").checked;
		 if(offer_all) 
		 {
			$( "#chk_offer_all" ).removeClass( "selected" );
			$( "#chk_offer_all" ).addClass( "apjselected" );
			document.getElementById("offer_all").checked == false;
		} 
		else 
		{ 
			$( "#chk_offer_all" ).addClass( "selected" );
			$( "#chk_offer_all" ).removeClass( "apjselected" );
			document.getElementById("offer_all").checked == true;
		} 
});
 $("#chk_certificate").click(function () {
		var certificate = document.getElementById("certificate").checked;
		 if(certificate) 
		 {
			$( "#chk_certificate" ).removeClass( "selected" );
			$( "#chk_certificate" ).addClass( "apjselected" );
			document.getElementById("certificate").checked == false;
		} 
		else 
		{ 
			$( "#chk_certificate" ).addClass( "selected" );
			$( "#chk_certificate" ).removeClass( "apjselected" );
			document.getElementById("certificate").checked == true;
		} 
});
 $("#chk_bachelor").click(function () {
		var bachelor = document.getElementById("bachelor").checked;
		 if(bachelor) 
		 {
			$( "#chk_bachelor" ).removeClass( "selected" );
			$( "#chk_bachelor" ).addClass( "apjselected" );
			document.getElementById("bachelor").checked == false;
		} 
		else 
		{ 
			$( "#chk_bachelor" ).addClass( "selected" );
			$( "#chk_bachelor" ).removeClass( "apjselected" );
			document.getElementById("bachelor").checked == true;
		} 
});
 $("#chk_associates").click(function () {
		var associates = document.getElementById("associates").checked;
		 if(associates) 
		 {
			$( "#chk_associates" ).removeClass( "selected" );
			$( "#chk_associates" ).addClass( "apjselected" );
			document.getElementById("associates").checked == false;
		} 
		else 
		{ 
			$( "#chk_associates" ).addClass( "selected" );
			$( "#chk_associates" ).removeClass( "apjselected" );
			document.getElementById("associates").checked == true;
		} 
});
 $("#chk_advanced").click(function () {
		var advanced = document.getElementById("advanced").checked;
		 if(advanced) 
		 {
			$( "#chk_advanced" ).removeClass( "selected" );
			$( "#chk_advanced" ).addClass( "apjselected" );
			document.getElementById("advanced").checked == false;
		} 
		else 
		{ 
			$( "#chk_advanced" ).addClass( "selected" );
			$( "#chk_advanced" ).removeClass( "apjselected" );
			document.getElementById("advanced").checked == true;
		} 
});
 $("#chk_public").click(function () {
		var public1 = document.getElementById("public").checked;
		 if(public1) 
		 {
			$( "#chk_public" ).removeClass( "selected" );
			$( "#chk_public" ).addClass( "apjselected" );
			document.getElementById("public").checked == false;
		} 
		else 
		{ 
			$( "#chk_public" ).addClass( "selected" );
			$( "#chk_public" ).removeClass( "apjselected" );
			document.getElementById("public").checked == true;
		} 
});
 $("#chk_privat_non_profit").click(function () {
		var privat_non_profit = document.getElementById("privat_non_profit").checked;
		 if(privat_non_profit) 
		 {
			$( "#chk_privat_non_profit" ).removeClass( "selected" );
			$( "#chk_privat_non_profit" ).addClass( "apjselected" );
			document.getElementById("privat_non_profit").checked == false;
		} 
		else 
		{ 
			$( "#chk_privat_non_profit" ).addClass( "selected" );
			$( "#chk_privat_non_profit" ).removeClass( "apjselected" );
			document.getElementById("privat_non_profit").checked == true;
		} 
});
 $("#chk_privat_for_profit").click(function () {
		var privat_for_profit = document.getElementById("privat_for_profit").checked;
		 if(privat_for_profit) 
		 {
			$( "#chk_privat_for_profit" ).removeClass( "selected" );
			$( "#chk_privat_for_profit" ).addClass( "apjselected" );
			document.getElementById("privat_for_profit").checked == false;
		} 
		else 
		{ 
			$( "#chk_privat_for_profit" ).addClass( "selected" );
			$( "#chk_privat_for_profit" ).removeClass( "apjselected" );
			document.getElementById("privat_for_profit").checked == true;
		} 
});
 $("#chk_4_year").click(function () {
		var temp4_year = document.getElementById("4_year").checked;
		 if(temp4_year) 
		 {
			$( "#chk_4_year" ).removeClass( "selected" );
			$( "#chk_4_year" ).addClass( "apjselected" );
			document.getElementById("4_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_4_year" ).addClass( "selected" );
			$( "#chk_4_year" ).removeClass( "apjselected" );
			document.getElementById("4_year").checked == true;
		} 
});
 $("#chk_2_year").click(function () {
		var temp_2_year = document.getElementById("2_year").checked;
		 if(temp_2_year) 
		 {
			$( "#chk_2_year" ).removeClass( "selected" );
			$( "#chk_2_year" ).addClass( "apjselected" );
			document.getElementById("2_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_2_year" ).addClass( "selected" );
			$( "#chk_2_year" ).removeClass( "apjselected" );
			document.getElementById("2_year").checked == true;
		} 
});
 $("#chk_less_2_year").click(function () {
		var less_2_year = document.getElementById("less_2_year").checked;
		 if(less_2_year) 
		 {
			$( "#chk_less_2_year" ).removeClass( "selected" );
			$( "#chk_less_2_year" ).addClass( "apjselected" );
			document.getElementById("less_2_year").checked == false;
		} 
		else 
		{ 
			$( "#chk_less_2_year" ).addClass( "selected" );
			$( "#chk_less_2_year" ).removeClass( "apjselected" );
			document.getElementById("less_2_year").checked == true;
		} 
});
 $("#chk_housing").click(function () {
		var housing = document.getElementById("housing").checked;
		 if(housing) 
		 {
			$( "#chk_housing" ).removeClass( "selected" );
			$( "#chk_housing" ).addClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append('No');
			document.getElementById("housing").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append('Yes');
			document.getElementById("housing").checked == true;
		} 
});
 $("#chk_distance_learning").click(function () {
		var distance_learning = document.getElementById("distance_learning").checked;
		 if(distance_learning) 
		 {
			$( "#chk_distance_learning" ).removeClass( "selected" );
			$( "#chk_distance_learning" ).addClass( "apjselected" );
			document.getElementById("distance_learning").checked == false;
		} 
		else 
		{ 
			$( "#chk_distance_learning" ).addClass( "selected" );
			$( "#chk_distance_learning" ).removeClass( "apjselected" );
			document.getElementById("distance_learning").checked == true;
		} 
});
 $("#chk_weekend_evening").click(function () {
		var weekend_evening = document.getElementById("weekend_evening").checked;
		 if(weekend_evening) 
		 {
			$( "#chk_weekend_evening" ).removeClass( "selected" );
			$( "#chk_weekend_evening" ).addClass( "apjselected" );
			document.getElementById("weekend_evening").checked == false;
		} 
		else 
		{ 
			$( "#chk_weekend_evening" ).addClass( "selected" );
			$( "#chk_weekend_evening" ).removeClass( "apjselected" );
			document.getElementById("weekend_evening").checked == true;
		} 
});
 $("#chk_credit_life_exp").click(function () {
		var credit_life_exp = document.getElementById("credit_life_exp").checked;
		 if(credit_life_exp) 
		 {
			$( "#chk_credit_life_exp" ).removeClass( "selected" );
			$( "#chk_credit_life_exp" ).addClass( "apjselected" );
			document.getElementById("credit_life_exp").checked == false;
		} 
		else 
		{ 
			$( "#chk_credit_life_exp" ).addClass( "selected" );
			$( "#chk_credit_life_exp" ).removeClass( "apjselected" );
			document.getElementById("credit_life_exp").checked == true;
		} 
});
 $("#chk_PARTIC_MEN_").click(function () {
		var PARTIC_MEN_ = document.getElementById("PARTIC_MEN_").checked;
		 if(PARTIC_MEN_) 
		 {
			$( "#chk_PARTIC_MEN_" ).removeClass( "selected" );
			$( "#chk_PARTIC_MEN_" ).addClass( "apjselected" );
			document.getElementById("PARTIC_MEN_").checked == false;
		} 
		else 
		{ 
			$( "#chk_PARTIC_MEN_" ).addClass( "selected" );
			$( "#chk_PARTIC_MEN_" ).removeClass( "apjselected" );
			document.getElementById("PARTIC_MEN_").checked == true;
		} 
});
 $("#chk_PARTIC_WOMEN_").click(function () {
		var PARTIC_WOMEN_ = document.getElementById("PARTIC_WOMEN_").checked;
		 if(PARTIC_WOMEN_) 
		 {
			$( "#chk_PARTIC_WOMEN_" ).removeClass( "selected" );
			$( "#chk_PARTIC_WOMEN_" ).addClass( "apjselected" );
			document.getElementById("PARTIC_WOMEN_").checked == false;
		} 
		else 
		{ 
			$( "#chk_PARTIC_WOMEN_" ).addClass( "selected" );
			$( "#chk_PARTIC_WOMEN_" ).removeClass( "apjselected" );
			document.getElementById("PARTIC_WOMEN_").checked == true;
		} 
});
			  $('.js-example-basic-multiple').select2({
				 matcher: matchStart
				});
				function matchStart(params, data) {
					params.term = params.term || '';
					if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
						return data;
					}
					return false;
				}
			   $("#SignupForm").submit(function () {
			/*	
				   var state = $("#state").val();
				   var inputZip = $("#inputZip").val();
				   var miles = $("#miles").val();
				   //parts[]
				   var midwest = document.getElementById("midwest").checked;
				   var southeast = document.getElementById("southeast").checked;
				   var southwest = document.getElementById("southwest").checked;
				   var west = document.getElementById("west").checked;
				   var northeast = document.getElementById("northeast").checked;
				   //campusSetting[]
				   var rural = document.getElementById("rural").checked;
				   var town = document.getElementById("town").checked;
				   var suburban = document.getElementById("suburban").checked;
				   var city = document.getElementById("city").checked;
				 if(midwest)  { 
                        alert("Check box in Checked"); 
                    } else { 
                        alert("Check box is Unchecked"); 
                    } 
				   var state = $("#state").val();
					//alert(state);
					//return false;
					*/		
			   });
		});
    </script>
    
