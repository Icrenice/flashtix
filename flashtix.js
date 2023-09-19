$(function() {
$.mobile.pushStateEnabled = false;
// Opgave 31: de functie prepend() 
var welkomstMelding = 'Welkom!';    
$('#homecontent').prepend(
   '<p class="melding">'+ welkomstMelding + '</p>');
// Opgave 32: de functie append() 
$('#homecontent').append('<p class="melding" id="gratis">Gratis tickets!</p>'); 
// Opgave 33: de functie remove() 
$('#homecontent').children('#gratis').remove(); 
// Opgave 34: de functie bind()
$('body').bind('swipe',function(event){ 
   alert('Je hebt over het scherm geveegd'); 
}); 
// Opgave 35: event handler
$('body').bind('click',function(e){ 
     alert('Page coordinaten:'+ e.pageX + ' ' + e.pageY );
});
    
// Opgave 36: de functie unbind() 
  $('body').unbind('click'); 
  $('body').unbind('swipe');

// Opgave 37: de functie trigger() 
$('body').taphold(function(){ 
    datum = new Date(); 
    uur = datum.getHours();
    if(uur <= 11){
      $('<p class = "melding">Goedemorgen!</p>').prependTo('#homecontent');
    } else if(uur >= 12 && uur <= 17){
        $('<p class = "melding">Goedemiddag!</p>'). prependTo('#homecontent'); 
    }else if(uur >= 18 && uur <= 24){
        $('<p class = "melding">Goedenavond!</p>').prependTo('#homecontent'); 
    } 
}); 
$('body').trigger('taphold');

// Opgave 40: canvas
$('#mycanvas').bind('click', function(e) { 
   var mycanvas = document.getElementById('mycanvas'); 
   var ctx = mycanvas.getContext('2d'); 
   ctx.beginPath();
   ctx.moveTo(25,80); 
   ctx.lineTo(200,80); 
   ctx.stroke(); 
   ctx.moveTo(25,100); 
   ctx.lineTo(200,100); 
   ctx.stroke(); 

// Opgave 41: vierkant tekenen
   var grd=ctx.createLinearGradient(200,70,200,110);       
   grd.addColorStop(0, '#f55b5b'); 
   grd.addColorStop(1, '#3112a3');
   ctx.fillStyle=grd;
   ctx.fillRect(25,25,100,100);
   ctx.strokeRect(25,25,100,100);
    
// Opgave 42: canvas tekst
  ctx.font= '40pt Georgia'; 
  ctx.shadowBlur = 5; 
  ctx.shadowColor = 'rgb(0, 0, 0)'; 
  ctx.fillText('tekst',50,100);

// Opgave 43: bogen en cirkels
ctx.beginPath(); 
   var x = 220;
   var y = 100;
   var radius = 25;
   var beginhoek = 190;
   var eindhoek = (Math.PI/180)*360;
   var klok = false; 
   ctx.arc(x,y,radius,beginhoek,eindhoek,klok); 
   ctx.fill();
   ctx.stroke(); 

// Opgave 44: interactief tekenen 
   ctx.save();
   ctx.beginPath();
   x = e.pageX - this.offsetLeft; 
   y = e.pageY - this.offsetTop;
   radius = 15; 
   ctx.arc(x,y,radius,beginhoek,eindhoek,klok); 
   ctx.fill();
   ctx.stroke(); 
   ctx.restore(); 

// Opgave 45: animaties
cirkelObj={ 
      radius:10, maxRadius: 100, 
      x: e.pageX - this.offsetLeft, 
      y: e.pageY - this.offsetTop 
   } 
   tekstObj={ 
      size:10, 
      font: 'pt Georgia', 
      maxSize: 50, 
      x: e.pageX -  this.offsetLeft,
      y: e.pageY -  this.offsetTop
   } 
   posterObj={ 
       x: e.pageX -  this.offsetLeft,
      y: e.pageY -  this.offsetTop
   } 
   ctx.lineWidth = 2;
   // load image 
   newPosterObj = new Image();
   newPosterObj.src = 'img/lakersvsclippers.png';

// Opgave 46: de functie animeren()
   function animeren(){ 
      ctx.save();
      // canvas vegen 
      ctx.clearRect(0,0,mycanvas.width, mycanvas.height);
      // teken poster in x,y klik coÃ¶rdinaten
      ctx.drawImage(newPosterObj,posterObj.x,posterObj.y);
      posterObj.x +=3;
      ctx.restore(); 
       
// Opgave 47: cirkel animeren     
       // increase radius
       cirkelObj.radius +=2;
       ctx.beginPath(); 
        ctx.arc(
            cirkelObj.x,
            cirkelObj.y, 
            cirkelObj.radius,
            0,
            2*Math.PI,
            false
        );
   ctx.stroke();

// Opgave 48: tekst animeren          
   ctx.font= tekstObj.size + tekstObj.font; 
   ctx.fillText('FlashTix ',tekstObj.x,tekstObj.y);
   // tekengrootte 
   tekstObj.size +=2; 
   ctx.restore(); 

   } // einde animeren 
   setInterval(animeren,100); 

}); 
// einde canvas 
$('#mycanvas').trigger('click');
    
// Opgave 49: de functie addClass()    
    $('#lastminutecontent > ul > li > a > img').addClass(
    'ui-corner-all');
    
// Opgave 50: de functie css() 
    $('#lastminutecontent > ul > li > a > img').css(
    'border-radius','50%');
    
// Opgave 51: attributen selecteren
    $('[href="#clippers-vs-lakers-biopage"]').
append('<h3 class="melding">Uitverkocht!</h3>');
    
    $('[href="#bucks-vs-celtics-biopage"]').
append('<h3 class="melding">10% korting!</h3>');

// Opgave 52: de functie hide() 
datum = new Date();
if(datum.getDay()===6 || datum.getDay()===0){ 
   $('.rock').hide(); 
   $('#usa-vs-spain-concert').hide(); 
} 

// Opgave 53: de functie hide()
     $('#warriors-vs-rockets-concert').hide();

// Opgave 54: de functie append() 
    $('#bucks-vs-celtics-concert').append('<img width="30px" src="img/ster.jpg" alt="pic" />');
    
// Opgave 55: de functie after() 
    $('#bucks-vs-celtics-concert').after($('#clippers-vs-lakers-concert'));
    $('#pop').before($('#jazz')); 
    $('#jazz').after($('#bucks-vs-celtics-concert'));
    
// Opgave 56: de each(iterator) 
    $('#lastminutecontent > ul > li') .each(function(){ 
   $(this).show(); 
});
    
// Opgave 57: de functie insertBefore() 
$('<img class="poster" src="img/playoffs.jpg" alt="pic" width="35%" />').insertBefore('#lastminutecontent > ul');
    
     

  /*  
    $('#socialist').socialist({ 
    networks: [ {name:'twitter',id:'in1dotcom'}],
           isotope:false,
            random:false,
            fields:['source','heading','text','date','image','followers','likes']
    });
    */
    
// Opgave 64:de POST-methode van AJAX 
$('#submit').click(function(){
    var email = document.form.email.value;
    var concert = document.form.concert.value;
    $.ajax({
        type:'POST', 
        url: 'getEticket.php',
        data: ({
            email : email,
            concert: concert
        }),
        cache: false,
        dataType: "text",
        success: onSuccess
    }); 
    $('#log').ajaxError(function(event, request, settings, exception) {
    $('#log').html("Error: " + settings.url +
        "<br />HTTP Code: " + request.status);
    });
    function onSuccess(data){
      $('#etickets').append('<p>E-Ticket voor de wedstrijd van '+ concert +'</p><img  src="'+ data + '" alt="pic" width="35%" />'); 
        localStorage.setItem(concert,data);
    }
});
    
    
    

// Opgave 73: item toevoegen 
$('#add').bind('click',function() { 
    $('#agendalijst').append('<li class="agendaitem">'+
               '<input class="itembox" type="checkbox"/>'+ 
               '<input  type="date" value="" />'+ 
               '<input  type="textarea" '+   
               'placeholder="to do ..." /></li>'); 
}); 
 


// Opgave 75: selecteer alle items 
    $('#sel').bind('click',function() { 
        $('.itembox:not(:checked)').each(function(){ 
            $(this).click(); 
        }); 
    });

    
// Opgave 76: selecteer/deselecteer 
$('#sel').bind('click',function() { 
    $('.itembox').each(function(){ 
        $(this).click(); 
    }); 
}); 
    


// Opgave 78: bewaar alle items 
$('#sav').bind('click',function() { 
    localStorage.clear();
    var teller = 0; 
    $('.agendaitem').each(function(){ 
        
        itemdate = $(this).children('input:eq(1)').val(); 
        itemtext = $(this).children('input:eq(2)').val(); 
        if(itemdate === null) return;
        teller++;
        obj = { 
            id:teller, 
            datum:itemdate, 
            tekst:itemtext 
        } 
        localStorage.setItem(teller,JSON.stringify(obj)); 
    }); 
});


// Opgave 78: agenda vanuit localstorage opladen
for (var i=1;i<= localStorage.length;i++){ 
    if(localStorage.getItem(i)=== null){ continue;}
        read_obj = JSON.parse(localStorage.getItem(i)); 
        tekst = read_obj.tekst; 
        datum = read_obj.datum;
        $('#agendalijst').append( 
            '<li class="agendaitem" data-role="none">'+
            '<input type="checkbox" class="itembox" name="check"  data-role="none"/>'+
            '<input  type="date" data-role="none" value="' + 
            datum + '" />'+
            '<input  type="textarea" data-role="none" '+
            'value="' + tekst + '" /></li>');     
}
// Opgave 79: verwijder aangevinkte items 
$('#del').bind('click',function() { 
    $('.itembox').each(function(){
        var itemChecked = $(this).prop('checked'); 
        if(itemChecked){ 
            $(this).parent().remove();
        } 
    }); 
});

  
    
$('#agendacontent').append('<div id="agendalijst"></div>'); 
  
    for (var i=1;i<= localStorage.length;i++){ 
        if(localStorage.getItem(i)=== null){ continue;}
            read_obj = JSON.parse(localStorage.getItem(i)); 
            tekst = read_obj.tekst; 
        //console.log('tekst' + tekst);
            datum = read_obj.datum;
        // console.log('datum' + datum);
        

            $('#agendalijst').append( 
                '<li class="agendaitem">'+
                '<input class="itembox" type="checkbox"/>'+
                '<input id="itemdate" type="date" value="' + 
                datum +  '" />'+
                '<input id="itemtext"  type="textarea" '+
                'value="' + tekst + '" /></li>');     
    }
 


    
    
// Opgave 84: Google-map maken 
var positie = new google.maps.LatLng(52.3622774,4.883945);
var mapOptions = {
  zoom: 4,
  center: positie
}


// Opgave 85: markers in je Google-map 
var map = new google.maps.Map(document.getElementById("gmap"), mapOptions);

var marker = new google.maps.Marker({
    position: positie,
    title:'Paradiso: Weteringschans 6,\n' + 
              '1017 SG Amsterdam \n'+ 
              'Telefoon 020 222 22222'
});

marker.setMap(map);
    
    
 }); // einde jQuery 