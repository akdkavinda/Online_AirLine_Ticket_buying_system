<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AirLanka-Book Tickets</title>
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
                <a href="web.whatsapp.com/"><i class="fa fa-youtube fa-2x" aria-hidden="true" id="youtube"></i></a><br>

                <button class="login">
                    <a href="Signin.php">
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
        <!-- Slider Section End-->

        <!------------------------------ 
                Start Navigation Section 
        ------------------------------->
        <section>
            <nav id="nav-section">
                <a class="active" href="">Home</a>
                <a href="manage.html">Manage</a>
                <a href="checkin.html">Check in</a>
                <a href="status.html">Status</a>
                <a href="f&q.html">F&Qs</a>
                <a href="about.html">About Us</a>
            </nav>		
        </section>
        <!-----------------------------
        End Navigation Section 
-       -------------------------------> 


        
	<!-- Content Section -->
	<section>
		<div class="para">
			
    <head>
        <title>
            View Available Flights
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
                margin: 0px 127px
            }
            input[type=date] {
                border: 1.5px solid #030337;
                border-radius: 4px;
                padding: 5.5px 44.5px;
            }
            select {
                border: 1.5px solid #030337;
                border-radius: 4px;
                padding: 6.5px 75.5px;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="css/style1.css"/>
        <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
    </head>
    <body>
        
        <h1 id="title">
            Air Lanka
        </h1>
       
        <form action="view_flights_form_handler.php" method="post">
            <h2>SEARCH FOR AVAILABLE FLIGHTS</h2>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Enter the Origin</td>
                    <td class="fix_table">Enter the Destination</td>
                </tr>
                <tr>
                    <td class="fix_table">
                        <input list="origins" name="origin" placeholder="From" required>
                        <datalist id="origins">
                            <option value="bangalore">
                                <option value="Sri Lanka">
                                    <option value="India">
                                        <option value="Singapore">
                                            <option value="Malaysia">
                                                <option value="Korea">
                                                    <option value="Australia">

                        </datalist>
                        <!-- <input type="text" name="origin" placeholder="From" required> --></td>
                    <td class="fix_table">
                        <input list="destinations" name="destination" placeholder="To" required>
                        <datalist id="destinations">
                            <option value="mumbai">
                            <option value="Sri Lanka">
                            <option value="mangalore">
                            <option value="chennai">
                            <option value="hyderabad">
                        </datalist>
                        <!-- <input type="text" name="destination" placeholder="To" required> --></td>
                </tr>
            </table>
            <br>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Enter the Departure Date</td>
                    <td class="fix_table">Enter the No. of Passengers</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="date" name="dep_date" min=
                        <?php 
                            $todays_date=date('Y-m-d'); 
                            echo $todays_date;
                        ?> 
                        
                        <?php 
                            $max_date=date_create(date('Y-m-d'));
                            date_add($max_date,date_interval_create_from_date_string("90 days")); 
                            echo date_format($max_date,"Y-m-d");
                        ?> </td>
                    <td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
                </tr>
            </table>
            <br>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Enter the Class</td>
                </tr>
                <tr>
                    <td class="fix_table">
                        <select name="class">
                            <option value="economy">Economy</option>
                            <option value="business">Business</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Search for Available Flights" name="Search">
        </form>
        <!--Following data fields were empty!
            ...
            ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
        -->
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
