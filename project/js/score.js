var Score = {
  els: {
    scoresTable: $('.scores-container'),
    score: $('.score')
  },

  calcAndSave: function( word, numGuesses ) {
    points = 100 * ( word.length - numGuesses ) / numGuesses;
    points += 100;
    Score.save( points );
    Score.els.score.html( Math.round(points) );
  },

  refreshList: function() {
    Score.query( function( data ) {
      markup = tmpl( 'scores_list_tmpl', { scores: data } );
      Score.els.scoresTable.html( markup );
    });
  },

  save: function( points ) {
    $.ajax({
      url: Routes.root,
      type: "POST",
      data: {
        action: Routes.post.scoresNew,
        points: points,
        username: App.username
      },
    }).done( function( data ) {});
  },

  query: function( callback ) {
    $.ajax({
      url: Routes.scoresIndex,
      type: "GET",
      data: {},
    }).done( function( data ) {
      data = JSON.parse( data );
      callback ( data );
    }); 
  }

}