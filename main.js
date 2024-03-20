const searchButton = document.querySelector('.search');
const searchInput = document.querySelector('.search-input');

searchButton.addEventListener('click', function() {
    if (searchInput.classList.contains('hidden')) {
        searchInput.classList.remove('hidden');
    } else {
        searchInput.classList.add('hidden');
    }
});

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");

var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}