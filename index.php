<?php ob_start();
session_start(); // Start the session
$login = false;
if (isset($_SESSION['id'])) {
    // Session is set, get user info
    $userId = $_SESSION['id'];
    $userName = $_SESSION['name'];
    $userEmail = $_SESSION['email'];
    $login = true;
}
if($login){
    $login_btn_class = "none";
    $logout_btn_class = "block";
}else{
    $login_btn_class = "block";
    $logout_btn_class = "none";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovation Hub: Training Center & Coworking Space</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
</head>
<body>
<style>
    ul li a:hover{
        border-bottom: solid 2px rgb(88, 0, 118);
    }
    .section{
        text-align: center;
        color: #0d0b4f;
        font-weight: bold;
        background-color: #e6e6e6;
    }
    .showBtn{display : none;}
    .hideBtn{display : inline;}
</style>
    <!-- Fixed Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(210,72,255,0);padding: 14px;padding-bottom: 10px;border: 0px;font-size: 14px;">
        <div class="container-fluid">
            <!-- Navbar header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img style="max-width:50px; margin-top: -15px; background-color: black; border-radius: 50%;" src="logo.png"></a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" style="color: #fff; font-weight: bold;">Accueil</a></li>
                    <li><a href="#a-propos" style="color: #fff; font-weight: bold;">A propos</a></li>
                    <li><a href="#services" style="color: #fff; font-weight: bold;">Nos Services</a></li>
                    <li><a href="#contacts" style="color: #fff; font-weight: bold;">Contacts</a></li>
                    <li><a href="#profile" style="color: #fff; font-weight: bold;display:<?php echo $logout_btn_class; ?>;"><span style="color:lightgreen;"><?php echo $_SESSION["name"]; ?></span> Profile</a></li>
                    <li><a href="login.php?log=out" style="color: #fff; font-weight: bold;display:<?php echo $logout_btn_class; ?>;" class="btn btn-danger">Déconnecer</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" style="display:<?php echo $login_btn_class; ?>;">Se connecter <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="padding: 15px; min-width: 250px;">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="nav-email">Email address</label>
                                                <input type="email" class="form-control" id="nav-email" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="nav-password">Password</label>
                                                <input type="password" class="form-control" id="nav-password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="registration.html">New around here? Sign up</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron Section -->
    <div id="accueil" class="jumbotron" style="padding-top: 70px; background-size: 100%; background-repeat: no-repeat; background-image: url(Acceuil.png);">
        <div class="container" style="text-align: center;">
            <h2 style="font-size: 46px;color: #fff; font-weight: bold;">Centre de Formation & Coworking</h2>
            <h3 style="margin-top: 30px;color: #fff;">Where Ideas Meet Ingenuity</h3>
            <div style="padding: 60px;">
                <button class="btn" style="background-color: rgba(107, 2, 198, 0.5); color: white;padding: 10px; font-size: 18px;">Reserver Votre Place!</button>
            </div>
        </div>
    </div>

    <!-- A propos Section -->
    <div id="a-propos" class="container-fluid section">
        <h2>A propos</h2>
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 500px; height: 300px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
        
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
        
                <div class="item active"><img src="ve.png" alt="Chicago" style="width:100%;height:100%; border-radius: 10px;"></div>
                <div class="item"><img src="ve.png" alt="Chicago" style="width:100%;height:100%; border-radius: 10px;"></div>
                <div class="item"><img src="Acceuil.png" alt="New York" style="width:100%;height:100%; border-radius: 10px;"></div>
            
            </div>
        
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
   
    </div>
    <!-- Services Section -->
    <div id="services" class="container-fluid section">
        <h2>Nos Services</h2>
        <!-- Services content -->
    </div>

    <!-- Contacts Section -->
    <div id="contacts" class="container-fluid section">
        <h2>Contacts</h2>
        <!-- Contacts content -->
    </div>

    <!-- Se connecter Section -->
    <div id="se-connecter" class="container-fluid section">
        <h2>Se connecter</h2>
        <!-- Se connecter content -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Your Training Center</p>
        </div>
    </footer>
    <!-- Modal -->
<div id="loginMsgModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log In Message</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $('#login-nav').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                // Get form data
                var formData = {
                    email: $('#nav-email').val(),
                    password: $('#nav-password').val()
                };

                // Send login data via POST using jQuery's $.post method
                $.post('login.php', formData, function(response) {
                    // Display response message
                    $("#loginMsgModal .modal-body").html(response);
                    $("#loginMsgModal").modal("show");
                    setTimeout(
                        function() 
                        {
                            location.reload();
                        }, 5000);
                    
                });
            });
    </script>
</body>
</html>