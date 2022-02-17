<?php
	session_start();
?>
 <head>
        <meta charset="UTF-8">
        <title>AirLanka-Home</title>
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">        
    </head>
    <body>
        <section class="head">
            <div class="social">
                <a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x" aria-hidden="true" id="facebook"></i></a>
                <a href="https://lk.linkedin.com/"><i class="fa fa-instagram fa-2x" aria-hidden="true" id="inster"></i></a>
                <a href="https://twitter.com/"><i class="fa fa-twitter fa-2x" aria-hidden="true" id="twiter"></i></a>
                <a href="web.whatsapp.com/"><i class="fa fa-youtube fa-2x" aria-hidden="true" id="youtube"></i></a><br>

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
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse; 
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style1.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		
		<h2>AVAILABLE FLIGHTS</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='No. of Passengers';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Class';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;
					require_once('Database Connection file/mysqli_connect.php');
					if($class=="economy")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"book_tickets2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Economy)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>Rs. ".$price_economy."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    						echo "</form>";
    					}
					}
					else if($class="business")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"book_tickets2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>Rs.".$price_business."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=".$flight_no."></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    						echo "</form>";
    					}
					}	
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
	</body>
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
