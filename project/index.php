<?php include('templates/header.php') ?>

  <div id="intro">
    <div class="well">
      <h3 class="text-primary">Ready to play?</h3>
      <a href="" class="btn btn-block start-new-round">Start New Round</a>
    </div>
  </div>

  <div id="hangman" style="display:none">
    <?php include('templates/hangman.php'); ?>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>