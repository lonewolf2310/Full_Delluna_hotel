<?php
    session_start();
    include('admin/connections.php');
    $profile=$_SESSION['user'];
    if(isset($_POST['roombooking'])){
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $username = $_POST['username'];
        $price = $_POST['price'];
        $roomtype = $_POST['roomtype'];
        $qty =$_POST['qty'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];

        $_SESSION['checkin']=$checkin;
        $_SESSION['checkout']=$checkout;
        $_SESSION['username']=$username;
        $_SESSION['qty']=$qty;
        $_SESSION['price']=$price;
        $_SESSION['roomtype']=$roomtype;
        $_SESSION['adult']=$adult;
        $_SESSION['child']=$child;

        header("location:cart.php");      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
</head>
<link rel="stylesheet" href="css/roombookings.css">

<body>
    <section class = "banner">
        <div class="back">
            <a href="index.php">
                <img src="photo/neon back.png" alt="">
            </a>
        </div>
        <h2>BOOK YOUR ROOM NOW</h2>
            <div class = "card-container">

                <div class = "card-content">
                    <h3>Booking</h3>
                    <form method="post" action="roombooking.php">
                        <div class = "form-row">
                            <input type="text" name="checkin"/>
                            <input type="text" name="checkout"/>
                        </div>
                        <div class = "form-row">
                            <input type = "text" name="username" value="<?php echo $profile ?>">
                            <input type="hidden" name="price" value="<?php echo $price ?>">
                            <select name = "roomtype">
                                <option style='background:#242424' class="op" value = "room-select">Room Type</option>
                                <?php
                                    $query="select * from roomtype";
                                    $go_query=mysqli_query($connection,$query);
                                    while($out=mysqli_fetch_array($go_query))
                                    { 
                                        $roomtype_name=$out['roomtypename'];
                                        $roomtype_id=$out['roomtypeid'];
                                        echo "<option style='background:#242424' class='op' value='$roomtype_id'>$roomtype_name</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="adult" placeholder="Adult" min = "1">
                            <input type = "number" name="child" placeholder="Child" min = "0">
                            <input type = "number" name="qty" placeholder="Room Qty" min = "1">
                        </div>

                        <div class = "form-row">
                            <input type = "submit" name="roombooking" value = "ROOM BOOK">
                        </div>
                    </form>
                </div>
            </div>           
        </section>   

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- datepicker -->
<script>
$(function() {
  $('input[name="checkin"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    //minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
});
</script>
<script>
$(function() {
  $('input[name="checkout"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
});
</script>

</body>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</html>