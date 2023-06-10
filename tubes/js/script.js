const keyword = document.getElementById("keyword");
const searchContainer = document.getElementById("search-container");
const searchBtn = document.getElementById("search-button");

// // cara ku
// keyword.addEventListener("keyup", function () {
//   fetch("ajax/searchadmin.php?keyword=" + keyword.value)
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

// preview Image untuk tambah dan ubah

// function previewImage() {
//   const gambar = document.querySelector(".gambar");
//   const imgPreview = document.querySelector(".img-preview");

//   const oFReader = new FileReader();
//   oFReader.readAsDataURL(gambar.files[0]);

//   oFReader.onload = function (oFREvent) {
//     imgPreview.src = oFREvent.target.result;
//   };
// }

// function previewImage() {
//   const gambar = document.querySelector("#gambar");
//   const imgPreview = document.querySelector("#img-preview");

//   const oFReader = new FileReader();
//   oFReader.readAsDataURL(gambar.files[0]);

//   oFReader.onload = function (oFREvent) {
//     imgPreview.src = oFREvent.target.result;
//   };
// }

// function previewImage() {
//   const gambar = document.querySelector('#gambar');
//   const imgPreview = document.querySelector('#img-preview');

//   const oFReader = new FileReader();
//   oFReader.readAsDataURL(gambar.files[0]);

//   oFReader.onload = function (oFREvent) {
//     imgPreview.src = oFREvent.target.result;
//   };
// }

function previewImage() {
  const gambar = document.querySelector(".gambar");
  const imgPreview = document.querySelector(".img-preview");

  if (gambar.files && gambar.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imgPreview.src = e.target.result;
    };
    reader.readAsDataURL(gambar.files[0]);
  } else {
    imgPreview.src = "../img/nophoto.jpg";
  }
}

var carousel = new bootstrap.Carousel(document.querySelector("#carouselExampleCaptions"));

// Tambahkan event listener saat slide berganti
carousel.onslide = function () {
  var indicators = document.querySelectorAll(".carousel-indicators button");
  var activeIndex = carousel._activeIndex;

  // Hapus class active dari semua tombol indikator
  indicators.forEach(function (indicator) {
    indicator.classList.remove("active");
  });

  // Tambahkan class active pada tombol indikator slide saat ini
  indicators[activeIndex].classList.add("active");
};

function goBack() {
  window.history.back();
}
