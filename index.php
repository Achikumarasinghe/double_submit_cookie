<?php
    session_start();
    if(!isset($_COOKIE['session_cookie']) || !isset($_SESSION['csrf_session'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body style="margin-top: 100px;">

    <div class="container">
        <div class="column">
            <div class="col-md-6 offset-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 style="color:MEDIUMTURQUOISE">CSRF - Double Submit Cookies Pattern</h3></div><br>
                    <form action="check.php" method="post" onSubmit="setToken()">
                        <input type="text" name="email" id="email" class="form-control" style="border-radius: 0;"><br>
                        <button type="submit" class="btn btn-success btn-block mt-5" name="check">Submit</button>

                        <input type="hidden" name="token" id = "token" value="token1" />
                    </form>
                </div>
			</div>
			<div class="col-md-6 offset-md-3">	
        <?php
            if(isset($_COOKIE['session_cookie'])){
                echo 
                    '<div class="panel panel-primary">
                        <form class="nav-link" method="POST" action="check.php">
                            <button class="btn btn-outline-danger mt-5" type="submit" value="Logout" name="logout">Logout</button>
                        </form>
                    </div>';
            }
        ?>
   
          </div>  
        </div>        
    </div>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function setToken() {
            document.getElementById("token").value = getCookie("cookie_token");
        }

    </script>
</body>
</html>