<?php
if(isset($_POST['btn-register']))
{
    require_once("class.user"); 
    require_once("session.php"); 
    $reg_user = new USER();

    //1. alles uitlezen
    $uname = strip_tags($_POST['txt_uname']);
    $upass = strip_tags($_POST['txt_password']);
    $upass2 = strip_tags($_POST['txt_2epassword']);
        
    //2. insert in database
$stmt = $reg_user->runQuery("INSERT INTO flashtix (username, password) VALUES (:username, :password)");
    $stmt->execute(array(":username"=>$uname,
        ":password"=>$upass
    ));

    //3. redirect naar index.php
    $reg_user->redirect('login.php');
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
<!-- registreerpage-->
<div data-role="page" class="page" id="registreerpage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
       <a class="knop" href="login.php"
           data-role="button"
           data-transition="pop">-</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="login.php"  
           data-role="button" >Log hier in</a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="login.php"
           data-role="button"
           data-transition="pop">-</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->
<div class="content" id="registreercontent" data-role="content">
        
                
                    <form class="form-register" method="post" id="register-form" data-ajax="false">
        
                        <h2 class="form-signin-heading">Voer gegevens in</h2><hr />
                        
                        <div id="error">
                        <?php
                            if(isset($error)) {
                            ?>
                                    <div class="alert alert-danger">
                                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                    </div>
                                <?php
                        }
                        ?>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="txt_uname" placeholder="Gebruikers naam" required />
                            <span id="check-e"></span>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="txt_password" placeholder="Wachtwoord" />
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="txt_2epassword" placeholder="Bevestig je Wachtwoord" />
                        </div>
                        
                        <hr />
                        
                        <div class="form-group">
                            <button type="submit" name="btn-register" class="btn btn-default">
                                <i class="glyphicon glyphicon-log-in"></i> &nbsp; REGISTREREN
                            </button>
                        </div>  
                        <br />
                    </form>


              
</div><!-- einde registreercontent -->

<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-a">
      <div class="ui-block-a">                
         <a class="knop" href="login.php"
            data-role="button">Heeft u al een account</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="login.php"
            data-role="button">log dan hier in</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- /registreerpage -->
</body>
</html