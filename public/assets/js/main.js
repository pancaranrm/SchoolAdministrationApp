let btn = document.querySelector("#btn");
let btn2 = document.querySelector("#btn-show-sidebar");
let sidebar = document.querySelector(".sidebar");
const linkColor = document.querySelectorAll(".nav_link");
const linkExport = document.querySelectorAll(".btn-export");
let currentLocation = location.href;
const menuLength = linkColor.length;
const exportLength = linkExport.length;

btn.onclick = function () {
  sidebar.classList.toggle("active");
  setTimeout(() => {
    if ($(".img-menu-on-menu").length > 0)
      $(".img-menu-on-menu").css(
        "height",
        $(".img-menu-on-menu").width() + "px"
      );
  }, 300);
};

btn2.onclick = function () {
  sidebar.classList.toggle("active");
  setTimeout(() => {
    if ($(".img-menu-on-menu").length > 0)
      $(".img-menu-on-menu").css(
        "height",
        $(".img-menu-on-menu").width() + "px"
      );
  }, 300);
};

for (let i = 0; i < menuLength; i++) {
  if (currentLocation.split("?").length > 1) {
    currentLocation = currentLocation.split("?")[0];
  }
  
  if (linkColor[i].href === currentLocation) {
    linkColor[i].classList = "menu_active";
  }
}

for (let i = 0; i < exportLength; i++) {
  if (currentLocation.split("?").length > 1) {
    currentLocation = currentLocation.split("?")[0];
  }
  
  if (linkExport[i].href === currentLocation) {
    linkExport[i].classList = "export_active";
  }
}

if ($(".img-menu-on-menu").length > 0)
  $(".img-menu-on-menu").css("height", $(".img-menu-on-menu").width() + "px");

window.addEventListener(
  "resize",
  function (event) {
    setTimeout(() => {
      if ($(".img-menu-on-menu").length > 0)
        $(".img-menu-on-menu").css(
          "height",
          $(".img-menu-on-menu").width() + "px"
        );
    }, 300);
  },
  true
);

function setsetLocalstorage(){
  if(JSON.parse(localStorage.getItem('StatusSide')) != null){
    if(JSON.parse(localStorage.getItem('StatusSide')).status){
      localStorage.setItem('StatusSide', JSON.stringify({
        status : false
      })); 
    } else {
      localStorage.setItem('StatusSide', JSON.stringify({
        status : true
      })); 
    }
  } else {
    localStorage.setItem('StatusSide', JSON.stringify({
      status : true
    })); 
  }
}

if(JSON.parse(localStorage.getItem('StatusSide')) != null){
  if(JSON.parse(localStorage.getItem('StatusSide')).status){
    sidebar.classList.add("active");
  } else {
    sidebar.classList.remove("active");
  }
} 

document.onkeydown = function (e) {
  if (
    (e.ctrlKey && e.shiftKey && e.key == "J") ||
    (e.ctrlKey && e.shiftKey && e.key == "j")
  ) {
    return false;
  }

  if (
    (e.ctrlKey && e.shiftKey && e.key == "I") ||
    (e.ctrlKey && e.shiftKey && e.key == "i")
  ) {
    return false;
  }

  if (
    (e.ctrlKey && e.shiftKey && e.key == "C") ||
    (e.ctrlKey && e.shiftKey && e.key == "c")
  ) {
    return false;
  }

  if ((e.ctrlKey && e.key == "U") || (e.ctrlKey && e.key == "u")) {
    return false;
  }

  if (
    (e.ctrlKey && e.key == "b") ||
    (e.ctrlKey && e.key == "B")
  ) {
    if(JSON.parse(localStorage.getItem('StatusSide')) != null){
      if(JSON.parse(localStorage.getItem('StatusSide')).status){
        localStorage.setItem('StatusSide', JSON.stringify({
          status : false
        })); 
        sidebar.classList.remove("active");
      } else {
        localStorage.setItem('StatusSide', JSON.stringify({
          status : true
        })); 
        sidebar.classList.add("active");
      }
    } else {
      localStorage.setItem('StatusSide', JSON.stringify({
        status : true
      })); 
      sidebar.classList.add("active");
    }
  }
};

document.getElementById("btn").addEventListener("click", (e) => {
  setsetLocalstorage();
});

document.getElementById("btn-show-sidebar").addEventListener("click", (e) => {
  setsetLocalstorage();
});