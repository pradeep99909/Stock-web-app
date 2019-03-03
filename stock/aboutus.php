
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/about.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />


      <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />
      <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet" />

    	<link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="css/login.css" >

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

      <meta name="theme-color" content="#008db1">

    <script>

    loadXMLDoc();

    function loadXMLDoc() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          myFunction(this);
        }
      };
      xmlhttp.open("GET", "details.xml", true);
      xmlhttp.send();
    }
    function myFunction(xml) {
      var i;

      console.log(xml);
      var xmlDoc = xml.responseXML;
      console.log(":,",xmlDoc);
      var x = xmlDoc.getElementsByTagName("member");
      console.log("wwww",x);
      final ="";
       for (i = 0; i <x.length; i++) {
        console.log(i);
         console.log(x[i]);


        out = "<div id='card'><div id='card_box1'><img src='images/"+x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue +".jpg'></div><div id='card_box2'><div id='card_main2'>";

        name = "<div id='text'>" +x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +"</div>";
        roll = "<div id='text'>" +x[i].getElementsByTagName("roll")[0].childNodes[0].nodeValue+"</div>";
        designation = "<div id='text'>" +x[i].getElementsByTagName("designation")[0].childNodes[0].nodeValue+"</div>";
        description = "<div id='text'>" +x[i].getElementsByTagName("description")[0].childNodes[0].nodeValue+"</div>";
        out  = out +name+ roll+designation+description+"</div><div id='social'><a id='icon' href='#' class='fa fa-facebook'></a><a id='icon' href='#' class='fa fa-twitter'></a><a href='#' id='icon' class='fa fa-linkedin'></a></div></div></div>";

        final=final + out;
       }


        document.getElementById('about_main').innerHTML=final;

    }
    </script>


</head>
<body>
  <div id= "all">
    <div id='top_bar'>
      <div id='top_left'>
        <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
        <div id='logo'>
          Stock Exchange
        </div>
        </a>
      </div>
    </div>
    <div id='about_para'>About Us</div>
    <div id='about_main'>

    </div>
    <footer>
    <div id='footer1'>

    <div id='footer_box'>
      <div id='footer_box_head'>Company</div>
      <div id='footer_box_menu'><a href='contact.php' style='color:white;text-decoration:none'>Contact Us</a></div>
      <div id='footer_box_menu'><a href='aboutus.php' style='color:white;text-decoration:none'>About Us</a></div>
    </div>
    <div id='footer_box'>
      <div id='footer_box_head'>Quick Links</div>
      <div id='footer_box_menu'>Advertise</div>
      <div id='footer_box_menu'>Blog</div>
    </div>
    <div id='footer_box'>
      <div id='footer_box_head'>Follow</div>
      <div id='footer_box_menu'>
        <a href="#" id='icon' class="fa fa-facebook"></a>
        <a href="#" id='icon' class="fa fa-twitter"></a>
        <a href="#" id='icon' class="fa fa-google"></a>
        <a href="#" id='icon' class="fa fa-linkedin"></a>
      </div>
    </div>
    </div>
    <div id='footer2'>
    <b>Privacy Policy</b>
    <b>Disclaimer</b>
    <b>Terms and Conditions</b>
    </div>
    <div id='footer_line'>
    <div id='hr'></div>
    </div>
    <div id='footer3'>
    <p>Copyright 	&copy; 2018-19 StockExchange,All rights reserved</p>
    </div>
    </footer>
  </div>
</body>
</html>
