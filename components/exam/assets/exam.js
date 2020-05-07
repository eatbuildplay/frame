(function($) {

var Exam = {

  init: function() {

    Exam.selectQuestionOption();

  },

  selectQuestionOption: function() {

    $( document ).on( 'click', '.question ul.selectable li', function() {
      $(this).addClass('selected')
      $(this).parent('ul').removeClass('selectable')
    })

  }

}

Exam.init();

})( jQuery );
