
$(function() {
  smoothScroll(1000);
  workBelt();
  changeTestimonial();
  contactForm();
});

function smoothScroll (duration) {
  $('a[href^="#"]').on('click', function(event) {
    var target = $( $(this).attr('href') );
    if( target.length ) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, duration);
    }
  });
}

function workBelt() {
  $('.thumb-unit').on('click', function(event) {
    var $this = $(this),
        $project = '.project-' + $this.attr('class').split(' ')[1].split('-').pop();
    $($project).show();
    $('.work-belt').css('left', '-100%');
    $('.work-container').show();
    $('html, body').animate({
      scrollTop: $('#work').offset().top
    }, 1000);

  });
  $('.work-return').on('click', function(event) {
    $('.work-belt').css('left', '0%');
    $('.work-container').hide(800);
    $('*[class^="project-"]').hide(800);
  });
}


function changeTestimonial() {

  $('.client-unit').first().addClass('active-unit');
  $('.client-logo').first().addClass('active-client');

  $('.client-control-prev').on('click', function(event) {
    var $units = $('.active-unit').parent().children(),
        $logos = $('.active-client').parent().children(),
        position = $units.index($('.active-unit'));
    $('.client-unit').removeClass('active-unit');
    $('.client-logo').removeClass('active-client');
    if(position==0) {
      $($units.last()).addClass('active-unit');
      $($logos.last()).addClass('active-client');
    } else {
      $($units[position-1]).addClass('active-unit');
      $($logos[position-1]).addClass('active-client');
    }
  });

  $('.client-control-next').on('click', function(event) {
    var $units = $('.active-unit').parent().children(),
        $logos = $('.active-client').parent().children(),
        position = $units.index($('.active-unit'));
    $('.client-unit').removeClass('active-unit');
    $('.client-logo').removeClass('active-client');
    if(position==$units.length-1) {
      $($units.first()).addClass('active-unit');
      $($logos.first()).addClass('active-client');
    } else {
      $($units[position+1]).addClass('active-unit');
      $($logos[position+1]).addClass('active-client');
    }
  });

  $('.client-logo').on('click', function(event) {
    var $this = $(this),
        $logos = $this.parent().children(),
        $units = $('.active-unit').parent().children(),
        position = $logos.index($this);
    $('.client-unit').removeClass('active-unit').eq(position).addClass('active-unit');
    $('.client-logo').removeClass('active-client').eq(position).addClass('active-client');
  });
}

function contactForm() {
  
  $('#contactForm').on('submit',function(e){

    e.preventDefault();

    var $action = $(this).prop('action');
    var $data = $(this).serialize();
    var $this = $(this);

    $this.prevAll('.alert').remove();

    $.post( $action, $data, function( data ) {

      if( data.response=='error' ){
        $this.before( '<div class="alert alert-danger">'+data.message+'</div>' );
      }

      if( data.response=='success' ){
        $this.before( '<div class="alert alert-success">'+data.message+'</div>' );
        $this.find('input, textarea').val('');
      }

    }, "json");
  });
}
