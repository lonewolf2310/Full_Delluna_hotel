<?php
    include('admin/connections.php');

    if (isset($_POST['submit_roombook'])) 
    {
        $uname=$_POST['user_name'];
        $checkindate=$_POST['check_in'];
        $checkoutdate=$_POST['check_out'];
        $totaldays=$_POST['total_days'];
        $ad=$_POST['ad'];
        $ch=$_POST['ch'];
        $room=$_POST['r_type'];
        $qty1=$_POST['dtyt'];
        $tal=$_POST['tal'];

        $errors=array(
        'check_in'=>'',
        'check_out'=>'',
        'qtyt'=>'',
        'user_name'=>'',
        'ch'=>'',
        'total'=>'',
        'ad'=>'');

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
            $query="insert into roombooking(buname,checkin,checkout,tdays,adult,child,rtype,roomqty,totalamount)";
            $query.="values('$uname','$checkindate','$checkoutdate','$totaldays','$ad','$ch','$room','$qty1','$tal')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            { 
                die("QUERY FAILED".mysqli_error($connection)); 
            }
            else
            {
                echo"<script>window.alert('You successfully Room Booking')</script>";
                echo "<script>window.location.href='roombooking.php'</script>"; 
            }
        }
    }


    session_start();
    $profile=$_SESSION['user'];
    $checkin=$_SESSION['checkin'];
    $checkout=$_SESSION['checkout'];
    $username=$_SESSION['username'];
    $roomtype=$_SESSION['roomtype'];
    $price=$_SESSION['price'];
    $qty=$_SESSION['qty'];
    $adult=$_SESSION['adult'];
    $child=$_SESSION['child'];

    $date1=date_create("$checkin");
    $date2=date_create("$checkout");

    $diff=date_diff($date1,$date2);
    $diff->format("%a days");
    $intdate=$diff->format("%a");
    $num=(int)$intdate;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
<body>
    <div class="back">
            <a href="roombooking.php">
                <img src="img/neon back.png" alt="">
            </a>
    </div>
    <div class="container Top">
    <div class="row">
    <div class="col-sm-12">
        <div class="row book" style="margin:25px;"> 
            <h2>
                Room Booking
            </h2>
        </div>
        <table>
            <tr>
                <th>Username</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Checkin Date</th>
                <th>Checkout Date</th>
                <th>Total Date</th>
                <th>Adult</th>
                <th>Child</th>
                <th>Room Qty</th>
            </tr>
            <tr>
                <td>
                    <?php echo $username ?>
                </td>
                <td>    
                    <?php 
                        $query="select * from roomtype where roomtypeid='$roomtype'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $roomtypename=$out['roomtypename'];
                            echo $roomtypename ;
                        }
                    ?>
                </td>
                <td>
                    $<?php 
                        $query="select * from room where roomtype='$roomtype'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $price=$out['price'];
                            echo $price;
                        }
                    ?>
                </td>
                <td>
                    <?php echo $checkin ?>
                </td>
                <td>
                    <?php echo $checkout ?>
                </td>
                <td>
                    <?php echo $diff->format("%a days") ;?>
                </td>
                <td>
                    <?php echo $adult ?>
                </td>
                <td>
                    <?php echo $child ?>
                </td>
                <td>
                    <?php echo $qty ?>
                </td>
            </tr>
            <tr>
                <td colspan="5" align="right" style="font-size:25px;">
                    <b>Total:</b>
                </td>
                <td style="padding-left:20px; font-size:25px;">
                    $<?php 
                        echo $total = $price * $num * $qty;
                    ?>
                </td>
            </tr>
        </table>
        <form action="cart.php" method="post">
            <div class = "form-row">
                <!-- <label for="">Username:</label> -->
                <input type="hidden" name="user_name" value="<?php echo $username ?>"/>
            
                <!-- <label for="" style="margin-left:10px;">Room Type:</label> -->
                <input type="hidden" name="r_type" style="padding-left:25px;" value="<?php 
                        $query="select * from roomtype where roomtypeid='$roomtype'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $roomtypename=$out['roomtypename'];
                            echo $roomtypename ;
                        }
                    ?>
                "/>
            </div>

            <div class = "form-row">
                <!-- <label for="">Checkin Date:</label> -->
                <input type="hidden" name="check_in" value="<?php echo $checkin ?>"/>

                <!-- <label for="" style="margin-left:-17px;">Checkout Date:</label> -->
                <input type="hidden" name="check_out" value="<?php echo $checkout ?>"/>
            </div>

            <div class = "form-row">
                <!-- <label for="">Total date:</label> -->
                <input type="hidden" style="padding-left:24px;" name="total_days" value="<?php echo $diff->format("%a days") ;?>"/>

                <!-- <label for="" style="margin-left:8px;">Price:</label> -->
                <input type="hidden" style="padding-left:67px;" name="one_price" value="$<?php 
                        $query="select * from room where roomtype='$roomtype'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $price=$out['price'];
                            echo $price;
                        }
                    ?>
                "/>
            </div>

            <div class = "form-row" style="margin-top:5px;">
                <!-- <label for="">Adult:</label> -->
                <input type="hidden" name="ad" value="<?php echo $adult ?>"/>

                <!-- <label for="" style="margin-left:-70px;">Child:</label> -->
                <input type="hidden" name="ch" value="<?php echo $child ?>"/>

                <!-- <label for="" style="margin-left:-80px;">Qty:</label> -->
                <input type="hidden" name="dtyt" value="<?php echo $qty; ?>"/>
            </div>

            <div class = "form-row" style="margin-top:10px;margin-left:300px;">
                <!-- <label for="" style="font-size:25px;">Total:</label> -->
                <input type="hidden" style="font-size:25px;" name="tal" value="$<?php 
                        echo $total = $price * $num * $qty;      
                    ?>"
                >
            </div>

        <div class="panel-footer">
            <input type = "submit" name="submit_roombook" value = "Submit Booking!">
        </div>
        </form> 
    </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>