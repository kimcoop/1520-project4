var Alert = {
  els: {
    alert: $('#alert'),
    alertText: $('.alert-text')
  },
  fadeTimeIn: 200,
  fadeTimeOut: 1800,
  delayTime: 500,
  
  showWithFade: function( message, type ) {
    Alert.els.alert.removeClass( 'alert-success alert-error' );
    Alert.els.alert.addClass( 'alert-' + type );
    Alert.els.alertText.html( message );
    Alert.els.alert.stop( true, true ).fadeIn( Alert.fadeTimeIn, function() {
      $(this).delay( Alert.delayTime );
      $(this).fadeOut( Alert.fadeTimeOut );
    });
  },

  dismiss: function( selector ) {
    $( selector ).fadeOut();
  }
   
}