<?php include('templates/header.php') ?>

  <div id="intro">
    <p class="big">Welcome! Are you ready to play?</p>
    <a href="routes.php?action=start_new_round" class="btn btn-block start-new-round">Start New Round</a>
    <br>
    <br>
  </div>

  <div id="hangman" style="display:none1">
    <div class="row">
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
            <span class="letter">A</span>
            <span class="letter">B</span>
            <span class="letter">C</span>
            <span class="letter">D</span>
            <span class="letter">E</span>
            <span class="letter">F</span>
            <span class="letter">G</span>
            <span class="letter">H</span>
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
      </div><!-- .guess-area -->
    </div><!-- .row -->
    <div class="row">
      <div class="span12">
        <a href="routes.php?action=start_new_round" class="btn start-new-round">Start New Round</a>
        &nbsp;&nbsp;
        <a href="routes.php?action=quit" class="btn quit">Quit</a>
      </div>
    </div>
  </div><!-- #hangman -->

<?php include('templates/footer.php') ?>