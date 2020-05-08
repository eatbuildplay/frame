<div id="exam-canvas" data-exam-id="<?php print $exam->id; ?>"></div>
<div id="exam-controls">
  <button class="exam-next">Next Question</button>
</div>

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
