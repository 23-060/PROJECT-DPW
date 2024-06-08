var countDownDate = new Date("May 11, 2024 9:00:00").getTime();

var x = setInterval(function () {
  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("textDisplay").innerHTML =
    days + " D : " + hours + " H : " + minutes + " M : " + seconds + " S";

  var done = "0d:0h:0m:0s";
  var teks = "Thank you for being here for a long time";
  var count = -1;
  if (distance < 1) {
    clearInterval(x);
    document.getElementById("textDisplay").innerHTML = done;
    var y = setInterval(function () {
      done = done.slice(done.lenght, count);
      document.getElementById("textDisplay").innerHTML = done;
      count -= 1;
      if (done.length == 0) {
        clearInterval(y);
        count = 1;
        var z = setInterval(function () {
          var pesan = teks.slice(teks.lenght, count);
          count += 1;
          document.getElementById("textDisplay").innerHTML = pesan;
          if (teks.length == pesan.length) {
            clearInterval(z);
          }
        }, 200);
      }
    }, 200);
  }
}, 1000);
