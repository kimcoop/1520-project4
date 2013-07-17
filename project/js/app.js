var App = {
  els: {
    intro: $('#intro'),
    board: $('#hangman'),
    scores: $('#scores'),
    gameOver: $('#dialog-container'),
    gameSummary: $('.game-summary'),
    roundsWon: $('.rounds-won'),
    roundsPlayed: $('.rounds-played'),
    winPercentage: $('.win-percentage')
  },
  fadeTimeIn: 400,
  fadeTimeOut: 400,

  play: function() {
    App.clearGameOver();
    App.els.intro.fadeOut( App.fadeTimeOut, function() {
      App.els.board.fadeIn();
      Hangman.newRound();
    });
  },

  clearGameOver: function() {
    App.els.gameOver.fadeOut();
  },

  showGameOver: function( gameStatus, word ) {
    if ( gameStatus == 'lost' )
      summary = "You lost this game. The word was <span class='text-primary'>" + word + ".</span>";
    else
      summary = "You won! Hooray!";

    App.els.gameSummary.html( summary );

    App.els.roundsWon.text( Stats.roundsWon );
    App.els.roundsPlayed.text( Stats.roundsPlayed );
    App.els.winPercentage.text( Stats.getWinPercentage().toString() + "%" );

    App.els.gameOver.fadeIn();
  },

  quit: function() {
    App.clearGameOver();
    Hangman.quit();
    Stats.reset();
    App.els.board.fadeOut( App.fadeTimeOut, function() {
      App.els.intro.fadeIn();
    });
  }
   
}