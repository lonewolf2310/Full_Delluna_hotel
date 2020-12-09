<?php
    include('admin/connections.php');
    include('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Setting</title>
    <link rel="icon" href="photo/Icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>
<?php
    if (isset ($_POST['updateuser'])) 
        {
            update_user();
        }
?>    
<?php
if(isset($_GET['action']) && $_GET['action']=='edit')
{  
    $id = $_GET['id'];
    $query="select * from users where userid='$id'";  
    $go_query=mysqli_query($connection,$query);  
    while($out=mysqli_fetch_array($go_query))
    {   
        $username=$out['username'];
        $photo=$out['profile_image'];   
        $password=$out['password'];
        $phone=$out['phone'];
        $email=$out['email'];
        $address=$out['address'];
?>
    <div class="container">
        <div class="back">
            <a href="index.php">
                <img src="photo/neon back.png" alt="">
            </a>
        </div>
        <div class="row">
            <div class="col-md-4 form-div2">
            <!-- <a href="profiles.php">View all profiles</a> -->
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center mb-3 mt-3">Update profile</h2>
                <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $msg_class ?>" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group text-center" style="position: relative;" >
                    <span class="img-div">
                        <div class="text-center img-placeholder"  onClick="triggerClick()">
                            <h4>Upload image</h4>
                        </div>
                            <?php
                                echo "<img src='userphoto/{$photo}' name='ppphoto' onClick='triggerClick()' id='profileDisplay'>";
                            ?>
                        <div>
                        
                        </div> 
                    </span>
                    
                    <input type="file" name="ppphoto" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                </div>
            </div>

                <div class="col-md-4 form-div1">   
                    <div class="col">
                        <!-- User name -->
                        <input type="text" name="username" class="form-control mb-4" value="<?php echo $username?>">
                    </div>

                    <div class="col">
                        <!-- E-mail -->
                        <input type="email" name="email" class="form-control mb-4" value="<?php echo $email?>">
                    </div>

                    <div class="col">
                        <!-- Password -->
                        <input type="text" name="password" class="form-control mb-4" value="<?php echo $password?>">
                    </div>

                    <div class="col">
                        <!-- phone number -->
                        <input type="text" name="phonenumber" class="form-control mb-4" value="<?php echo $phone?>">
                    </div>

                    <div class="col">
                        <!-- Address -->
                        <div class="form-group">
                            <textarea type="text" class="form-control rounded-0" name="address" rows="3"><?php echo $address?></textarea>
                        </div>
                    </div>
                <div class="col">
                    <div class="form-group">
                        <button type="submit" name="updateuser" class="btn-block">Update User</button>
                    </div>
                </div>
            </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<script src="js/register.js"></script>