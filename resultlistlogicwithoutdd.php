<?php 

include 'header.php'; 
//print_r ($_SESSION['clgcb']);
$clgidarr = array();
$admiscore = $_SESSION['admiscore'];
//print_r ($_SESSION['admiscore']);
if(isset($_SESSION['clgcb']) ){
	$selclgsarr = $_SESSION['clgcb'];
	$selectedclgids = '';
	$selectedclgids = implode(",",$selclgsarr);	
	//$selclgsarr = (explode(",",$selectedclgids));
	//echo $selectedclgids;
	//print_r($selclgsarr);	
	$to_remove = array();
	$missedclgarr = array();
	if(strlen($selectedclgids)>0){
		//for input college ids, fetch threshold values and based on admissibility score set the flag value	of $flag
		//echo "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ";
		$resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");
		$countthm = 0;
		$counttr = 0;
		$counttm = 0;
		$countts = 0;
		$countnf = 0;
		$countall = $resclgth->num_rows;
		//echo '<button id="listsavebtn" class="btn btn-info" onclick=savelist()>Save List</button>';
			
		while ($rowclgth = mysqli_fetch_assoc($resclgth)){
			$indclgidarr =array();
			$indclgidarr['col1'] = '';
			$indclgidarr['THM'] = '';
			$indclgidarr['TR'] = '';
			$indclgidarr['TM'] = '';
			$indclgidarr['TS'] = '';
			$indclgidarr['NF'] = '';
			$flag = 'NF'; // possible values will be THM(Threshold Hail Mary), TR(Threshold Reach), TM(Threshold Match), TS(Threshold Safety), NF(Not Fit)
			if($admiscore > $rowclgth['thhailmary'])
				$flag = 'THM';
			if($admiscore > $rowclgth['threach'])
				$flag = 'TR';
			if($admiscore > $rowclgth['thmatch'])
				$flag = 'TM';
			if($admiscore > $rowclgth['thsafety'])
				$flag = 'TS';
			if($flag == 'THM'){
				$indclgidarr['THM'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';			
				$countthm++;
			}
			if($flag == 'TR'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';
				$counttr++;
			}
			if($flag == 'TM'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = '';
				$counttm++;
			}
			if($flag == 'TS'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$indclgidarr['NF'] = '';
				$countts++;
			}
			if($flag == 'NF'){
				$indclgidarr['THM'] = '';
				$indclgidarr['TR'] = '';
				$indclgidarr['TM'] = '';
				$indclgidarr['TS'] = '';
				$indclgidarr['NF'] = $rowclgth['instnm'].' - '.$rowclgth['clgscore'];
				$countnf++;
			}
			array_push($clgidarr,$indclgidarr);
			array_push($to_remove,$rowclgth['unitid']);
			
		}
		$missedclgarr = array_diff($selclgsarr, $to_remove);
		//echo 'No Threshold Values: <pre>';
		
	}

}
?>
<style>
	:root {
		--apj-resultcard-height :250px;
	}
	#msform , .msform{
		font-size: 22px;
	}
	.fluid {
		padding-left: 15px !important;
	}
	.parent {
		overflow-x: hidden;
		overflow-y: auto;
		height: var(--apj-resultcard-height);
	}
	.parent > ul {
		list-style:disc;
		display: inline-block;
		font-size: 14px;
		padding: 10px 16px 0 28px;
		color: #fff;
	}
	.apj-card-one,.apj-card-two,.apj-card-three,.apj-card-four{
		text-align: center;
		line-height: var(--apj-resultcard-height);
		min-height: var(--apj-resultcard-height);
		max-height: var(--apj-resultcard-height);
	}
	.apj-card-one h2,.apj-card-two h2,.apj-card-three h2,.apj-card-four h2{
		font-size: 40px;
		color: #fff;
	}
	.apj-card-one p,.apj-card-two p,.apj-card-three p,.apj-card-four p{
		font-size: 20px;
		color: #fff;
	}
	.apj-card-one-color{
		background: #019ff0;
	}
	.apj-card-two-color{
		background: #43B0F1;
	}
	.apj-card-three-color{
		background: #43B0F1;
	}
	.apj-card-four-color{
		background: #019ff0;
	}
	.bcolor1 {
		background: #019ff0;
	}
	.bcolor2 {
		background: #43B0F1;
	}
	.inner-card-front{
		display: inline-block;
		vertical-align: middle;
		line-height: normal;
	}
	/* flip the pane when hovered */
	.flip-container.hover .flipper {
		transform: rotateY(180deg);
	}
	.flip-container{
		margin: 0 12px 12px 0;
	}
	.flip-container,
	.front,
	.back {
		width: 400px;
		min-height: var(--apj-resultcard-height);
		max-height: var(--apj-resultcard-height);
	}
	/* flip speed */
	.flipper {
		transition: 0.8s;
		transform-style: preserve-3d;
		position: relative;
	}
	/* hide back of pane during swap */
	.front,
	.back {
		backface-visibility: hidden;
		position: absolute;
		top: 0;
		left: 0px;
	}
	.back {
		left: -30px;
	}
	/* front pane, placed above back */
	.front {
		z-index: 2;
		transform: rotateY(0deg);
	}
	/* back, initially hidden panel */
	.back {
		transform: rotateY(180deg);
	}
	#apj-scrollbar-a::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #43b0f1;
	}
	#apj-scrollbar-b::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #019ff0;
	}
	#apj-scrollbar-a::-webkit-scrollbar
	{
		width: 10px;
		background-color: #43b0f1;
	}
	#apj-scrollbar-b::-webkit-scrollbar
	{
		width: 10px;
		background-color: #019ff0;
	}
	#apj-scrollbar-a::-webkit-scrollbar-thumb,#apj-scrollbar-b::-webkit-scrollbar-thumb
	{
		background-color: #e3e3e3;
		border: 2px solid #e3e3e3;
	}



	section.College-Search-result .result {
    border: none;
    margin: 10px 0 10px;
	}
	@media only screen and (max-width: 767px) {
		.flip-container,
		.front,
		.back {
			width: calc(100% - 4px);
		}
		.back {
			left: -0px;
		}
	}
	.thumb-font{
		font-size: 70px;
	}

	.h2-subfont{
		font-size: 35px;
	}
	.pl-2{
		padding-left: 2px;
	}
</style>
<link href="css/custom.css" rel="stylesheet">
<section class="College-Search-result apj-collage-search">
	<div class="container fluid">
		<div class="row">
			<div class="result col-sm-12">
				<p style="font-size: 37px;text-align: center;">
					<!-- <img src="https://asurison.com/images/icon1.png"> <br> -->
					<span style="color: #019ff0;font-weight: bold;">Balance</span> Your College <span style="color: #019ff0;font-weight: bold;">List</span>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 ">
				<div class="col-sm-12 col-md-2 ">
				</div>
				<div class="col-sm-12 col-md-3 flip-container">
					<div class="flipper">
						<div class="front ">
							<!-- front content -->
							<div class="apj-card-one apj-card-one-color" >
								<div class="inner-card-front">
									
									<h2>L<span class="h2-subfont pl-2">ong Shot</span></h2>
									<?php	
										
										if($countthm < 1){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($countthm > 0 && $countthm < 3){
											echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
										}
										else if($countthm > 2 && $countthm < 4 ){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($countthm > 3 ){
											echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';											
										}
										else{}
									?>
									
								</div>
							</div>
						</div>
						<div class="back bcolor2 ">
							<div class="parent " id="apj-scrollbar-b">
							<ul>
							<?php			
								if($countthm < 1){
									echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
									echo '<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>';								
									echo '<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>';
								}
								else if($countthm > 0 && $countthm < 3){
									echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
									echo '<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>';
									echo '<li>These are frequently the most time-consuming applications that require additional essays and application components.</li>';
									echo '<li>You should truly be in love with these schools as they will require the most energy to apply, and will only admit you if they can sense your extreme sense of excitement for becoming a member of their student body.</li>';
								}
								else if($countthm > 2 && $countthm < 4 ){
									echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
									echo '<li>Three "Long Shot" colleges may prove to be too many on most college lists.</li>';
									echo '<li>Since typically resources of time and money are limited in the application process, adding three in this category may lead to lower quality applications being submitted to other schools on your college list.</li>';
								}
								else if($countthm > 3 ){
									echo '<li>Currently, you have '.$countthm.' colleges in this category.</li>';
									echo '<li>Applying to 4 or more "Long Shot" colleges is a waste of time and resources.</li>';
									echo '<li>You should look for schools that are in the "Reach" and "Match" categories that have many of the great things you love about these "Long Shot" schools.</li>';
									echo '<li>Attempting to apply to 4+ in this category almost always leads to fewer overall acceptances. Refine your search criteria and double down on the 1-2 best-fit Long Shot\'s!</li>';
									
								}
								else{}
								?>
								<!--<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
								</ul>-->
								</ul>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-sm-12 col-md-3  flip-container">
					<div class="flipper">
						<div class="front ">
							<!-- front content -->
							<div class="apj-card-two apj-card-two-color" >
								<div class="inner-card-front">
									
									<h2>R<span class="h2-subfont">each</span></h2>
									<?php
										
										if($counttr < 2){								
											echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
										}
										else if($counttr > 1 && $counttr < 3){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($counttr > 2 && $counttr < 5 ){
											echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
										}
										else if($counttr > 4 && $counttr < 6 ){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($counttr > 5 ){
											echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
										}
										else{}
																		
									?>
									
								</div>
							</div>
						</div>
						<div class="back bcolor1">
							<div class="parent " id="apj-scrollbar-a">
							<ul>
							<?php
							if($counttr < 2){			
								echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
								echo '<li>The "Reach" schools are arguably the most important category of schools on your college list.</li>';
								echo '<li> These colleges need to represent your goals and ambitions and should be some of the schools to which you are most excited about gaining admission.</li>';								
								echo '<li>Less than three in this category is a missed opportunity to apply to schools that may be within reach.</li>';
							}
							else if($counttr > 1 && $counttr < 3){
								echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
								echo '<li>With 2 "Reach" schools, you have begun to identify a trend or set of criteria that are most important to you.</li>';
								echo '<li>Consider adding 1-2 more in this category to increase your likelihood of admission to a school in this important category.</li>';
							}
							else if($counttr > 2 && $counttr < 5 ){
								echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
								echo '<li>Having 3-4 "Reach" schools is the sweet spot for a college list.</li>';
								echo '<li>This will provide you the greatest chance of submitting your best possible work and gaining access to institutions at the top end of your academic range.</li>';
							}
							else if($counttr > 4 && $counttr < 6 ){
								echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
								echo '<li>With 5 "Reach" schools, you may need to further clarify your hopes and desires for a future college home.</li>';
								echo '<li>This wide of a range in the "Reach" category may be an indicator that you need to further refine your criteria, or begin to eliminate schools from your list based on gaining a deeper understanding of the unique institutions.</li>';
							}
							else if($counttr > 5 ){
								echo '<li>Currently, you have '.$counttr.' colleges in this category.</li>';
								echo '<li>6 or more "Reach" schools is too many for most college lists and will likely mean you are lacking in a different category.</li>';
								echo '<li>Refine the list of schools by clarifying your criteria and gaining a deeper understanding of the differences between schools.</li>';
							}
							else{}
							?>
								<!--<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
								</ul>-->
							</ul>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-sm-12 col-md-4 ">
				</div>
			</div>
		</div>
		<div class="row pb-35">
			<div class="col-sm-12 col-md-12 ">
				<div class="col-sm-12 col-md-2 ">
				</div>
				<div class="col-sm-12 col-md-3  flip-container">
					<div class="flipper">
						<div class="front">
							<!-- front content -->
							<div class="apj-card-three apj-card-three-color" >
								<div class="inner-card-front">
									
									<h2>M<span class="h2-subfont">atch</span></h2>
									<?php
										
										if($counttm < 2){
											echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
										}
										else if($counttm > 1 && $counttm < 3){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($counttm > 2 && $counttm < 5 ){
											echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
										}
										else if($counttm > 4 && $counttm < 6 ){
											echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
										}
										else if($counttm > 5 ){
											echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
										}
										else{}
									?>
								
								</div>
							</div>
						</div>
						<div class="back bcolor2">
							<div class="parent " id="apj-scrollbar-a">
								<ul>
								<?php
								if($counttm < 2){
									echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
									echo '<li>"Match" schools are the bread and butter of your college list.</li>';
									echo '<li>Include 3 to 4 in this category to give yourself the best opportunity to gain admission to schools that are right on target academically.</li>'; 
									echo '<li>Failing to adequately fill this category will lead to an unbalanced list that may limit your collegiate options.</li>';
								}
								else if($counttm > 1 && $counttm < 3){
									echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
									echo '<li>With 2 "Match" colleges, you have begun to identify your list\'s backbone.</li>';
									echo '<li>Strengthen this list by adding 1-2 more in this category.</li>';
									echo '<li>These schools will be excited to receive your application and can be more flexible with grades and test scores.</li>';
									echo '<li>They may add greater priority to your fit within their community when determining your admissions decision.</li>';
								}
								else if($counttm > 2 && $counttm < 5 ){
									echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
									echo '<li>3-4 "Match" schools are perfect for a well-balanced college list.</li>';
									echo '<li>In this range, your list is most likely to be a representation of a true fit between you and the institution.</li>';
								}
								else if($counttm > 4 && $counttm < 6 ){
									echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
									echo '<li>WIth 5 "Match" schools, you are at the upper limit of this category.</li>';
									echo '<li>Consider removing 1 school by further clarifying your interests at each college, and verifying that they meet the essentials on your checklist.</li>';
								}
								else if($counttm > 5 ){
									echo '<li>Currently, you have '.$counttm.' colleges in this category.</li>';
									echo '<li>6 of more "Match" schools are too many for most college lists.</li>';
									echo '<li>Attempting to apply to this many "Match" schools will leave the other essential categories too sparsely populated. Remove 2-3 from this category.</li>';
								}
								else{}
								?>
								<!--<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
								</ul>-->
								</ul>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-sm-12 col-md-3  flip-container">
					<div class="flipper">
						<div class="front ">
							<!-- front content -->
							<div class="apj-card-four apj-card-four-color" >
								<div class="inner-card-front">
									
									<h2>S<span class="h2-subfont">afety</span></h2>									
									<?php
									
									if($countts < 2){
										echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
									}
									else if($countts > 1 && $countts < 3){
										echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
									}
									else if($countts > 2 && $countts < 5 ){
										echo '<i class="fa fa-thumbs-up thumb-font" aria-hidden="true" style="color: #42FF00" ></i>';
									}
									else if($countts > 4 && $countts < 6 ){
										echo '<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color: #FFFF00"></i>';
									}
									else if($countts > 5 ){
										echo '<i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000" ></i>';
									}
									else{}
									?>
									
								</div>
							</div>
						</div>
						<div class="back bcolor1">
							<div class="parent " id="apj-scrollbar-b">
							<ul>
							<?php
							if($countts < 2){
								echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
								echo '<li>"Safety" colleges will provide the peace of mind to help you sleep at night while you wait for results to arrive.</li>';								
								echo '<li>You need to have these colleges on your list to ensure that you will have an admissions offer for your undergraduate studies.</li>';
								echo '<li>Build out this category to avoid disappointment.</li>';
							}
							else if($countts > 1 && $countts < 3){
								echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
								echo '<li>Some lists may be considered complete with just 2 "Safety" schools, but in service of preparing for the worst-case outcomes, 3-4 "Safeties" will reduce the risk of having nowhere to attend this fall.</li>';
							}
							else if($countts > 2 && $countts < 5 ){
								echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
								echo '<li>Building a strong list requires planning for any outcome.</li>';								
								echo '<li>Having 3 to 4 safety schools will increase the chances that you have options to select from this fall.</li>';
							}
							else if($countts > 4 && $countts < 6 ){
								echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
								echo '<li>5 "Safety" schools may be an overinvestment in the "fallbacks".</li>';
								echo '<li>You are likely to be admitted to schools in this category and will be best served by focusing more attention on the other categories.</li>';
								echo '<li>You should consider removing 1 to 2 schools from this category.</li>';
							}
							else if($countts > 5 ){
								echo '<li>Currently, you have '.$countts.' colleges in this category.</li>';
								echo '<li>There is no need for 6 or more safety schools on anyone\'s list.</li>';
								echo '<li>You are likely to be admitted to these schools and should choose 3-4 options that best fit your goals.</li>';
							}
							else{}
							?>
								<!--<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
								</ul>-->
								</ul>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-sm-12 col-md-4 ">
				</div>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
	<script>
		$('.flip-container .flipper').click(function() {
			$(this).closest('.flip-container').toggleClass('hover');
		$(this).css('transform, rotateY(180deg)');
		});
	</script>
