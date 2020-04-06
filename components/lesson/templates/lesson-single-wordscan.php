<?php

  $words = array();
  foreach( $lessonFields['words'] as $wordId ) {

    $wordPost = get_post( $wordId );
    $wordFields = get_fields( $wordId );

    $word = new stdClass();
    $word->word = $wordPost->post_title;
    $word->translation = $wordFields['translation'];
    $word->pronunciation = $wordFields['pronunciation'];

    $words[] = $word;

  }

  print '<script>';
  print 'var wordscanWords = ' . json_encode($words);
  print '</script>';

?>

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

<div class="lesson-section lesson-section-wordscan">
  <button class="wordscan-start">Hurry up and start the lesson!</button>
</div>

<!-- word template -->
<template id="wordscan-word-template">
  <div class="wordscan-word">
    <h2>{word} = {translation}</h2>
    <h3>{pronunciation}</h3>
    <div class="wordscan-controls">
      <button>I don't know this word</button>
      <button>I know this word medio</button>
      <button>I have full confidence in this word</button>
    </div>
  </div>
</template>
