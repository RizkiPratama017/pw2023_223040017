const keyword = document.getElementById("keyword");
const searchContainer = document.getElementById("search-container");
const searchBtn = document.getElementById("search-button");

// // cara ku
// keyword.addEventListener("keyup", function () {
//   fetch("ajax/search.php?keyword=" + keyword.value)
//     .then((response) => response.text())
//     .then((text) => (searchContainer.innerHTML = text));
// });

// searchBtn.style.display = "none";

// cara bapa
// keyword.onkeyup = function () {
//   fetch("result.php?keyword=" + keyword.value)
//     .then((response) => response.text())
//     .then((text) => (searchContainer.innerHTML = text));
// };

keyword.oninput = function () {
  fetch("ajax/search.php?search=1&keyword=" + keyword.value)
    .then((response) => response.text())
    .then((data) => {
      searchContainer.innerHTML = data;
    })
    .catch((error) => {
      console.log("Error: ", error);
    });
};
