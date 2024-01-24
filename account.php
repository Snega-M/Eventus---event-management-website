<?php
session_start();

include("connection.php");
include("functions.php");
 
    $username=$_COOKIE['user'];
    $query = "select * from users where user_name = '$username' limit 1";
    $result = mysqli_query($con, $query);
    
    if($result)
    {	



            $user_data = mysqli_fetch_assoc($result);
            $user =$user_data['user_name'];
            $name =$user_data['full_name'];
            $email=$user_data['email'];
            $address = $user_data['address'];
            $contact = $user_data['contact'];
            $userid=$user_data['user_id'];
            
       
    }



?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Rajdhani:wght@300&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 
</head>
<style>
    

         *, ::after, ::before {
      box-sizing: border-box;
      }
      body {
      font-family: var(--bs-font-sans-serif);
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      background-color: #f8f3f3;
      -webkit-text-size-adjust: 100%;
      }
      [data-target="#mainMenu"] {
        position: relative;
        z-index: 999;
        
      }
      
      #mainMenu li > a {
        font-size: 15px;
        letter-spacing: 1px;
        color: #afafaf;
        font-weight: 500;
        position: relative;
        z-index: 1;
        text-decoration:none;
        /* text-shadow: rgb(0, 0, 0); */
        
      }
      
      .main-header.fixed-nav #mainMenu li > a {
        color: #fff;
        text-decoration: none;
        
      }
      
      #mainMenu li:not(:last-of-type) {
        margin-right: 30px;
       
      }
      
      #mainMenu li > a::before {
        position:absolute;
        content: "";
        width: calc(100% - 1px);
        height: 1px;
        background: #fff;
        bottom: -6px;
        left:0;
      
        -webkit-transform: scale(0, 1);
        -ms-transform: scale(0, 1);
        transform: scale(0, 1);
        -webkit-transform-origin: right center;
        -ms-transform-origin: right center;
        transform-origin: right center;
        z-index: -1;
      
        -webkit-transition: transform 0.5s ease;
        transition: transform 0.5s ease;
      }
      
      #mainMenu li > a:hover::before,
      #mainMenu li > a.active::before {
        -webkit-transform: scale(1, 1);
        -ms-transform: scale(1, 1);
        transform: scale(1, 1);
        -webkit-transform-origin: left center;
        -ms-transform-origin: left center;
        transform-origin: left center;
      }
      
      .main-header.fixed-nav #mainMenu li > a::before {
        background: #000;
      }
      
      .main-header {
        position: fixed;
        top: 25px;
        left: 0;
        z-index: 99;
        width: 100%;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
      }
      
      .main-header.fixed-nav {
        top: 0;
        background: #fff;
        -webkit-box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
        box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
      }
      
      .main-header.fixed-nav .navbar-brand > img:last-of-type {
        display: block;
      }
      
      .main-header.fixed-nav .navbar-brand > img:first-of-type {
        display: none;
      }
      .navbar-brand {
        color: #fff;
      }
      .main-header .navbar-brand img {
        max-width: 40px;
        animation: fadeInLeft 0.4s both 0.4s;
      }
      /* main-header end */
      @media (max-width: 991px) {
        /*header starts*/
        .collapse.in {
          display: block !important;
          padding: 0;
          clear: both;
          backdrop-filter: blur(30px);
        }
      
        .navbar-toggler {
          margin: 0;
          padding: 0;
          width: 40px;
          height: 40px;
          position: absolute;
          top: 25px;
          right: 0;
          border: none;
          border-radius: 0;
          outline: none !important;
        }
      
        .main-header .navbar {
          float: none;
          width: 100%;
          padding-left: 0;
          padding-right: 0;
          text-align: center;
          backdrop-filter: blur(30px);
        }
      
        .main-header .navbar-nav {
          margin-top: 0px;
          backdrop-filter: blur(30px);
        }
      
        .main-header .navbar-nav li .nav-link {
          text-align: center;
          padding: 20px 20px;
          border-radius: 0px;
        }
      
        /**/
        .main-header .navbar-toggler .icon-bar {
          background-color: #fff;
          margin: 0 auto 6px;
          border-radius: 0;
          width: 30px;
          height: 3px;
          position: absolute;
          right: 0;
          -webkit-transition: all 0.2s ease;
          transition: all 0.2s ease;
         
        }
      
        .main-header .navbar .navbar-toggler .icon-bar:first-child {
          margin-top: 3px;
        }
      
        .main-header .navbar-toggler .icon-bar-1 {
          width: 10px;
          top: 0px;
        }
      
        .main-header .navbar-toggler .icon-bar-2 {
          width: 16px;
          top: 12px;
        }
      
        .main-header .navbar-toggler .icon-bar-3 {
          width: 20px;
          top: 21px;
        }
      
        .main-header .current .icon-bar {
          margin-bottom: 5px;
          border-radius: 0;
          display: block;
        }
      
        .main-header .current .icon-bar-1 {
          width: 18px;
        }
      
        .main-header .current .icon-bar-2 {
          width: 30px;
        }
      
        .main-header .current .icon-bar-3 {
          width: 10px;
        }
      
        .main-header .navbar-toggler:hover .icon-bar {
          background-color: #ffffff;
        }
      
        .main-header .navbar-toggler:focus .icon-bar {
          background-color: #fff;
         
        }
        .right{
          float: right;
        }
        .service-type {
        background: #f5f5f6;
        padding: 40px 0 30px 0;
      }
      article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
        display: block;
      }
      * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      /* 
       */
      :root {
        --wp-admin-theme-color: #007cba;
        --wp-admin-theme-color-darker-10: #006ba1;
        --wp-admin-theme-color-darker-20: #005a87;
      }
      
      .container{
          margin-top:100px;
      }
      
      .section-title {
          margin-bottom: 38px;
      }
      
      .shadow, .subscription-wrapper {
          box-shadow: 0px 15px 39px 0px rgba(8, 18, 109, 0.1) !important;
      }
      
      p, .paragraph {
          font-weight: 400;
          color: #8b8e93;
          font-size: 15px;
          line-height: 1.6;
          font-family: "Open Sans", sans-serif;
      }
      
        /*header ends*/
      }

      .user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

</style>

<body>
    
<header style=" backdrop-filter: blur(20px); margin-top: -15px; height: 55px; border-radius:50px;" class="main-header">
        <div class="container">
          <nav class="navbar navbar-expand-lg main-nav px-0">
            <h1 class="navbar-brand" href="" style="margin-left: 40px; font-family: 'Orbitron', sans-serif;">Eventus</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            
                        </button>
            <div class="collapse navbar-collapse" id="mainMenu" style="margin-left: 300px;" >
              <ul class="navbar-nav ml-auto text-uppercase f1">
              <li>
              <a href="http://localhost/event/eventus_home.html">Home</a>
            </li>
            <li >
                <a href="http://localhost/event/services.html">Services</a>  
            </li>
            <li >
                <a href="http://localhost/event/gallery.html">Gallery</a>
            </li>
            <li >
                <a href="http://localhost/event/package.html">Packages</a>
            </li>
            <li >
              <a href="http://localhost/event/signup.php">Login/Sign Up</a>
            </li>
            <li >         
              <a href="http://localhost/event/contact.php">contact</a>
            </li>
            <li >
              <a href="http://localhost/event/about.html">About Us</a>
            </li>
            <li >
              <a href="http://localhost/event/account.php"  class="active active-first">Account</a>
            </li>
              </ul>
            </div>
          </nav>
        </div>
        <!-- /.container -->
      </header>
      <div  style="scale: 100%; background-color: #000; margin-bottom: 35px;">
        <div>
          <div>
            <img src="images/pexels-wendy-wei-1306791.jpg" class="d-block w-100" alt="..." style=" height: 580px;">
          
            
          </div>
          </div>
        </div>
      </div>
       
      <div style="margin-left: 85px; margin-top:-450px">
      <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                                                </div>
                                                                <h6 class="f-w-600"><?php echo $name ?> </h6>
                                                                <p> <?php echo $user ?></p>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600"> Account Information</h6>
                                                                <!-- <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Full Name</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $name ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Username</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $user ?></h6>
                                                                    </div>
                                                                    
                                                                </div> -->
                                                                
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $email ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">User ID</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $userid ?></h6>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <br>
                                                                <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6> -->
                                                                <div class="row">
                                                                   <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Phone</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $contact ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Address</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $address ?></h6>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- <div>
                                                                    <button style="color:#fff; background-color:#ce7f63; padding:10px; border:none; border-radius: 5px; margin-left:80px; margin-top:20px;" action="http://localhost:8081/Eventus/NewFile.jsp" >Session Details </button>
                                                                </div> -->

                                                                <div style="margin-top:40px;">
                                                                <a style="color:#fff; background-color:#ce7f63; padding:10px; border:none; border-radius: 5px; margin-left:80px; margin-top:0px; text-decoration:none;" href="http://localhost:8081/Eventus/session.jsp">Session Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
      </div>
 <br>
 <br>
 <br>
 <br><br>
 <br>
 <br>
      
      <footer class="text-center text-lg-start bg-light text-muted" style=" width: 1630px;">
        <section class="row" style="text-align: center; font-weight: 300;">
          <div style="margin-right: -150px;">
              <h2>Get in touch With Us!</h2>
          </div>
      
        </section>
      
        <!-- Section: Links  -->
        <section class="row" style="background-color: #7990a5; color: #fff;">
          <div >
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3" style="margin-left: 10px;">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                Eventus
                </h6>
                <p>
                  Eventus Events is an full service event management company which believes in creating exceptional & flawless event experiences. <br> We believe in creating moments which shall become memories to be cherished forever. Take a step ahead and plan your Events with Eventus Events-The best Event Management Company In Pondicherry.
                </p>
              </div>
              
              <div class="col-md-7" style="margin-top: 20px;">
                <div class="google-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3902.5155146317697!2d79.85488531481221!3d12.00798899149319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDAwJzI4LjgiTiA3OcKwNTEnMjUuNSJF!5e0!3m2!1sen!2sin!4v1680808223927!5m2!1sen!2sin" width="700" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- /END THE FEATURETTES -->
            
              </div>
              </div>
              <!-- Grid column -->
              <div class="col-md-2" style="margin-left: -150px;">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <div>
                  
                      <i class="material-icons" style="color:#fff;">home</i> 
                      <p style="margin-left: 35px; margin-top: -35px;"> No. 345, Mission st ,<br> Pondicherry - 605001</p>
                  
                </div>
                
                <div>
      
                    <i class="material-icons" style="color:#fff;">email</i>
                    <p style="margin-left: 35px; margin-top: -29px;" >info@eventusevents.in</p>
      
                </div>
                <div>
                  
                    <i class="material-icons" style="color:#fff;">call</i>
                    <p style="margin-left: 35px; margin-top: -28px;"> + 01 234 567 88</p>
                </div>
                <div>
                  
                    <i class="material-icons" style="color:#fff;">print</i> 
                    <p style="margin-left: 35px; margin-top: -28px;">+ 01 234 567 89</p>
                </div>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
      
        
          <div style="background-color: #adcbda;">
              <section class="py-1">
                <ul class="nav justify-content-center pb-1">
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/color/48/null/facebook-new.png"></img></a></li>
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/color/48/null/twitter-circled--v4.png"></img></a> </li>
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/fluency/48/null/google-logo.png"></img></a> </li>
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/fluency/48/null/instagram-new.png"></img></a></li>
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/color/48/null/linkedin.png"/></img></a></li>
                  <li class="nav-item"><a href=""><img href="#" class="nav-link px-2 text-body-secondary" src="https://img.icons8.com/fluency/48/null/github.png"/></img></a></li>
                   
              </ul>
               
              </section>
            </div>  
       
        
        <!-- Section: Links  -->
      
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: #355C7D; color: #fff;">
          ©Copyright:
          <a class="text-reset fw-bold" style="text-decoration-line: none;" href="">EVENTUS EVENTS PVT.LTD 2023, All Rights Reserved | Privacy Policy</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->


</body>
</html>