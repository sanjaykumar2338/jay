<?php 
include 'header.php'; 
if(isset($_POST['selectedclgids'])){
	$selectedclgids = $_POST['selectedclgids'];	
	$selclgsarr = explode(",",$selectedclgids);
//print_r($selclgsarr);
	$to_remove = array();
	$missedclgarr = array();
	if(strlen($selectedclgids)>0){
//for input college ids, fetch threshold values and based on admissibility score set the flag value	of $flag
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
//print_r($missedclgarr);
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
		font-size: 100px;
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
	.apj-inline{
		    display: inline-flex;
	}
	.thump-inline{
		padding-top: 37px;
    padding-left: 32px;
	}
	.thump-inline-ro {
		    padding-top: 62px;
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
		font-size: 80px;
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
									<div class="apj-inline">
									<h2>L </h2>
									<i class="fa fa-thumbs-up thumb-font thump-inline" aria-hidden="true" style="color:#42FF00"></i>
									</div>
									<p>Long Shot</p>
								</div>
							</div>
						</div>
						<div class="back bcolor2 ">
							<div class="parent " id="apj-scrollbar-b">
								<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
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
									<div class="apj-inline">
									<h2>R </h2><i class="fa fa-thumbs-down thumb-font thump-inline" aria-hidden="true" style="color: #FF0000"></i>
								</div>
									<p>Reach</p>
								</div>
							</div>
						</div>
						<div class="back bcolor1">
							<div class="parent " id="apj-scrollbar-a">
								<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
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
									<div class="apj-inline">
									<h2>M </h2>
									<i class="fa fa-thumbs-up thumb-font thump-inline" aria-hidden="true" style="color:#42FF00"></i>
								</div>
									<p>Match</p>
								
								</div>
							</div>
						</div>
						<div class="back bcolor2">
							<div class="parent " id="apj-scrollbar-a">
								<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
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
									<div class="apj-inline">
									<h2>S </h2>
									<i class="fa fa-thumbs-up fa-rotate-270 thumb-font thump-inline-ro" aria-hidden="true" style="color:#FFFF00"></i>
								</div>
									<p>Safety</p>
								
								</div>
							</div>
						</div>
						<div class="back bcolor1">
							<div class="parent " id="apj-scrollbar-b">
								<ul>
									<li>Although it is not essential to have at least one "Long Shot" college on your list, it is recommended that all applicants push themselves to find the upper limit of what is possible on their path.</li>
									<li>Finding at least one school in the "Long Shot" category will help ensure that you are not missing any opportunities and also reaching for the stars!</li>
									<li>One or two "Long Shot" schools add the perfect amount of stretch to your list without overtaxing your valuable resources of time and money.</li>
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
