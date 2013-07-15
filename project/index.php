<?php include('templates/header.php') ?>


  <a href="routes.php?action=start_new_round" class="btn start-new-round">Start New Round</a>

  <br>
  <br>

  <div class="row" id="hangman" style="display:none">
    <div class="well span3 hangman-image">
      <img src="http://placebear.com/200/300" />
    </div><!-- .hangman-image -->

    <div class="well span9 guess-area">

      <form action="routes.php" method="post" id="guess-form">
        <input name="letter" type="text" placeholder="Letter" />
        <br>
        <button type="submit" class="btn">Guess!</button>
      </form>
      
    </div><!-- .guess-area -->

  </div>

<?php include('templates/footer.php') ?>