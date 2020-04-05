<!-- 1) WordScan -->

<div class="lesson-section lesson-section-wordscan">

  <div class="lesson-section-header">
    <h2 class="lesson-section-title">1) WordScan</h2>
    <div class="lesson-section-intro">
      In this lesson you will to learn to read, speak and hear 10 words. Scan over the words briefly now, taking note of the translation and the pronunciation.
    </div>
  </div>

  <?php

    foreach( $lessonFields['words'] as $wordId ) {

      $wordPost = get_post( $wordId );
      $wordFields = get_fields( $wordId );

      print '<div class="wordscan-word">';
      print '<h2>' . $wordFields['translation'] . ' = ' . $wordPost->post_title . '</h2>';
      print '<h3>' . $wordFields['pronunciation'] . '</h3>';
      print '</div>';

    }

    ?>

</div>

<script>

(function($) {

  $('.flashcard').on('click', function() {

    console.log('flashcard flipped!')
    $(this).find('.flashcard-down').addClass('flashcard-active')
    $(this).find('.flashcard-up').removeClass('flashcard-active')

  })

})( jQuery );

</script>
