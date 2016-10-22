# Notification Logger 

This is a WordPress plugin. For the standalone notification-logger, please go [here](https://github.com/hkirat/notification-logger).
 
Ever wondered why you have to open the console every time you want to want to log a variable?
Notification Logger helps provide desktop notification for your console messages.

During development, You have to check the browser's inspector periodically to see what your console.log()'s are saying.
With this plugin, you can develop and debug WordPress sites, themes and plugins and see console messages as Desktop Notifications.

It also catches PHP warnings and errors and displays notifications for them as soon as the page loads (unless the error breaks the site entirely).

[Original demo](https://hkirat.github.io/notification-logger/)

This plugin is obviously intended only for development sites. **Never use it in a production environment.**

## Screenshot

![notification-logger](./images/image.png)

## Installing
 - Clone or download the plugin into the `wp-content/plugins` directory in your site
   - `git clone https://github.com/hkirat/notification-logger.git`
 - Activate the plugin.
   - `wp plugin activate notification-logger`
 - As long as it remains active, notifications will be displayed.

## Browser Support

Works best on latest versions of Google Chrome, Firefox and Safari.

## Credits

This fork is just a tiny change, turning it into a WordPress plugin.
All the important parts have been done by [hkirat](https://github.com/hkirat).