//start Of Document-------------------------------------------------------------
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// for Charts Code--------------------------------------------------------------

//End of Chart Codes------------------------------------------------------------

//For tables Code---------------------------------------------------------------
$(document).ready(function () {
  $("#example").each(function (_, table) {
    $(table).DataTable();
  });
});
//End tables Code---------------------------------------------------------------

//Script for changing background-----------------------------------------------
const btn = document.querySelector(".btn-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

const currentTheme = localStorage.getItem("theme");
if (currentTheme == "dark") {
  document.body.classList.toggle("dark-theme");
} else if (currentTheme == "light") {
  document.body.classList.toggle("light-theme");
}

btn.addEventListener("click", function () {
  if (prefersDarkScheme.matches) {
    document.body.classList.toggle("light-theme");
    var theme = document.body.classList.contains("light-theme")
      ? "light"
      : "dark";
  } else {
    document.body.classList.toggle("dark-theme");
    var theme = document.body.classList.contains("dark-theme")
      ? "dark"
      : "light";
  }
  localStorage.setItem("theme", theme);
});
//End of for changing background-----------------------------------------------
