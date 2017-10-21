
function openNav() {
	if($(window).width() < 960){
    document.getElementById("mySidenav").style.width = "250px";
}else{
	  function regularNav(){  document.getElementById("mySidenav").style.width = "50%";
}
}

}

function closeNav() {
	if($(window).width() < 960){
    document.getElementById("mySidenav").style.width = "0";
}else{
    document.getElementById("mySidenav").style.width = "50%";
}

}
