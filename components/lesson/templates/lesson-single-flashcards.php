<div class="lesson-section lesson-section-flashcards">

  <?php

    $template = new \Frame\Template();
    $template->path = 'components/lesson/templates/';
    $template->name = 'lesson-section-header';
    $template->data = array(
      'number' => 2,
      'title' => 'FlashCards',
      'intro' => 'In this section you will learn to associate the Spanish word with it\'s English counterpart. If possible, say the word out loud during this exercise to practice the pronunciation.'
    );
    $template->render();

  ?>

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
          print '<button class="flash-know">I GOT IT!</button>';
          print '<button class="flash-know">I MISSED IT!</button>';
        print '</div>';
      print '</div>';

    }

    ?>

    <button class="flashcard-reset">Reset Flashcards</button>

</div>
