<?php

/*
print '<pre>';
var_dump( $exam );
print '</pre>';
*/

?>

<div id="exam-canvas" data-exam-id="<?php print $exam->id; ?>"></div>

<template id="question-template">
  <div class="question question-{questionId}" data-question-id="{questionId}">
    <h3>{questionNumber}</h3>
    <h1>{questionTitle}</h1>
    <h4>Select your answer</h4>
    <ul class="selectable"></ul>
  </div>
</template>

<template id="question-option-template">
  <li class="question-option question-option-{questionOptionId}"
    data-question-id="{questionId}"
    data-question-option-id="{questionOptionId}">
      {questionOptionLabel}</li>
</template>

<h1><?php print $exam->title; ?></h1>

<?php foreach( $exam->questions as $question ) : ?>

  <div class="question question-<?php print $question->id; ?>" data-question-id="<?php print $question->id; ?>">

    <h2><?php print $question->title; ?></h2>

    <h3>Select your answer</h3>
    <ul class="selectable">
      <?php foreach( $question->options as $option ) : ?>
        <li class="question-option question-option-<?php print $option->id; ?>"
          data-question-id="<?php print $question->id; ?>"
          data-question-option-id="<?php print $option->id; ?>">
            <?php print $option->title; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endforeach; ?>
