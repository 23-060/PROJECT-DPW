// side bar

const sideBar = document.querySelector(".sidebar");
const sideBarButton = document.querySelector("#sideBarButton");

sideBarButton.onclick = () => {
  sideBar.classList.toggle("active");
};

document.addEventListener("click", function (e) {
  if (!sideBarButton.contains(e.target) && !sideBar.contains(e.target)) {
    sideBar.classList.remove("active");
  }
});

// back to top button
function goToTop() {
  document.body.top = 0;
}

// dark theme toggle

var theme = localStorage.getItem("theme");
if (!theme) {
  var prefersDark = window.matchMedia("(prefers-color-scheme: dark)");
  theme = prefersDark ? "dark" : "light";
}
setTheme(theme);

function setTheme(theme) {
  localStorage.setItem("theme", theme);
  document.documentElement.setAttribute("data-theme", theme);
}

document.addEventListener("DOMContentLoaded", onLoad);

function onLoad() {
  var darkModeToggle = document.getElementById("dark-mode-toggle");
  if (darkModeToggle) {
    darkModeToggle.addEventListener("click", function (_) {
      var currentTheme = localStorage.getItem("theme");
      setTheme(currentTheme == "dark" ? "light" : "dark");
    });
  }
}
