var Alert = {
  els: {
    main: $('#alert'),
    textEl: $('.alert-text')
  },
  fadeTimeIn: 400,
  fadeTimeOut: 1800,
  
  showWithFade: function( message, type ) {
    Alert.els.main.removeClass( 'alert-success alert-error' );
    Alert.els.main.addClass( 'alert-' + type );
    Alert.els.textEl.html( message );
    Alert.els.main.stop().fadeIn( Alert.fadeTimeIn, function() {
      $(this).fadeOut( Alert.fadeTimeOut );
    });
  }
   
}