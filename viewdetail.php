<?php
    include('admin/connections.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Detail</title>
</head>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/viewdetails.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
    <div class="hd">
    
    <h3>View Detail</h3>
    
    <?php
        $id = $_GET['id']; //get roomid from user click on view detail
        $result = mysqli_query($connection,"select * from room where roomid=$id"); // search roomid in a database
        $row = mysqli_fetch_assoc($result);
    ?> 
        <div class="product">
            <div class="product-small-img">
                <img src="roomphoto/<?php echo $row['image1']?>" onclick="myFunction(this)"><br>    
                <img src="roomphoto/<?php echo $row['image2']?>" onclick="myFunction(this)"><br> 
                <img src="roomphoto/<?php echo $row['image3']?>" onclick="myFunction(this)"><br>
            </div>   
            <div class="img-container">
                <img id="imgBox" src="roomphoto/<?php echo $row['image1']?>">
            </div>
        </div>
        
        <div class="info">
            <div class="shoeName">
                <div>
                    <h1 class="big">    <!---  shoename -->
                        <?php echo $row['decoration']?>
                    </h1>
                </div>
                <h2 class="small">      <!---  type -->
                    <?php echo $row['price']?>
                </h2>
            </div>
            <div class="buy-price">
                <a href="#">
                    <?php
                        $back ='<a href="index.php" 
                        class="buy">Back</a>';
                        echo $back;
                    ?>
                        
                </a>
            </div>
        </div>
    </div>
        <script>
        function myFunction(smallImg)
        {
            var fullImg = document.getElementById("imgBox");
            fullImg.src = smallImg.src;
        }
        </script>

</body>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>