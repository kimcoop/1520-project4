var Stats = {

  roundsPlayed: 0,
  roundsWon: 0,
  roundsLost: 0,

  upRoundsPlayed: function( increment ) {
    Stats.roundsPlayed += increment ;
  },

  upRoundsWon: function( increment ) {
    Stats.roundsWon += increment;
    Stats.upRoundsPlayed( 1 );
  },

  upRoundsLost: function( increment ) {
    Stats.roundsLost += increment;
    Stats.upRoundsPlayed( 1 );
  },

  getWinPercentage: function() {
    if ( Stats.roundsPlayed == 0 ) return 0;
    else 
      return Math.round( 100 * Stats.roundsWon / Stats.roundsPlayed );
  },

  getScore: function() {
    // [(number_of_letters_in_word - number_of_times_you_guess) / (number_of_times_you_guess) * 100 ] + 100
  },

  saveScore: function( score ) {
    // $.ajax({
    //   url: Routes.saveScore,
      
    // })
  },

  reset: function() {
    Stats.roundsPlayed = 0;
    Stats.roundsWon = 0;
    Stats.roundsLost = 0;
  }

}