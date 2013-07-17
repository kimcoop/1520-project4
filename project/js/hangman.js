var Hangman = {
  els: {
    blanks: $('#blanks'),
    prevGuesses: $('.previous-guesses'),
    numCorrectGuesses: $('.num-correct-guesses'),
    numIncorrectGuesses: $('.num-incorrect-guesses'),
    availableLetters: $('.letter')
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

  getWord: function( callback ) {
    $.ajax({
      url: Routes.startNewRound,
      type: "GET",
      data: {},
    }).done( function( data ) {
      data = JSON.parse( data );
      callback( data.word );
    });
  },

  newRound: function() {
    Hangman.reset();
    Hangman.getWord( function( word ) {
      Hangman.word = word;
      Hangman.gameInProgress = true;
      console.debug( 'newRound: word is ' + Hangman.word );
      Hangman.numGuesses = 0;
      Hangman.updateBoard();
    });
  },

  updateBoard: function() {
    if ( Hangman.numGuesses > 0 ) {
      prevGuessMarkup = Hangman.prevGuess.correct ? Hangman.prevGuess.letter : "<span class='strikethrough'>" + Hangman.prevGuess.letter + "</span>";
    } else {
      prevGuessMarkup = '';
      Hangman.els.availableLetters.removeClass( 'disabled' );
    }
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

    if ( letterAlreadyGuessed ) { // this is impossible, but here for safeguard
      Alert.showWithFade( "You have already guessed the letter " +letter+ ".", "error" );
      return;
    }

    Hangman.numGuesses += 1;
    Hangman.prevGuess.letter = letter;

    var letterIndex = Hangman.word.indexOf( letter ),
      letterInWord =  letterIndex > -1;

    if ( letterInWord ) {
      Hangman.prevGuess.correct = true;
      Hangman.correctLetters.push( letter );
      Alert.showWithFade( letter.toUpperCase()+ " is in the word!", "success" );
      indices = Hangman.getLetterIndices( letter );
      for ( var i=0; i < indices.length; i++ ) { // iterate to capture all indices where letter matches
        Hangman.numCorrectGuesses += 1;
        letterIndex = indices[ i ];
        Hangman.els.blanks.children().eq( letterIndex ).html( letter );
      }
    } else {
      Hangman.prevGuess.correct = false;
      Hangman.incorrectLetters.push( letter );
      Hangman.numIncorrectGuesses += 1;
      Alert.showWithFade( letter.toUpperCase()+ " is not in the word.", "error" );
    }

    Hangman.updateBoard();
    Hangman.checkForGameEnd();
  },

  getLetterIndices: function( letter ) {
    var startIndex = 0, 
      index = -1, 
      indices = [];

    while ( Hangman.word.indexOf( letter, startIndex ) > -1 ) {
      index = Hangman.word.indexOf( letter, startIndex );
      indices.push( index );
      startIndex += index + 1;
    }
    return indices;
  },

  checkForGameEnd: function() {
    
    gameWon = Hangman.numCorrectGuesses == Hangman.word.length; // game ends if all letters have been guessed
    gameLost = Hangman.numIncorrectGuesses == Hangman.wrongGuessesLimit; // OR if player has guessed wrong 7 times

    if ( gameWon || gameLost ) 
      Hangman.gameInProgress = false;

    if ( gameWon ) Hangman.gameWon();
    else if ( gameLost ) Hangman.gameLost();
  },

  gameWon: function() {
    App.showGameOver( 'won', Hangman.word );
  },

  gameLost: function() {
    Hangman.revealWord();
    App.showGameOver( 'lost', Hangman.word );
  },

  revealWord: function() {
    for ( var i=0; i < Hangman.word.length; i++ ) {
      if ( Hangman.els.blanks.children().eq( i ).html() == "" ) {
        correctLetter = Hangman.word[ i ];
        Hangman.els.blanks.children().eq( i ).html( "<span class='revealed'>" +correctLetter+ "</span>" );
      }
    }
  }

    
}
