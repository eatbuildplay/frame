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
       console.log( response );

       // add focus on answered question
       var $questionEl = $('.question-' + response.question.id);
       $questionEl.addClass('focus');

       var $selectedOption = $questionEl.find('li.selected');

       if(response.isCorrect) {
         $selectedOption.addClass('correct');
       } else {
         $selectedOption.addClass('incorrect');
       }

    });

  }

}

Exam.init();

})( jQuery );
