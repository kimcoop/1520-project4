<?php include('templates/header.php') ?>

  <div id="intro" class="screen">
    <div class="well">
      <h3 class="text-primary">Ready to play?</h3>
      <input autofocus type="text" class="username input-block-level" placeholder="Username" />
      <a href="" class="btn btn-block start-new-round">Start New Round</a>
      <a href="" class="btn btn-block view-scores">View Scores</a>
    </div>
  </div>

  <div id="scores" style="display:none" class="screen">
    <?php include('templates/scores.php'); ?>
  </div>

  <div id="hangman" style="display:none" class="screen">
    <?php include('templates/hangman.php'); ?>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>