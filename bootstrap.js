

logger.init();

/**
 * Show PHP errors and warnings if there are any.
 */
jQuery(document).ready(function() {

    //noinspection JSUnresolvedVariable
    if(typeof(NotificationLoggerPHPErrors) == 'undefined') {
        return;
    }

    //noinspection JSUnresolvedVariable
    jQuery.each(NotificationLoggerPHPErrors.errors, function(index, error) {
        logger.log(error.message, 'PHP ' + error.type);
    });

});