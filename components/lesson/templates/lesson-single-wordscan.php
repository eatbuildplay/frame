<!-- 1) WordScan -->

<div class="lesson-section lesson-section-wordscan">

  <h2 class="lesson-section-title">1) WordScan</h2>
  <div class="lesson-section-intro">
    In this lesson you will to learn to read, speak and hear these 10 words. Scan over them briefly now, taking note of the translation of the pronunciation.
  </div>

  <?php

    foreach( $lessonFields['words'] as $wordId ) {

      $wordPost = get_post( $wordId );
      $wordFields = get_fields( $wordId );

      print '<div class="wordscan-word">';
      print '<h3>' . $wordPost->post_title . '</h3>';
      print '<h4>' . $wordFields['translation'] . '</h4>';
      print '<h4>' . $wordFields['pronunciation'] . '</h4>';
      print '</div>';

    }

    ?>

</div>


<!-- 2) FlashCards -->
<div class="lesson-section lesson-section-flashcards">

  <h2 class="lesson-section-title">2) FlashCards</h2>
  <div class="lesson-section-intro">
    In this section you'll learn to associate the Spanish word with it's English counterpart. If possible, say the word out loud during this exercise to practice the pronunciation.
  </div>

  <?php

    foreach( $lessonFields['words'] as $wordId ) {

      $wordPost = get_post( $wordId );
      $wordFields = get_fields( $wordId );

      print '<div class="flashcard">';
        print '<div class="flashcard-up flashcard-active">';
          print '<h3>' . $wordPost->post_title . '</h3>';
          print '<h4>' . $wordFields['pronunciation'] . '</h4>';
        print '</div>';
        print '<div class="flashcard-down">';
          print '<h3>' . $wordFields['translation'] . '</h3>';
        print '</div>';
      print '</div>';

    }

    ?>

</div>


<!-- 3) Word Selection -->
<div class="lesson-section lesson-section-word-selection">

  <h2 class="lesson-section-title">3) Word Selection</h2>
  <div class="lesson-section-intro">
    In this exercise you'll be given the word and asked to choose it's English counterpart.
  </div>

  <?php

    foreach( $lessonFields['words'] as $wordId ) {

      $wordPost = get_post( $wordId );
      $wordFields = get_fields( $wordId );

      print '<div class="flashcard">';
      print '<h3>' . $wordPost->post_title . '</h3>';
      print '<h4>' . $wordFields['pronunciation'] . '</h4>';
      print '</div>';

    }

    ?>

</div>


<style>

/* Lesson Sections */
.lesson-section {
  margin: 40px 0;
  width: 100%;
  background: #00000010;
  padding: 30px 20px;
}
.lesson-section-title {
  font-family: verdana, sans-serif;
  font-size: 32px;
  font-weight: normal;
  color: #666666;
}

/* WordScan */
.wordscan-word {
  display: inline-block;
  width: 20%;
}

/* FlashCards */
.flashcard {
  display: inline-block;
  width: 20%;
  background: #D8D8D8;
  box-sizing: border-box;
  padding: 15px;
  border: solid 2px #FFF;
  cursor: pointer;
  min-height: 150px;
}
.flashcard:hover {
  background: #F2F2F2;
}
.flashcard h2 {
  font-size: 26px;
  color: #424242;
  font-family: verdana, sans-serif;
  font-weight: bold;

}

.flashcard-up, .flashcard-down {
  display:none;
}
.flashcard-active {
  display: block;
}

</style>

<script>

(function($) {

  $('.flashcard').on('click', function() {

    console.log('flashcard flipped!')
    $(this).find('.flashcard-down').addClass('flashcard-active')
    $(this).find('.flashcard-up').removeClass('flashcard-active')

  })

})( jQuery );

</script>
