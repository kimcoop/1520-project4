<?php include('templates/header.php') ?>

  <div id="intro" class="screen container-narrow">
    <div class="row-fluid">
      <div class="well span12">
        <h3 class="text-primary">Ready to play?</h3>
        <form class="username-form">
          <input autofocus type="text" class="username input-block-level" placeholder="Username" />
          <button type="submit" class="btn btn-block start-new-round">Start New Round</button>
        </form>
        <a href="" class="btn btn-block view-scores">View Scores</a>
      </div>
    </div>
  </div>

  <div id="scores" style="display:none" class="screen container-narrow">
    <?php include('templates/scores.php'); ?>
  </div>

  <div id="hangman" style="display:none" class="screen">
    <?php include('templates/hangman.php'); ?>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>