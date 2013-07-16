var Alert = {
  el: $('#alert'),
  textEl: $('.alert-text'),
  
  show: function( message, type ) {
    Alert.el.removeClass( 'alert-success alert-error' );
    Alert.el.addClass( 'alert-' + type );
    Alert.textEl.html( message );
    Alert.el.fadeIn();
  }
   
}