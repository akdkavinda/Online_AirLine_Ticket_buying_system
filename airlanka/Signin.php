<?php
	session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AirLanka-Home</title>
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate1.css">        
    </head>
    <body>
        <section class="head">
            <div class="social">
                <a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x" aria-hidden="true" id="facebook"></i></a>
                <a href="https://lk.linkedin.com/"><i class="fa fa-instagram fa-2x" aria-hidden="true" id="inster"></i></a>
                <a href="https://twitter.com/"><i class="fa fa-twitter fa-2x" aria-hidden="true" id="twiter"></i></a>
                <a href="https://youtube.com/"><i class="fa fa-youtube fa-2x" aria-hidden="true" id="youtube"></i></a><br>

                <button class="login">
                    <a href="Signin.html">
                    <table>
                        <tr>
                            <th><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i></th>
                            <th>Sign in</th>
                        </tr>
                    </table>
                    </a>
                </button>
            </div>		
            <hr>
        </section>

        <!-- Left side Section End-->

        <!-- Slider Section -->
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="images/img1.jpg" style="width:100%">
                <h2 class="text animated bounceInDown delay-4s slower">Welcome</h2>
                <h3 class="text1 animated bounceIn delay-6s slower">to</h3>
                <h2 class="text2 animated bounceInUp delay-10s slower">AirLanka</h2>
            </div>

            <div class="mySlides fade">
                <img src="images/img2.jpg" style="width:100%">
                <h2 class="text3 animated bounceInDown delay-4s slower">We are care About</h2>
                <h3 class="text4 animated bounceIn delay-4s slower">your</h3>
                <h2 class="text5 animated bounceInUp delay-5s slower">Everything</h2>	   	
            </div>

            <div class="mySlides fade">
                <img src="images/img3.jpg" style="width:100%">
                <h2 class="text3 animated bounceInDown delay-4s slower">Don't just fly,</h2>
                <h3 class="text4 animated bounceIn delay-4s slower">Fly your own way</h3>
                <h2 class="text5 animated bounceInUp delay-5s slower">Join with Us</h2>	    
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        


        
	<!-- Content Section -->
	<section>
		<div class="para">
			<html>
	<head>
		<title>
			Account Login
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 60px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style1.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<center>

		<br>
		
		<form class="float_form" style="padding-left: 40px" action="login_handler.php" method="POST">
			<fieldset>
				<legend>Login Details:-</legend>
				<strong>Username:</strong><br>
				<input type="text" name="username" placeholder="Enter your username" required><br><br>
				<strong>Password:</strong><br>
				<input type="password" name="password" placeholder="Enter your password" required><br><br>
				<strong>User Type:</strong><br>
				Customer <input type='radio' name='user_type' value='Customer' checked/> Administrator <input type='radio' name='user_type' value='Administrator'/>
				<br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "<br>
						<strong style='color:red'>Invalid Username/Password</strong>
						<br><br>";
                    }
				?>
				<input type="submit" name="Login" value="Login">
			</fieldset>
			<br>
			<a href="new_user.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Create New User Account?</a>
		</form>
		</center>
	</body>
		</div>
	</section>

	<!-- Content Section End -->        
        
        
        
        
        <!-----------------------------
        Start Footer Section 
-       ------------------------------->              

        <!-- Footer Section -->
        <section>
            <footer>
                <div class="footer-section">
                    <div class="single-column">
                        <h2>Essential Information</h2>
                        <ul>
                            <li><a href="">Travel Information</li></a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Legal Notice</a></li>
                            <li><a href="">Booking Policy for Travel Agents</a></li>
                            <li><a href="">Permission Centre</a></li>      			
                        </ul>
                    </div>
                    <div class="single-column">
                        <h2>Services</h2>
                        <ul>
                            <li><a href="">Cargo</a></li>
                            <li><a href="">Air Taxi</a></li>
                            <li><a href="">Environment</a></li>
                        </ul>
                    </div>
                    <div class="single-column">
                        <h2>Terms-Condition</h2>
                        <ul>
                            <li><a href="">Online Booking Terms of Use</a></li>
                            <li><a href="">Conditions of Carriage</a></li>
                            <li><a href="">Agency Debit Memo Policy</a></li>
                        </ul>
                    </div>      	      	
                    <div class="single-column">
                        <h2>Company Logo</h2>
                        <img src="">
                    </div>      	      	     	
                </div>	
            </footer>
        </section>

        <!-----------------------------
        End Footer Section 
-       ------------------------------->  





        <!-----------------------------
        Script Section 
-       ------------------------------->                
        <script>
            //Slider script
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 10000); // Change image every 2 seconds
            }

            //Navigation Sticky Script
            window.onscroll = function () {
                myFunction()
            };

            var navbar = document.getElementById("nav-section");
            var sticky = navbar.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }

        </script>
        <!-----------------------------
        End of Script Section 
-       ------------------------------->                        

    </body>
</html>
