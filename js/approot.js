$(document).ready(function() {            
            $('ul li:has(a)').hover(
            function(e)
            {
                $(this).find('div').css({display: "block"});
            },
            function(e)
            {
                $(this).find('div').css({display: "none"});
            }
            );
      
            
            $('#main-slider').slider();
            $('.whole-click').bind('click', function(e) {
                   e.preventDefault();
                   e.stopPropagation();
                   document.location = $(this).find('a:first').attr('href');
             })
              .css({cursor: 'pointer'})
              .find('a').css({textDecoration: 'none'});
      
            $('.center-from-parent').each(function() {
                  var ph = $(this).parent().height()
                          , th = $(this).outerHeight();
                  if (th >= ph && $(this).hasClass('ifsmaller'))
                      return;
                  $(this).css($(this).hasClass('pad') ? 'padding-top' : 'margin-top', (ph - th) / 2);
                  });
});            
            
jQuery.fn.slider = function(args) {
    if (!args)
        args = {};

    var $slider = $(this)
            , $window = $slider.find('.slider-slider')
            , $slides = $window.children('.slide')
            , $nav = $slider.find('.slider-nav a')
            , $navdots = $slider.find('.slider-dots')
            , count = $slides.length
            , current = 1
            , slide_width = $slides.outerWidth()
            , total_width = slide_width * count
            , timer = false
            , interval = args.interval || 3000;

    $window.css({'width': total_width});
    $slides.css({'float': 'left'});

    $slider.bind('mouseenter', function(e) {
        stop_timer();
    }).bind('mouseleave', function(e) {
        start_timer();
    });

    $(window).load(function() {
        $slides.each(function() {
            var $div = $(this).find('.title > div')
                    , $a = $div.find('a');
            if ($a.width() > $div.width()) {
                $div.css({maxWidth: $a.width()});
            }
        });
    });

    function slide(d, freeze) {
        current += d;
        if (current < 1)
            current = count;
        if (current > count)
            current = 1;

        $window.stop().animate({'marginLeft': (current - 1) * slide_width * -1});

        $navdots.children().removeClass('selected');
        $navdots.children().eq(current - 1).addClass('selected');

        if (!freeze)
            start_timer();
    }

    function stop_timer() {
        clearTimeout(timer);
        timer = false;
    }

    function start_timer() {
        if (timer)
            stop_timer();
        timer = setTimeout(function() {
            slide(1);
        }, interval);
    }

    $nav.bind('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('arrow-left')) {
            current--;
            if (current < 1)
                current = count;
        } else {
            current++;
            if (current > count)
                current = 1;
        }
        slide(0);
    });

    if ($navdots.length) {
        for (var i = 0; i < count; i++) {
            $('<a/>', {href: '#'}).appendTo($navdots);
        }
    }
    $navdots.delegate('a', 'click', function(e) {
        e.preventDefault();
        current = $(this).index() + 1;
        slide(0);
    });

    slide(0);
};

jQuery.email_verify = function(email) {
    return /^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/.test(email);
};