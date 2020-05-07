(function($) {

var Exam = {

  init: function() {

    Exam.selectQuestionOption();

  },

  selectQuestionOption: function() {

    $( document ).on( 'click', '.question ul.selectable li', function() {

      // handle ux changes
      $(this).addClass('selected');
      $(this).parent('ul').removeClass('selectable');

      // record the answer
      var $questionId = $(this).data('question-id');
      var $questionOptionId = $(this).data('question-option-id');
      Exam.recordAnswer( $questionId, $questionOptionId );

    })

  },

  recordAnswer: function( $questionId, $questionOptionId ) {

    data = {
      action: 'frame_exam_record_answer',
      questionId: $questionId,
      questionOptionId: $questionOptionId
    }
    $.post( frame_post_list_load.ajaxurl, data, function( response ) {

       response = JSON.parse(response);
       console.log( response )

       if(response.isCorrect) {

       } else {
         
       }

    });

  }

}

Exam.init();

})( jQuery );
