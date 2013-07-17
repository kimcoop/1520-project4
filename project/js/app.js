var App = {
  els: {
    intro: $('#intro'),
    board: $('#hangman'),
    scores: $('#scores'),
    gameOver: $('#dialog-container'),
    gameSummary: $('.game-summary')
  },
  fadeTimeIn: 400,
  fadeTimeOut: 1800,

  play: function() {
    App.clearGameOver();
    App.els.intro.fadeOut( 'slow', function() {
      App.els.board.fadeIn();
      Hangman.newRound();
    });
  },

  clearGameOver: function() {
    App.els.gameOver.fadeOut();
  },

  showGameOver: function( gameStatus, word ) {
    if ( gameStatus == 'lost' ) {
      App.els.gameSummary.html( "You lost this game. The word was <span class='text-primary'>" + word + ".</span>" );
    }
    App.els.gameOver.fadeIn();
  },

  quit: function() {
    App.clearGameOver();
    // Hangman.newRound(); end game
    App.els.board.fadeOut( 'slow', function() {
      App.els.intro.fadeIn();
    });
  }
   
}