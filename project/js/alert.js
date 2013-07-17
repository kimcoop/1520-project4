var Alert = {
  els: {
    alert: $('#alert'),
    alertText: $('.alert-text'),
    gameOver: $('#dialog-container'),
    gameSummary: $('.game-summary')
  },
  fadeTimeIn: 400,
  fadeTimeOut: 1800,
  
  showWithFade: function( message, type ) {
    Alert.els.alert.removeClass( 'alert-success alert-error' );
    Alert.els.alert.addClass( 'alert-' + type );
    Alert.els.alertText.html( message );
    Alert.els.alert.stop( true, true ).fadeIn( Alert.fadeTimeIn, function() {
      $(this).fadeOut( Alert.fadeTimeOut );
    });
  },

  showGameOver: function( gameStatus, word ) {
    if ( gameStatus == 'lost' ) {
      Alert.els.gameSummary.html( "You lost this game. The word was <span class='text-primary'>" + word + ".</span>" );
    }
    Alert.els.gameOver.fadeIn();
  },

  begone: function( selector ) {
    $( selector ).fadeOut();
  }
   
}