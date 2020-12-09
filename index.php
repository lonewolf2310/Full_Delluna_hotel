<?php
    session_start();
    include('admin/connections.php');
    include('function.php');
?>
<?php
    if(isset($_POST['btnlogin']))
    {
        $name=$_POST['username'];
        $password=$_POST['password'];
        $errors=array( 'username'=>'', 'password'=>'' );
        if($name=='')
        {
            $errors['username']="This field could not be empty";
        }
        if($password=='')
        {
            $errors['password']="This field could not be empty";
        }
        // $password=md5($password);
        $query="select * from users";
        $go_query=mysqli_query($connection,$query);
        while($out=mysqli_fetch_array($go_query))
        {
            $db_user_name=$out['username'];
            $db_password=$out['password'];
            $db_user_role=$out['role'];
            
            if($db_password!=$password)
            {
				echo "<script>window.alert('Password is wrong')</script>";
			}
            elseif($db_user_name==$name && $db_password==$password && $db_user_role=='user')
            {
                $_SESSION['user']=$name;
                header('location:index.php'); 
            break;
            }
            else
            {   
                header('location:index.php'); 
            } 
        }
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delluna</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index111.css">

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<link rel="shortcut icon" href="photo/Icon.png">

<link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Carter+One&family=Monoton&display=swap" 
      rel="stylesheet">

<!-- materialize link     -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" 
rel="stylesheet">

<!-- owl carousel link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
	integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
	crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
	integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
	crossorigin="anonymous" />

<body>
<section>
<?php if(empty($_SESSION['user'])): ?>
<header>
      	<ul>
      	<div class="logo">
            <img src="photo/DELLUNA1.png">
      	</div>
      	<div class="nav_right">
            <div class="items">	
				<li class="nr_li1">
						<a class="modal-trigger" href="#modal1" id="nav">
							Login
						</a>
				</li>
				<!-- Modal Structure -->
				<div id="modal1" class="modal">
					<div class="modal-content">
					<h4>Login</h4>
					<form method="post" action="index.php">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix" type="text" name="username" class="validate" required/>
						<label for="icon_prefix">
							User Name
						</label>
					</div>
					<div class="input-field col s12 form">
						<i class="material-icons prefix">vpn_key</i>
						<input id="icon_prefix" type="password" name="password" class="validate" required/>
						<label for="icon_prefix">
							Password
						</label>
					</div>
					<div class=goreg>
						<a href="register.php">
							I don't have an Account&nbsp;&nbsp;^_^
						</a>
					</div>

					<button type="submit" class="modal-close" name="btnlogin">
						Login
					</button>

					</form>
					</div>
				</div>

            <li class="nr_li1">
			<a id="nav" href="#home">Home</a>
            </li>      
            <li class="nr_li1">
			<a id="nav" href="#room">Rooms</a>
            </li>
            <li class="nr_li1">
			<a id="nav" href="#other">Others</a>
			<li class="nr_li1">
			<a id="nav" href="#contact">Contact</a>
			</li>
			<li class="nr_li1">
			<a id="nav" href="#about">About</a>
            </li>
		</li>      
      	</div>
      	</div>
      	</ul>
</header>
<?php else: ?>
<header>
      <ul>
            <div class="logo">
                  <img src="photo/DELLUNA1.png">
            </div>
            <div class="nav_right">
                <div class="items">
                    <li class="nr_li">
						<a id="nav" href="#home">Home</a>
					</li>
                    <li class="nr_li">
						<a id="nav" href="#room">Rooms</a>
					</li>
					<li class="nr_li">
						<a id="nav" href="#other">Others</a>
					</li>
					<li class="nr_li">
					<a id="nav" href="#contact">Contact</a>
					</li>
					<li class="nr_li">
					<a id="nav" href="#about">About</a>
					</li>
					<li class="nr_li dd_main">
						<div class="profile">
							<?php 
								if (!empty($_SESSION["user"])) 
								{
									$profile=$_SESSION["user"];
									$query="select * from users where username='$profile'";
                    				$go_query=mysqli_query($connection,$query);
                    				while($out=mysqli_fetch_array($go_query))
                    				{
										$db_name=$out['username'];
										$db_userid=$out['userid'];
										$db_profile=$out['profile_image'];
										echo "<img src='userphoto/{$db_profile}' alt='profile_img' width=60px height=45px>";
									}
								}
								else 
								{
									$_SESSION["user"]="";
								}
                        	?>
						</div>

						<div class="dd_menu">
							<div class="dd_left">
								<ul>
									<li><i class="fas fa-cog"></i></li>
									<li><i class="fas fa-sign-out-alt"></i></li>
								</ul>
							</div>
							<div class="dd_right">
								<ul>
									<?php
										echo '<a href="setting.php?action=edit&id='.$db_userid.'"><li>Setting</li></a>'; 
									?>
									<a href="logout.php"><li>Logout</li></a>
								</ul>
							</div>
						</div>

					</li>
                </div>
            </div>
      </ul>
</header>
<?php endif; ?>

</section>
<!-- Home -->
<section id="home">
    <div class=hbutton>
		<p>
			<?php
				if (!empty($_SESSION["user"])) 
				{	
					$roombook1='<a href="roombooking.php?id='.$db_userid.'">Room Booking</a>';
					echo $roombook1;
				}
				else{
					$roombook2="<a href='#modal1' class='modal-trigger'>Room Booking</a>";
					echo $roombook2;
				}
			?>
		</p>
	</div>
	<div class=hbutton>
		<p>
			<?php
				if (!empty($_SESSION["user"])) 
				{
					$tablebookig1='<a href="tablebooking.php?id='.$db_userid.'">Table Booking</a>';
					echo $tablebookig1;
				}
				else{
					$tablebookig2="<a href='#modal1' class='modal-trigger'>Table Booking</a>";
					echo $tablebookig2;
				}
			?>	 
		</p>
	</div>
	<div class=hbutton>
		<p>
			<?php
				if (!empty($_SESSION["user"])) {
					$meet1='<a href="meetingbooking.php?id='.$db_userid.'">Meeting Room Booking</a>';
					echo $meet1;
				}
				else{
					$meet2="<a href='#modal1' class='modal-trigger'>Meeting Room Booking</a>";
					echo $meet2;
				}
			?>	 
		</p>
	</div>
	<div class=hbutton>
		<p>
			<?php
				if (!empty($_SESSION["user"])) {
					$feedback1='<a href="ballroombooking.php?id='.$db_userid.'">Ballroom Booking</a>';
					echo $feedback1;
				}
				else{
					$feedback2='<a href="#modal1" class="modal-trigger">Ballroom Booking</a>';
					echo $feedback2;
				}
			?> 
		</p>
	</div>
	<!-- Modal Structure -->
	<div id="modal2" class="modal">
		<h1>Login Please!!!</h1>
	</div>
</section>

<!-- Room -->
<section id="room">
	<div class="container" style="width: 96%;margin: auto;">

	<div class="row" style="margin-left:-28px;">

		<div class="col s4" style="margin-top:-220px;margin-left:450px;">
        <ul class="tabs tabs-fixed-width" style="background-color:transparent;">
            <li class="tab col s3"><a href="#test1" style="color:#fff;text-shadow: 0 0 1px rgba(233, 102, 102, 0.657),
																							0 0 2px rgba(233, 102, 102, 0.657),
																							0 0 4px rgba(233, 102, 102, 0.657),
																							0 0 8px rgba(233, 102, 102, 0.657),
																							0 0 16px rgba(233, 102, 102, 0.657);">
			Living Room</a></li>
            <li class="tab col s3"><a href="#test2" style="color:#fff;text-shadow: 0 0 1px rgba(233, 102, 102, 0.657),
																							0 0 2px rgba(233, 102, 102, 0.657),
																							0 0 4px rgba(233, 102, 102, 0.657),
																							0 0 8px rgba(233, 102, 102, 0.657),
																							0 0 16px rgba(233, 102, 102, 0.657);">
			Ballroom</a></li>
        </ul>
		</div>

		<div id="test1" class="col s12" style="margin-top:0px;">
		<div class="owl-carousel owl-theme" style="position:absolute; z-index:0;margin-top:-130px;width:96%;">
			<?php
				$query="select room.*,roomtype.* from room,roomtype where
				room.roomtype=roomtype.roomtypeid order by roomid desc";
                $go_query=mysqli_query($connection,$query);
                while($out=mysqli_fetch_array($go_query))
                {
					$room_id=$out['roomid'];
					$room_type=$out['roomtype'];
					$roomtype_name=$out['roomtypename'];
                    $price=$out['price'];
					$image=$out['image'];
					$decoration=$out['decoration'];
                    
                    $display ="<div class='item'>";
					$display.='<div class="card item" style="border:1px solid #fff; background:rgba(226, 76, 76, 0.137);">';
                    $display.='<div class="card-image">';
                    $display.="<img src='roomphoto/{$image}' height='140px'>";
                    $display.="<span class='card-title' style='font-size:20px; text-shadow: 0 0 1px rgba(233, 102, 102, 0.657),
																							0 0 2px rgba(233, 102, 102, 0.657),
																							0 0 4px rgba(233, 102, 102, 0.657),
																							0 0 8px rgba(233, 102, 102, 0.657),
																							0 0 16px rgba(233, 102, 102, 0.657);'>
					{$roomtype_name}</span>";
                    $display.="</div>";
                    $display.="<div class='card-content' style='margin-top:-30px; margin-bottom:-20px;'>";
                    $display.="<p style='font-size:15px;color:#fff; line-height:40px;text-shadow: 0 0 1px rgb(236, 13, 13),
																								0 0 2px rgb(236, 13, 13),
																								0 0 4px rgb(236, 13, 13),
																								0 0 8px rgb(236, 13, 13),
																								0 0 16px rgb(236, 13, 13);'>
					Price : {$price}</p>";
					$display.="<p style='line-height:30px;'>
						<span style='color:#fff; text-shadow: 0 0 1px rgb(51, 248, 2),
															0 0 2px rgb(51, 248, 2),
															0 0 4px rgb(51, 248, 2),
															0 0 8px rgb(51, 248, 2);'>
						<i class='fas fa-circle'></i> Wifi Free
						</span><br>

						<span style='color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Hair Dryer</span>

						<span style='margin-left:43px; color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Work desk</span><br>

						<span style='color:#fff;color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Rain shower</span>

						<span style='margin-left:30px;color:#fff;color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Safe deposit box</span><br>
					</p>";
                    $display.="</div>";
                    $display.="<div class='card-action'>";
                    $display.='<a href="viewdetail.php?id='.$room_id.'" class="viewdetail">View Details</a>';
                    $display.="</div></div></div>";
                    echo $display;
                }       
            ?>
		</div>
		</div>

		<div id="test2" class="col s12" style="margin-top:0px;">
		<div class="owl-carousel owl-theme" style="position:absolute; z-index:0;margin-top:-130px;width:96%;">
			<?php
				$query="select ballroom.*,ballroomtype.* from ballroom,ballroomtype 
				where ballroom.ballroomtype=ballroomtype.ballroomtypeid 
				order by ballroomid desc";
                $go_query=mysqli_query($connection,$query);
                while($out=mysqli_fetch_array($go_query))
                {
					$ballroom_id=$out['ballroomid'];
					$ballroom_name=$out['ballroomname'];
					$ballroomtype=$out['ballroomtype'];
					$price=$out['price'];
					$limit_person=$out['limit_person'];
                    $bimage=$out['bimage'];
					$decoration=$out['decoration'];

					$display ="<div class='item'>";
                    $display.='<div class="card item" style="border:1px solid #fff; background:rgba(226, 76, 76, 0.137);">';
                    $display.='<div class="card-image">';
                    $display.="<img src='roomphoto/{$bimage}' height='140px'>";
                    $display.="<span class='card-title' style='font-size:20px; text-shadow: 0 0 1px rgba(233, 102, 102, 0.657),
																							0 0 2px rgba(233, 102, 102, 0.657),
																							0 0 4px rgba(233, 102, 102, 0.657),
																							0 0 8px rgba(233, 102, 102, 0.657),
																							0 0 16px rgba(233, 102, 102, 0.657);'>
					{$ballroom_name}</span>";
                    $display.="</div>";
                    $display.="<div class='card-content' style='margin-top:-30px; margin-bottom:-20px;'>";
                    $display.="<p style='font-size:15px;color:#fff; line-height:40px;text-shadow: 0 0 1px rgb(236, 13, 13),
																								0 0 2px rgb(236, 13, 13),
																								0 0 4px rgb(236, 13, 13),
																								0 0 8px rgb(236, 13, 13),
																								0 0 16px rgb(236, 13, 13);'>
					Price : {$price}</p>";
					$display.="<p style='line-height:30px;'>
						<span style='color:#fff;color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Limit Person : {$limit_person}</span><br>

						<span style='color:#fff;color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Water Free</span><br>

						<span style='color:#fff;color:#fff;text-shadow: 0 0 1px rgba(223, 93, 93, 0.63),
															0 0 2px rgba(223, 93, 93, 0.63),
															0 0 4px rgba(223, 93, 93, 0.63),
															0 0 8px rgba(223, 93, 93, 0.63),
															0 0 16px rgba(223, 93, 93, 0.63);'>
						<i class='fas fa-circle'></i> Microphone</span><br>
					</p>";
                    $display.="</div>";
                    $display.="<div class='card-action'>";
                    $display.='<a href="ballroomdetail.php?id='.$ballroom_id.'" class="viewdetail">View Details</a>';
                    $display.="</div></div></div>";
                    echo $display;
				}
			?>
		</div>
		</div>

	</div>
	</div>
</section>

<!-- Other page -->
<section id="other">
	<!-- tabs -->
	<ul class="tabs">
		<li class="tab"><a href="#square">Square</a></li>
		<li class="tab"><a href="#bar">In Room Bar</a></li>
		<li class="tab"><a href="#sportbar">Sport Bar</a></li>
		<li class="tab"><a href="#ballroom">Ballroom</a></li>
		<li class="tab"><a href="#meeting">Meeting Room</a></li>
	</ul>
	<!-- Square -->
	<div id="square" class="row">
		<p class="row" >
			
			<h5>Opening Hours:</h5>
			<hr>
			<div class="col s5">
				<i class="fas fa-circle"></i> 
				Breakfast ( 6:00am to 10:30am )<br>
				<i class="fas fa-circle"></i> 
				Lunch ( 12:00noon to 2:30pm Except Sunday )<br>
				<i class="fas fa-circle"></i>
				Dinner ( 6:00pm to 10:30pm )<br>
				<i class="fas fa-circle"></i>
				Every Friday –  Hooked on Seafood ( 6:00pm to 10:30pm )<br>
				<i class="fas fa-circle"></i>
				Every Sunday – Sunday Brunch ( 12:00 noon to 3:00pm )
			</div>
			<div class="col s3">
				<b>Details:</b>
				Head to The Square all day dining with international and Asian flavors, 
				live cooking stations, sumptuous buffets, full a la carte menu, 
				weekly theme nights highlighting flavors of the world or seafood, 
				and our renowned Sunday brunch.<br>
				<b>Reserve now: +95 94 44 08 8881</b>
			</div>
			<div class="col s4">
				A fun, interactive experience for family and friends in a lively and casual 
				atmosphere, The Square presents a huge selection of fresh local, international 
				and Asian fare coupled with friendly environment, convenient location and 
				excellent value for money. Light or vegetarian alternatives plus 
				special kids’ menus for discerning young palates ensure 
				an entertaining and satisfying dining experience for all ages and tastes.
			</div>
		</p>
	</div>

	<!-- In Room Bar -->
	<div id="bar" class="row">
		<p class="row" >
			
			<h5>Opening Hours:</h5>
			<hr>
			<div class="col s5">
				<i class="fas fa-circle"></i> 
				Daily Lunch from 12:00pm to 2:30pm<br>
				<i class="fas fa-circle"></i>
				Daily Dinner from 6:00pm to 10:30pm<br>
				<i class="fas fa-circle"></i> 
				<b>Reserve now: +95 94 44 08 8884</b>
			</div>
			<div class="col s3">
				<b>Details:</b>
				Our à la carte restaurant features contemporary French cuisine, 
				an impressive walk-in wine cellar with over 150 categories,
				and the most amazing rooftop dining view in Yangon.
				style appetizers, soups, salads, sharing platters and 
				steaks.relax in this Bar in town 
				all complemented by our 
			</div>
			<div class="col s4">
				extensive wine collection. 
				With a strong focus on healthy 
				and hosts monthly wine events and weekly.
				Relax in this Bar in town, 
				a quick our unique Experience. 
				Snacks and light meals and boasting a simply stunning view. 
				Take advantage of evening Happy Hours including ‘buy one get one’ 
				on selected beverages while unwinding on one of two 
				adjoining terraces.appetizers,platters 
				and succulent tomahawk steaks ,by our extensive wine collection.   
			</div>
		</p>
	</div>

	<!-- Sport Bar -->
	<div id="sportbar" class="row">
		<p class="row" >
			
			<h5>Opening Hours:</h5>
			<hr>
			<div class="col s6">
				<i class="fas fa-circle"></i> 
				Every day from 5:00pm to 1:00am (Sunday from 3:00pm to 1:00am )<br>
				<i class="fas fa-circle"></i>
				Happy Hour Every Day from 5:00pm to 8:00pm – Buy one get one <br>
				<i class="fas fa-circle"></i> 
				Social Mic, every Thursday 8:00pm to 1:00am – Half price all night long<br>
				<i class="fas fa-circle"></i>
				<b>Reserve now: +95 94 44 08 8885</b>
			</div>
			<div class="col s3">
				<b>Details:</b>
				Try your skill at billiards, foosball or darts in 
				Time Out Sports Bar, or catch an exciting live soccer game on the giant 
				screen while enjoying one of our sensational burgers. 
				Tap your feet to the music of talented live bands on Thursdays and 
				Fridays and refresh yourself with the largest range of tap beers, 
			</div>
			<div class="col s3">
				wines and spirits in town. 
				Delluna Yangon is also proud to present our 
				exclusive ‘Stadium Room’, available for private group bookings for live 
				sports screenings. Located on the 4th floor,
				Time Out Sports Bar is definitely your ‘go to’ place for entertainment.
			</div>
		</p>
	</div>

	<!--  Ballroom -->
	<div id="ballroom" class="row">
		<p class="row" >
			
			<div class="col s12">
				<i class="fas fa-circle"></i>
				<b>Details:</b><br>
				<i class="fas fa-circle"></i> 
				The Yangon Ballroom is located at Level 1 with a total of 
				1140sqm with no partition and pillar less. <br>
				<i class="fas fa-circle"></i> 
				More than 400 wedding 
				couples trusted and hosted their weddings at Delluna Hotel 
				since 2015.<br>
				<i class="fas fa-circle"></i> 
				The main ballroom with its 12 meter high ceiling 
				and column free space is impressive and is considered as the 
				largest ballroom in Yangon to host events.<br> 
				<i class="fas fa-circle"></i> 
				Direct access to the meetings and event facilities and excellent 
				parking facilities make it convenient for the guests to host events at the hotel.<br>
				<i class="fas fa-circle"></i>  
				The pre-function area can also be used to accommodate larger functions.
			</div>

		</p>
	</div>

	<!-- Meeting Room -->
	<div id="meeting" class="row">
		<p class="row" >
			
			<div class="col s12">
				<i class="fas fa-circle"></i>
				<b>Details:</b><br>
				<i class="fas fa-circle"></i> 
				Delluna Hotel offers an excellent meetings and 
				events venue Meeting Room.<br>
				<i class="fas fa-circle"></i> 
				The meeting room is located on exclusive meeting floor for more 
				privacy and space.<br>
				<i class="fas fa-circle"></i> 
				Customers have the option of selecting a natural light function room or 
				a private meeting room for a more exclusive meeting requirement.<br> 
				<i class="fas fa-circle"></i> 
				Meeting and events space welcome participants from 
				a small meeting of less than 10 people to up to 1,000 guests.<br>
				<i class="fas fa-circle"></i>  
				The venues are fitted with audio and hi-tech visual equipments, TV screen, 
				flip charts and free Wi-Fi.
			</div>

		</p>
	</div>

	<!-- owl carousel -->
	<div class="container">
		<div class="owl-carousel owl-theme">
	
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/square.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Square</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/food.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Food</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/breakfast.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Breakfast</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/room bar.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">In Room Bar</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/sport bar.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Sport Bar</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/spa.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Spa</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/ballroom small.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Small Ballroom</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/ballroom big.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Big Ballroom</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/meeting large.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Meeting Large Room</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/meeting middle.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Meeting Middle Room</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/meeting small.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Small Meeting Room</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card item">
					<div class="card-image">
						<img src="photo/gym.jpg" class="img_img">
						<div class="img_overlay">
							<p class="txt">Gym</p>
						</div>
					</div>
				</div>
			</div>
	
		</div>
	</div>
</section>
<!-- end of other page -->

<!-- Contact page -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col s5 cont">
			<!-- Modal Trigger -->
				<div class="location"><i class="far fa-address-card"></i>Contact Us</div>
				<div class="contact_detail">
					<i class="fas fa-map-marker-alt"></i>
					459 Pyay Road, Kamayut Township, Yangon<br>
					<i class="fas fa-phone-alt"></i>
					Reservation Hotline number : <br>
					<span style="margin-left:50px;">+95 (9) 251186014<br></span> 
					<span style="margin-left:50px;">Tel: +95 (1) 2305858<br></span> 
					<span style="margin-left:50px;">Fax: +95 (1) 2305868<br></span> 
					<i class="far fa-envelope"></i>
					Email: H9045-RE@accor.com<br>
					<i class="far fa-envelope"></i>
					Gmail: gloryhotel@gmail.com
				</div>
			<a class="btn modal-trigger feedbackbtn" href="#modal4">View Feedback</a>

			<div class=com>
				<p>
					<?php
						if (!empty($_SESSION["user"])) {
							$feedback1='<a href="feedbacks.php?id='.$db_userid.'" ><i class="far fa-comment-dots"></i>Users Comment</a>';
							echo $feedback1;
						}
						else{
							$feedback2='<a href="#" class="tooltipped" data-position="bottom" data-tooltip="Login Please!!"><i class="far fa-comment-dots"></i>
							Users Comment</a>';
							echo $feedback2;
						}
					?> 
				</p>
			</div>

			</div>

			<!-- Modal Structure -->
			<div id="modal4" class="modal bottom-sheet">
				<div class="modal-content">
				<h3><i class="far fa-comments"></i>Hotel Feedback</h3>
					<?php
						$query='select * from feedback';
						$go_query=mysqli_query($connection,$query);
						while($out=mysqli_fetch_array($go_query))
						{
							$u_name=$out['username'];
							$feed=$out['text'];
							
							echo "<div class='card-panel'>";  
							echo "<div class='container feed'>";
							echo "<div class='row'>";
							echo "<div class='col s3 name'>{$u_name}</div>";
							echo "<div class='col s9 feed'>{$feed}</div>";
							echo "</div></div></div>";
						}
					?>
				</div>
				<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
				</div>
			</div>
			<div class="col s5">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.2463027069853!2d109.1959113143475!3d12.231595233993328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067892ca4e261%3A0x7cc1d30050eb017!2sGlory%20Hotel%20-%20Nha%20Trang!5e0!3m2!1sen!2smm!4v1606772415884!5m2!1sen!2smm" 
			width="600" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
			</iframe>
			</div>
		</div>
	</div>
</section>

<!-- About -->
<section id="about">
	<div class="star">
		<!-- <h1>☆☆☆☆☆</h1> -->
		<h1>About Delluna</h1>
	</div>
	<div class="container aboutcon">
		<div class="row">
			<div class="col s4" id="img">
				<img src="photo/gym.jpg" name="slide">
			</div>
			<div class="col s8 text1">
				<i class='fas fa-circle'></i>
				Your welcoming sanctuary in the heart of Yangon.<br>
				<i class='fas fa-circle'></i>
				Take time and make time…Feel relaxed, rejuvenated and entirely at 
				home when you stay
				<span style="margin-left:10px;">with us at the Delluna Hotel!<br></span> 
				<i class='fas fa-circle'></i>
				Just 20 minutes from the Yangon International Airport (RGN) on Pyay Road, 
				Accor’s five-star 
				<span style="margin-left:10px;">Delluna Hotel Yangon is ideally located within a 10-kilometre 
				radius of most embassies and<span> 
				<span style="margin-left:10px;">international organizations, only four kilometres 
				from the sacred Shwedagon Pagoda, close<span> 
				<span style="margin-left:10px;">to the historical city centre, and a 
				mere stroll from Time City, Junction Square shopping<span>
				<span style="margin-left:10px;">centre.<br><span>
				<i class='fas fa-circle'></i>
				At Delluna Hotel we understand the importance of balancing your 
				time to maximise your 
				<span style="margin-left:10px;">stay.<br></span>
				<i class='fas fa-circle'></i>
				Whether you’re travelling for business or leisure, our wide selection 
				of recreational facilities, 
				<span style="margin-left:10px;">mouth-watering 
				Asian and international cuisine, stylish and comfortable rooms and 
				state</span>
				<span style="margin-left:10px;">-of-the-art business and conference services will ensure this peaceful 
				oasis is your ideal </span> 
				<span style="margin-left:10px;">choice for a relaxing, rewarding and energizing 
				experience in the heart of Myanmar’s</span> 
				<span style="margin-left:10px;">largest city.</span>
			</div>	
		</div>
	</div>
	
	<div class="footer">
		<p>© 2020 Delluna Hotel |  Contact Us  |  Careers  |  Legal Notice  | ZERO ONE</p>
	</div>
</section>



</body>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- materialize script link     -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</script>

<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous"></script>

<script type="text/javascript">
	var image1=new Image();
	image1.src="photo/gym.jpg";
	var image2=new Image();
	image2.src="photo/food.jpg";
	var image3=new Image();
	image3.src="photo/pool.jpg";
</script>

<script type="text/javascript">
var time=1;
function sft() 
{
	document.images.slide.src=eval("image"+time+".src");
	if (time<3) {
		time++;
	}
	else
		time=2;
		setTimeout("sft()",2000);
}
sft();
</script>

<script>
$(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>
<!-- tabs for hotel page-->
<script>
	$(document).ready(function(){
		$(".tabs").tabs();
	});
</script>

<!-- owl carousel -->
<script>
	var owl = $(".owl-carousel");
	owl.owlCarousel({
		items:4,
		loop:true,
		margin:15,
		autoplay:true,
		autoplaySpeed: 2000,
		autoplayHoverPause:true
	});
</script>

<!-- navbar script -->
<script>
	window.addEventListener("scroll", function () {
		var header = document.querySelector("header");
		header.classList.toggle("sticky", window.scrollY > 0);
	})
</script>

<!-- profile setting box script -->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function () {
		this.classList.toggle("active");
	});
</script>

<!-- Login and please login modal script -->
<script>
	$(document).ready(function(){
    $(".modal").modal();
  	});
</script>

</html>