License
========================
This layout is derivative of Designmodo.com's Square UI theme. Purchase rights to this design at http://designmodo.com/square/ They deserve to get paid. Also, you'll get access to all of the assets and components.

Designmodo has yet to release any markup/css, so I've gone ahead and done the Elements and Navigation pages.

Bootstrap Square UI
========================

##designmodo.com Square UI & Twitter Bootstrap 3.0
This is a mashup.

See Square UI at http://designmodo.com/square/

See basic Twitter Bootstrap docs at http://twitter.github.io/bootstrap/

See Twitter Bootstrap 3.0 notes at https://github.com/twitter/bootstrap/pull/6342

##Build
I swapped out Bootstrap's Makefile build process with a Gruntfile instead. The Gruntfile is shorter, more readable, and frankly, I have no idea how to use Make. Sorry.

And Grunt supports liveload. Thank you Grunt. Thank you.

See Grunt docs at http://gruntjs.com/

##State of the Project
ELEMENTS and NAVIGATION need a bit more cross-browser testing.

I do not intend to do any more of the pages. The COMPONENTS page are bound to be site-specific, and they would be far too much work.

Mobile browsers are currently a bit ugly up because the Bootstrap popups are not currently popping in front of the codeblocks below them.

I also had to do a bit of hackery to make the select look non-native. The arrows on the right do not actually open the select, because they're an overlayed div. I know it's yucky, but so are selects. Sorry. Compromises.
