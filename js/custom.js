//Second Raw
function openGroup(groupName) {
    var i;
    var x = document.getElementsByClassName("group");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(groupName).style.display = "block";  
}

//MyFunctions

function myFunction() {
  document.getElementById("demo").innerHTML = "Hello World";
}


//Open Leftsidebar

function openLeftSidebar(sideName) {
    var i;
    var x = document.getElementsByClassName("LeftSidebar");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(sideName).style.display = "block";
    
}

//pretrazi refresh

function refreshPretrazi() {
    var ifr = document.getElementsByName('pretrazi')[0];
    ifr.src = ifr.src;
}

//iframe refresh

function refreshIframe() {
    var ifr = document.getElementsByName('dodaj')[0];
    ifr.src = ifr.src;
}

//obrisi refresh

function refreshObrisi() {
    var ifr = document.getElementsByName('obrisi')[0];
    ifr.src = ifr.src;
}

//izmeni refresh

function refreshIzmeni() {
    var ifr = document.getElementsByName('izmjeni')[0];
    ifr.src = ifr.src;
}
