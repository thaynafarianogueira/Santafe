function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


var currentIndex = 0;
var items = $('.carousel-item');
var totalItems = items.length;

$(document).ready(function () {
  

  $('.carousel-control').click(function () {
    var direction = $(this).hasClass('prev') ? -1 : 1;
    currentIndex = (currentIndex + direction + totalItems) % totalItems;
    updateCarousel();
  });

  $('#sendLeadForm').click(function () {
    var formData = $('#leadForm').serialize()
    $.ajax({
      type: 'POST',
      url: 'assets/form.php',
      data: formData,
      success: function (response) {
        alert('Seja bem vindo! Em breve iremos entrar em contato com você');
        $('#leadForm')[0].reset() // reseta o formulário
      },
      error: function () {
        alert('Erro ao processar o formulário');
      }
    });
  })

});

const controls = document.querySelectorAll(".control");
let currentItem = 0;
// const items = document.querySelectorAll(".item");
const maxItems = items.length;

function updateCarousel() {
  var leftValue = -currentIndex * 100 + '%';
  $('.carousel-inner').css('transform', 'translateX(' + leftValue + ')');
}





