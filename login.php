<?php
//Login function 
session_start();
require_once("class.user");
$login = new USER(); // maak een object USER 

if($login->is_loggedin()!="")
{
	$login->redirect('flashtix.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$upass))
	{
		$login->redirect('flashtix.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>FlashTix</title>
<meta name="viewport"
        content="width=device-width, initial-scale=1">
<link rel="stylesheet"  
   href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js">
</script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
</script>
    
<link rel="stylesheet" href="flashtix.css" />
<script src="flashtix.js"></script>
    
    
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyCQMe83IkxAstk-SBGeZZAR2eKgRIGj3gs">
</script>
<script src="maplace.min.js" ></script>
    
</head>
<body>
<!-- loginpage-->
<div data-role="page" class="page" id="loginpage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
       <a class="knop" href="register.php"
           data-role="button"
           data-transition="pop">-</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="register.php"  
           data-role="button" >Registreer</a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="register.php"
           data-role="button"
           data-transition="pop">-</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->
<div class="content" id="logincontent" data-role="content">
  <h1>FlashTix</h1>
  <h2>Login</h2>
        <p>Vul uw gegevens in om in te loggen.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Gebruikersnaam</label>
                <input type="text" class="form-control" name="txt_uname" placeholder="Gebruikers naam" required />
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Wachtwoord</label>
                <input type="password" class="form-control" name="txt_password" placeholder="Password" />
            </div>
            <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                <i class="glyphicon glyphicon-log-in"></i> &nbsp; LOGIN
            </button>
            </div>
            <p>Geen account? <a href="register.php">Registreer</a>.</p>
        </form>
</div><!-- einde logincontent -->

<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-a">
      <div class="ui-block-a">                
         <a class="knop" href="register.php"
            data-role="button">Regristreer om gebruik</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="register.php"
            data-role="button">te maken van flashtix</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- /loginpage -->

</body>
</html