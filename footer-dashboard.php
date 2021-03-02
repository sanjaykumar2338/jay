<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">    
    <span> &copy; 2021 Isuriz, LLC. All Rights Reserved. </span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="logout.php">Logout</a> </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<?php
$array = explode('/', $_SERVER['REQUEST_URI']);
$active = end($array);

if ($active != 'counselor-dashboard.php') echo '<script src="counselor-dashboard-assets/vendor/jquery/jquery.min.js"></script>'
?>

<script src="counselor-dashboard-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="counselor-dashboard-assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="counselor-dashboard-assets/js/sb-admin-2.min.js"></script>
<script>
    function previewFile(input){
      var filename = $("#uploadImage").val();

      console.log(input);
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
        $('.custom-file-label').text(filename); 
    }
</script>

<script type="text/javascript">
  $(document).ready(function(){
    // setInterval(function(){
    //  load_unseen_notification();
    // }, 5000);



    function load_unseen_notification(view = ''){
      var userid = "<?php echo $_SESSION['userid']; ?>" ;
     $.ajax({
      url: "ajax_function.php?action=requestConsult",
      method:"POST",
      data:{view:view,userid:userid},
      // dataType:"json",
      dataType: "text",
      success:function(data){
        console.log(" " + data);

       // $('.dropdown-menu').html(data.notification);

       // if(data.unseen_notification > 0)
       // {
       //  $('.count').html(data.unseen_notification);
       // }

      }
     });
    }

    $(".responseRequest").click(function(event){
      event.preventDefault();
      var userid = "<?php echo $_SESSION['userid']; ?>";
      var req_id = $(this).attr("data-id");
      var value = $(this).attr("value");
      
      $.ajax({
      url: "ajax_function.php?action=responseToRequest",
      method:"POST",
      data:{userid:userid,req_id:req_id,value:value},
      // dataType:"json",
      //dataType: "text",
      success:function(data){
        console.log(" testin data " + data);

       // $('.dropdown-menu').html(data.notification);

       // if(data.unseen_notification > 0)
       // {
       //  $('.count').html(data.unseen_notification);
       // }
      }
     });

    })

    $("#alertsDropdown").click(function(){
      var userid = "<?php echo $_SESSION['userid']; ?>";
      var userType = "<?php echo $_SESSION['usertype']; ?>"; 
      var arr = [];
      $('li#dropdownAlerts .dropdownAlertsItem').each(function(i, obj) {
         arr[i] = $(this).attr('data-id');         
      }); 
       
      var value = arr;
      if(arr.length){
      	console.log(arr); 
      	$.ajax({
	      url: "ajax_function.php?action=requestDissmiss",
	      method:"POST",
	      data:{userid:userid,userType:userType,value:value},
	      dataType:"json",
	      //dataType: "text",
	      success:function(data){ 
	      	console.log(data);
	     //  	$('.drop-down-content-box').html(data.notification);

		   	// $('li#dropdownAlerts .badge-counter').html(data.unseen_notification);
	     //    console.log(" testin data " + data);       
	      }
	     });
      }      
    })

    // Message Notification
    $("#messagesDropdown").click(function(){
      var userid = "<?php echo $_SESSION['userid']; ?>";
      
      var arr = [];
      $('li#dropdownAlertsMsg .dropdownAlertsItem').each(function(i, obj) {
         arr[i] = $(this).attr('data-id');         
      });
      console.log(arr);
      var value = arr;
      if(arr.length){
        console.log(arr); 
        $.ajax({
        url: "ajax_function.php?action=messageDissmiss",
        method:"POST",
        data:{userid:userid,value:value},
        dataType:"json",
        //dataType: "text",
        success:function(data){ 
          console.log(data);
          if(data.sucess == 1){
            $("li#dropdownAlertsMsg .badge-counter").html("0");
          }            
        }
       });
      } 


    })



  });


</script>
<script type="text/javascript"> 
$(".requestConsult").click(function(){    
    var $this = $(this);
    var req_to_couselorID = $(this).attr("data-id");   
    var req_by_id = $(this).attr("req-by-id");
    var myKeyVals = { req_by_id : req_by_id, req_to_couselorID : req_to_couselorID};
    var saveData = $.ajax({
          type: 'POST',
          url: "ajax_function.php?action=requestConsult",
          data: myKeyVals,
          dataType: "text",
          success: function(resultData) {
            if(resultData == '1'){
                console.log("Success Data");
                $this.html("Requested Consult");   
                $this.prop("disabled", true);;
            }           
       },error: function (error) {
           console.log("error" + error);
        }
    });
})


// send message 
  $("#sendMessage").click(function(e){
    e.preventDefault();
    $(".notification-msg").html("");
    var userid = "<?php echo $_SESSION['userid']; ?>";
    var userType = "<?php echo $_SESSION['usertype']; ?>";
    var message = $("#message").val();
    var subject = $("#subject").val();
    var to_id = $("#cnslrIds").val();
    if(message == '' || subject == ''){
      $(".notification-msg").html("All fields are required to be completed.").delay(5000).fadeOut();
      $(".notification-msg").css("color","red");
      
    }else{
      $.ajax({
        url: "ajax_function.php?action=sendMessage",
        method:"POST",
        data:{userid:userid,to_id:to_id,message:message,subject:subject},      
        success:function(data){ 
          if(data == '1'){
            $("textarea#message").val("");
            $(".notification-msg").css({'color' : 'green','display' : 'block'});
            $(".notification-msg").html("Message send successfully").delay(5000).fadeOut();
            
          }else{
            $(".notification-msg").html("Something goes wrong,try again").delay(5000).fadeOut();
          }      
        }
      });
    }    
  })

  // Reply back message 
  $(".replyBack").click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    console.log("data id" + id);
    $(".notification-msg").html("");
    var userid = "<?php echo $_SESSION['userid']; ?>";    
    var message = $("#message"+id).val();
    var to_id = $("#cnslrIds"+id).val();
    var reply_id = $("#replyId"+id).val();
    var subject = $("#subject"+id).val();

    var id = "#countReply"+reply_id;
    // $(id).html("test data");

    

    if(message == ''){
      $(".notification-msg").html("All fields are required to be completed.").delay(5000).fadeOut();
      $(".notification-msg").css("color","red");
      
    }else{
      $.ajax({
        url: "ajax_function.php?action=replyMessage",
        method:"POST",
        dataType:"json",
        data:{userid:userid,to_id:to_id,message:message,reply_id:reply_id,subject:subject},      
        success:function(data){ 
          console.log(data);
          if(data.totalReplay > 0){    
          console.log(id + " " + data.totalReplay);        
            $(id).html(data.totalReplay);
          }
          if(data.sucess == 1){
            $("textarea#message").val("");
            $(".notification-msg").css({'color' : 'green','display' : 'block'});
            $(".notification-msg").html("Message send successfully").delay(5000).fadeOut();
            
          }else{
            $(".notification-msg").html("Something goes wrong,try again").delay(5000).fadeOut();
          }      
        }
      });
    }

  })



  

  // 
  $(".requestConsult").click(function(){
    var cnslrIds = $(this).attr('data-id');
    console.log(cnslrIds);
    $("#cnslrIds").val(cnslrIds);
    $('#myModalMessage').modal('show');
  });

</script>


</body>

</html>