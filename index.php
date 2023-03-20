<?php

include './include/config.php';

$plant = mysqli_query($con,"SELECT * FROM plant");

if(isset($_POST['submit'])){
	$donname = $_POST['donname'];
	$phonenum = $_POST['phonenum'];
	$email = $_POST['email'];
	$plant_id = $_GET['plant-id'];

	if(isset($plant_id)){
	$insert_donator = mysqli_query($con,"INSERT INTO donator(Name,Phone_Num,Email,plant_id) VALUES ('$donname','$phonenum','$email','$plant_id')");

	if($insert_donator == false){
		echo mysqli_error($con);
	}
	$nameCard = $_POST['cardname'];
	$numCard = $_POST['cardnum']; 
	$cvc = $_POST['cvc'];
	$expDate = $_POST['expdate'];

	$insert_card = mysqli_query($con,"INSERT INTO card(Name_card,Card_num,CVC,Exp_date) VALUES ('$nameCard','$numCard','$cvc','$expDate')");

	if($insert_card && $insert_donator){
		header("Location:index.php?status=1");
	}else{
		echo mysqli_error($con);
	}
}else{
	header("Location:index.php?status=2");
}
}


?>



<!DOCTYPE html>
<html>

<head>
    <link href="runcloud.css" rel="stylesheet" />

    <title>plantnation</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bungee&family=Gulzar&family=Inter:wght@300&family=Lato:wght@300;400&family=Lexend+Deca&family=Montserrat:wght@300;400&family=Nunito:wght@500&family=Poppins:wght@300;400&family=Rubik:wght@500&family=Silkscreen&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert2.min.js"></script> -->
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

</head>

<body>


    <!--side menu bar -->


    <div id="navigationbar" class="navigationbar"></div>

    <header style="	background-image: url('leaf.jpg');
">
        <a href="#home"><img src="home-32.png" alt=""></a>
        <a href="#" id="name" style="padding-bottom:210px;">plant<b style="color:white;">nation.</b></a>

        <nav id="navbar" style="padding-bottom:210px;">
            <a href="#donate" style="background:#84796f; border-radius:25px; width:190px; height:50px;">Donate</a> <br>
            <a href="#about" style="background:#84796f; border-radius:25px; width:190px; height:50px;">About us</a>

        </nav>
    </header>



    <!--Home page-->




    <?php 
	if(isset($error)){
	if($error == 2){?>
    <div class="show-message" style="color: red;background-color:whitesmoke;">Please choose your plant to donate</div>
    <?php }}?>
    <?php 
	if(isset($_GET['status'])){
	if($_GET['status'] == 1){?>
    <script>
    function statusAlert() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your plant soon to be planted! Thank you for joining our movement ❤',
            showConfirmButton: true,
        }).then((result) => {
            window.location = 'index.php'
        })
    }
    </script>
    <script>
    statusAlert();
    </script>
    <!-- <div class="show-message" style="color: green;background-color:whitesmoke;">Your plant soon to be planted! Thank you for joining our movement ❤</div> -->
    <?php }else{
		?>
    <script>
    function statusAlert() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Please select your plant',
            showConfirmButton: true,
        }).then((result) => {
            window.location = 'index.php'
        })
    }
    </script>
    <script>
    statusAlert();
    </script>

    <?php
	}





}?>

    <section class="home" id="home">

        <section id="statistics" style="align-items:top-left; padding-top:100px; padding-left:100px;">
            <div id="counteruser"
                style="font-size:2.5rem;background:white; text-align:center; width:200px; height:200px; padding-top:30px; border-radius:25px;">
                <?php 
					$total_plant = mysqli_query($con,'SELECT COUNT(*) as numPlant FROM donator');
					$num_plant = mysqli_fetch_assoc($total_plant);	
				?>
                <div id="icon" style="font-size:3rem;"><i class="fa fa-users"></i></div>
                <div class="num" style="font-size:6rem; font-family: 'Rubik', sans-serif; color:green;">
                    <?=$num_plant['numPlant'];?></div>
                <p style="font-family: 'Lexend Deca', sans-serif;">Total donator</p>

            </div>

            <br><br><br><br><br><br>

            <div id="counterplant"
                style="font-size:2.5rem;background:white; text-align:center;margin-left:20px; width:200px; height:200px; padding-top:30px; border-radius:25px;">

                <div id="icon" style="font-size:3rem;"><i class="fa fa-leaf"></i></div>
                <div class="num" style="font-size:6rem;font-family: 'Rubik', sans-serif; color:green;">
                    <?=$num_plant['numPlant']+132*3;?></div>
                <p style="font-family: 'Lexend Deca', sans-serif;">Total plants planted</p>

            </div>

        </section>



        <!--homepage content -->

        <div id="page1" style="text-align:left;">

            <h3 style="color: white; padding-right:100px; ">save the world </h3>
            <h3 style="color: white; padding-right:200px;">with <span style="color: white;background:#36CE55;  "> us
                </span></h3>
            <br><br>
            <i style="color:white; font-size:20px; font-family: 'Lexend Deca', sans-serif;">You’ll do more than put a
                seed in the ground;<br> you’ll make sure these forests survive for future generations.</i>
            <br><br><br><br><br><br>


            <div id="buttondon" style="padding-right:100px;">
                <a href="#donate" id="btn">❤ Donate</a>
            </div>

            <br>
        </div>
    </section>
    <!--Donate page-->

    <!--pick plants section-->

    <section class="donate" id="donate" style="background:white;">

        <div id="headingdon">
            <br><br><br><br>
            <h1> Make change for a <span> better future </span></h1><br>
        </div>

        <div id="paymenttitle">
		<?php if(isset($_GET['plant-id'])){
							?>
                    	<div style="padding-left: 100px;font-size:40px">	Plant : No <?=$_GET['plant-id']?> is selected</div>
                    	<div style="padding-left: 100px;font-size:30px">	Please make payment below</div>
                    
                    <?php

						
					}else{ ?>
                        <div id="paymenttitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pick Your Plant Here</div>
		
                   <?php }
					?>
		</div>

        <div class="container">
            <div class="products-container" style="margin-left: 50px;">

                <?php while($plants = mysqli_fetch_assoc($plant)) : ?>

                <div class="product" data-name="p-1">
                    <img src="<?= $plants['plant_img']?>" alt="">
                    <h3><?= $plants['Plant_Name']?></h3>
                    <div style="padding-bottom: 20px; font-family: 'Lexend Deca', sans-serif;"class="price"> <?=$plants['Plant_Price']?></div>
                    <a href="index.php?plant-id=<?= $plants['Plant_id']?>#donate" class="btndonate"> Donate
                        <!-- <a href="index.php?plant-id=<?//= $plants['Plant_id']?>" class="btndonate" id="btn-donate"> Donate -->
                    </a>
                </div>

                <?php endwhile;?>

            </div>

        </div>






        <!--pick forest/region section-->


        <div id="paymenttitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latest Planting Location</div>
        <div class="container2">


            <div class="location-container" style="margin-left: 30px;">

                <div class="location" data-name="p-a">
                    <img src="hutanpahangg.jpg" alt="">
                    <h3> HUTAN SIMPAN PAYA PASIR</h3><br>
                    <a style="pointer-events:none;background: #1a5332; font-family: 'Nunito', sans-serif;" href="" class="btnlocation">Pahang</a><br>
                </div>

                <div class="location" data-name="p-b">
                    <img src="hutantitiwangsa.jfif" alt="">
                    <h3> HUTAN HUJAN TROPIKA</h3><br>
                    <a style="pointer-events:none; background: #1a5332; font-family: 'Nunito', sans-serif;" href="" class="btnlocation">Titiwangsa</a><br>
                </div>

                <div class="location" data-name="p-c">
                    <img src="frimm.jfif" alt="">
                    <h3> FRIM</h3><br>
                    <a style="pointer-events:none; background: #1a5332; font-family: 'Nunito', sans-serif;" href="" class="btnlocation">Kepong</a><br>
                </div>

                <div class="location" data-name="p-a">
                    <img src="hutankukusan.jfif" alt="">
                    <h3> HUTAN SIMPAN BUKIT </h3><br>
                    <a style="pointer-events:none; background: #1a5332; font-family: 'Nunito', sans-serif;" href="" class="btnlocation">Sabah</a><br>
                </div>

            </div>

        </div>

        <br><br>
        <div class="payment-form" style="padding-left: 80px;">
            <form style="font-family:Arial;" action="" method="post">



                <section id="payment-info">
                    <div id="payment-section">
                        <!--payment section-->

                        <?php if(isset($_GET['plant-id'])) : ?>
                        <div id="paymenttitle">Secure Your Donation!</div>

                        <br><br><br>

                        <div class="donator" style="padding-left: 50px;">
                        <h1>Donator Name </h1></b>


                        <form action="index.php" method="post">
                            <input class="donatorname" type="text" name="donname" placeholder="ex : Sarah Binti Ahmad"
                                style=" text-align:left; padding-left:40px;color: black; font-family: Poppins; font-weight: bold; font-size: 16px; background-color: #d9d9d9; size:10;width:500px;  height: 50px;border-radius:25px;"
                                max-length='30' required><br> <br>

                            <br>
                            <h1 style="margin-left: 15px;">Phone number </h1></b>

                            <input class="phonenumber" type="text" name="phonenum" placeholder="ex : 0103456789"
                                style="text-align:left; padding-left:40px;color: black; font-family: Poppins; font-weight: bold; font-size: 16px; background-color: #d9d9d9;width:500px; size:10; height: 50px;border-radius:25px;"
                                max-length='30' required><br> <br>

                            <br>
                            <h1 style="margin-left: 15px;">Email </h1></b>

                            <input class="email" type="text" name="email" placeholder="ex : sarahahmad@gmail.com"
                                style="text-align:left; padding-left:40px;color: black; font-family: Poppins;font-weight: bold; font-size: 16px; background-color: #d9d9d9; size:10;width:500px;  height: 50px;border-radius:25px;"
                                maxlength='30' required><br> <br>


                                </div>
                            <br><br><br><br><br><br>
                            <b>
                                <h1 style="color:green; font-size:30px;">Credit/Debit Card
                            </b></h1> <br><br>

                            <div id="card" style="padding-left:50px;">

                                <h1>Name on Card</h1> <br>
                                <input class="cname" type="text" name="cardname"
                                    style="text-align:left; padding-left:40px;color: black; font-family: Poppins;  font-weight: bold; font-size: 16px; background-color: #d9d9d9; width:500px;height:45px;border-radius:25px;"
                                    size="10" maxlength="30"><br> <br><br>


                                <h1>Card Number </h1></b>
                                <input class="cnum" type="text" name="cardnum"
                                    style="text-align:left; padding-left:40px;color: black; font-family: Poppins;  font-weight: bold; font-size: 16px; background-color: #d9d9d9; width:500px;height:45px;border-radius:25px;"
                                    size="10" maxlength="30"><br> <br><br>


                                <h1><b>CVC </b></h1>&nbsp; &nbsp; <input class="cnum" type="text" name="cvc"
                                    style="text-align:left; padding-left:40px;color: black; font-family: Poppins; font-weight: bold; font-size: 16px; background-color: #d9d9d9; width:200px; height:45px;border-radius:25px;"
                                    size="10" maxlength="30"> <span></span><br><br><br>



                                <br>
                                <h1><b>Exp Date </b><br></h1>&nbsp; &nbsp; <input class="cnum" type="text"
                                    name="expdate"
                                    style="text-align:left; padding-left:40px;color: black; font-family: Poppins; font-weight: bold; font-size: 16px; background-color: #d9d9d9;  width:200px; height:45px;border-radius:25px;"
                                    size="10" maxlength="30"><br><br>
                        </form>

                        <br><br><br>
                        <button id="btn1" style="float:left;" type="submit" name="submit"> &nbsp; Pay &nbsp;
                        </button><br><br><br><br><br><br><br><br>
                    <?php endif;?>
                    </div>
                </section>

        </div>
    </section>


    <!--about us section-->


    <section class="about" id="about" style="background-color:#ebf5e7;margin-left:60px">

        <h1 id="headingabt" style="font-size:50px; color:black;"><br><span
                style="font-size:50px; color:black; padding-left:80px;">ABOUT</span>&nbsp;US</h1><br><br>

        <br>
        <h2 style="padding-bottom:10px; font-size:80px;text-align:center;">plant<b
                style="color:green;text-align:center;">nation.</b></h2>

        <p
            style="text-align:center; font-size:20px; font-family:'Nunito',sans-serif; padding-bottom:80px; background: white; border-radius:25px;">
            <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Malaysia’s land surface was once almost entirely covered with forest. Today, forests still cover about 54%
            of the total land <br>area. However, deforestation is a major concern as the country is still rapidly
            developing.
            From 2001 to 2019,there was a <br>reduction of about 8.12 millionhectares of tree cover in Malaysia. This is
            equivalent to a 28% decrease in tree cover since <br> 2000. Apart from deforestation, the remaining forests
            face threats from unsustainable logging, illegal removal of forest<br> products and encroachment due to
            agricultural and urbanization activities.<br><br>
            <br>


            <b style="color:black;">plant</b><b style="color:green;">nation</b> is developed to help and encourage
            people to join the movement of saving the
            environment and habitats <br> by planting plants through a system that will act as a medium of this
            movement. Our system is also focused<br>
            on a few forests that are currently in endangered condition.
        </p>

        <br><br><br> <br><br><br> <br><br><br> <br><br><br>



    </section>




    <!-- footer  -->


    <div id="footer" style="position:relative;">
        <p>&copy;plantnation2022 <a href="mailto:plantnation.support@gmail.com" id="contactus">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Contact Us</p></a>


    </div>

    <script type="text/javascript">
    $(".num").counterUp({
        delay: 30,
        time: 1500
    });
    </script>
    <script>
    let payment = document.getElementById("payment-section");
    let btnDonate = document.querySelector("#btn-donate");
    //payment.style.display = "none"; 

    // btnDonate.addEventListener('click', function() {
    //     alert('Please enter payment information')
    //     payment.style.display = "block";

    // })
    </script>




</body>

</html>