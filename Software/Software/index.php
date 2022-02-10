<!DOCTYPE html>

<head>

  <meta charset="UTF-8">

  <title>Domotique</title>



<!-- CSS init -->



 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">





<!--<link rel="stylesheet" href="CSS/bootstrap.css"> -->

<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

<meta charset="utf-8" />

<link rel="stylesheet" href="assets/css/main.css" />

<link rel="stylesheet" href="css/master.css">



<!-- date et heure-->



<?php



    // Récupère l'heure du serveur



       $localtime = localtime();

       $seconde =  $localtime[0];

       $minute =  $localtime[1];

       $heure =  $localtime[2];

       $day = $localtime[3];

       $month = $localtime[4]+1;

       $year = $localtime[5]+1900;



?>

<!-- clock -->

<script>

          

          bcle=0;



          function clock()

          {

            if (bcle == 0)

            {

              heure = <?php echo $heure ?>;

              min = <?php echo $minute ?>;

              sec = <?php echo $seconde ?>;

              day = <?php echo $day ?>;

              month = <?php echo $month ?>;

              year = <?php echo $year ?>;

            }

            else

            {

              sec ++;

              if (sec == 60)

              {

                sec=0;

                min++;

                if (min == 60)

                {

                  min=0;

                  heure++;

                };

              };

            };

            txt="";

            if(heure < 10)

            {

              txt += "0";

            }

            txt += heure+ ":";

            if(min < 10)

            {

              txt += "0"

            }

            txt += min + ":";

            if(sec < 10)

            {

              txt += "0"

            }

            txt += sec + " " ;

            if(day < 10)

            {

              txt += "0";

            }

            txt += day+ "/";

            if(month < 10)

            {

              txt += "0";

            }

            txt += month+ "/";

            if(year < 10)

            {

              txt += "0";

            }

            txt += year;



            timer = setTimeout("clock()",1000);

            bcle ++;

            document.clock.date.value = txt ;

          }

          

</script>





<!-- recuperation temperature & humidité -->



<!-- API REST -->

<script>

async function get_Temperature(){



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/sensors/4');



  const myJson = await response.json(); //extract JSON from the http response



  // do something with myJson



  //alert(myJson.state.on);



  //alert('hello');

  setTimeout("get_Temperature()",1000);

  document.getElementById("Temperature").innerHTML=(myJson.state.temperature*0.01).toFixed(2);



}



async function get_Humidity(){



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/sensors/5');



  const myJson = await response.json(); //extract JSON from the http response



  // do something with myJson



  //alert(myJson.state.on);



  //alert('hello');

  setTimeout("get_Humidity()",1000);

  document.getElementById("Humidity").innerHTML=(myJson.state.humidity*0.01).toFixed(2);



}



async function get_Battery(){



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/sensors/5');



  const myJson = await response.json(); //extract JSON from the http response



  // do something with myJson



  //alert(myJson.state.on);



  //alert('hello');

  setTimeout("get_Battery()",1000);

  document.getElementById("Batterie").innerHTML=((myJson.config.battery-70)*(100/30)).toFixed(2);



}



async function etat_Prise(){



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/lights/2');



  const myJson = await response.json(); //extract JSON from the http response



  // do something with myJson



  // alert(myJson.state.on);



  //alert('hello');

  setTimeout("etat_Prise()",1000);

  document.getElementById("Prise").innerHTML=myJson.state.on;



}



async function put_Prise_false(){



  const state = JSON.stringify({on:false});



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/lights/2/state',{



  method: 'PUT',



  body: state, // string or object



  headers: {



  'Content-Type': 'application/json'



  }



  });



  const myJson = await response.json(); //extract JSON from the http response



// do something with myJson



}



async function put_Prise_true(){



  const state = JSON.stringify({on:true});



  const response = await fetch('http://192.168.1.81:8080/api/8062FB694A/lights/2/state',{



  method: 'PUT',



  body: state, // string or object



  headers: {



  'Content-Type': 'application/json'



  }



  });



  const myJson = await response.json(); //extract JSON from the http response



  // do something with myJson



}



async function setup(){

        clock();

        get_Temperature();

        get_Humidity();

        get_Battery();

        etat_Prise()

        

        

        



}





</script>







<!-- USELESS -->



<?php

  $Temperature = //json_decode(file_get_contents('http://localhost:8080/api/8062FB694A/sensors/4'));

  $Humidity = //file_get_contents('http://localhost:8080/api/8062FB694A/sensors/5');

  $TempInt_TH =15.7;

  $HumiditeInt_TH =90;

  $batterie_TH=100;

  /*

  $data = file_get_contents('https://api.meteo-concept.com/api/location/city?token=MON_TOKEN&insee=35238');



  if ($data !== false) {

    $TempInt = json_decode($data)->city;

    $TempInt = json_decode($data)->city;

    print("La ville de {$city->name} ({$city->cp}) a pour coordonnées {$city->latitude},{$city->longitude}.");

  }*/

?>





</head>







<body style="background-color:black;">

<br>

<br>

<div class="container-fluid">

    <div class="row">

    

        <!-- <div class="col-XL-2 col-3"> -->

        <div class="col-xs-2 col-lg-3">

          <!-- date et heure -->

           <div> <!--  Charge la fonction dans le corps de la page  -->

            <body onLoad="setup()" >



            <!--  Affiche l'heure  -->

            <form name="clock" onSubmit="0" >

            <output name="date" size="13" readonly class="date">

            </form>

           </div> 



          <div class="buttonNav">

            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-unlock" viewBox="0 0 16 16">

                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/>

              </svg>

              <a class="para"  href="login.html" >Login</a>

          </div>



        </div>



        <!-- <div class="col-XL-9 col-9"> -->

        <div class="col-xs-10 col-lg-5">

          <div>

            <!-- affichage des temperatures-->

            <H1  > <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-thermometer-half" viewBox="0 0 16 16">

              <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>

              <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>

            

            </svg> Température: </H1>

            

            <p class="para">  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-thermometer-half" viewBox="0 0 16 16">

              <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>

              <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>

            

            </svg> Intérieur: <span id="Temperature"></span>°C</p> <br>

            

            <p class="para"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-thermometer-half" viewBox="0 0 16 16">

              <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>

              <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>

            

            </svg> Extérieur: <?php echo(5); ?> °C</p> <br>

           

            <p class="para">  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-moisture" viewBox="0 0 16 16">

              <path d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z"/>

            </svg> Humidité: <span id="Humidity"></span>%</p> <br>

            

            <p class="para"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill= rgb(255,255,0) class="bi bi-lightning-fill" viewBox="0 2 20 16" style="font-size: 4rem" >

            <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z"></path>

            </svg> Batterie: <span id="Batterie"></span>%</p>

            

          </div>  

        </div>  

        <div class="col-md-offset-2 col-md-10 col-lg-offset-0 col-lg-4">

          <div>          

            <!-- affichage de l'etat du capteur-->

            

            <H1 > <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-thermometer-sun" viewBox="0 0 16 16">

              <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585A1.5 1.5 0 0 1 5 12.5z"/>

              <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zm4.243 1.757a.5.5 0 0 1 0 .707l-.707.708a.5.5 0 1 1-.708-.708l.708-.707a.5.5 0 0 1 .707 0zM8 5.5a.5.5 0 0 1 .5-.5 3 3 0 1 1 0 6 .5.5 0 0 1 0-1 2 2 0 0 0 0-4 .5.5 0 0 1-.5-.5zM12.5 8a.5.5 0 0 1 .5-.5h1a.5.5 0 1 1 0 1h-1a.5.5 0 0 1-.5-.5zm-1.172 2.828a.5.5 0 0 1 .708 0l.707.708a.5.5 0 0 1-.707.707l-.708-.707a.5.5 0 0 1 0-.708zM8.5 12a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>

            </svg> Chauffage: </H1>

            <p class="para">Chauffe: <span id="Prise"></span></p> <br>

            <p class="para">Consigne: <?php echo( $Temperature); ?> °C</p><br>



            <!--

            <button onclick="put_Prise_true()">On</button>



            <button onclick="put_Prise_false()">Off</button>

            -->



            <div class="buttonNav">

            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">

            <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>

            </svg>

              <a class="para"  onclick="put_Prise_true()"> ON </a>

          </div>



          <div class="buttonNav">

            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">

              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>

              <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>

            </svg>

              <a class="para"  onclick="put_Prise_false()">OFF</a>

          </div>

          </div>  

          

         

        </div>

      </div>

    </div>

  </body>

</html>







