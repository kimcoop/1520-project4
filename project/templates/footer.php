
        </div> <!-- #main -->
      <div class="push"></div>
  </div><!-- .container.main -->

  <footer>
    <div class="container">
      <p class="text-center">
        <?php
          $format = '%1$s %2$s %3$s. All Rights Reserved.';
          echo sprintf( $format, '&copy;', date('Y'), 'Kim Cooperrider' );
        ?>
      </p>
    </div>
  </footer>

  <?php include( 'templates/dialog.php' ); ?>
 
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

  <script src="js/app.js"></script>
  <script src="js/alert.js"></script>
  <script src="js/routes.js"></script>
  <script src="js/hangman.js"></script>
  <script src="js/stats.js"></script>
  <script src="js/illustrator.js"></script>
  <script src="js/score.js"></script>
  <script src="js/simple-template.js"></script>

  <script type="text/html" id="scores_list_tmpl"><?php include( 'templates/scores_list.html'); ?></script>
  
  <script type="text/javascript">
  $(function() {

    $('.username-form').on( 'submit', function(e) {
      e.preventDefault();
      if (checkForUsername()) startNewRound();
      else return false;
    });

    $('.close').on( 'click', function(e) {
      e.preventDefault();
      el = $(this);
      parentSelector = el.data( 'parent' );
      el.parents( parentSelector ).fadeOut();
    });

    $('.start-new-round').on( 'click', function(e) {
      e.preventDefault();
      startNewRound();
    });

    $('#intro .start-new-round').on( 'click', function(e) {
      // on login, check for username
      e.preventDefault();
      if (checkForUsername()) startNewRound();
      else return false;
    });

    $('.quit').on( 'click', function(e) {
      e.preventDefault();
      App.quit();
    });

    $('.view-scores').on( 'click', function(e) {
      e.preventDefault();
      App.viewScores();
    });

    function startNewRound() {
      if ( Hangman.gameInProgress ) {
        quitCurrentGame = confirm( 'Quit current game?' );
        // make sure the user wants to terminate the current game if there is one in progress
        if ( !quitCurrentGame )
          return;
      }
      $('.username').removeClass( 'input-error' );
      App.play();
    }

    function checkForUsername() {
      if ( !App.username ) {
        if ( $('.username').is(':visible') ) {
          if ( $('.username').val().trim() == '' ) { // if no username is in system, and user can enter it
            Alert.showWithFade( 'Please enter your username.', 'error' );
            $('.username').addClass( 'input-error' ).focus();
            return false;
          } else {
            App.username = $('.username').val().trim();
          }
        }
      } else { // if App already has a user, but there's a new user trying to play
        if ( $('.username').val().trim() !== '' )
          App.username = $('.username').val().trim();
        else {
          Alert.showWithFade( 'Please enter your username.', 'error' );
          $('.username').addClass( 'input-error' ).focus();
          return false;
        }

      }
      return true;
    }

  });
  </script>

  </body>
</html>