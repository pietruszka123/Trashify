const switchToggle = document.querySelector("#switch-toggle");
const html = document.querySelector("html");
let isDarkmode = false;
const localDarkmode = JSON.parse(localStorage.getItem("isDarkmode"));
const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`;
const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`;
// Jika ada isDarkmode di localstorage
if (localDarkmode) {
  isDarkmode = localDarkmode;
  html.classList.add("dark");
} else {
  html.classList.remove("dark");
}
function toggleTheme() {
  isDarkmode = !isDarkmode;
  localStorage.setItem("isDarkmode", isDarkmode);
  switchTheme();
}
function switchTheme() {
  if (isDarkmode) {
    html.classList.add("dark");
    switchToggle.classList.remove("bg-yellow-500", "-translate-x-2");
    switchToggle.classList.add("bg-gray-700", "translate-x-full");
    setTimeout(() => {
      switchToggle.innerHTML = darkIcon;
    }, 250);
  } else {
    html.classList.remove("dark");
    switchToggle.classList.add("bg-yellow-500", "-translate-x-2");
    switchToggle.classList.remove("bg-gray-700", "translate-x-full");
    setTimeout(() => {
      switchToggle.innerHTML = lightIcon;
    }, 250);
  }
}
switchTheme();
const mainMenu = document.querySelector(".mainMenu");
const closeMenu = document.querySelector(".closeMenu");
const openMenu = document.querySelector(".openMenu");

openMenu.addEventListener("click", show);
closeMenu.addEventListener("click", close);

function show() {
  mainMenu.style.display = "flex";
  mainMenu.style.top = "0";
}
function close() {
  mainMenu.style.top = "-100%";
}
