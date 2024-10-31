=== Shortcode Redirect ===
Contributors: tonsnoei
Tags: shortcode, shortcode redirect, counter, post redirect, page redirect, redirect, 307, 301, shortcode, tonsnoei
Requires PHP: 5.0.0
Requires at least: 3.0
Tested up to: 4.9
Stable tag: 1.0.00

Use a shortcode to redirect to another page, post, link or download. 

== Description ==
With this plugin your able to set a redirect after a specified time of seconds. Place a redirect shortcode in your page or post, define the time out and the texts to show. You can define the text to show when counting down and the text to show after count down is finished. Use a place holder to show the number of seconds before redirect. The plugin will interactivily count down to zero.

An example:

`[redirect url='http://www.google.nl' sec='5' txt='You are redirected within {SECONDS} seconds...' txt_finished='Redirecting now']`

to redirect after 5 seconds to the given url with javascript count down.

= Attributes =

* url - The url to redirect to.
* sec (optional) - The time out before redirect
* txt (optional) - The text to show in time-out period. Optionally add the place holder {SECONDS} to show count down. When left empty no text is shown.
* txt_finished (optional) - The text to show when redirect time out is elapsed (at the end).

= Donate =
No donations needed

= Features =
* Interactive redirect with count down timer.
* Use custom texts
* Javascript enabled
* Javascript count down before redirect
* Set the time out before redirect
* Easy to use

== Screenshots ==

1. Adding the shortcode