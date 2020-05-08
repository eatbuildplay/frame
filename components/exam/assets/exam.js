(function($) {

var Exam = {

  id: $('#exam-canvas').data('exam-id'),
  canvas: $('#exam-canvas'),
  exam: [],
  questions: [],
  state: {
    started: false,
    currentQuestion: {
      index: 0,
      question: false
    },
    nextQuestion: {
      index: 1,
      question: false
    },
    prevQuestion: {
      index: false,
      question: false
    }
  },

  init: function() {

    Exam.selectQuestionOption();
    Exam.examLoad();


  },

  examLoad: function() {

    data = {
      action: 'frame_exam_exam_load',
      examId: Exam.id
    }
    $.post( frame_post_list_load.ajaxurl, data, function( response ) {

      response = JSON.parse(response);
      Exam.exam = response.exam;
      Exam.questions = response.exam.questions;

      // fire exam loaded event here
      // Exam.questionLoad();
      Exam.questionShow();


    });

  },

  questionShow: function() {

    // get next question
    var $question = Exam.questions[ Exam.state.nextQuestion.index ];
    var $questionNumber = Exam.state.nextQuestion.index +1;

    // populate templates
    var $template = $('#question-template').html();
    $template = $template.replace(
      '{questionId}',
      $question.id
    );
    $template = $template.replace(
      '{questionTitle}',
      $question.title
    );
    $template = $template.replace(
      '{questionNumber}',
      'Question ' + $questionNumber
    );

    Exam.canvas.html( $template );

    // get the question as an element so we can make changes
    var $questionEl = $('.question');

    var $optionsHtml = '';
    $question.options.forEach( function( option, index ) {
      var $template = $('#question-option-template').html();
      $template = $template.replace(
        '{questionOptionId}',
        option.id
      );
      $template = $template.replace(
        '{questionOptionLabel}',
        option.label
      );
      $template = $template.replace(
        '{questionId}',
        $question.id
      );
      $optionsHtml += $template;
    });

    $questionEl.find('ul').html( $optionsHtml );

  },

  questionLoad: function() {

    var $questionId = Exam.questions[0].id;

    data = {
      action: 'frame_exam_question_load',
      questionId: $questionId
    }
    $.post( frame_post_list_load.ajaxurl, data, function( response ) {

       response = JSON.parse(response);
       console.log( response );

       Exam.canvas.html( response.question.title )

    });

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
