var st = document.querySelector(".st");

var checkfac = document.querySelector(".checkfac");

var fac = document.querySelector(".fac");
var checkstud = document.querySelector(".checkstud");
var student = document.querySelector(".student");
var addstud = document.querySelector(".addstud");

checkfac.addEventListener("click", function () {
  display_student.style.display = "block";
});
addfac.addEventListener("click", function () {
  display_student.style.display = "none";
});
checkstud.addEventListener("click", function () {
  student.style.display = "block";
});
addstud.addEventListener("click", function () {
  student.style.display = "none";
});

var dropdown_content = document.querySelector(".dropdown-content");
var dropdown_content1 = document.querySelector(".dropdown-content1");
var count = 1;
st.addEventListener("click", function () {
  if (count == 1) {
    dropdown_content1.style.display = "block";
    count = 0;
  } else {
    dropdown_content1.style.display = "none";
    count = 1;
  }
});
var count1 = 1;
fac.addEventListener("click", function () {
  if (count1 == 1) {
    dropdown_content.style.display = "block";
    count1 = 0;
  } else {
    dropdown_content.style.display = "none";
    count1 = 1;
  }
});

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

// Function to close the sidebar
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

// Function to generate a timetable for a single section with provided subjects
