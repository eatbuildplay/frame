(function($) {

  var wordscan = {

    wordIndex: 0,

    init: function() {

      console.log( wordscanWords )

      $('.wordscan-start').on('click', wordscan.start)
      $( document ).on('click', '.wordscan-controls button', wordscan.rating)

    },

    rating: function() {

      console.log('rating')

      // get word if any left
      var newWordIndex = wordscan.wordIndex +1
      var word = wordscanWords[ newWordIndex ]

      console.log( word )

      if( word == undefined ) {
        wordscan.finish()
        return;
      }

      // stash current wordIndex
      wordscan.wordIndex = wordscan.wordIndex +1

      // get template
      var template = $('#wordscan-word-template').html()

      // replace tags with content data
      template = template.replace('{word}', word.word)
      template = template.replace('{translation}', word.translation)
      template = template.replace('{pronunciation}', word.pronunciation)

      // render content
      $('.lesson-section-wordscan').html( template )

    },

    finish: function() {
      $('.lesson-section-wordscan').html( 'congrats you finished all the words!!')
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
  /* end wordscan class */

  /*
   *
   * Flashcards
   *
   */
  var flashcard = {

    init: function() {

    }

  }

  flashcard.init();

  /* Loose Functions */

  // lesson single tabs
  $('.lesson-single-tabs li').on('click', function() {

    $(this).addClass('active')
    $('.lesson-single-tabs li').removeClass('active')
    var sectionName = $(this).data('section')


    $('.lesson-section').hide()
    $('.lesson-section-' + sectionName).show()

  })

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
