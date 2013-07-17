
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
  
  <script type="text/javascript">
  $(function() {
    // $('a').on( 'click', function(e) {
    //   e.preventDefault();
    //   $.ajax({
    //     url: this.href,
    //     type: "GET",
    //     data: {},
    //   }).done( function( data ) {
    //     console.debug( data );
    //   });
    // });

    // $('form').on( 'submit', function(e) {
    //   e.preventDefault();
    // });

    $('.close').on( 'click', function(e) {
      console.log('close cliked');
      e.preventDefault();
      parentClass = $(this).data( 'parent' );
      $(this).parent( '.'+parentClass ).slideUp();
    });

    $('.start-new-round').on( 'click', function(e) {
      e.preventDefault();
      if ( Hangman.gameInProgress ) {
        quitCurrentGame = confirm( 'Quit current game?' );
        // make sure the user wants to terminate the current game if there is one in progress
        if ( !quitCurrentGame )
          return;
      }
      App.play();
    });

    $('.quit').on( 'click', function(e) {
      e.preventDefault();
      App.quit();
    });

    $('.letter').on( 'click', function() {
      letter = $(this).text();
      console.log(' guessing letter ' + letter );
      if ( !$(this).hasClass( 'disabled' ))
        Hangman.guessLetter( letter );
      $(this).addClass( 'disabled' );
    });

    $(document).ajaxComplete(function(event, xhr, settings) {
      console.log(' ajax complete');
      console.debug( xhr );
      console.debug( settings);
      if ( settings.url === "ajax/test.html" ) {
        $( ".log" ).text( "Triggered ajaxComplete handler. The result is " + xhr.responseHTML );
      }
    });

  });
  </script>

  </body>
</html>