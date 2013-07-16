<?php include('templates/header.php') ?>

  <div id="intro" style="display:none">
    <p class="big">Welcome! Are you ready to play?</p>
    <a href="routes.php?action=start_new_round" class="btn btn-block start-new-round">Start New Round</a>
    <br>
    <br>
  </div>

  <div id="hangman" style="display:none1">
    <div class="row row-gameboard">
      <div class="well span7 hangman-area">
        <img src="images/hangman-base.png" />
        <div id="blanks"></div>
      </div><!-- .hangman-area -->

      <div class="span5 guess-area">
        <div class="row row-guesses-summary">
          <div class="span5">
            <h3>
              Your Guesses (<span class="num-correct-guesses"></span> correct, <span class="num-incorrect-guesses"></span> incorrect)
            </h3>
            <div class="well previous-guesses"></div>
          </div>
        </div><!-- .row-guesses-summary -->
        <div class="row">
          <div class="span5"><h3>Available Letters</h3></div>
        </div>
        <div class="row new-guesses">
          <div class="well span5">
            <span class="letter">A</span>
            <span class="letter">B</span>
            <span class="letter">C</span>
            <span class="letter">D</span>
            <span class="letter">E</span>
            <span class="letter">F</span>
            <span class="letter">G</span>
            <span class="letter">H</span>
            <span class="letter">I</span>
            <span class="letter">J</span>
            <span class="letter">K</span>
            <span class="letter">L</span>
            <span class="letter">M</span>
            <span class="letter">N</span>
            <span class="letter">O</span>
            <span class="letter">P</span>
            <span class="letter">Q</span>
            <span class="letter">R</span>
            <span class="letter">S</span>
            <span class="letter">T</span>
            <span class="letter">U</span>
            <span class="letter">V</span>
            <span class="letter">W</span>
            <span class="letter">X</span>
            <span class="letter">Y</span>
            <span class="letter">Z</span>
          </div>
        </div>
        <div class="row">
          <div class="span3">
            <a href="routes.php?action=start_new_round" class="btn btn-block start-new-round">Start New Round</a>
          </div>
          <div class="span2">
            <a href="routes.php?action=quit" class="btn btn-block quit">Quit</a>
          </div>
        </div>
      </div><!-- .guess-area -->
    </div><!-- .row -->
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>