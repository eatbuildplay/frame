(function($) {

  console.log('hello hello 3')



  var wordscan = {

    init: function() {

      console.log( wordscanWords )

      $('.wordscan-start').on('click', wordscan.start)

    },

    start: function() {

      // hide start
      $('.wordscan-start').hide()

      // get template
      var template = $('#wordscan-word-template').html()

      // replace tags with content data
      var word = wordscanWords[0]
      template = template.replace('{word}', word.word)
      template = template.replace('{translation}', word.translation)
      template = template.replace('{pronunciation}', word.pronunciation)

      // render content
      $('.lesson-section-wordscan').append( template )

    }

  }
  wordscan.init()

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
