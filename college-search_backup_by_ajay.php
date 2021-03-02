<?php include 'header.php'; ?>
<?php 
//echo "<pre>";
//print_r($_POST);
//die;
//print_r($_SESSION);

if(
isset($_POST['sub'])  
|| isset($_POST['applybtn1']) 
|| isset($_POST['applybtn2']) 
|| isset($_POST['applybtn3']) 
|| isset($_POST['applybtn4']) 
|| isset($_POST['applybtn5']) 
|| isset($_POST['applybtn6']) 
|| isset($_POST['applybtn7']) 
|| isset($_POST['applybtn8']) 
|| isset($_POST['applyfilters']) 
)
{
	$_SESSION['dataform1'] =$_POST;
	
}



?>
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/mform.css" rel="stylesheet">

<section class="College-Search-result apj-collage-search">
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
				
					<ul id="progressbar">
                              <a href="form2.php" title="">
                                 <li class="active" id="payment"><strong>Your Profile</strong></li>
                              </a>
							  <a href="form.php">
                                 <li class="active" id="account"><strong>Your Filters</strong></li>
                              </a>
							  
                              <a href="college-search.php" title="">
                                 <li class="active" id="personal"  class="active"><strong>Your Results</strong></li>
                              </a>
                             
                              <a title="">
                                 <li id="confirm"><strong>Your Chances?</strong></li>
                              </a>
                           </ul>
				
			</div>
		</div>
	</div>
</div>
    </div>
</div>
     <div class="row">
		<div class="result col-sm-12">
			<p style="font-size: 37px;text-align: center;">
				<!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
				<span style="color: #019ff0;font-weight: bold;">Your</span> College Search <span style="color: #019ff0;font-weight: bold;">Results</span>
			</p>
		</div>



<form  method="post">
<div class="col-md-12 ">
<!-- <input type="submit" value="Chance of Acceptance?" class="btn btn-primary chance" > -->
    <div class="col-md-9">
    </div>
	
</div>
<div class="inner-college-search-items">
<div class="col-md-3">
	<div class="col-md-12 pad_left">
    	
    	<div class="pull-left">
        <button class="filter" type="button">Filter</button>
    </div>

    <!-- I want another button here, center to the tile-->

    <div class="pull-right">
        <button class=" clear_all pull-right" type="button">Clear All</button>
    </div>
    </div>
<div class="college-search-filter">

	<ul class="list-group" style="margin-bottom: 0px;"> 
  <li class="list-group-item list-group-results location list-link" href="#location-btn" onclick="changeBg('#0003')"> Location <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results camp-set list-link " href="#campus-btn">Campus Setting <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results std-enrolment list-link" href="#student-btn">Student Enrollment<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results pro-mjr list-link" href="#majors-btn">Programs/Majors<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results lvl-of-awd list-link" href="#award-btn">Level of Award <i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li>
   <li class="list-group-item list-group-results inst-type list-link" href="#institure-btn">Institution Type<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <!-- <li class="list-group-item list-group-results housing list-link"href="#housing-btn">Housing<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results sep-mission list-link" href="#mission-btn">Specialized Mission<i class="arrow_icon 	fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results ext-learning list-link" href="#learn-btn">Extended Learning<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results rel-afil list-link" href="#religion-btn">Religious Affiliation<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>
  <li class="list-group-item list-group-results varsity-asth-tm list-link" href="#team-btn">Varsity Athletic Teams<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li> -->
  <!-- <li class="list-group-item list-group-results tandf list-link" href="#tution-btn">Tuition & Fees<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>  -->
  <li class="list-group-item list-group-results colg-advanced-search-btn adv-search-res" >Advanced Search<i class="arrow_icon fa fa-caret-right" aria-hidden="true"></i></li>

<ul class="list-group advanced-search-output">
<li class="list-group-results housing ">Housing
            
				<div class="mform_field_wrap">
				

				<label class="mod_style_outer" >
				 <input class="mod_style" type="checkbox" name="housing" id="housing_yes" value="Yes">
				<span class="checkmark" id="chk_housing_yes" style="height:52px">Yes</span> </label>

				<label class="mod_style_outer" >
				<input class="mod_style" type="checkbox" name="housing" id="housing_no" value="No">
				<span class="checkmark" id="chk_housing_no" style="height:52px">No</span> </label>


            </div>


</li>
<li class="list-group-results tandf ">Tuition & Fees


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
					<select class="form-control" name="tuitionMax" id="tuitionMax" title="Religious Affiliation">
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


</li>


	
	<li class="list-group-results sep-mission " >Specialized Mission
 <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
              <select class="form-control" title="Specialized Mission" name="specialized_mission" id="specialized_mission">
			<option selected="selected" value="0">No Preference</option>
			<!--<option value="1">Single-sex: Men</option>
			<option value="2">Single-sex: Women</option>-->
			<option value="4">Historically Black College or University</option>
			<option value="8">Tribal College</option>
		  </select>
            </label>
            </div>

	</li>
	<li class="list-group-results ext-learning " >Extended Learning
		<div class="mform_field_wrap">
			 
			   <label class="mod_style_outer" >
				 <input class="mod_style" type="checkbox" name="extended_learning[]" id="distance_learning" value="DISTNCED">
				<span class="checkmark" id="chk_distance_learning">Distance learning only</span> </label>
				
				<label class="mod_style_outer" >
				 <input class="mod_style" type="checkbox" name="extended_learning[]" id="weekend_evening" value="SLO7">
				<span class="checkmark" id="chk_weekend_evening">Weekend/evening</span> </label>
				
				<label class="mod_style_outer" >
				  <input class="mod_style" type="checkbox" name="extended_learning[]" id="credit_life_exp" value="CREDITS2">
				<span class="checkmark" id="chk_credit_life_exp">Credit for life experience</span> </label>
				
			</div>
	</li>
  <li class="list-group-results rel-afil " >Religious Affiliation
 <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;width: 50%;">
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
            </label>
            </div>


  </li>
  <li class="list-group-results varsity-asth-tm " >Varsity Athletic Teams
	
	<div class="mform_field_wrap">
			   
			   <label class="mod_style_outer" >
				<input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_MEN_" value="PARTIC_MEN_">
				<span class="checkmark" id="chk_PARTIC_MEN_">Men</span> </label>
				
				
				<label class="mod_style_outer" >
				<input class="mod_style" type="checkbox" name="athletic_team_g[]" id="PARTIC_WOMEN_" value="PARTIC_WOMEN_">
				<span class="checkmark" id="chk_PARTIC_WOMEN_">Women</span> </label>
				
            </div>
			 <div class="mform_field_wrap mb-20 mt-22" id="athletic_team_div">
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
            </label>
			</div>


  </li>
  
  </ul>
  <input type="submit" value="Apply Filters" class="btn btn-primary apj-chance-of-acceptance" style="margin-bottom: 32px;background: #019ff0;color: #fff;padding: 16px 62px;outline: none;display: none;" id="applyfilters" name="applyfilters">
   <!--  <input type="submit" value="Chance of Acceptance?" class="btn btn-primary apj-chance-of-acceptance" style="margin-bottom: 32px;background: #019ff0;color: #fff;padding: 20px 62px;outline: none;"> --> 
</ul>

<div class="mylocation cmn-field" id="location-btn" style="display: none">
		   <fieldset class ="">
            <legend>Search By</legend>
              <div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
			   <div class="mform_field_wrap">
			    <label class="mod_style_outer mb-0" style="width:100%">
				<div class="radio custom-radio-style col-md-4 apj-radio" style="margin:0">
					
				  <label class="apj-location-label"><input type="radio" style="position:inherit" value="States" name="serachby"  <?php
				  if(isset($_SESSION['dataform1']['serachby']))
					{
						if($_SESSION['dataform1']['serachby'] == 'States')
						{
							echo " checked ";
						}
					}
				  ?>> States</label>
				</div>
				<div class="radio col-md-4 apj-radio" style="margin:0">
				  <label class="apj-location-label"><input type="radio"  style="position:inherit" class="klradio" value="Regions" name="serachby" <?php
				  if(isset($_SESSION['dataform1']['serachby']))
					{
						if($_SESSION['dataform1']['serachby'] == 'Regions')
						{
							echo " checked ";
						}
					}
				  ?>> Regions</label>
				</div>
				<div class="radio col-md-4 apj-radio" style="margin:0">
				  <label class="apj-location-label"><input type="radio"  style="position:inherit" class="klradio"  value="ZIP Code" name="serachby" <?php
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
			     <select class="js-example-basic-multiples form-control" name="state[]" id="state" multiple="multiple">  
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
				 <label class="mod_style_outer labelzipcode1 mb-0" style="line-height: 35px;">
				    <input type="text" class="input1" id="inputZip" name="inputZip" Placeholder="Zip Code" >
				 </label>
			 
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
			  <div class="mob-center-btn">
			  <button type='submit' name="applybtn1" class='btn btn-primary next applybtn'>Apply</button>
			  </div>
        </fieldset>
</div>
<div class="campus-set cmn-field" id="campus-btn" style="display: none">
			 <fieldset>
            <legend>Campus Setting</legend>
			<div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
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
			  <div class="mob-center-btn">
			  <button type='submit' name="applybtn2" class='btn btn-primary next applybtn'>Apply</button>
			</div>
			  
        </fieldset>
</div>
<div class=" cmn-field std-enroll" id="student-btn" style="display: none">
	<fieldset>
            <legend>Student Enrollment</legend>
            <div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
			  <div class="mform_field_wrap">
            <label class="mod_style_outer mb-0" style="line-height: 35px;">
              <select  class="form-control" name="enrollment_min" id="enrollment_min">        
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
             <select  class="form-control" name="enrollment_max" id="enrollment_max">        
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
			<div class="mob-center-btn">
			 <button type='submit' class='btn btn-primary next applybtn'   name="applybtn3">Apply</button>
			</div>
        </fieldset>
</div>
<div class=" cmn-field l_o_a" id="majors-btn" style="display: none">
	<fieldset>
            <legend>Programs/Majors</legend>
            <div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>

		<div class="mform_field_wrap" id="courseoptions">
            <label class="mod_style_outer mb-0" style="width:100%;line-height: 35px;">
              <select class="js-example-basic-multiple form-control" id="program_majors" name="program_majors[]" multiple="multiple">  
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
			
			<div class="mform_field_wrap apj-checkmark">
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="distance_learning_only" id="distance_learning_only" value="1">
				<span class="checkmark checkmark-md"  id="chk_distance_learning_only" style="font-size:14px">Only find schools that offer these selections as Distance Education</span> </label>
				
				<label class="mod_style_outer">
				<input class="mod_style" type="checkbox" name="offer_all" id="offer_all" value="1">
				<span class="checkmark checkmark-md"  id="chk_offer_all" style="font-size:14px">Only find schools that offer ALL these selections</span> </label>
			</div>

			<div class="mob-center-btn">
			<button type='submit' class='btn btn-primary next applybtn'  name="applybtn4">Apply</button>
		</div>
        </fieldset>
</div>
<div class=" cmn-field l_o_a" id="award-btn" style="display: none">
<fieldset>
            <legend>Level of Award</legend>
            <div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
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
			<div class="mob-center-btn">
			<button type='submit' class='btn btn-primary next applybtn'  name="applybtn5">Apply</button>
		</div>
        </fieldset>
</div>
<div class=" cmn-field it-type" id="institure-btn" style="display: none">
	<fieldset>
            <legend>Institution Type</legend>
			<div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
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
			<div class="mob-center-btn">
			<button type='submit' class='btn btn-primary next applybtn'  name="applybtn6">Apply</button>
		</div>
			
        </fieldset>
</div>
<!--
<div class=" cmn-field hsg" id="housing-btn" style="display: none">
	<fieldset>
            <legend>Housing?</legend>
			<div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
				<div class="mform_field_wrap">
				<label class="mod_style_outer" style="min-width: 225px;">
				  <input class="mod_style" type="checkbox" name="housing" id="housing" >
				<span class="checkmark" id="chk_housing" >No</span> </label>

            </div>
            <div class="mob-center-btn">
            <button type='submit' class='btn btn-primary next applybtn'  name="applybtn7">Apply</button>
        </div>
        </fieldset>
</div>

<div class=" cmn-field tution-fee" id="tution-btn" style="display: none">
<fieldset class="form-horizontal" role="form">
            <legend>Tuition & Fees</legend>
			<div class="remove-icon">
              	<i class="fa fa-close"></i>
              </div>
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
					<select class="form-control" name="tuitionMax" id="tuitionMax" title="Religious Affiliation">
						<option value="-1">Maximum</option>
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
            <div class="mob-center-btn">
			<button type='submit' class='btn btn-primary next applybtn'  name="applybtn8">Apply</button>
		</div>
        </fieldset>
</div>
-->
</div>
</div>
</form>
<form action="results.php" method="post">
	<!-- <input type="submit" value="Chances of Acceptance?" class="btn btn-primary chance" > -->
<div class="col-md-9" id="clgdatadiv">

<div class="col-md-2 text-right" style="padding-bottom: 15px;"></div>
<div class="col-md-3 text-right apj-top-select" style="padding-bottom: 15px;">
    <select  class="form-control apj-top-selectbox" name="hsgradyear" id="hsgradyear">
       <option value="" >Filter</option>
       <option value="2021">2021</option>
       <option value="2022" >2022</option>
       <option value="2023" >2023</option>
       <option value="2024" >2024</option>
       <option value="2025" >2025</option>
    </select>
</div>
<div class="col-md-3 text-right apj-top-select" style="padding-bottom: 15px;">
    <select  class="form-control apj-top-selectbox" name="" id="">
       <option value="" >Decending</option>
       <option value="2021">2021</option>
       <option value="2022" >2022</option>
       <option value="2023" >2023</option>
       <option value="2024" >2024</option>
       <option value="2025" >2025</option>
    </select>
</div>
<div class="col-md-2 text-right apj-top-select" style="padding-bottom: 15px;">
<button type="submit" class="btn btn-primary apj-top-select-apply-btn" >Apply</button>
</div>
	<?php 
if(isset($_SESSION['dataform1']) ):
   //echo "<pre>";
	//print_r($_POST);
	if(isset($_SESSION['dataform1']['distance_learning_only']))
	{
		$distance_learning_only = $_SESSION['dataform1']['distance_learning_only'];
	}
	
	$condition = '';	
	if(isset($distance_learning_only))
	{
		$distance_learning_only = 1;
	}
	else
	{
		$distance_learning_only = 0;
	}
	
	
	if(isset($_SESSION['dataform1']['offer_all']))
	{
		$offer_all = $_SESSION['dataform1']['offer_all'];
	}
	
	if(isset($offer_all))
	{
		$offer_all = 1;
	}
	else
	{
		$offer_all = 0;
	}
	//print_r($program_majors);	
	//States
	
	if(isset($_SESSION['dataform1']['state']))
	{
		$state = $_SESSION['dataform1']['state'];
	}
	
	
	if(isset($state) && !empty($state)){		
		$states = implode("','", $state);
		$condition .= "WHERE `STABBR` IN ('".$states."')";		
	}else{
		$condition .= "WHERE `STABBR` LIKE '%%' ";
	}
	//Parts of the United States
	
	
	
	if(isset($_SESSION['dataform1']['parts']))
	{
		$parts = $_SESSION['dataform1']['parts'];
	}
	
	
	
	if(isset($parts) && !empty($parts) ){					
		$partsStr = implode(",", $parts);	
		$variable = explode(",",$partsStr);		
		foreach ($variable as $key => $value) {
			$array[] = "`STABBR` = '".$value."'";
		}
		$parts_search = implode(" OR ",$array);
		$condition .= " AND (". $parts_search.")";	
	}
	
	
	if(isset($_SESSION['dataform1']['inputZip']))
	{
		$inputZip = $_SESSION['dataform1']['inputZip'];
	}
	
	if(isset($_SESSION['dataform1']['miles']))
	{
		$miles = $_SESSION['dataform1']['miles'];
	}
	
	
	
	//Input Zip Cocde and Miles
	if(isset($inputZip) && isset($miles) && !empty($inputZip) && !empty($miles)):

		$postalCode = $inputZip;
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, 'http://dev.virtualearth.net/REST/v1/Locations?countryRegion=us&postalCode='.$postalCode.'&key=At2wzFZAPQDWHiFgOxzsw7zcJbKiMQQVLIhgDPiqRA18aPAgHThGzuA6ORn-d2AF ');
		curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

		$jsonData = json_decode(curl_exec($curlSession));
		curl_close($curlSession);
		$coordinates = $jsonData->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates;
		$lat = $coordinates[0];
		$lon = $coordinates[1];

		$radius = $miles;
		$radius = $radius ? $radius : 20;		

		$condition .= 'AND (3958*3.1415926*sqrt((latitude-'.$lat.')*(latitude-'.$lat.') + cos(latitude/57.29578)*cos('.$lat.'/57.29578)*(longitud-'.$lon.')*(longitud-'.$lon.'))/180) <= '.$radius.'' ;

	endif;

	
	
	if(isset($_SESSION['dataform1']['campusSetting']))
	{
		$campusSetting = $_SESSION['dataform1']['campusSetting'];
	}
	//Campus Settings
	if(isset($campusSetting) && !empty($campusSetting) ){			
		$campusSettingArray = array();
		foreach ($campusSetting as $key => $value) {
			if($value == 'rural'):
				$rural = '41,42,43';
				$campusSettingArray[] = $rural;
			elseif($value == 'town'):
				$town = '31,32,33';
				$campusSettingArray[] = $town;
			elseif($value == 'suburban'):
				$suburb = '21,22,23';
				$campusSettingArray[] = $suburb;
			elseif($value == 'city'):
				$city = '11,12,13';
				$campusSettingArray[] = $city;				
			endif;			
		}
		
		// print_r($campusSettingArray);
		foreach ($campusSettingArray as $key => $value) {
			$variable = explode(",",$value);		
			foreach ($variable as $keyy => $val) {
				$array[] = "`LOCALE` = '".$val."'";
			}				
		}
		$campusSetting_search = implode(" OR ",$array);	
		$condition .= " AND (". $campusSetting_search.")";
		
	}
	
	
	if(isset($_SESSION['dataform1']['enrollment_min']))
	{
		$enrollment_min = $_SESSION['dataform1']['enrollment_min'];
	}
	
	
	if(isset($_SESSION['dataform1']['enrollment_max']))
	{
		$enrollment_max = $_SESSION['dataform1']['enrollment_max'];
	}
	
	//Enrollment Min and Max
	if((isset($enrollment_min) && !empty($enrollment_min))  || (isset($enrollment_max) && !empty($enrollment_max)) ){
		if(empty($enrollment_min) && !empty($enrollment_max)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` <= ".$enrollment_max." ";
		elseif(empty($enrollment_max) && !empty($enrollment_min)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= ".$enrollment_min." ";
		elseif(!empty($enrollment_max) && !empty($enrollment_min)):
			if($enrollment_max == '40000+'):
				$enrollment_max = "(SELECT MAX(ENRTOT) FROM `drvef2018`)";
			endif;
			$qry = "SELECT unitid FROM `drvef2018` WHERE `ENRTOT` >= ".$enrollment_min." AND `ENRTOT` <= ".$enrollment_max." ";
		endif;

		$result_enroll = $con->query($qry);	
		if ($result_enroll->num_rows > 0) {				
			while($rows = $result_enroll->fetch_assoc()) {
				$unitid = $rows['unitid'];
				$array_enroll[] = "`unitid` = '".$unitid."'";	
			}
			$enroll_search = implode(" OR ",$array_enroll);	
			$condition .= " AND (". $enroll_search.")";
		}	
	}

	
	
	if(isset($_SESSION['dataform1']['level_of_award']))
	{
		$level_of_award = $_SESSION['dataform1']['level_of_award'];
	}
	
	
	//Level of Awards
	if(isset($level_of_award) && !empty($level_of_award)){		
		$levelAwardArray = array();
		foreach ($level_of_award as $key => $value) {
			if($value == 'certificate'):
				$certificate = '4,2,1';
				$levelAwardArray[] = $certificate;
			elseif($value == 'bachelor'):
				$bachelor = '5';
				$levelAwardArray[] = $bachelor;
			elseif($value == 'associates'):
				$associates = '3';
				$levelAwardArray[] = $associates;
			elseif($value == 'advanced'):
				$advanced  = '6,7,8,9';
				$levelAwardArray[] = $advanced;				
			endif;			
		}
		
		$awards_key = implode(",",$levelAwardArray);	
		$condition .= " AND `UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `c2018_a` WHERE `AWLEVEL` IN (".$awards_key.") AND MAJORNUM = 1 )";
	}
	
	
	
	if(isset($_SESSION['dataform1']['program_majors']))
	{
		$program_majors = $_SESSION['dataform1']['program_majors'];
	}
	// Programs/Majors
	if(isset($program_majors)){
		$cat = array();
		if(isset($program_majors)){		
			foreach ($program_majors as $key => $value) {
				$cat[]= "`CIPCODE` LIKE '".$value."%'";			
			}  
		}	

		$count = count($cat);
		$programsCat_data = implode(" OR ",$cat);
		$programsCat_data = "(".$programsCat_data.")";

		if($distance_learning_only == 1){			
			$programsCat_data .= " AND PTOTALDE <> 0";
		}

		if(($offer_all  == 1) && $count > 1){			
			$programsCat_data .= " GROUP BY UNITID 
			HAVING COUNT(UNITID) > 1";			
		}	
		
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `c2018dep` WHERE ".$programsCat_data." )";		
	}
	
	
	if(isset($_SESSION['dataform1']['institution_type']))
	{
		$institution_type = $_SESSION['dataform1']['institution_type'];
	}
	//old logic for institute type
	/*
	if(isset($institution_type) && !empty($institution_type)){
		$institution_type_key = implode(",",$institution_type);

		$variable = explode(",",$institution_type_key);		
		foreach ($variable as $key => $value) {
			$array[] = "`SECTOR` = '".$value."'";
		}
		$type_search = implode(" OR ",$array);
		$condition .= " AND (". $type_search.")";					
	}
*/

	$institution_type_year = array();
	$institution_type_name = array();
	foreach($institution_type as $instval){
		if($instval == '1,4,7' || $instval == '2,5,8' || $instval == '3,6,9')
			array_push($institution_type_name, $instval);
		if($instval == '1,2,3' || $instval == '4,5,6' || $instval == '7,8,9')
			array_push($institution_type_year, $instval);
	}
	
	if(!empty($institution_type_year) || !empty($institution_type_name)){
		$data12 = array();
		if(!empty($institution_type_year)){
			$sector = array();
			foreach ($institution_type_year as $ke => $valu) {
				$variable = explode(",",$valu);					
				foreach ($variable as $key => $value) {
					$sector[] = "`SECTOR` = '".$value."'";
				}
			}
			$sectorImp = '('.implode(" OR ",$sector).')';
			array_push($data12, $sectorImp);	
		}

		if(!empty($institution_type_name)){
			$sector_name = array();
			foreach ($institution_type_name as $valu_n) {
				$variable_n = explode(",",$valu_n);					
				foreach ($variable_n as  $value_n) {
					$sector_name[] = "`SECTOR` = '".$value_n."'";
				}
			}
			$sectorImp_n = '('.implode(" OR ",$sector_name).')';
			array_push($data12, $sectorImp_n);	
		}

		$type_search = implode(" AND ",$data12);
		
		$condition .= " AND (". $type_search.")";					
	}
	
	
	if(isset($_SESSION['dataform1']['housing']))
	{
		$housing = $_SESSION['dataform1']['housing'];
	}
	// Housing
	if(isset($housing) && !empty($housing)){		
		$condition .= " AND `UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE `ROOM` = 1 )";
	}
	
	
	
	if(isset($_SESSION['dataform1']['specialized_mission']))
	{
		$specialized_mission = $_SESSION['dataform1']['specialized_mission'];
	}
	// Specialized Mission
	if(isset($specialized_mission) && !empty($specialized_mission)){	
		if($specialized_mission == 4):
			$condition .= " AND `HBCU` = 1";
		elseif($specialized_mission == 8):
			$condition .= " AND `TRIBAL` = 1";			
		endif;			
	}
	
	if(isset($_SESSION['dataform1']['extended_learning']))
	{
		$extended_learning = $_SESSION['dataform1']['extended_learning'];
	}
	// Extended Learning
	if(isset($extended_learning) && !empty($extended_learning)){
		$var = implode(",",$extended_learning);
		$array_learning = explode(",",$var);


		foreach ($array_learning as $key => $value) {
			$array_learning[] = "`".$value."` = '1'";
		}
		$extend_search = implode(" AND ",$array_learning);
		$condition .= " AND (`UNITID` IN( SELECT DISTINCT(`UNITID`) FROM `ic2018` WHERE ".$extend_search."))";
		
	}
	
	
	
	if(isset($_SESSION['dataform1']['ReligiousAffilation']))
	{
		$ReligiousAffilation = $_SESSION['dataform1']['ReligiousAffilation'];
	}
	// Religious Affiliation
	if(!empty($ReligiousAffilation)){
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `ic2018` WHERE `RELAFFIL` = '".$ReligiousAffilation."' )";
	}
	
	
	
	if(isset($_SESSION['dataform1']['athletic_team']))
	{
		$athletic_team = $_SESSION['dataform1']['athletic_team'];
	}
	if(isset($_SESSION['dataform1']['athletic_team_g']))
	{
		$athletic_team_g = $_SESSION['dataform1']['athletic_team_g'];
	}
	// Varsity Athletic Teams
	if(!empty($athletic_team) && !empty($athletic_team_g)){
		$newathletic_team_g = array();
		foreach ($athletic_team_g as $key => $value) {
			$newathletic_team_g[] = $value.$athletic_team.' > 0';
		}
		$teamAth = implode(" OR ",$newathletic_team_g);
		$condition .= " AND `UNITID` IN(SELECT `UNITID` FROM `athletic_teams` WHERE ".$teamAth.")";		
	}
	
	
	
	if(isset($_SESSION['dataform1']['tuitionMax']))
	{
		$tuitionMax = $_SESSION['dataform1']['tuitionMax'];
	}
	if(isset($_SESSION['dataform1']['tuitionMin']))
	{
		$tuitionMin = $_SESSION['dataform1']['tuitionMin'];
	}
	// Tuition & Fees 
	if(!empty($tuitionMax) || !empty($tuitionMin)){		
		$tuitionids = array();
		if(!empty($tuitionMin) && !empty($tuitionMax) ){	
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."' AND `CHG1PY3` <= '".$tuitionMax."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."' AND `CHG2AY3` <= '".$tuitionMax."'";

		}elseif (!empty($tuitionMin) && empty($tuitionMax)) {
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` >= '".$tuitionMin."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` >= '".$tuitionMin."'";	
			
		}elseif (empty($tuitionMin) && !empty($tuitionMax)) {
			$ids_sql = "SELECT UNITID FROM `ic2018_py` WHERE `CHG1PY3` <= '".$tuitionMax."'";
			$ids_sql_1 = "SELECT UNITID FROM `ic2018_ay` WHERE `CHG2AY3` <= '".$tuitionMax."'";
		}
		
		$ids_result = $con->query($ids_sql);
		if ($ids_result->num_rows > 0) {
			while($id_row = $ids_result->fetch_assoc()) {
				$tuitionids[] =$id_row["UNITID"];
				
			}	
		}
		
		$ids_result_1 = $con->query($ids_sql_1);
		if ($ids_result_1->num_rows > 0) {
			while($id_row_1 = $ids_result_1->fetch_assoc()) {
				$tuitionids[] =$id_row_1["UNITID"];
			}	
		}
		
		$tuitionids = array_unique($tuitionids);
		$ids_str = implode(",",$tuitionids);
		
		if(!empty($tuitionids))
			$condition .= " AND `UNITID` IN(".$ids_str.")";	
		
	}
		
		$clgidarr = array();
		$sql_kala = "SELECT * FROM hd2018 ".$condition ." " ;
		
		echo '<input type="hidden" value="'.$sql_kala.'" id="sqlkala"/>';
		
		$sql = "SELECT count(*) as totalcount FROM hd2018 ".$condition ;
		$result = $con->query($sql);	
		echo '<div class="col-md-2 text-right" style="padding-bottom: 15px; padding-left:0px">';
		while($row = $result->fetch_assoc()) {
			echo '<span class="search_results " style="margin-left: 0px;">'.$row['totalcount'].' results</span>';
		}
		
		echo '</div>';
		
		$sql = "SELECT * FROM hd2018 ".$condition ." ORDER BY `hd2018`.`INSTNM` ASC LIMIT 0,30" ;
		$result = $con->query($sql);			
		
		if ($result->num_rows > 0) {			
			
			//echo '<span class="no_of_result">'. $result->num_rows.' Results </span>';
		//	echo '<input type="submit" name="submit" value="Analyze Colleges !">';
			//echo '<button id="listanalyzeclgsbtn" class="btn btn-info" onclick=analyzelist()>Analyze Colleges</button>';
		    while($row = $result->fetch_assoc()) {
				$singleclgarr = array();
				$singleclgarr['UNITID'] = $row['UNITID'];
				$singleclgarr['INSTNM']=$row['INSTNM'];
				$singleclgarr['CITY']=$row['CITY'];
				$singleclgarr['STABBR']=$row['STABBR'];
				$singleclgarr['WEBADDR']=$row['WEBADDR'];
				array_push($clgidarr,$singleclgarr);
		    }
			
			if(count($clgidarr)>0){
				//echo '<table class="table table-striped" id="table_id">
					//	<thead><tr><th>Select</th><th>College Name</th></tr></thead>
					//	<tbody>';
					$kalacount = 0;
				foreach($clgidarr as $arr){
				//
					echo '<div class="col-md-4 col-sm-12"> 
						<input type="checkbox" onchange="toggleCheckbox(this)" class="green-tickbox" value="'.$arr['UNITID'].'" id="clgchk'.$arr['UNITID'].'" name="clgcb[]"/> 
						 <div class="College-Search-inner" id="box'.$arr['UNITID'].'">
						   <div class="col-sm-12 col-md-11 col-xs-12 pr-0" onclick="toggleClgUpper('.$arr['UNITID'].')">
								<h3>'. $arr['INSTNM'].'</h3>
								<p>'. $arr['CITY'].', '.$arr['STABBR'].'</p>
						   </div>
							<div class="col-sm-12 col-md-12 col-xs-12 btn-college-list">
							  <div class="collage-details table-responsive-sm">
							   <ul>
									 <li>
										<a class="clg-website-address" href="school-profile.php?unitid='.$arr['UNITID'].'" target="_blank"><i class="fa fa-info-circle"></i> More information</a>
									</li>
								  </ul>
								   </div> 
							</div>
						 </div>
					  </div>';
					
					//	echo '<tr>';
					//	echo '<td><input type="checkbox" id="clgcb[]" name="clgcb[]" value="'.$key.'"></td>';
					//	echo '<td><span class="schoolInfo" onclick="getSchoolInfo('.$key.')">'. $val .'</span>';
						//echo '<td onclick="getSchoolInfo('.$key.')">'.$val;
					//	echo '</td> </tr>';
					$kalacount++;
					
					}
					//echo '</tbody></table>';
				
			}
			
		}else{
			
			echo '<b>Try broadening your search. Only institutions matching ALL criteria in your search will be returned. </b>';
		}
		//echo '</tbody></table>';
		
endif;
?>	
		</div>
		</div><!--#clgdatadiv-->
        <div class="bottom-sec">
<button class="text-center chance-of-acceptance hidden-mobile"><img src="images/footer-button-design.jpg" alt=""></button>
<button class="text-center chance-of-acceptance hidden-desktop"><img src="images/footer-button-design-sm.jpg" alt=""></button>
 </div>
</form>		
     </div>
   

  <div class="modal fade" id="myModal" role="dialog" class="collage-details">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">School Profile</h4>
        </div>
        <div class="modal-body" id="infodiv">
         
	    </div>
      </div>
      
    </div>
  </div>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script> 
$(document).ready(function(){
	
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
		//echo "alert('if');";
		if($_SESSION['dataform1']['housing'] == 'Yes')
		{
			echo '$( "#chk_housing_yes" ).addClass( "selected" );
			$( "#chk_housing_yes" ).removeClass( "apjselected" );
			document.getElementById("housing_yes").checked = true;';
		}
		else
		{
			echo '$( "#chk_housing_no" ).addClass( "selected" );
			$( "#chk_housing_no" ).removeClass( "apjselected" );
			document.getElementById("housing_no").checked = true;';
		}
		/*
		echo '$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			$( "#chk_housing" ).empty();
			$( "#chk_housing" ).append("Yes");
			document.getElementById("housing").checked = true;';
*/
	}
	else
	{
		//echo "alert('else');";
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
	
		
	
	//$('.js-example-basic-multiple').select2();
    $(".js-example-basic-multiples").select2({ dropdownParent: "#divstate" });
    $(".js-example-basic-multiple").select2({ dropdownParent: "#courseoptions" });
  $('[data-toggle="tooltip"]').tooltip();   
 
/*
  $('.green-tickbox').change(function() {
  	console.log(this.checked);
	var unitid = $(this).val();
    if(this.checked) {
      $(this).next('.College-Search-inner').css('background-color', '#019ff0'); 
      $(this).next('.College-Search-inner').find('h3').css('color', 'white');
      $(this).next('.College-Search-inner').find('p').css('color', 'white');  
      $(this).next('.College-Search-inner').find('span').css('color', 'white'); 
	  
    } else {
      $(this).next('.College-Search-inner').css('background-color', 'white');
      $(this).next('.College-Search-inner').find('h3').css('color', 'black');
      $(this).next('.College-Search-inner').find('p').css('color', 'black');  
      $(this).next('.College-Search-inner').find('span').css('color', 'black'); 
    }
	
});
*/
});
  /* 
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
*/
 $("#chk_housing_yes").click(function () {
		var chk_housing_yes = document.getElementById("housing_yes").checked;
		 if(chk_housing_yes) 
		 {
			$( "#chk_housing_yes" ).removeClass( "selected" );
			$( "#chk_housing_yes" ).addClass( "apjselected" );
			document.getElementById("housing_yes").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing_yes" ).addClass( "selected" );
			$( "#chk_housing_yes" ).removeClass( "apjselected" );
			document.getElementById("housing_yes").checked == true;
			
			$( "#chk_housing_no" ).removeClass( "selected" );
			$( "#chk_housing_no" ).addClass( "apjselected" );
			document.getElementById("housing_no").checked == false;
		} 
			
});
 $("#chk_housing_no").click(function () {
		var chk_housing_no = document.getElementById("housing_no").checked;
		 if(chk_housing_no) 
		 {
			$( "#chk_housing_no" ).removeClass( "selected" );
			$( "#chk_housing_no" ).addClass( "apjselected" );
			document.getElementById("housing_no").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing_no" ).addClass( "selected" );
			$( "#chk_housing_no" ).removeClass( "apjselected" );
			document.getElementById("housing_no").checked == true;
			
			
			$( "#chk_housing_yes" ).removeClass( "selected" );
			$( "#chk_housing_yes" ).addClass( "apjselected" );
			document.getElementById("housing_yes").checked == false;
			
		} 
			
});
/* $(".College-Search-inner").hover(function () {
 	if ($(this).hasClass("College-Search-inner-active")) {
		
 	}else{
 		console.log('3');
   $(this).find('.clg-website-address').toggleClass("yellow-bg");
}
});*/
/*  $("#clgdatadiv").hover(function () {
 	if ($('.College-Search-inner').hasClass("College-Search-inner-active")) {
		$(this).find('.clg-website-address').addClass('yellow-bg'); 
 	}else{
 		console.log('4');
   $('.College-Search-inner-inactive').find('.clg-website-address').removeClass("yellow-bg");
}
});*/
function toggleClgUpper(id)
 {
	$( '#clgchk' + id).trigger( "click" );
 }
function toggleCheckbox(element)
 {
   
	var unitid = $(element).val();
	var filterVal = 'invert(1)';
	var filterVals = 'invert(0)';
    if(element.checked) {
      $(element).next('.College-Search-inner').css('background-color', '#019ff0'); 
      $(element).next('.College-Search-inner').find('h3').css('color', 'white');
      $(element).next('.College-Search-inner').find('p').css('color', 'white');  
      $(element).next('.College-Search-inner').find('span').css('color', 'white'); 
      /*$(element).next('.College-Search-inner').find('a').css('color', 'white'); */
      /*$(element).next('.College-Search-inner').find('.websiteimage').css('filter',filterVal); 
      $(element).next('.College-Search-inner').find('.yesno').css('filter',filterVal); */
      $(element).next('.College-Search-inner').find('.clg-website-address').addClass('yellow-bg'); 
      $(element).next('.College-Search-inner').addClass('College-Search-inner-active'); 
      $(element).next('.College-Search-inner').removeClass('College-Search-inner-inactive'); 
	  
    } else {

      $(element).next('.College-Search-inner').find('.clg-website-address').removeClass('yellow-bg'); 
      $(element).next('.College-Search-inner').css('background-color', '');
      $(element).next('.College-Search-inner').find('h3').css('color', '#333');
      $(element).next('.College-Search-inner').find('p').css('color', '#333');  
      $(element).next('.College-Search-inner').find('span').css('color', '#333'); 
      $(element).next('.College-Search-inner').removeClass('College-Search-inner-active'); 
      $(element).next('.College-Search-inner').addClass('College-Search-inner-inactive'); 
     /* $(element).next('.College-Search-inner').find('a').css('color', 'black'); */
       /*$(element).next('.College-Search-inner').find('.websiteimage').css('filter',filterVals); 
      $(element).next('.College-Search-inner').find('.yesno').css('filter',filterVals); */
    }
 }

 

</script>

<script>

	window.limit =30;
	window.norow = 0;

	 $(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
				if(norow == 0)
				{
					limit = limit + 9;
					var sqlkala = $("#sqlkala").val();
					 $.ajax({
							type: "POST",
							url: "includes/getcollegesbylimit.php",
							data: {
										sql: sqlkala,
										limit: limit
									},
							dataType: 'text',
							cache: false,
							async: false,
							beforeSend: function () {
								$('.loading').show();
							},
							success: function (data) {
								if(data == 'No Row')
								{
									$("#clgdatadiv").append('<div class="col-md-12">No More Data</div>');
									norow = 1;
									//alert(norow);
									//enableScroll();
								}
								else
								{
									$("#clgdatadiv").append(data);
									//enableScroll();
								}
								
								
							},
							complete: function () {
								$('.loading').hide();
							}
						});
						
				}
				
				return false;
				
			}
	 });
	 
function selectschool(value)
{
	if($( "#box"+value ).hasClass( "active" ))
	{
		$( "#box"+value).removeClass("active");
		$("#clgchk"+value).attr('checked', false);
	}
	else
	{
		$( "#box"+value).addClass("active");
		$("#clgchk"+value).attr('checked', true);
	}
}	 
/*
function getSchoolInfo(value){
   $("#infodiv").empty();
  var myKeyVals = { unitid :value};
  $.ajax({
    url: 'getSchoolInforation.php',
    type: 'post',       
    data: myKeyVals,
    beforeSend: function() {  
		$(".loading").show();
    },
    success: function(response) {
$(".loading").hide();		
      console.log(response);
	  $("#infodiv").empty();
	  $("#infodiv").append(response);
	 $('#myModal').modal('show');
     // $(".result").css("display","none");
    //  $(".colegeInfo").html(response);
    }
  });
}
*/
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="js/jquery.formtowizard.js"></script>
  <script>
   function skipstep(no)
   {
	  $("#step"+no+"Next").trigger("click");
   }
		
		$(document).ready(function () {  
		
		 
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
			 //$('.js-example-basic-multiple').select2();
		 });

		$("#showtime").hide();
		 $("#SaveAccount").html("Search");
		 $("#step0Next").html("I Understand");
		
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

   
 /*  
 $("#chk_housing").click(function () {
		var housing = document.getElementById("housing").checked;
		 if(housing) 
		 {
			$( "#chk_housing" ).removeClass( "selected" );
			$( "#chk_housing" ).addClass( "apjselected" );
			document.getElementById("housing").checked == false;
		} 
		else 
		{ 
			$( "#chk_housing" ).addClass( "selected" );
			$( "#chk_housing" ).removeClass( "apjselected" );
			document.getElementById("housing").checked == true;
		} 
			
});
*/
   
   
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

   

		
			  //$('.js-example-basic-multiple').select2();
			   $("#SignupForm").submit(function () {
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
				   
				   
				   
				   
				   
/*				 
				 if(midwest)  { 
                        alert("Check box in Checked"); 
                    } else { 
                        alert("Check box is Unchecked"); 
                    } 
	*/				
				   var state = $("#state").val();
					//alert(state);
					//return false;
			   });
		});
$(document).ready(function(){


     $(".list-link").click(function (e) {
     e.preventDefault();
     $(".cmn-field").removeClass("active");
     var content_id = $(this).attr("href");
     $(content_id).addClass("active");

 });
     $(".remove-icon").click(function (e) {
     e.preventDefault();
     $(".cmn-field").removeClass("active");
  });
   $(".list-link").click(function(){
    $("body").addClass("bg-change");
  });
    $(".remove-icon").click(function(){
    $("body").removeClass("bg-change");
  });

  $(".colg-advanced-search-btn").click(function(){
    $(".advanced-search-output").slideToggle();
    $("#applyfilters").slideToggle();
  });
  
});


$(document).ready(function() {

	
	$("#ajaxsubmitfrm").submit(function() {
    $.ajax({
           type: "POST",
           url: 'setclgsearch.php',
           data: $(this).serialize(), //Serialize a form to a query string.
           success: function(response){
			   console.log(response);
			    $("#clgdatadiv").empty();
				$("#clgdatadiv").append(response);
				window.limit =30;
				window.norow = 0;
                //response from server.
           }
         });
    return false; // prevent form to submit.
});
	
	
	
});


    </script>
<?php include 'footer.php'; ?>

