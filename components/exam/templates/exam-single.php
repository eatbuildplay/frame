<?php

/*
print '<pre>';
var_dump( $exam );
print '</pre>';
*/

?>

<h1><?php print $exam->post_title; ?></h1>

<?php foreach( $exam->questions as $question ) : ?>

  <div class="question">

    <h2><?php print $question->title; ?></h2>

    <h3>Select your answer</h3>
    <ul class="selectable">
      <?php foreach( $question->options as $option ) : ?>
        <li
          data-question-id="<?php print $question->id; ?>"
          data-question-option-id="<?php print $option->id; ?>">
            <?php print $option->title; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endforeach; ?>
