<?php

	require_once("session.php");
	
	require_once("class.user");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM flashtix WHERE U_Id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

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
  <div data-role="page" class="page" id="homepage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="logout.php?logout=true"
           data-role="button" 
           data-icon="home"
           data-iconpos="left">Login/registreer</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" >Home</a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#lastminutepage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="slidedown">Lastminute</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->
<div class="content" id="homecontent" data-role="content">
  <!-- <br><br> -->
  <h1>FlashTix</h1>
  <h1>Hi, <b><?php print($userRow['username']); ?></b>. Welkom bij FLASHTIX.</h1>
  <canvas id="mycanvas"></canvas> <br>
  <img id="poster" class="poster" src="img/nba.jpg" width="325px"> 
</div><!-- einde homecontent -->

<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php?logout=true"
            data-role="button">&nbsp;Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- /homepage -->

<div data-role="page" class="page" id="lastminutepage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#homepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" id="lastminutecontent"><br>
   <ul data-role="listview" > 
     <li id="pop" data-role="list-divider" 
         data-theme="b">WESTELIJKE CONFERENTIE</li> 
     <li id="clippers-vs-lakers-concert"> 
         <a href="#clippers-vs-lakers-biopage" ransition="flip">
            <img class="poster" src="img/lakersvsclippers.png" height="100%" width="100%"/> 
            <h3>CLIPPERS-VS-LAKERS</h3>
            <p>AmsterdamArena</p>
            <p>Vandaag 22:00 uur</p>
         </a>

      </li> 

      <li id="warriors-vs-rockets-concert">
		<a href="#warriors-vs-rockets-biopage">
            <img class="album" src="img/warriors-vs-rockets.jpg" height="100%" width="100%"/>
            <h3>WARRIORS-VS-ROCKETS</h3>
            <p>Heineken concert hall Amsterdam</p>
            <p>Vandaag 22:30 uur</p>
          </a>

       </li>

       <li id='jazz' data-role="list-divider" data-theme="b">OOSTELIJKE CONFERENTIE</li>
        <li id="bucks-vs-celtics-concert">
            <a href="#bucks-vs-celtics-biopage">
            <img class="album" src="img/bucks-vs-celtics.png" height="100%" width="100%" />
            <h3>BUCKS-VS-CELTICS</h3>
            <p>Amsterdam Arena</p>
            <p>Vandaag 22:00 uur</p>
            </a>
 
        </li>
       <li id='rock' data-role="list-divider" data-theme="b">FIBA</li>
        <li id="usa-vs-spain-concert"><a href="#usa-vs-spain-biopage">
            <img class="poster" src="img/usa-vs-spain.PNG" height="100%" width="100%"/>
            <h3>USA-VS-SPAIN</h3>
            <p>Melkweg Amsterdam</p>
            <p>Vandaag 22:00 uur</p>
            </a>

       
        </li>
    </ul><!--/listview --> 
</div><!--/content -->
<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->

</div><!-- einde lastminutepage --> 

<!-- BIOPAGE------------bucks-vs-celtics------------------- -->
    
<div data-role="page" class="page"  id="bucks-vs-celtics-biopage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" >

    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
            <ul>
            <li><a href="#video" data-ajax="false">Video</a></li>
            <li><a href="#bio" data-ajax="false">Biografie</a></li>
            </ul>
        </div>
        <div id="video" class="ui-body-d ui-content">
            <h1>Video</h1>
            <video controls="controls" width="90%" 
            preload id="video" poster="img/bucks-vs-celtics.png"> 
                <source src="video/Wildlife.mp4" type="video/mp4"/> 
                <source src="video/shakira.webm" type="video/webm"/> 
                <source src="video/shakira.3gpp" type="video/3gpp"/> 
            </video><!-- einde video --> 

   
    <div id="socialist" data-networks="twitter" data-ids="44409004"></div>
            
          
        </div> <!-- einde video --> 
        <div id="bio">
           <h1>Biografie</h1>
           <p>Aliquameratvolutpat. Mauris vel nequesitamet nunc  
            gravida conguesedsitametpurus. Quisquelacusquam, 
            egestasactincidunt a, lacinia vel velit. Morbiac commodo 
            nulla. </p> 

            <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Zoek term ..." data-inset="true">
                <li><a href="#">T-shirts</a></li>
                <li><a href="#">Boeken</a></li>
                <li><a href="#">Albums</a></li>
            </ul>
            <div id="twitter"></div>
        </div> <!-- einde bio --> 
    </div> <!-- einde tabs --> 
</div><!-- einde content --> 
<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde bucks-vs-celtics-biopage -->

<!-- BIOPAGE------------warriors-vs-rockets------------------- -->
    
<div data-role="page" class="page"  id="warriors-vs-rockets-biopage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" >

    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
            <ul>
            <li><a href="#video" data-ajax="false">Video</a></li>
            <li><a href="#bio" data-ajax="false">Biografie</a></li>
            </ul>
        </div>
        <div id="video" class="ui-body-d ui-content">
            <h1>Video</h1>
            <video controls="controls" width="90%" 
            preload id="video" poster="img/warriors-vs-rockets.jpg"> 
                <source src="video/Wildlife.mp4" type="video/mp4"/> 
                <source src="video/shakira.webm" type="video/webm"/> 
                <source src="video/shakira.3gpp" type="video/3gpp"/> 
            </video><!-- einde video --> 

   
    <div id="socialist" data-networks="twitter" data-ids="44409004"></div>
            
          
        </div> <!-- einde video --> 
        <div id="bio">
           <h1>Biografie</h1>
           <p>Aliquameratvolutpat. Mauris vel nequesitamet nunc  
            gravida conguesedsitametpurus. Quisquelacusquam, 
            egestasactincidunt a, lacinia vel velit. Morbiac commodo 
            nulla. </p> 

            <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Zoek term ..." data-inset="true">
                <li><a href="#">T-shirts</a></li>
                <li><a href="#">Boeken</a></li>
                <li><a href="#">Albums</a></li>
            </ul>
            <div id="twitter"></div>
        </div> <!-- einde bio --> 
    </div> <!-- einde tabs --> 
</div><!-- einde content --> 
<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde warriors-vs-rockets-biopage -->

<!-- BIOPAGE-------------clippers-vs-lakers ------------------ -->
    
<div data-role="page" class="page"  id="clippers-vs-lakers-biopage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" >

    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
            <ul>
            <li><a href="#video" data-ajax="false">Video</a></li>
            <li><a href="#bio" data-ajax="false">Biografie</a></li>
            </ul>
        </div>
        <div id="video" class="ui-body-d ui-content">
            <h1>Video</h1>
            <video controls="controls" width="90%" 
            preload id="video" poster="img/lakersvsclippers.png"> 
                <source src="video/Wildlife.mp4" type="video/mp4"/> 
                <source src="video/shakira.webm" type="video/webm"/> 
                <source src="video/shakira.3gpp" type="video/3gpp"/> 
            </video><!-- einde video --> 

   
    <div id="socialist" data-networks="twitter" data-ids="44409004"></div>
            
          
        </div> <!-- einde video --> 
        <div id="bio">
           <h1>Biografie</h1>
           <p>Aliquameratvolutpat. Mauris vel nequesitamet nunc  
            gravida conguesedsitametpurus. Quisquelacusquam, 
            egestasactincidunt a, lacinia vel velit. Morbiac commodo 
            nulla. </p> 

            <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Zoek term ..." data-inset="true">
                <li><a href="#">T-shirts</a></li>
                <li><a href="#">Boeken</a></li>
                <li><a href="#">Albums</a></li>
            </ul>
            <div id="twitter"></div>
        </div> <!-- einde bio --> 
    </div> <!-- einde tabs --> 
</div><!-- einde content --> 
<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde clipper-vs-lakers-biopage -->

<!-- BIOPAGE-------usa-vs-spain------------------------ -->
    
<div data-role="page" class="page"  id="usa-vs-spain-biopage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" >

    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
            <ul>
            <li><a href="#video" data-ajax="false">Video</a></li>
            <li><a href="#bio" data-ajax="false">Biografie</a></li>
            </ul>
        </div>
        <div id="video" class="ui-body-d ui-content">
            <h1>Video</h1>
            <video controls="controls" width="90%" 
            preload id="video" poster="img/usa-vs-spain.PNG"> 
                <source src="video/Wildlife.mp4" type="video/mp4"/> 
                <source src="video/shakira.webm" type="video/webm"/> 
                <source src="video/shakira.3gpp" type="video/3gpp"/> 
            </video><!-- einde video --> 

   
    <div id="socialist" data-networks="twitter" data-ids="44409004"></div>
            
          
        </div> <!-- einde video --> 
        <div id="bio">
           <h1>Biografie</h1>
           <p>Aliquameratvolutpat. Mauris vel nequesitamet nunc  
            gravida conguesedsitametpurus. Quisquelacusquam, 
            egestasactincidunt a, lacinia vel velit. Morbiac commodo 
            nulla. </p> 

            <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Zoek term ..." data-inset="true">
                <li><a href="#">T-shirts</a></li>
                <li><a href="#">Boeken</a></li>
                <li><a href="#">Albums</a></li>
            </ul>
            <div id="twitter"></div>
        </div> <!-- einde bio --> 
    </div> <!-- einde tabs --> 
</div><!-- einde content --> 
<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde usa-spain-biopage -->



<!-- BESTELPAGE-------------------------------------- -->
    
<div data-role="page" class="page" id="bestelpage" >
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#eticketspage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">E-tickets</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content">
 <form name="form" id="form"> 

   <p>Kies een concert</p>
   <input type="radio" name="concert" value="clippers-vs-lakers"/>
   <label for="clippers-vs-lakers">clippers-vs-lakers</label>
   <input type="radio" name="concert" value="warriors-vs-rockets"/>
   <label for="warriors-vs-rockets">warriors-vs-rockets</label>
   <input type="radio" name="concert" value="bucks-vs-celtics"/>
   <label for="bucks-vs-celtics">bucks-vs-celtics</label>
   <input type="radio" name="concert" value="usa-vs-spain"/>
   <label for="usa-vs-spain">usa-vs-spain</label>
 
<label for="aantal">Aantal sterren</label>
<input type="range" name="aantal" id="aantal" min="1" max="3" />


<div data-role="fieldcontain">
<input class="required" type="text" id="naam" 
  name="naam" placeholder="Typ hier je naam in" />  
  <label for="minderjarig">Minderjarig:</label> 
  <select name="slider"  id="minderjarig" data-role="slider" 
  data-mini="true"> 
    <option value="nee">Nee</option> 
    <option value="ja">Ja</option> 
  </select> 
 <input type="text" name="plaats" id="plaats" list="steden"   
     placeholder="woonplaats" /> 
<datalist id="steden"> 
   <option value="Almere"> 
   <option value="Amstelveen"> 
   <option value="Amsterdam"> 
   <option value="Den Haag"> 
   <option value="Hilversum"> 
   <option value="Leeuwarden"> 
   <option value="Maastricht"> 
   <option value="Naarden"> 
   <option value="Utrecht"> 
</datalist> 
 <input class="required" type="text" id="mobiel" 
  name="mobiel" placeholder="Mobiel telefoon" /> 
  <input class="required" type="text" id="email" 
  name="email" placeholder="email" /> 
</div> <!-- einde fieldcontain -->
<textarea cols="35" rows="4" name="reactie" id="reactie" placeholder="mail ons je reactie">
   </textarea>
   <div data-role="controlgroup">
   <p>Kies een gratis abonnement</p>
   		<input type="checkbox" name="news" id="news" /> 
      <label for="news">FlashTixNewsletter</label> 
      <input type="checkbox" name="gids" id="gids" /> 
      <label for="gids">Uitgids</label>
      <input type="checkbox" name="fest" id="fest" /> 
      <label for="fest">Festival Gids</label> 
   </div><!-- einde controlgroup --> 
<input type="submit"  id="submit"  value="Verzend"> 
</form><!-- einde formulier --> 
<br><br><br>
</div><!--/content --> 


<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- eind bestelpage --> 

<!-- ETICKETSPAGE------------------------------ -->

<div data-role="page" class="page"  id="eticketspage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" id= "eticketscontent" class="content" >


    <div id="etickets"></div>
</div><!-- einde content --> 
<div class="footer" data-role="footer" data-theme="b">
    <div class="nav" data-role="controlgroup">
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <a class="knop" href="#agendapage"
                        data-role="button" 
                        data-icon="grid" 
                        data-iconpos="left">Agenda</a>
            </div>
            <div class="ui-block-b">
                <a class="knop" href="#locationpage"
                        data-role="button"
                        data-icon="search" 
                        data-iconpos="left">Locatie</a>
            </div>
        </div><!-- /grid-a -->
    </div> <!-- nav -->
</div><!-- /footer -->
</div><!-- einde eticketspage --> 

<!-- AGENDA PAGE ------------------------------ -->
<div data-role="page" class="page"  id="agendapage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->
  
<div data-role="content" class="content" > 
    <div data-role="controlgroup" data-type="horizontal"> 

      <a href="#agendapage" data-role="button" 
         data-icon="check" id="sel" 
         data-iconpos="notext">Select</a> 
      <a href="#agendapage" data-role="button" 
         data-icon="plus" id="add" 
         data-iconpos="notext">Add</a> 
      <a href="#agendapage" data-role="button" 
         data-icon="delete" id="del" 
         data-iconpos="notext">Delete</a> 
      <a href="#agendapage" data-role="button" 
         data-icon="refresh" id="sav" 
         data-iconpos="notext">Save</a>     
    </div>
    <div id="agendalijst"></div>
</div><!-- einde content -->



<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde agendapage --> 

<!-- LOCATION PAGE ------------------------------ -->
<div data-role="page" class="page"  id="locationpage">
<div class="header"  data-role="header" data-theme="b">
  <div class="nav" data-role="controlgroup" >
    <div class="ui-grid-b" >
      <div class="ui-block-a" >                
        <a class="knop" href="#lastminutepage"
           data-role="button" 
           data-icon="arrow-l"
           data-iconpos="left"
           data-transition="flip">Vorige</a>
      </div>
      <div class="ui-block-b">                
        <a class="knop" href="#homepage"
           data-role="button" > Home </a>
      </div>
      <div class="ui-block-c">
        <a class="knop" href="#bestelpage"
           data-role="button"
           data-icon="arrow-r" 
           data-iconpos="left"
           data-transition="pop">Bestel</a>
      </div>
    </div>   <!-- /grid-b -->
  </div>  <!-- nav -->
</div><!-- /header -->

<div data-role="content" class="content" id="googlemap" >    
<div id="gmap" style="width:100%;height:100%;"></div>
</div><!-- /content --> 

<div class="footer" data-role="footer" data-theme="b">
  <div class="nav" data-role="controlgroup">
    <div class="ui-grid-b">
      <div class="ui-block-a">                
         <a class="knop" href="#agendapage"
            data-role="button" 
            data-icon="grid" 
            data-iconpos="left">Agenda</a>
      </div>
      <div class="ui-block-b">
         <a class="knop" href="logout.php"
            data-role="button">Log uit</a>
      </div>
      <div class="ui-block-c">
         <a class="knop" href="#locationpage"
            data-role="button"
            data-icon="search" 
            data-iconpos="left">Locatie</a>
      </div>
    </div><!-- /grid-a -->
  </div> <!-- /nav -->
</div><!-- /footer -->
</div><!-- einde locationpage --> 


    
</body>
</html>
