<?php include('templates/header.php') ?>

  <div id="intro">
    <div class="well">
      <h3 class="text-primary">Ready to play?</h3>
      <input type="text" class="input-block-level" placeholder="Username" />
      <a href="" class="btn btn-block start-new-round">Start New Round</a>
      <a href="" class="btn btn-block view-scores">View Scores</a>
    </div>
  </div>

  <div id="scores" style="display:none1">
    <?php include('templates/scores.php'); ?>
  </div>

  <div id="hangman" style="display:none">
    <?php include('templates/hangman.php'); ?>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>