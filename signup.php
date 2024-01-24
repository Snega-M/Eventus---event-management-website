<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
		$contact = $_POST['contact'];
        $address = $_POST['address'];
		

		if(!empty($user_name) && !empty($full_name) && !empty($password) && !is_numeric($user_name) && !is_numeric($full_name) && !empty($email) && !empty($address) && !empty($contact) && is_numeric($contact) )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,email,contact,address,full_name) values ('$user_id','$user_name','$password','$email' ,'$contact','$address','$full_name')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <%@ page language = "java"
    import ="java.util.Date"
    contentType="text/html; charset=ISO-8859-1"
    isErrorPage="true"
    errorPage = "errorpage.jsp"
    autoFlush="true"
    isELIgnored="false"
    %> -->
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Rajdhani:wght@300&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">   

<style>
    
        body {
 background-color: #f8f3f3;
 background-image: url('images/pexels-sebastian-ervi-1763075.jpg');
}
    
</style>
<style>


    .form-container{
    /* background-color: #fff; */
    background-color: rgba(255,255,255,0.13);
    font-family: 'Titillium Web', sans-serif;
    font-size: 0;
    padding: 50px 35px;
    border-radius: 20px;
    top: 50%;
    left: 50%;
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    /* box-shadow: 0 0 25px -15px rgba(0, 0, 0, 0.3); */
    
}



.form-container .title{
    color: #000;
    font-size: 25px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 25px;

}
.form-container .title:after{
    content: '';
    background-color: black;
    height: 3px;
    width: 60px;
    margin: 10px 0 0;
    display: block;
    clear: both;
}
.form-container .sub-title{
    color: #333;
    font-size: 18px;
    font-weight: 600;
    text-align: center;
   
    margin: 0 0 20px;
}
.form-container .form-horizontal{ font-size: 0; }
.form-container .form-horizontal .form-group{
    color: #333;
    width: 50%;
    padding: 0 8px;
    margin: 0 0 15px;
    display: inline-block;
}
.form-container .form-horizontal .form-group:nth-child(4){ margin-bottom: 30px; }
.form-container .form-horizontal .form-group label{
    font-size: 17px;
    font-weight: 600;
}
.form-container .form-horizontal .form-control{
    color: #888;
    background: #fff;
    font-weight: 400;
    letter-spacing: 1px;
    height: 40px;
    padding: 6px 12px;
    border-radius: 10px;
    border: 2px solid #e7e7e7;
    box-shadow: none;
    
}
.form-container .form-horizontal .form-control:focus{ box-shadow: 0 0 5px #dcdcdc; }
.form-container .form-horizontal .check-terms{
    padding: 0 8px;
    margin: 0 0 25px;
}
.form-container .form-horizontal .check-terms .check-label{
    color: #333;
    font-size: 14px;
    font-weight: 500;
    font-style: italic;
    vertical-align: top;
    display: inline-block;
}
.form-container .form-horizontal .check-terms .checkbox{
    height: 17px;
    width: 17px;
    min-height: auto;
    margin: 2px 8px 0 0;
    border: 2px solid #d9d9d9;
    border-radius: 2px;
    cursor: pointer;
    display: inline-block;
    position: relative;
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    transition: all 0.3s ease 0s;
}
.form-container .form-horizontal .check-terms .checkbox:before{
    content: '';
    height: 5px;
    width: 9px;
    border-bottom: 2px solid #00A9EF;
    border-left: 2px solid #00A9EF;
    transform: rotate(-45deg);
    position: absolute;
    left: 2px;
    top: 2.5px;
    transition: all 0.3s ease;
}
.form-container .form-horizontal .check-terms .checkbox:checked:before{ opacity: 1; }
.form-container .form-horizontal .check-terms .checkbox:not(:checked):before{ opacity: 0; }
.form-container .form-horizontal .check-terms .checkbox:focus{ outline: none; }
.form-container .signin-link{
    color: #333;
    font-size: 14px;
    width: calc(100% - 190px);
    margin-right: 30px;
    display: inline-block;
    vertical-align: top;
}
.form-container .signin-link a{
    color: #00A9EF;
    font-weight: 600;
    transition: all 0.3s ease 0s;
}
.form-container .signin-link a:hover{ text-decoration: underline; }
.form-container .form-horizontal .signup{
    color: #fff;
    background: #9d5555;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 160px;
    padding: 8px 15px 9px;
    border-radius: 10px;
    transition: all 0.3s ease 0s;
}
.form-container .form-horizontal .btn:hover,
.form-container .form-horizontal .btn:focus{
    text-shadow: 0 0 5px rgba(0,0,0,0.5);
    box-shadow: 3px 3px rgba(0,0,0,0.15),5px 5px rgba(0,0,0,0.1);
    outline: none;
}
@media only screen and (max-width:479px){
    .form-container .form-horizontal .form-group{ width: 100%; }
    .form-container .signin-link{
        width: 100%;
        margin: 0 10px 15px;
    }
}

/* main-header start */
[data-target="#mainMenu"] {
  position: relative;
  z-index: 999;
  
}

#mainMenu li > a {
  font-size: 15px;
  letter-spacing: 1px;
  color: #fff;
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


</style>
  
</head>
<body>
    
<header style=" backdrop-filter: blur(25px); margin-top: -15px; height: 55px; border-radius:50px;" class="main-header">
        <div class="container">
          <nav class="navbar navbar-expand-lg main-nav px-0">
            <h1 class="navbar-brand" href="" style="margin-left: 40px; font-family: 'Orbitron', sans-serif;">Eventus</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                            
                        </button>
            <div class="collapse navbar-collapse" id="mainMenu" style="margin-left: 200px;" >
              <ul class="navbar-nav  text-uppercase f1">
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
                  <a href="http://localhost/event/signup.php" class="active active-first">Login/Sign Up</a>
                </li>
                <li >         
                  <a href="http://localhost/event/contact.php">contact</a>
                </li>
                <li >
                  <a href="http://localhost/event/about.html">About Us</a>
                </li>
                <li >
                  <a href="http://localhost/event/account.php">Account</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <!-- /.container -->
      </header>


        <!-- <div style="color:blue; margin-top: 20px;">
            <%! Date d = null; %>
        <% d = new Date(); %>
        <%= d %>
        </div>
        <div >
            Hostname: <%= request.getRemoteHost() %>
        </div> -->
    <div class="form-bg">
        <div class="container" style="margin-top: 70px; margin-left: 450px;">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-container" style="backdrop-filter: blur(45px)">
                        
                        <h3 class="title" >Registration</h3>
                        <form class="form-horizontal" method="post">
						<!-- action="login1.jsp" -->
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control"  name="full_name">
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control"  name="user_name">
                            </div>
                         
                            <div class="form-group">
                                <label>Email ID</label>
                                <input type="email" class="form-control"  name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            
                            <h4 class="sub-title" style="margin-top: 20px;">PERSONAL INFORMATION</h4>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="text" class="form-control" name="contact">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="sub-title" >
                                <label>Address</label>
                                <input type="text" class="form-control"  name="address">
                            </div>
                            <input class="btn signup" style="margin-left: 140px; width: 260px; height: 60px;" type="submit" value="  Create Account  " /> <br>
                             <!-- <div>
                             <a href="signup.php" class="form-group">Click to Signup</a>
                             </div> 
                            
                              <button class="btn signup" style="margin-top: 40px; margin-left: 190px;"><a href="login.php">Sign In</a></button>
                      
                            -->
                            <h5><a href="login.php" style="color:black " >Sign In</a></h5>
                            </form>
                           
                    </div>
                </div>
            </div>
        </div>
    

</body>
</html>