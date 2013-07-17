var Alert = {
  els: {
    alert: $('#alert'),
    alertText: $('.alert-text')
  },
  fadeTimeIn: 400,
  fadeTimeOut: 1800,
  
  showWithFade: function( message, type ) {
    Alert.els.alert.removeClass( 'alert-success alert-error' );
    Alert.els.alert.addClass( 'alert-' + type );
    Alert.els.alertText.html( message );
    Alert.els.alert.stop( true, true ).fadeIn( Alert.fadeTimeIn, function() {
      $(this).fadeOut( Alert.fadeTimeOut );
    });
  },

  dismiss: function( selector ) {
    $( selector ).fadeOut();
  }
   
}