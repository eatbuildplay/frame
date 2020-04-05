(function($) {

  $('.flashcard').on('click', function() {

    console.log('flashcard flipped!')
    $(this).find('.flashcard-down').addClass('flashcard-active')
    $(this).find('.flashcard-up').removeClass('flashcard-active')

  })

})( jQuery );
