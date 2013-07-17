<?php include('templates/header.php') ?>

  <div id="intro">
    <div class="well">
      <h3 class="text-primary">Just want to play?</h3>
      <a href="" class="btn btn-block start-new-round">Start New Round</a>
    </div>
    <div class="well">
      <h3 class="text-primary">Existing user login</h3>
      <form name="login-form">
        <input class="input-block-level" type="text" name="username" placeholder="Username or email" />
        <input class="input-block-level" type="password" name="password" placeholder="Password" />
        <button type="submit" class="btn btn-block">Login</button>
      </form>
      <div class="text-primary-light text-right">
        Want to track your high scores?&nbsp;
        <a href="" class="inline sign-up">3 second signup&nbsp;&raquo;</a>
      </div>
    </div>
  </div>

  <div id="hangman" style="display:none">
    <?php include('templates/hangman.php'); ?>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>