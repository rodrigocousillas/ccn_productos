$(document).ready(function() {

  $(".variable").slick({
    arrows: true,  
    dots: false,
    autoplay: false, /* this is the new line */
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 5000
  });

  $(".slideHome").slick({
    arrows: false,  
    dots: false,
    autoplay: true, /* this is the new line */
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear'
  });

  $('.center').slick({
    arrows: true,
centerMode: true,
centerPadding: '0px',
slidesToShow: 1,
   slidesToScroll: 1,
delay: 200,
responsive: [

  {
    breakpoint: 1369,
    settings: {
      slidesToShow: 1,
        centerPadding: '0px',
    }
},
{

 breakpoint: 768,
 settings: {
    dots: true,
   arrows: false,
   centerMode: true,
   centerPadding: '0px',
   slidesToShow: 1,
   slidesToScroll: 1
 }
}
]
});

  $('.sliderCenter').slick({
    centerMode: true,
    centerPadding: '450px',
    slidesToShow: 1,
    arrows: true,
    infinite: true,
    responsive: [

      {
        breakpoint: 1690,
        settings: {
            centerPadding: '350px',
        }
    },

      {
        breakpoint: 1441,
        settings: {
            centerPadding: '350px',
        }
    },

    {
      breakpoint: 1369,
      settings: {
          centerPadding: '300px',
      }
  },


  {
    breakpoint: 1266,
    settings: {
        centerPadding: '280px',
    }
},

        {
            breakpoint: 1225,
            settings: {
                centerPadding: '150px',
            }
        },

        {
          breakpoint: 968,
          settings: {
            centerMode: true,
              centerPadding: '0px',
              arrows: false,
              infinite: true,
              dots: true,

          }
      }
    ]
});

$('.sliderRatios').slick({
  centerMode: true,
  centerPadding: '250px',
  slidesToShow: 1,
  arrows: false,
  infinite: false,
  responsive: [
  {
    breakpoint: 1369,
    settings: {
        centerPadding: '80px',
    }
},
      {
          breakpoint: 1025,
          settings: {
              centerPadding: '50px',
          }
      },
      {
          breakpoint: 780,
          settings: {
              centerPadding: '50px',
          }
      },

      {
          breakpoint: 500,
          settings: {
              centerPadding: '0px',
          }
      },

  ]
});


}); 


$(".scroll").on('click', function(event) {
  $('.scroll').removeClass('active');
  $(this).addClass('active');

  if (this.hash !== "") {
    event.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top - 300
    }, 1000, function(){
      window.location.hash = hash;
    });
  } 
});

$('.tab:first').addClass('active');

$(".tab").on('click', function(e) {
  e.preventDefault();
  var slideno = $(this).data('slide');
  $('.sliderRatios').slick('slickGoTo', slideno - 1);
  $('.tab').removeClass('active');
  $(this).addClass('active');
});

