$(document).ready(function () {
  console.log("isMobile", isMobile());
  AOS.init();
  $(".menu").click(function () {
    $(this).toggleClass("open menu--white");
    $(".nav-menu").toggleClass("open");
    $(".header").toggleClass("header--in-overlay");
  });

  initMainPage();
  initJobDetailPage();
  initRecruitmentPage();
  initNewsDetailPage();

  $(document).on("scroll", () => {
    if ($("main#page-job-detail").length) return;
    if ($("#page-news-detail").length) return;
    // if ($("body").hasClass("recruitment")) {
    if ($(window).scrollTop() > 10) {
      $(".header").removeClass("header--transparent");
    } else {
      $(".header").addClass("header--transparent");
    }
    // }
  });
});

const initNewsDetailPage = () => {
  if ($("#page-news-detail").length === 0) return;
  $(".header").removeClass("header--transparent");
}

const initDevelopmentSlider = () => {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  let sections = gsap.utils.toArray(".development-path__panel");
  const panelsContainer = document.querySelector(".development-path");
  let scrollTrigger;
  const a = gsap.to(sections, {
    xPercent: -100 * (sections.length - 1),
    ease: "none",
    scrollTrigger: {
      trigger: ".development-path",
      pin: true,
      scrub: 1,
      start: "top top",
      // markers: true,
      onEnter: (res) => {
        scrollTrigger = res;
      },
      // onUpdate: (self) => console.log("direction:", self),
      // snap: 1 / (sections.length - 1),
      // end: () => "+=" + panelsContainer.offsetWidth,
      end: () => "+=" + panelsContainer.offsetWidth,
    },
  });

  let prev = document.querySelector("#development-path-prev");
  prev.addEventListener("click", (event) => {
    handleClickSlide("prev");
  });

  let next = document.querySelector("#development-path-next");
  next.addEventListener("click", (event) => {
    handleClickSlide("next");
  });

  const handleClickSlide = (option) => {
    if (!scrollTrigger) return;
    const distance =
      (scrollTrigger.end - scrollTrigger.start) / (sections.length - 1);
    const offsets = sections.map((r, idx) => {
      return scrollTrigger.start + distance * idx;
    });

    let index;
    if (option === "next") {
      index = offsets.findIndex((s) => s > window.scrollY);
    } else {
      index = offsets.findIndex((s) => s > window.scrollY - 2);
    }

    if (option === "prev") {
      index = index - 1;
    }
    if (index === -1) return;

    gsap.to(window, {
      scrollTo: `${offsets[index] + 1}`,
      duration: 0.5,
    });
  };

  // window.addEventListener("resize");
};

const paralaxImage = () => {
  var timeout;
  $(".life__right").mousemove(function (e) {
    if (timeout) clearTimeout(timeout);
    setTimeout(callParallax.bind(null, e), 200);
  });

  function callParallax(e) {
    parallaxIt(e, ".life__img-1", -100);
    parallaxIt(e, ".life__img-2", -70);
    parallaxIt(e, ".life__img-3", -50);
    parallaxIt(e, ".life__img-4", -30);
  }

  function parallaxIt(e, target, movement) {
    var $this = $(".life__right");
    var relX = e.pageX - $this.offset().left;
    var relY = e.pageY - $this.offset().top;

    TweenMax.to(target, 1, {
      x: ((relX - $this.width() / 2) / $this.width()) * movement,
      y: ((relY - $this.height() / 2) / $this.height()) * movement,
      ease: Power2.easeOut,
    });
  }
};


const initRecruitmentPage = () => {
  if ($("main#page-recruitment").length === 0) return;

  const $jobs = $(".banner__jobs span");
  let jobCount = 0;
  const jobInterval = setInterval(() => {
    if (jobCount === $jobs.length) return clearInterval(jobInterval);
    $jobs.removeClass("active");
    jobCount++;
    $(`.banner__jobs span:nth-child(${jobCount})`).addClass("active");
  }, 2000);

  const swiper = new Swiper(".quote-swiper", {
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // hande search job
  $(".search .btn-search").on('click', () => {
    const textValue = $(".search__job").val() || '';
    const selectValue = $(".search__department").val() || '';
    jobList.forEach(job => {
      if ((job.post_title.toLowerCase() || '').includes(textValue.toLowerCase()) &&
        (job.department.toLowerCase() || '').includes(selectValue.toLowerCase())
      ) {
        $(`#job__card-${job.ID}`).show();
      } else {
        $(`#job__card-${job.ID}`).hide();
      }
    })
  });

  //
  $('.banner__text .btn-primary').on('click',function(e){
    e.preventDefault();
    var element= $(this).attr('href');
    var header = $('.header').innerHeight();
    $('html, body').animate({
      scrollTop: $(element).offset().top - header
    }, 700);
  })
};

const initJobDetailPage = () => {
  if ($("main#page-job-detail").length === 0) return;

  const distance = () => {
    // Get the top element and the full page height
    const targetElement = document.querySelector("footer"); // Replace 'top-element-id' with the actual ID of the top element
    // Get the element you want to measure

    // Get the dimensions and position of the element relative to the viewport
    const elementRect = targetElement.getBoundingClientRect();

    // Calculate the height of the visible part of the element in the viewport
    const visibleHeight =
      Math.min(elementRect.bottom, window.innerHeight) -
      Math.max(elementRect.top, 0);

    return visibleHeight + 50;
  };

  const setContentPadding = () => {
    $(".job-detail__content").css(
      "padding-top",
      $(".job-detail__title").outerHeight()
    );
  };
  $(".modal__close").on("click", () => {
    $("#recruitment-modal").toggleClass("hidden");
  });

  $("#open-send-cv-form").on("click", () => {
    $("#recruitment-modal").removeClass("hidden");
  });

  if (isMobile()) {
    setTimeout(() => {
      setContentPadding();
    }, 500);
  }

  $(window).bind("scroll", function () {
    if (!isMobile()) {
      if (distance() > 0) {
        $(".job-detail__title").css("top", -distance() + "px");
      } else {
        $(".job-detail__title").css("top", 0);
      }
    } else {
      if (window.scrollY > 10) {
        $(".job-detail").addClass("simple");
      } else {
        $(".job-detail").removeClass("simple");
      }

      setTimeout(() => {
        setContentPadding();
      }, 500);
    }
  });
};

const initMainPage = () => {
  if ($("main#page-main").length === 0) return;

  if (isMobile()) {
    const qualitySwiper = new Swiper(".quality.swiper", {
      loop: true,
      // slidesPerView: "auto",
      slidesPerView: "auto",
      centeredSlides: true,
      spaceBetween: 16,
      navigation: {
        // nextEl: "#development-path-next",
        // prevEl: "#development-path-prev",
      },
    });

    const swiper = new Swiper(".development-path", {
      // loop: true,
      slidesPerView: "auto",
      navigation: {
        nextEl: "#development-path-next",
        prevEl: "#development-path-prev",
      },
    });
  } else {
    initDevelopmentSlider();
    paralaxImage();
  }
};

const isMobile = () => {
  return $(window).width() <= 768;
};

