<div class="lesson-section lesson-section-word-selection">

  <h2 class="lesson-section-title">3) Word Selection</h2>
  <div class="lesson-section-intro">
    In this exercise you'll be given the word and asked to choose it's English counterpart.
  </div>

  <?php

    foreach( $lessonFields['words'] as $wordId ) {

      $wordPost = get_post( $wordId );
      $wordFields = get_fields( $wordId );

      print '<div class="word-selection-word">';
      print '<h3>' . $wordPost->post_title . '</h3>';
      print '<h4>' . $wordFields['pronunciation'] . '</h4>';

      print '<h2>Choose the word:</h2>';
      print '<button>' . 'Wrong 1' . '</button>';
      print '<button>' . $wordFields['translation'] . '</button>';
print '<button>' . 'Wrong 2' . '</button>';
print '<button>' . 'Wrong 3' . '</button>';

      print '</div>';

    }

    ?>

</div>
