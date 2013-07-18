
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
  <script src="js/init.js"></script>
  <script src="js/simple-template.js"></script>

  <script type="text/html" id="scores_list_tmpl"><?php include( 'templates/scores_list.html'); ?></script>
  
  <script type="text/javascript">
  $(function() {
    Init.setupEvents();
  });
  </script>

  </body>
</html>