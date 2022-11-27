

document.writeln("<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>");
document.writeln("<script type='text/javascript' src='https://cdn../js.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>");

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active"))
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

function off(){
  document.getElementById("divGrande").style.display = "none";
}