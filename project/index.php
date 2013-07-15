<?php include('templates/header.php') ?>


  <a href="routes.php?action=start_new_round" class="btn start-new-round">Start New Round</a>

  <br>
  <br>

  <div class="row" id="hangman" style="display:none1">
    <div class="well span7 hangman-area">
      <img src="http://placebear.com/200/300" />
    </div><!-- .hangman-area -->

    <div class="span5 guess-area">
      <div class="row">
        <div class="well span5 previous-guesses">
        </div>
      </div>
      <div class="row">
        <div class="well span5 new-guesses">
          <form action="routes.php" method="post" id="guess-form">
            <input name="letter" type="text" placeholder="Letter" />
            <br>
            <button type="submit" class="btn">Guess!</button>
          </form>
        </div>
      </div>
    </div><!-- .guess-area -->
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>