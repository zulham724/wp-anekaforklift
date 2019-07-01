jQuery(document).ready(function($){
   
});
function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " w3-green";
}
