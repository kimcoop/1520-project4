var Score = {
  els: {
    scoresList: $('.scores-body'),
    scoresTable: $('.scores-table'),
    scoresContainer: $('.scores-container')
  },

  calcAndSave: function() {
    console.log("TODO");
    Score.save( 85 );
  },

  get: function() {
    // [(number_of_letters_in_word - number_of_times_you_guess) / (number_of_times_you_guess) * 100 ] + 100
  },

  refreshList: function() {
    Score.query( function( data ){
      if ( !!data ) {
        markup = "";
        $.each( data, function( rank, scoreObject ) {
          markup += "<tr>"
                  + "<td>" +( rank + 1 )+ "</td>"
                  + "<td>" +scoreObject.points+ "</td>"
                  + "<td>" +scoreObject.username;
          if ( scoreObject.username == App.username ) 
            markup += " <span class='own-score'><i class='icon icon-star'></i> you!</span>";

          markup += "</td></tr>";
        });
        Score.els.scoresList.html( markup );
      } else {
        Score.els.scoresTable.hide();
        Score.els.scoresContainer.html( "<p>No scores yet!</p>" );
      }
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
    }).done( function( data ) {
      console.debug( data );
    });
  },

  query: function( callback ) {
    $.ajax({
      url: Routes.scoresIndex,
      type: "GET",
      data: {},
    }).done( function( data ) {
      data = JSON.parse( data );
      console.debug( data );
      callback ( data );
    }); 
  }

}