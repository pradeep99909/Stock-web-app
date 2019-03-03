

function open_profile_menu(){
  var a=document.getElementById('profile_menu');
  a.style.right="0px";
  a.style.borderLeft="2px solid #008db1";
}

function close_profile_menu(){
  var a=document.getElementById('profile_menu');
  a.style.right="-150px";
  a.style.borderLeft="none";
}

function get_stock_main(){
  var value=document.querySelectorAll('#p');
  var icon=document.querySelectorAll('#stock i');
  var i;


    for(i=0;i<value.length;i++){
      value[i].innerHTML=parseFloat(value[i].innerHTML).toFixed(2)+"%";
      if(parseFloat(value[i].innerHTML)>0){
        icon[i].style.color='#72bb53';
        icon[i].innerHTML='arrow_drop_up';
        value[i].style.color='#72bb53';
      }
      else{
        icon[i].style.color='#e61610';
        icon[i].innerHTML='arrow_drop_down';
        value[i].style.color='#e61610';
      }
    }

}


function get_gainers_loosers(){
  var value=document.querySelectorAll('#stock_gain #chance');
  var icon=document.querySelectorAll('#stock_gain i');
  var i;


    for(i=0;i<value.length;i++){
      value[i].innerHTML=parseFloat(value[i].innerHTML).toFixed(2)+"%";
      if(parseFloat(value[i].innerHTML)>0){
        icon[i].style.color='#72bb53';
        icon[i].innerHTML='arrow_drop_up';
        value[i].style.color='#72bb53';
      }
      else{
        icon[i].style.color='#e61610';
        icon[i].innerHTML='arrow_drop_down';
        value[i].style.color='#e61610';
      }
    }

}


function wishlist(){
  var value=document.querySelectorAll('#market_value');
  var icon=document.querySelectorAll('#market_icon i');
  var i;


    for(i=0;i<value.length;i++){
      value[i].innerHTML=parseFloat(value[i].innerHTML).toFixed(2)+"%";
      if(parseFloat(value[i].innerHTML)>0){
        icon[i].style.color='#72bb53';
        icon[i].innerHTML='arrow_drop_up';
        value[i].style.color='#72bb53';
      }
      else{
        icon[i].style.color='#e61610';
        icon[i].innerHTML='arrow_drop_down';
        value[i].style.color='#e61610';
      }
    }

}


function most_active(){
  var value=document.querySelectorAll('#market_box table #value');
  var icon=document.querySelectorAll('#market_box table #icon i');
  var i;


    for(i=0;i<value.length;i++){
      value[i].innerHTML=parseFloat(value[i].innerHTML).toFixed(2)+"%";
      if(parseFloat(value[i].innerHTML)>0){
        icon[i].style.color='#72bb53';
        icon[i].innerHTML='arrow_drop_up';
        value[i].style.color='#72bb53';
      }
      else{
        icon[i].style.color='#e61610';
        icon[i].innerHTML='arrow_drop_down';
        value[i].style.color='#e61610';
      }
    }

}

setInterval(most_active,10);

setInterval(wishlist,10);


setInterval(get_gainers_loosers,10);


setInterval(get_stock_main,10);

function open_left_side_bar(){
  var a=document.getElementById('left_side_bar');
  a.style.left='0px';

}


function close_left_bar(){
  var a=document.getElementById('left_side_bar');
  a.style.left='-80%';
}



function open_left_side_bar(){
  var a=document.getElementById('left_side_bar');
  a.style.left='0px';

}


function close_left_bar(){
  var a=document.getElementById('left_side_bar');
  a.style.left='-80%';
}


function event1(x){
		document.getElementById("text1").value+=x;
}
function event2(){
		var x = document.getElementById("text1").value;
    if(x.toString().indexOf('.') != -1){
    	document.getElementById("text1").value = eval(x).toFixed(2);
    }
    else{
      document.getElementById("text1").value = eval(x);
    }
}

function event3(){
  document.getElementById("text1").value="";
}

function event4(x){
  document.getElementById("text1").value+=x;
}

function open_cal(){
  var g=document.getElementById('calculator_main');
    if(g.style.height=='0px'){
    g.style.height='500px';
    g.style.display='flex';
  }
  else{
    g.style.height='0px';
    g.style.display='none';
  }

}


function open_currency(){
  var g=document.getElementById('currency_main');
    if(g.style.display=='none'){
    g.style.display='flex';
  }
  else{
    g.style.display='none';
  }
}



function input_focus(value){
  var input=document.getElementById(value);
  input.style.borderBottom="1.7px solid #008db1";
}

function input_blur(value){
  var input=document.getElementById(value);
  input.style.border="1.7px solid white";
}

function open_tools(){
  var tools=document.getElementById('tools');
  var stocks=document.getElementById('stocks');
  var market=document.getElementById('market');
  var wishlist=document.getElementById('wishlist');
  var home=document.getElementById('home');
  var menu=document.getElementById('left_side_bar');

  tools.style.display="flex";
  wishlist.style.display="none";
  market.style.display='none';
  home.style.display='none';
  menu.style.left='-80%';
}



function open_market(){
  var tools=document.getElementById('tools');
  var stocks=document.getElementById('stocks');
  var market=document.getElementById('market');
  var wishlist=document.getElementById('wishlist');
  var home=document.getElementById('home');
  var menu=document.getElementById('left_side_bar');

  tools.style.display="none";
  wishlist.style.display="none";
  market.style.display='';
  stocks.style.display='none';
  home.style.display='none';
  menu.style.left='-80%';
}




function open_wishlist(){
  var tools=document.getElementById('tools');
  var stocks=document.getElementById('stocks');
  var market=document.getElementById('market');
  var wishlist=document.getElementById('wishlist');
  var home=document.getElementById('home');
  var menu=document.getElementById('left_side_bar');

  tools.style.display="none";
  wishlist.style.display="block";
market.style.display='none';
stocks.style.display='none';
  home.style.display='none';
  menu.style.left='-80%';
}


function open_home(){
  var tools=document.getElementById('tools');
  var stocks=document.getElementById('stocks');
  var market=document.getElementById('market');
  var wishlist=document.getElementById('wishlist');
  var home=document.getElementById('home');
  var menu=document.getElementById('left_side_bar');
market.style.display='none';
  tools.style.display="none";
  wishlist.style.display="none";
  home.style.display='block';
  menu.style.left='-80%';
}

function open_stocks(){
  var tools=document.getElementById('tools');
  var stocks=document.getElementById('stocks');
  var market=document.getElementById('market');
  var wishlist=document.getElementById('wishlist');
  var home=document.getElementById('home');
  var menu=document.getElementById('left_side_bar');
  wishlist.style.display="none";
  tools.style.display="none";
  stocks.style.display='block';
  home.style.display='none';
  market.style.display='none';
  menu.style.left='-80%';
}


function open_tech() {
  var g=document.getElementById('tech_main');
    if(g.style.display=='none'){
    g.style.display='flex';
  }
  else{
    g.style.display='none';
  }
}


function get_currency(str1,str2,text){
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("currency_text2").value =
            this.responseText;
          }

    }
    xhttp.open("GET", "currency.php?amount="+text+"&from="+str1+"&to="+str2+"", true);
   xhttp.send();
}


function get_stock1(str){
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("table").innerHTML =
            this.responseText;
          }

    }
    xhttp.open("GET", "get_stock.php?type="+str+"", true);
   xhttp.send();
}
