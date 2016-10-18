

logger.init();

jQuery(document).ready(function() {
    if(typeof( NotificationLoggerPHPErrors ) == 'undefined') {
        return;
    }

    jQuery.each(NotificationLoggerPHPErrors.errors, function(index, errorMessage) {
        logger.log(errorMessage, 'PHP Error');
    });

});