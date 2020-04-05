(function($) {

  // flashcard click
  $('.flashcard-up').on('click', function() {

    console.log('flashcard flipped!')
    $(this).siblings('.flashcard-down').addClass('flashcard-active')
    $(this).removeClass('flashcard-active')

  })

  // flashcards reset
  $('.flashcard-reset').on('click', function() {
    $('.flashcard-down').removeClass('flashcard-active')
    $('.flashcard-up').addClass('flashcard-active')
  })

  // flashcard answer
  $('.flashcard button').on('click', function() {
    console.log('selected button...')
  })


  /*
   * Word selection
   */
   $('.word-selection-word button').on('click', function() {
     console.log('selected word...')
   })

})( jQuery );
