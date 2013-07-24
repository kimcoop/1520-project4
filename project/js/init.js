var Init = {

  setupEvents: function() {
    $('.username-form').on( 'submit', function(e) {
      e.preventDefault();
      if (Init.checkForUsername()) Init.startNewRound();
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
      Init.startNewRound();
    });

    $('.quit').on( 'click', function(e) {
      e.preventDefault();
      App.quit();
    });

    $('.view-scores').on( 'click', function(e) {
      e.preventDefault();
      App.viewScores();
    });
  },

  startNewRound: function() {
    if ( Hangman.gameInProgress && !confirm( 'Quit current game?' ))
      return; // make sure the user wants to terminate the current game if there is one in progress
    App.play();
  },

  checkForUsername: function() {
    usernameInput = $('.username');
    if ( usernameInput.is(':visible') ) {
      if ( !App.username && usernameInput.val().trim() == '' ) { // if no username is in system, and user ignored input
        Alert.showWithFade( 'Please enter your username.', 'error' );
        usernameInput.addClass( 'input-error' ).focus();
        return false;
      } else if ( !!(username = usernameInput.val().trim()) ) { // if user has entered username
        App.username = username;
        usernameInput.removeClass( 'input-error' );
      }
    }
    return true;
  }

}
