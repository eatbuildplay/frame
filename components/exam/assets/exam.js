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
      var $questionId = 1;
      var $questionOptionId = 15;
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

    });

  }

}

Exam.init();

})( jQuery );
