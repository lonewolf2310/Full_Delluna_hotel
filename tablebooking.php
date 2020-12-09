<?php
    include('admin/connections.php');
    include('function.php');
    if (isset($_POST['table_booking'])) 
    {
        $date=$_POST['date'];
        $time=$_POST['time'];
        $username=$_POST['user_name'];
        $phone=$_POST['phone'];
        $person=$_POST['person'];
        $errors=array(
        'date'=>'',
        'time'=>'',
        'user_name'=>'',
        'phone'=>'',
        'person'=>'');
        if($time=='')
        { 
            $errors['time']='Time could not be empty'; 
        }
        if($person=='') {
            $error['person']='How to many person could not be empty';
        }
        foreach($errors as $key=>$value)
        {
            if(empty($value))
            { 
                unset($errors[$key]);
            }
        }
        if(empty($errors))
        { 
            global $connection;
            $query="insert into tablebooking(username,phone,tbookdate,tbooktime,tbookperson)";
            $query.="values('$username','$phone','$date','$time','$person')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            { 
                die("QUERY FAILED".mysqli_error($connection)); 
            }
            else
            {
                echo"<script>window.alert('You successfully Table Booking')</script>";
                echo "<script>window.location.href='index.php'</script>"; 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
</head>
<link rel="stylesheet" href="css/tablebooking.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js">
<body>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($connection,"select * from users where userid=$id");
    $row = mysqli_fetch_assoc($result);
?>
<section class = "banner">
    <div class="back">
        <a href="index.php">
            <img src="../img/neon back.png" alt="">
        </a>
    </div>    
        <h2>BOOK YOUR TABLE NOW</h2>
            <div class = "card-container">
                <div class = "card-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form method="post" action="tablebooking.php">
                        <div class = "form-row">
                            <input type="text" name="date" />
                            <input type="time"  name="time" />
                        </div>

                        <div class = "form-row">
                            <input type = "text" name="user_name" value="<?php echo $row['username']?>">
                            <input type = "text" name="phone" value="<?php echo $row['phone']?>">
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="person" placeholder="How Many Persons" min = "1">
                            <input type = "submit" name="table_booking" value = "BOOK TABLE">
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
$(function() {
  $('input[name="date"]').daterangepicker({
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

</html>