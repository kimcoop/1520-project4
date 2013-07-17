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

  reset: function() {
    Stats.roundsPlayed = 0;
    Stats.roundsWon = 0;
    Stats.roundsLost = 0;
  }

}