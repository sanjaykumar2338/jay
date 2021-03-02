<?php
include_once 'header-dashboard.php';
$resfilters = mysqli_query($con,"SELECT * FROM search_data WHERE createdby = '". $_SESSION['userid']."' ORDER BY id DESC limit 0,1");

if(mysqli_num_rows($resfilters) > 0){
    while ($rowfilters = mysqli_fetch_assoc($resfilters)) {
        $clgcb = unserialize($rowfilters["all_clg_list"]);
        $admiscore = $rowfilters["admiscore"];
    }
}

$clgidarr = array();
//print_r ($_SESSION['admiscore']);
$countthm = 0;
$counttr = 0;
$counttm = 0;
$countts = 0;
$countnf = 0;
if(isset($clgcb) ){
    $selclgsarr = $clgcb;
    $selectedclgids = '';
    $selectedclgids = implode(",",$selclgsarr);
    //$selclgsarr = (explode(",",$selectedclgids));
    //echo $selectedclgids;
    $to_remove = array();
    $missedclgarr = array();
    if(strlen($selectedclgids)>0){
        //for input college ids, fetch threshold values and based on admissibility score set the flag value   of $flag
        //echo "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ";
        $resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");

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
                $indclgidarr['THM'] = $rowclgth['instnm'];
                $indclgidarr['INSTNM'] = $rowclgth['instnm'];
                $indclgidarr['TR'] = '';
                $indclgidarr['TM'] = '';
                $indclgidarr['TS'] = '';
                $indclgidarr['NF'] = '';
                $countthm++;
            }
            if($flag == 'TR'){
                $indclgidarr['THM'] = '';
                $indclgidarr['TR'] = $rowclgth['instnm'];
                $indclgidarr['INSTNM'] = $rowclgth['instnm'];
                $indclgidarr['TM'] = '';
                $indclgidarr['TS'] = '';
                $indclgidarr['NF'] = '';
                $counttr++;
            }
            if($flag == 'TM'){
                $indclgidarr['THM'] = '';
                $indclgidarr['TR'] = '';
                $indclgidarr['TM'] = $rowclgth['instnm'];
                $indclgidarr['INSTNM'] = $rowclgth['instnm'];
                $indclgidarr['TS'] = '';
                $indclgidarr['NF'] = '';
                $counttm++;
            }
            if($flag == 'TS'){
                $indclgidarr['THM'] = '';
                $indclgidarr['TR'] = '';
                $indclgidarr['TM'] = '';
                $indclgidarr['TS'] = $rowclgth['instnm'];
                $indclgidarr['INSTNM'] = $rowclgth['instnm'];
                $indclgidarr['NF'] = '';
                $countts++;
            }
            if($flag == 'NF'){
                $indclgidarr['THM'] = '';
                $indclgidarr['TR'] = '';
                $indclgidarr['TM'] = '';
                $indclgidarr['TS'] = '';
                $indclgidarr['NF'] = $rowclgth['instnm'];
                $indclgidarr['INSTNM'] = $rowclgth['instnm'];
                $countnf++;
            }
            array_push($clgidarr,$indclgidarr);
            array_push($to_remove,$rowclgth['unitid']);
        }
        $missedclgarr = array_diff($selclgsarr, $to_remove);
        //echo 'No Threshold Values: <pre>';
    }

}



$INSTNM = array_column($clgidarr, 'INSTNM');
array_multisort($INSTNM, SORT_ASC, $clgidarr);
?>

<div id="modalsharecollegelist" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>
                <button type="button" style="    margin: 0px;
    padding: 0px;" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="mymailform" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailid">To:</label>
                        <input type="email" name="tomail" id="tomail" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="emailid">CC:</label>
                        <input type="email" name="ccmail" id="ccmail" class="form-control" placeholder="Email" >
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
                </div>
            </form>


        </div>
    </div>
</div>
<div id="modalsharecollegelist2" class="advance-filter-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>

                <button type="button" style="    margin: 0px;
    padding: 0px;" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="mymailform" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailid">To:</label>
                        <input type="email" name="tomail"  class="form-control" placeholder="Email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailid">CC:</label>
                        <input type="email" name="ccmail"  class="form-control" placeholder="Email" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" disabled>
                    <div class="upgradepremium">
                        <div class="upgrade-content">
                            <h4>Upgrade to Premium to Access this Feature</h4>
                            <p>After at least 5 students that you have invited join Isuriz, your account will be upgraded to Premium to unlock this feature.</p>
                        </div>
                        <div class="upgrade-action">
                            <a class="upgrade-now-btn" href="dashboard-invite.php">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- top navbar-->

    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">


            <div class="content-heading" id="welcometext-div">
                <div class="text-center" id="welcometext-mb" style="color: #3a3a3a"><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">My College List
                        <?php
                        $id =$_SESSION['userid'];
                        $sql ="SELECT * FROM `commission` WHERE from_id= $id";
                        $query =mysqli_query($con, $sql);
                        if(mysqli_num_rows($query) > 0) {

                            $row =mysqli_fetch_array($query);
                            if($row['credits'] > 4) {

                                ?>
                                <button class="btn btn-primary mybluebtn "  onclick="showmodalmailer()">Share</button>
                            <?php }    else { ?>
                                <button class="btn btn-primary mybluebtn "  onclick="noshowmodel()">Share</button>
                                <?php

                            }
                        }else{?>   <button class="btn btn-primary mybluebtn "  onclick="noshowmodel()">Share</button><?php }?>
                    </h3><small data-localize="dashboard.WELCOME"></small></div>
            </div>

            <div class="row">
                <!-- START dashboard main content-->
                <div class="col-xl-12">
                    <!-- START -->
                    <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">

                            <!--alert box-->
                            <section class="myCollegeAlert">
                                <div class="container">
                                    <div class="row">
                                        <div class="alert-box-shadow mt-3">
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="alert alert-warning">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-xs-12">
                                                            <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Please note that colleges on this page only appear after successfully building your list.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--alert box end-->
                            <div class="college-list">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <ul class="list-group mycollegelist">
                                                <li class="list-group-item cat-header">Long Shot </li>
                                                <?php
                                                if($countthm > 0){
                                                    foreach($clgidarr as $clg){
                                                        if(!empty($clg['THM'])){
                                                            echo '<li class="list-group-item">'.$clg['THM'].'</li>';
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo '<li class="list-group-item">There are no colleges in this category</li>';
                                                }
                                                ?>
                                                <!--<li class="list-group-item">Columbia University </li>-->
                                            </ul>
                                            <ul class="list-group mycollegelist">
                                                <li class="list-group-item cat-header">Reach </li>
                                                <?php
                                                if($counttr > 0){
                                                    foreach($clgidarr as $clg){
                                                        if(!empty($clg['TR'])){
                                                            echo '<li class="list-group-item">'.$clg['TR'].'</li>';
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo '<li class="list-group-item">There are no colleges in this category</li>';
                                                }
                                                ?>
                                            </ul>
                                            <ul class="list-group mycollegelist">
                                                <li class="list-group-item cat-header">Match </li>
                                                <?php
                                                if($counttm > 0){
                                                    foreach($clgidarr as $clg){
                                                        if(!empty($clg['TM'])){
                                                            echo '<li class="list-group-item">'.$clg['TM'].'</li>';
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo '<li class="list-group-item">There are no colleges in this category</li>';
                                                }
                                                ?>
                                            </ul>
                                            <ul class="list-group mycollegelist">
                                                <li class="list-group-item cat-header">Likely </li>
                                                <?php
                                                if($countts > 0){
                                                    foreach($clgidarr as $clg){
                                                        if(!empty($clg['TS'])){
                                                            echo '<li class="list-group-item">'.$clg['TS'].'</li>';
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo '<li class="list-group-item">There are no colleges in this category</li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Buttons-->
                                    <!-- <div class="row">
                                          <div class="mt-30 mb-30 blueBtnBigdiv text-center ml-14">
                                             <a href="resultlistlogic.php" class="btn btn-default prev blue-outline btn-center-xs" >Back</a>
                                            <a href="congratulations.php" class="btn btn-default blueBtnBig ml-14" aria-hidden="false">Confirm</a>
                                          </div>
                                     </div> -->
                                    <!--Buttons-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
            <!-- END dashboard main content-->
            <!-- START dashboard sidebar-->
        </div>
</section>
</div>
<?php include 'footer-dashboard.php'; ?>
<script>
    function showmodalmailer()
    {
        $('#modalsharecollegelist').modal('show');
    }
    $( "#mymailform" ).submit(function( event ) {
        $.ajax({
            type: "POST",
            url: "includes/sendmail_collegelist.php",
            dataType: 'text',
            data: $("#mymailform").serialize(),
            cache: false,
            async: false,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                alert(data);
            },
            complete: function () {
                $('.loading').hide();
            }
        });
        event.preventDefault();
    });
    function noshowmodel()
    {
        $('#modalsharecollegelist2').modal('show');
        event.preventDefault();

    }
</script>


