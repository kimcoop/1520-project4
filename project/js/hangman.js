var Hangman = {
  els: {
    board: $('#hangman'),
    blanks: $('#blanks'),
    prevGuesses: $('.previous-guesses'),
    numCorrectGuesses: $('.num-correct-guesses'),
    numIncorrectGuesses: $('.num-incorrect-guesses')
  },
  word: undefined,
  gameInProgress: false,
  prevGuess: '',
  numGuesses: 0,
  numCorrectGuesses: 0,
  numIncorrectGuesses: 0,
  correctLetters: [],
  wrongLetters: [],
  wrongGuessesLimit: 7,

  reset: function() {
    Hangman.word = undefined;
    Hangman.prevGuess = '';
    Hangman.numGuesses = 0;
    Hangman.numCorrectGuesses = 0;
    Hangman.numIncorrectGuesses = 0;
    Hangman.correctLetters = [];
    Hangman.wrongLetters = [];
    Hangman.els.prevGuesses.html( '' );
    Hangman.els.blanks.html( '' );
    Hangman.updateBoard();
  },

  newRound: function( word ) {
    Hangman.reset();
    Hangman.gameInProgress = true;
    console.debug( 'newRound: word is ' + word );
    Hangman.numGuesses = 0;
    Hangman.word = word;
    Hangman.els.board.show();
    Hangman.updateBoard();
  },

  updateBoard: function() {
    Hangman.els.prevGuesses.html( Hangman.els.prevGuesses.html() + Hangman.prevGuess );
    Hangman.els.numCorrectGuesses.text( Hangman.numCorrectGuesses );
    Hangman.els.numIncorrectGuesses.text( Hangman.numIncorrectGuesses );
    if ( !!Hangman.word && Hangman.els.blanks.html() == "" ) // set up blanks only on init
      Hangman.setUpBlanks();
  },

  setUpBlanks: function() {
    var blank = "<div class='blank'></div>",
      str = "";
    for ( var i=0; i < Hangman.word.length; i++ ) {
      str += blank;
    }
    Hangman.els.blanks.html( str );
  },

  guessLetter: function( letter ) {
    letter = letter.toLowerCase();
    Hangman.numGuesses += 1;
    Hangman.prevGuess = letter;
    var letterIndex = Hangman.word.indexOf( letter ),
      letterInWord =  letterIndex > -1;
    if ( letterInWord ) {
      Hangman.correctLetters.push( letter );
      Hangman.numCorrectGuesses += 1;
      Alert.show( "Correct guess!", "success" );
      Hangman.els.blanks.children().eq( letterIndex ).html( letter );
    } else {
      Hangman.wrongLetters.push( letter );
      Hangman.numIncorrectGuesses += 1;
      Alert.show( "Incorrect guess.", "error" );
    }
    Hangman.updateBoard();
    Hangman.checkForGameEnd();
  },

  checkForGameEnd: function() {
    // game ends if all letters have been guessed
    gameWon = Hangman.numCorrectGuesses == Hangman.word.length;
    // OR if player has guessed wrong 7 times
    gameLost = Hangman.numIncorrectGuesses == Hangman.wrongGuessesLimit;
    if ( gameWon ) Hangman.gameWon();
    else if ( gameLost ) Hangman.lostGame();
  },

  gameWon: function() {
    alert( 'you won!' );
  },

  gameLost: function() {
    alert(' you lost');
  }

    
}
