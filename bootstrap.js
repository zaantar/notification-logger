

logger.init();

/**
 * Show PHP errors and warnings if there are any.
 */
jQuery(document).ready(function() {

    //noinspection JSUnresolvedVariable
    if(typeof(NotificationLoggerPHPErrors) == 'undefined') {
        return;
    }


    const errorsToShow = 3;
    //noinspection JSUnresolvedVariable
    var errors = NotificationLoggerPHPErrors.errors;
    jQuery.each(errors.slice(0, errorsToShow), function(index, error) {
        logger.log(error.message, 'PHP ' + error.type);
    });

    if(errors.length > errorsToShow) {
        logger.log("There are " + errors.length - errorsToShow + " more PHP errors or warnings. Check your debug.log for details", 'Too many PHP errors');
    }

});