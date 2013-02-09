Uninotes - one place for everyone's notes
=========================================

Copyright 2012 George Nixon, released under an [Apache 2.0 License](http://www.apache.org/licenses/LICENSE-2.0.html).

An instance of this code is currently (9th Feb 2013) live at <http://uninot.es>.

About
-----

Uninotes was a project I started for my final year project during my bachelor's degree at Cardiff University, UK. The idea was that instead of my fellow students each making their own notes that would be seen by only them and perhaps a few of their friends, I help them collaborate together to make a greater pool of knowledge than any one of them could make by themselves.

The site has not really been thoroughly tested and used; it was made clear to me that my objective with this work was not to make something functioning and field test it, but to make something to be graded on its own merits. However, I saw the project as a way to make a website from scratch, borrowing elements from sites like GitHub and Wikipedia, in a way that I thought would make a great user experience. I made the site I wanted to see. Whether or not I managed that is another matter, and I've never been much for marketing or getting people into using my stuff, so I guess by releasing the source, I hope it will come in useful to at least one other person at some point.

Pre-Requisites
--------------

As Uninotes uses Google Docs (now Drive) for the notes users create, you will need a Google account. Create in Drive a folder which is shared publicly so anyone can edit and create documents in it. Note the URL to this folder for later.

Installation
------------

1. Since Uninotes is an instance of CakePHP, you should first follow the official instructions for [configuring a CakePHP deployment](http://book.cakephp.org/2.0/en/getting-started.html). It may be best to try this on a fresh copy of CakePHP, as this will display clearer errors and help to get your server set up to work with CakePHP (mod_rewrite for Apache in particular [1]).

2. Copy the ```app/config/example.core.php``` to app/config/core.php and set your own salt and seed random strings. Do the same for ```app/core/example.database.php```, filling in your own database credentials, and for ```app/models/example.document.php```, filling in your Google login details and the URL of your shared folder (see Pre-Requisites).

3. If things seem okay, start entering some data and trying out the site!


Notes
-----

1. Ubuntu 12.04 puts up a hell of fight, the configuration of modules is unlike most of the guides out there. I finally managed to enable this using the shell command ```a2enmod``` (requires root privileges) and typing ```rewrite``` at the prompt. Restart Apache as advised after that and things start looking alright.
