var App = {
  els: {
    intro: $('#intro'),
    board: $('#hangman'),
    scores: $('#scores'),
    gameOver: $('#dialog-container'),
    gameSummary: $('.game-summary'),
    roundsWon: $('.rounds-won'),
    roundsPlayed: $('.rounds-played'),
    winPercentage: $('.win-percentage'),
    availableLetters: $('.letter')
  },
  username: '',
  currentView: $('#intro'), // for init
  fadeTimeIn: 400,
  fadeTimeOut: 400,
  fadeSlow: 1100,

  play: function() {
    App.clearGameOver();
    Illustrator.reset();
    Hangman.newRound();
    App.enableGuessing();
    App.els.intro.fadeOut( App.fadeTimeOut, function() {
      App.els.board.fadeIn();
      App.currentView = App.els.board;
    });
  },

  enableGuessing: function() {
    App.els.availableLetters
      .removeClass( 'prohibited' )
      .on( 'click', function() {
        letter = $(this).text();
        if ( !$(this).hasClass( 'disabled' ))
          Hangman.guessLetter( letter );
        $(this).addClass( 'disabled' );
      });
  },

  disableGuessing: function() {
    App.els.availableLetters.addClass( 'prohibited' ).off( 'click' );
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

    App.els.gameOver.fadeIn( App.fadeSlow );
  },

  quit: function() {
    App.clearGameOver();
    Hangman.quit();
    Stats.reset();
    App.currentView.fadeOut( App.fadeTimeOut, function() {
      App.els.intro.fadeIn();
      App.currentView = App.els.intro;
    });
  },

  viewScores: function() {
    App.clearGameOver();
    Score.refreshList();
    App.currentView.fadeOut( App.fadeTimeOut, function() {
      App.els.scores.fadeIn();
      App.currentView = App.els.scores;
    }); 
  }
   
}