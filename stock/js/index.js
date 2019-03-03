function search(){
var search=document.getElementById('search_input');
var icon=document.getElementById('search_icon');
if(search.value){
  icon.style.color='grey';
}
else{
  icon.style.color='white';
}
}

setInterval(search,10);

function open_profile_menu(){
  var a=document.getElementById('profile_menu');
  a.style.right="0px";
  a.style.border="-10px 0px 20px 0px rgba(173,171,173,1)";
}

function close_profile_menu(){
  var a=document.getElementById('profile_menu');
  a.style.right="-150px";
  a.style.boxShadow="none";
}

window.onload=get_stock_main;

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


function pop_up(){
  var a=document.getElementById('pop_up');
  a.style.display='flex';
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


  home.style.display='none';
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
