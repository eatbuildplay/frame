<!-- 1) WordScan -->

<div class="lesson-section lesson-section-wordscan">

  <?php

    $template = new \Frame\Template();
    $template->path = 'components/lesson/templates/';
    $template->name = 'lesson-section-header';
    $template->data = array(
      'number' => 1,
      'title' => 'WordScan',
      'intro' => 'In this lesson you will to learn to read, speak and hear 10 words. Scan over the words briefly now, taking note of the translation and the pronunciation.'
    );
    $template->render();

  ?>

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
