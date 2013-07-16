var Hangman = {
  els: {
    intro: $('#intro'),
    board: $('#hangman'),
    blanks: $('#blanks'),
    prevGuesses: $('.previous-guesses'),
    numCorrectGuesses: $('.num-correct-guesses'),
    numIncorrectGuesses: $('.num-incorrect-guesses')
  },
  word: undefined,
  gameInProgress: false,
  prevGuess: {},
  numGuesses: 0,
  numCorrectGuesses: 0,
  numIncorrectGuesses: 0,
  correctLetters: [],
  incorrectLetters: [],
  wrongGuessesLimit: 7,

  reset: function() {
    Hangman.word = undefined;
    Hangman.prevGuess = {};
    Hangman.numGuesses = 0;
    Hangman.numCorrectGuesses = 0;
    Hangman.numIncorrectGuesses = 0;
    Hangman.correctLetters = [];
    Hangman.incorrectLetters = [];
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
    Hangman.els.intro.fadeOut( 'slow', function() {
      Hangman.els.board.fadeIn();
    });
    Hangman.updateBoard();
  },

  updateBoard: function() {
    if ( Hangman.numGuesses > 0 )
      prevGuessMarkup = Hangman.prevGuess.correct ? Hangman.prevGuess.letter : "<span class='strikethrough'>" + Hangman.prevGuess.letter + "</span>";
    else
      prevGuessMarkup = '';
    Hangman.els.prevGuesses.html( Hangman.els.prevGuesses.html() + prevGuessMarkup );

    if ( !!Hangman.word && Hangman.els.blanks.html() == "" ) // set up blanks only on init if we have a word
      Hangman.setUpBlanks();

    Hangman.els.numCorrectGuesses.text( Hangman.numCorrectGuesses );
    Hangman.els.numIncorrectGuesses.text( Hangman.numIncorrectGuesses );
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
    letterAlreadyGuessed = Hangman.correctLetters.indexOf( letter ) > -1 || Hangman.incorrectLetters.indexOf( letter ) > -1;

    if ( letterAlreadyGuessed ) {
      Alert.show( "You have already guessed the letter " +letter+ ".", "error" );
      return;
    }

    Hangman.numGuesses += 1;
    Hangman.prevGuess.letter = letter;

    var letterIndex = Hangman.word.indexOf( letter ),
      letterInWord =  letterIndex > -1;

    if ( letterInWord ) {
      Hangman.prevGuess.correct = true;
      Hangman.correctLetters.push( letter );
      Hangman.numCorrectGuesses += 1;
      Alert.show( "Letter " +letter.toUpperCase()+ " was a correct guess!", "success" );
      Hangman.els.blanks.children().eq( letterIndex ).html( letter );
    } else {
      Hangman.prevGuess.correct = false;
      Hangman.incorrectLetters.push( letter );
      Hangman.numIncorrectGuesses += 1;
      Alert.show( "Incorrect. Letter " +letter.toUpperCase()+ " is not in the word.", "error" );
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
    else if ( gameLost ) Hangman.gameLost();
  },

  gameWon: function() {
    alert( 'you won!' );
  },

  gameLost: function() {
    alert(' you lost');
  }

    
}
