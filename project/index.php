<?php include('templates/header.php') ?>


  <a href="routes.php?action=start_new_round" class="btn start-new-round">Start New Round</a>

  <br>
  <br>

  <div class="row" id="hangman" style="display:none1">
    <div class="well span7 hangman-area">
      <img src="http://placebear.com/500/300" />
      <div id="blanks"></div>
    </div><!-- .hangman-area -->

    <div class="span5 guess-area">
      <div class="row">
        <div class="well span5">
          <p>
            Correct Guesses:&nbsp;
            <span class="num-correct-guesses"></span>
          </p>
          <p>
            Incorrect Guesses:&nbsp;
            <span class="num-incorrect-guesses"></span>
          </p>
          <p>Previous Guesses:&nbsp;</p>
          <div class="previous-guesses"></div>
        </div>
      </div>
      <div class="row">
        <div class="well span5 new-guesses">
          <form action="routes.php" method="post" id="guess-form">
            <input class="input-block-level" name="letter" type="text" placeholder="Letter" maxlength=1 />
            <br>
            <button type="submit" class="btn btn-block">Guess!</button>
          </form>
        </div>
      </div>
    </div><!-- .guess-area -->
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>