<?php
require_once 'includes/config.php';

$selstate = trim($_POST['state']);
$selparts = trim($_POST['parts']);
$selzip = trim($_POST['inputZip']);
$selmiles = trim($_POST['miles']);
$selcampset = trim($_POST['campusSetting']);
$selenroll_min = trim($_POST['enrollment_min']);
$selenroll_max = trim($_POST['enrollment_max']);
$selloa = trim($_POST['level_of_award']);
$selinsttype = trim($_POST['institution_type']);
$selhousing = trim($_POST['housing']);
$selhsgradyear = trim($_POST['hsgradyear']);
$seltestchoice = trim($_POST['testchoice']);
$seltestsatscore = trim($_POST['testsatscore']);
$seltestactscore = trim($_POST['testactscore']);
$selgpa = trim($_POST['gpa']);
$selrcapclscnt = trim($_POST['rcapclscnt']);
$selrcothhrnclscnt = trim($_POST['rcothhrnclscnt']);
$selearlyapplydecs = trim($_POST['earlyapplydecs']);
$selecact4yr = trim($_POST['ecact4yr']);
$seleclr4yr = trim($_POST['eclr4yr']);
$selecact3yr = trim($_POST['ecact3yr']);
$seleclr3yr = trim($_POST['eclr3yr']);
$selecact2yr = trim($_POST['ecact2yr']);
$seleclr2yr = trim($_POST['eclr2yr']);
$selecact1yr = trim($_POST['ecact1yr']);
$seleclr1yr = trim($_POST['eclr1yr']);
$selawardscnt = trim($_POST['awardscnt']);
$admiscore = trim($_POST['admiscore']);
$selclgids = trim($_POST['selclgids']);

$loggeduserid = 1;

//print_r($_POST);

$query = "INSERT INTO `users_lists`(`userid`, `selstate`, `selparts`, `selzip`, `selmiles`, `selcampset`, `selenroll_min`, `selenroll_max`, `selloa`, `selinsttype`, `selhousing`, `selhsgradyear`, `seltestchoice`, `seltestsatscore`, `seltestactscore`, `selgpa`, `selrcapclscnt`, `selrcothhrnclscnt`, `selearlyapplydecs`, `selecact4yr`, `seleclr4yr`, `selecact3yr`, `seleclr3yr`, `selecact2yr`, `seleclr2yr`, `selecact1yr`, `seleclr1yr`, `selawardscnt`, `admiscore`, `selclgids`, `createdon`, `createdby`, `updatedon`, `updatedby`)
	VALUES 
('$loggeduserid','$selstate','$selparts','$selzip','$selmiles','$selcampset','$selenroll_min','$selenroll_max','$selloa','$selinsttype','$selhousing','$selhsgradyear','$seltestchoice','$seltestsatscore','$seltestactscore','$selgpa','$selrcapclscnt','$selrcothhrnclscnt','$selearlyapplydecs','$selecact4yr','$seleclr4yr','$selecact3yr','$seleclr3yr','$selecact2yr','$seleclr2yr','$selecact1yr','$seleclr1yr','$selawardscnt','$admiscore','$selclgids',NOW(),'$loggeduserid',NOW(),'$loggeduserid')";

//echo $query;
$result = mysqli_query($con, $query);	
if ($result) {
	echo 'success';
}
else{
	echo 'fail';
}
/*

INSERT INTO `users_lists`(`id`, `userid`, `selstate`, `selparts`, `selzip`, `selmiles`, `selcampset`, `selenroll_min`, `selenroll_max`, `selloa`, `selinsttype`, `selhousing`, `selhsgradyear`, `seltestchoice`, `seltestsatscore`, `seltestactscore`, `selgpa`, `selrcapclscnt`, `selrcothhrnclscnt`, `selearlyapplydecs`, `selecact4yr`, `seleclr4yr`, `selecact3yr`, `seleclr3yr`, `selecact2yr`, `seleclr2yr`, `selecact1yr`, `seleclr1yr`, `selawardscnt`, `admiscore`, `selclgids`, `createdon`, `createdby`, `updatedon`, `updatedby`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26],[value-27],[value-28],[value-29],[value-30],[value-31],[value-32],[value-33],[value-34],[value-35])


//get college ids and remove trailing comma
$selectedclgidstr = '';
$selectedclgidstr = $_POST['selclgids'];
$selectedclgidstr = rtrim($selectedclgidstr,",");
//get state codes and remove trailing comma
$selstate = '';
*/

?>