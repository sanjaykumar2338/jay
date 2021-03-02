<?php include 'headerapp.php'; ?>

<?php 
//get User id by session 
// $userid = $_SESSION['userid'];

include('includes/config.php');
$errormsg = '';
if(isset($_POST['saveTitle'])){
  print_r($_POST);
  $_POST = array();
}

?>
<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
</style>

  <div id="wrapper">
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li > 
            <a href="counsellor-dashboard.php"><i class="fa fa-pencil" aria-hidden="true"></i>Title<i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li> 
            <a href="counsellor-overview.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Overview <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li > 
            <a href="counsellor-services.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Services <i class="fa fa-check-circle" aria-hidden="true"></i>  </a> 
          </li>
          <li class="active-link"> 
            <a href="counsellor-expertise.php"><i class="fa fa-qrcode "></i>Expertise <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-location.php"><i class="fa fa-map-marker" aria-hidden="true"></i>Location <i class="fa fa-check-circle" aria-hidden="true"></i></a> 
          </li>
          <li> 
            <a href="counsellor-visibility.php"><i class="fa fa-user" aria-hidden="true"></i> Visibility <i class="fa fa-check-circle" aria-hidden="true"></i> </a> 
          </li>
          <li> 
            <a href="counsellor-fees.php"><i class="fa fa-usd" aria-hidden="true"></i>Fees <i class="fa fa-check-circle" aria-hidden="true"></i></a> </li>
          <li> <a href="counsellor-review.php"><i class="fa fa-check" aria-hidden="true"></i>Review</a> </li>
        </ul>
      </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" class="counsellor-services-section">
      <div id="page-inner">
        <div class="row">
          <div class="col-lg-12">
            <h2>Expertise</h2> 
            <span>steps 1 to 8</span> 
          </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
          <div class="col-lg-12 "> </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="control-group" id="fields">
              <label class="control-label" for="field1">What skills ad expertise are most importnat for you ?</label>
              <div class="controls"> 
                  <form role="form" autocomplete="off">
                      <div class="entry input-group col-xs-10">
                          <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                        <span class="input-group-btn">
                              <button class="btn btn-success btn-add" type="button">
                                  <span class="glyphicon glyphicon-plus"></span>
                              </button>
                          </span>
                      </div>
                  </form>
              <br>
              <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
              </div>
            </div>
            
          </div>

         


        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
  </div>
 
  <?php include 'footerapp.php'; ?>
 <script>
   $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
  });
});
  
  </script>