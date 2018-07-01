<?php 
include'admin/config.php';
$total_price=1;
$pro_name='Activa';
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Payment Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="alert('This is alert');">Click</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
          <img src="logos.png" />
          <h3 style="text-align:center; font-family: ab2;font-weight:bold;">Booking Details</h3>
        </div>
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->
                
                  <!-- <div class="content-product-left  col-md-3 col-sm-8 col-xs-8"> -->
                      <h3 style="text-align:center;color:#004066;font-size:15px;font-family:ab2;font-size:20px;font-weight: bold;">
                          <?php echo $pro_name;?>
                      </h3>

                      <!-- <center><img src="admin/<?php //echo $image;?>" alt="Bike Image"></center>  -->
                  <!-- </div> -->
                  <!-- <div class="col-md-6" style="margin-top:2%;"> -->
                      <h5 style="font-size:15px;font-weight:bold;color:#004066;">Booking Duration</h5>
                      <!-- <p>From :<span><?php// echo $_SESSION['from_date'];?></span> To: <span><?php// echo $_SESSION['to_date'];?></span></p>-->
                      <p>
                          From :
                          <span>09/07/2018</span>
                          To:10/07/2018
                          <span></span>
                      </p>
                      <h5 style="font-size: 15px; font-weight: bold;color: #004066;">Total Amount Payable</h5>
                      <h5 style="font-size: 20px;font-weight: bold;">
                          <i class="fa fa-inr"></i>
                          <?php echo $total_price;?>
                      </h5>
                      <button id="rzp-button1" class="btn btn-primary">Pay</button>
                      OR
                      <button id="butt1" class="btn btn-primary">Skip</button>
                      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


                      <script>

                        var options = {
                            "key": "rzp_live_yynYqAM86EDsyI",
                            "amount": "100", // 2000 paise = INR 20
                            "name": "ZopRent Pvt. Ltd.",
                            "description": "<?php echo $pro_name;?>",
                            "image": "assets/logo.png",
                          //"callback_url": 'https://www.zoprent.com/paymentAccpted.php?paymentId"+response.razorpay_payment_id',
                            "handler": function (response){
                                //alert(response.razorpay_payment_id);
                            var name = response.razorpay_payment_id;
                            //var booking = "<?php //echo $_SESSION['booking_id'];?>";
                                var booking = "ZOP123";
                            if (typeof response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
                                redirect_url = "paymentCancled.php?Id="+booking;
                                 } else {
                                redirect_url = "paymentAccpted.php?Id="+booking+"&paymentId="+response.razorpay_payment_id;
                                 }
                             //"test.php?lat="+elemA+"&lon="+elemB;
                                location.href = redirect_url;
                            },

                            "prefill": {
                                "name": "<?php echo 'Aditi'; //echo $_POST['name'];?>",
                                "email": "<?php echo' yadav@gmail.com'; // echo $_POST['email'];?>"
                            },
                            "notes": {
                                "address": "<?php echo' adress adress adress'; //echo $_POST['address'];?>"
                            },
                            "theme": {
                                "color": "#004066"
                            },
                          "modal" : {
                               "ondismiss": function(){

                                 // var booking = "<?php //echo $_SESSION['booking_id'];?>";
                                   var booking = "ZOP123";
                                window.location.href="paymentCancled.php?Id="+booking;

                        }

                          }

                        };
                      var rzp1 = new Razorpay(options);

                      document.getElementById('rzp-button1').onclick = function(e){
                          rzp1.open();
                          e.preventDefault();
                      }
                                      </script>



                                      <script>
                      var btn = document.getElementById('butt1');
                          //var booking = "<?php //echo $_SESSION['booking_id'];?>";
                          var booking = "ZOP123";
                      btn.addEventListener('click', function() {
                        document.location.href = "paymentCancled.php?Id="+booking;
                      });
                                      </script>




                                      <script>
                      $(function () {
                              $('textarea[name="paddress"]').hide();

                              //show it when the checkbox is clicked
                              $('input[name="checkbox"]').on('click', function () {
                                  if ($(this).prop('checked')) {
                                      $('textarea[name="paddress"]').fadeIn();
                                  } else {
                                      $('textarea[name="paddress"]').hide();
                                  }
                              });
                          });
                      </script>
                  <!-- </div> -->
              
          
        </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
       -->
    </div>
  </div>
  
</div>

</body>
