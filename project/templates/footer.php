
        </div> <!-- #main -->
      <div class="push"></div>
  </div><!-- .container.main -->

  <!-- <footer>
    <div class="container">
      <p class="text-center">
        <?php
          $format = '%1$s %2$s %3$s. All Rights Reserved.';
          echo sprintf( $format, '&copy;', date('Y'), 'Kim Cooperrider' );
        ?>
      </p>
    </div>
  </footer>
 -->
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

  <script src="js/alert.js"></script>
  <script src="js/hangman.js"></script>
  
  <script type="text/javascript">
  $(function() {
    $('a').on( 'click', function(e) {
      console.log('link clicked');
      e.preventDefault();
      $.ajax({
        url: this.href,
        type: "GET",
        data: {},
      }).done( function( data ) {
        console.debug( data );
      });
    });

    $('form').on( 'submit', function(e) {
      e.preventDefault();
    })

    $('.start-new-round').on( 'click', function(e) {
      e.preventDefault();
      if ( Hangman.gameInProgress ) {
        quitCurrentGame = confirm( 'Quit current game?' );
        // make sure the user wants to terminate the current game if there is one in progress
        if ( !quitCurrentGame )
          return;
      }
      $.ajax({
        url: this.href,
        type: "GET",
        data: {},
      }).done( function( data ) {
        // data is word for now
        data = JSON.parse( data );
        console.debug( data );
        Hangman.newRound( data.word );
      });
    });

    $('#guess-form').on( 'submit', function(e) {
      e.preventDefault();
      letter = $('input[name="letter"]').val();
      if ( !!letter ) 
        Hangman.guessLetter( letter );
      else
        Alert.show( "Please enter a letter.", "error" );
      $('input[name="letter"]').val( '' );
    })

  });
  </script>

  </body>
</html>