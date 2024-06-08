$(document).ready(function () {
  $(".premiumm").on("click", function () {
    $(".premiumm").css("border", "2px solid black");
    
    $(this).css("border", "2px solid white");
  });
  $(".premiummm").on("click", function () {
    $(".premiummm").css("border", "2px solid black");
    
    $(this).css("border", "2px solid white");
  });
  $('.profil img').hover(
    function() {
        $(this).attr('src', 'img/hover.png');
    }, 
    function() {
        // Kembalikan gambar asli saat tidak di-hover
        $(this).attr('src', 'img/Nerdhida.jpg');
    }
  );
  $("#tombol").on("click", function () {
    alert("Uang Tidak Cukup");
  });
});

