Instructions for configuring a clone:

Since Uninotes is an instance of CakePHP, you should first follow the instructions for configuring a CakePHP deployment at http://book.cakephp.org/2.0/en/getting-started.html. It may be best to try this on a fresh copy of CakePHP, as this will display clearer errors and help to get your server set up to work with CakePHP (mod_rewrite for Apache in particular [1]).

Copy the app/config/example.core.php to app/config/core.php and set your own salt and seed random strings.


Notes:

1. Ubuntu 12.04 puts up a hell of fight, the configuration of modules is unlike most of the guides out there. I finally managed to enable this using the shell command 'a2enmod' (requires root privileges) and typing 'rewrite' at the prompt. Restart Apache as advised after that and things start looking alright.
