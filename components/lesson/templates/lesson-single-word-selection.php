<?php

// put all translations into array
// this array used later for the wrong selections
$allTranslations = array();
foreach( $lessonFields['words'] as $wordId ) {
  $wordPost = get_post( $wordId );
  $wordFields = get_fields( $wordId );
  $allTranslations[] = $wordFields['translation'];
}

function fetchSelectionOptions( $allTranslations, $correctTranslation ) {

  // remove correct translation from options
  if (($key = array_search($correctTranslation, $allTranslations)) !== false) {
    unset($allTranslations[$key]);
  }

  // randomize order
  shuffle( $allTranslations );

  // pick 3
  $wrongAnswers = array_slice($allTranslations, 0, 3);

  // add correct to wrong answer
  $options = $wrongAnswers;
  $options[] = $correctTranslation;

  // randomize the options
  shuffle( $options );

  foreach( $options as $option ) {
    print '<button>' . $option. '</button>';
  }

}

?>


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
      fetchSelectionOptions( $allTranslations, $wordFields['translation'] );

      print '</div>';

    }

    ?>

</div>
