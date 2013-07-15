var Hangman = {
  board: $('#hangman'),
  word: undefined,
  numGuesses: 0,
  correctLetters: [],
  wrongLetters: [],

  newRound: function( word ) {
    console.debug( 'newRound: word is ' + word );
    Hangman.board.show();
    Hangman.numGuesses = 0;
    Hangman.word = word;
  },

  guessLetter: function( letter ) {
    Hangman.numGuesses += 1;
    var letterIndex = Hangman.word.indexOf( letter ),
      letterInWord =  letterIndex > -1;
    if ( letterInWord ) {
      Hangman.correctLetters.push( letter );
      Alert.show( "Correct guess!", "success" );
    } else {
      Hangman.wrongLetters.push( letter );
      Alert.show( "Incorrect guess.", "error" );
    }
  }

    
}
