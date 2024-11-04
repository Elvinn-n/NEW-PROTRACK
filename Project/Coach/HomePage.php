<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_coach where coach_id='".$_SESSION['cid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>ProTrack</title>

    <!-- Bootstrap core CSS -->
    <link href="../Assets/Templates/Main/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../Assets/Templates/Main/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/assets/css/templatemo-scholar-Coach.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/assets/css/owl.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>ProTrack</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#services">Features</a></li>
                      <li class="scroll-to-section"><a href="#contact">Complaint</a></li>
                      <li class="scroll-to-section"><a href="MyProfile.php">Profile</a></li>
                  </ul>   
                    <a class='menu-trigger'>  
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Welcome</span>
                <h2><?php echo $data['coach_name'] ?></h2>
                <div class="buttons">
                  <!-- <div class="main-button">
                    <a href="#">Log In</a>
                  </div> -->
                  <!-- <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- <div class="item item-2">
              <div class="header-text"> -->
              
                <!-- <h2>Get the best result out of your effort</h2>
                <p>You are allowed to use this template for any educational or commercial purpose. You are not allowed to re-distribute the template ZIP file on any other website.</p> -->
                <!-- <div class="buttons">
                  <div class="main-button">
                    <a href="#">Log In</a>
                  </div> -->
                  <!-- <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's the best result?</a>
                  </div> -->
                <!-- </div>
              </div>
            </div> -->
            <!-- <div class="item item-3">
              <div class="header-text">
                <span class="category">ProTrack</span>
                <h2>Online Learning helps you save the time</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious incididunt ut labore et dolore magna aliqua suspendisse.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="#">Log In</a>
                  </div>
                    <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Online Course?</a>
                  </div> -->
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="../Assets/Templates/Main/assets/images/service-01.png" alt="online degrees">
            </div>
            <div class="main-content">
              <h4>List of Students</h4>
              <p>the whole list of student that have registered to ProTrack ! </p>
              <div class="main-button">
                <a href="Students.php">Student List</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="../Assets/Templates/Main/assets/images/service-02.png" alt="short courses">
            </div>
            <div class="main-content">
              <h4>Daily Report</h4>
              <p>Review the daily report sent by the students.
              </p>
              <div class="main-button">
                <a href="DailyReport.php">Daily Report</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="../Assets/Templates/Main/assets/images/service-03.png" alt="web experts">
            </div>
            <div class="main-content">
              <h4>View Game</h4>
              <p>View the game inputted byt the admin</p>
              <div class="main-button">
                <a href="ViewGame.php">View Game</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="../Assets/Templates/Main/assets/images/service-01.png" alt="online degrees">
            </div>
            <div class="main-content">
              <h4>Feedback</h4>
              <p></p>
              <div class="main-button">
                <a href="Feedback.php">feedback</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="../Assets/Templates/Main/assets/images/service-02.png" alt="short courses">
            </div>
            <div class="main-content">
              <h4>Complaints sent by students</h4>
              <p></p>
              <div class="main-button">
                <a href="Complaint.php">Complaint</a>
              </div>
            </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>  




  

  <!-- <div class="section about-us" id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-1">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Post-Match Analysis
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>ProTrack</strong> allows for a Post-Match Analysis giving you a in-depth understanding about the games monitored

                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Food Intake Analysis
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>ProTrack</strong> allows players to send their food intake data for monitoring
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Sleep Data Monitoring
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                It  also allows players to send their sleep data for better understanding
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Communicate With Your Coaches
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Talk to your coaches via our feedback system</code>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>Our Features</h6>
            <h2>What Makes ProTrack Special</h2>
            <p>take a look at our features.</p>
            <div class="main-button">
              <a href="Guest/Login.php">Register Yourself</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Latest Courses</h6>
            <h2>Latest Courses</h2>
          </div>
        </div>
      </div>
      <ul class="event_filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".design">Webdesign</a>
        </li>
        <li>
          <a href="#!" data-filter=".development">Development</a>
        </li>
        <li>
          <a href="#!" data-filter=".wordpress">Wordpress</a>
        </li>
      </ul>
      <div class="row event_box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-01.jpg" alt=""></a>
              <span class="category">Webdesign</span>
              <span class="price"><h6><em>$</em>160</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Learn Web Design</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6  development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-02.jpg" alt=""></a>
              <span class="category">Development</span>
              <span class="price"><h6><em>$</em>340</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Cindy Walker</span>
              <h4>Web Development Tips</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design wordpress">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-03.jpg" alt=""></a>
              <span class="category">Wordpress</span>
              <span class="price"><h6><em>$</em>640</h6></span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>Latest Web Trends</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-04.jpg" alt=""></a>
              <span class="category">Development</span>
              <span class="price"><h6><em>$</em>450</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Stella Blair</span>
              <h4>Online Learning Steps</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-05.jpg" alt=""></a>
              <span class="category">Wordpress</span>
              <span class="price"><h6><em>$</em>320</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Sophia Rose</span>
              <h4>Be a WordPress Master</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="../Assets/Templates/Main/assets/images/course-06.jpg" alt=""></a>
              <span class="category">Webdesign</span>
              <span class="price"><h6><em>$</em>240</h6></span>
            </div>
            <div class="down-content">
              <span class="author">David Hutson</span>
              <h4>Full Stack Developer</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                  <p class="count-text ">Happy Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                  <p class="count-text ">Course Hours</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                  <p class="count-text ">Employed Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="15" data-speed="1000"></h2>
                  <p class="count-text ">Years Experience</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="team section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="../Assets/Templates/Main/assets/images/member-01.jpg" alt="">
              <span class="category">UX Teacher</span>
              <h4>Sophia Rose</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="../Assets/Templates/Main/assets/images/member-02.jpg" alt="">
              <span class="category">Graphic Teacher</span>
              <h4>Cindy Walker</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="../Assets/Templates/Main/assets/images/member-03.jpg" alt="">
              <span class="category">Full Stack Master</span>
              <h4>David Hutson</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="../Assets/Templates/Main/assets/images/member-04.jpg" alt="">
              <span class="category">Digital Animator</span>
              <h4>Stella Blair</h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  -->

  <!-- <div class="section testimonials" >
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-carousel owl-testimonials">
            <div class="item">
              <p>ProTrack allows for a Post-Match Analysis giving you a in-depth understanding about the games monitored</p>
              <div class="author">
                <img src="../Assets/Templates/Main/Assets/Templates/Main/assets/images/testimonial-author.jpg" alt="">
                <span class="category"></span>
                <h4>Post-Match Analysis</h4>
              </div>
            </div>
            <div class="item">
              <p>It allows Students to send their sleep data for better understanding.</p>
              <div class="author">
                <img src="../Assets/Templates/Main/Assets/Templates/Main/assets/images/testimonial-author.jpg" alt="">
                <span class="category"></span>
                <h4>Sleep Data Analysis</h4>
              </div>
            </div>
            <div class="item">
              <p>It also allows players to send their food intake data for monitoring</p>
              <div class="author">
                <img src="../Assets/Templates/Main/Assets/Templates/Main/assets/images/testimonial-author.jpg" alt="">
                <span class="category"></span>
                <h4>Food intake monitoring</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>ProTrack</h6>
            <h2>Our Features</h2>
            <p><b>ProTrack is a software made for the sports division of <br> Nirmala College Muvattupuzha(Autonomous).</b></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section events" id="events">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Schedule</h6>
            <h2>Upcoming Events</h2>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="imaAssets/Templates/Main/Assets/Templates/Main/assets/images/event-01.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Web Design</span>
                    <h4>UI Best Practices</h4>
                  </li>
                  <li>
                    <span>Date:</span>
                    <h6>16 Feb 2036</h6>
                  </li>
                  <li>
                    <span>Duration:</span>
                    <h6>22 Hours</h6>
                  </li>
                  <li>
                    <span>Price:</span>
                    <h6>$120</h6>
                  </li>
                </ul>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="../Assets/Templates/Main/Assets/Templates/Main/assets/images/event-02.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Front End</span>
                    <h4>New Design Trend</h4>
                  </li>
                  <li>
                    <span>Date:</span>
                    <h6>24 Feb 2036</h6>
                  </li>
                  <li>
                    <span>Duration:</span>
                    <h6>30 Hours</h6>
                  </li>
                  <li>
                    <span>Price:</span>
                    <h6>$320</h6>
                  </li>
                </ul>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="../Assets/Templates/Main/Assets/Templates/Main/assets/images/event-03.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Full Stack</span>
                    <h4>Web Programming</h4>
                  </li>
                  <li>
                    <span>Date:</span>
                    <h6>12 Mar 2036</h6>
                  </li>
                  <li>
                    <span>Duration:</span>
                    <h6>48 Hours</h6>
                  </li>
                  <li>
                    <span>Price:</span>
                    <h6>$440</h6>
                  </li>
                </ul>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <h6>Complaint</h6>
            <h2>Send A Complaint to Admin</h2>
            
            <!-- <div class="special-offer">
              <span class="offer">off<br><em>50%</em></span>
              <h6>Valide: <em>24 April 2036</em></h6>
              <h4>Special Offer <em>50%</em> OFF!</h4>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <form id="contact-form" action="" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Send Complaint Now</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>ProTrack ©  All rights reserved. &nbsp;&nbsp;&nbsp; </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../Assets/Templates/Main/vendor/jquery/jquery.min.js"></script>
  <script src="../Assets/Templates/Main/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Main/assets/js/isotope.min.js"></script>
  <script src="../Assets/Templates/Main/assets/js/owl-carousel.js"></script>
  <script src="../Assets/Templates/Main/assets/js/counter.js"></script>
  <script src="../Assets/Templates/Main/assets/js/custom.js"></script>

  </body>
</html>