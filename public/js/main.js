(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner(0);

  // Initiate the wowjs
  new WOW().init();

  // Fixed Navbar
  $(window).scroll(function () {
    if ($(window).width() < 992) {
      if ($(this).scrollTop() > 45) {
        $(".fixed-top").addClass("bg-white shadow");
      } else {
        $(".fixed-top").removeClass("bg-white shadow");
      }
    } else {
      if ($(this).scrollTop() > 45) {
        $(".fixed-top").addClass("bg-white shadow").css("top", -45);
      } else {
        $(".fixed-top").removeClass("bg-white shadow").css("top", 0);
      }
    }
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Testimonial carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    dots: false,
    loop: true,
    margin: 25,
    nav: true,
    navText: [
      '<i class="bi bi-arrow-left"></i>',
      '<i class="bi bi-arrow-right"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });
})(jQuery);

// Fungsi Kalender dipindahkan ke lingkup global agar dapat diakses oleh event.html

function buildISO(y, m, d) {
  // m can be outside 0-11; normalize
  const dt = new Date(y, m, d);
  const yyyy = dt.getFullYear();
  const mm = String(dt.getMonth() + 1).padStart(2, "0");
  const dd = String(dt.getDate()).padStart(2, "0");
  return `${yyyy}-${mm}-${dd}`;
}

function appendDayCell(y, m, d, otherMonth) {
  // grid dan events harus didefinisikan secara global di event.html
  const cell = document.createElement("div");
  cell.className = "calendar-day" + (otherMonth ? " other-month" : "");
  const dateStr = buildISO(y, m, d);

  // cek apakah ini hari ini
  const today = new Date();
  const todayStr = buildISO(
    today.getFullYear(),
    today.getMonth(),
    today.getDate()
  );
  if (dateStr === todayStr && !otherMonth) {
    cell.classList.add("today");
  }

  const dateEl = document.createElement("div");
  dateEl.className = "date";
  dateEl.textContent = d;
  cell.appendChild(dateEl);

  // attach events if any
  if (events[dateStr]) {
    events[dateStr].forEach((ev) => {
      const a = document.createElement("a");
      a.href = "#";
      a.className = "event-pill";
      a.textContent = ev.title + " • " + ev.time;
      a.addEventListener("click", (e) => {
        e.preventDefault();
        alert(ev.title + "\nTanggal: " + dateStr + "\nWaktu: " + ev.time);
      });
      cell.appendChild(a);
    });
  }

  grid.appendChild(cell);
}
