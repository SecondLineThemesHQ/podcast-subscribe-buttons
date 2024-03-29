# Podcast Subscribe Buttons

A sleek WordPress Plugin that allows creating custom Podcast Subscribe Buttons.


== Description ==

This plugin helps to easily include custom and Podcast-specific Subscribe Buttons anywhere within your site with a simple shortcode. 
The Podcast Subscribe Buttons are intended for podcasters and therefore the list of companies/icons only include podcast-related companies. (Need a new icon? Let us know!)

With the Podcast Subscribe Buttons plugin, you could display links to subscribe to your podcast across various external podcast platforms, those links may include regular links to your pages on external podcast platforms, direct links to RSS feeds, or URI links to open directly in an external application. 

To use the plugin, simply create a new "Subscribe Button" via the menu that appears in your WordPress dashboard, adjust the default settings and links, and display the button via a shortcode anywhere within your site. See example below:
`[podcast_subscribe id="1789"]`

== About SecondLineThemes ==

SecondLineThemes is a theme shop and developer of Podcast related themes and plugins for WordPress. To hear more about us please check our website:
[https://secondlinethemes.com](https://secondlinethemes.com)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/podcast-subscribe-buttons` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Add new subscribe buttons via the 'Subscribe Buttons' section in your WordPress admin panel.
4. Add the shortcode anywhere within your site. (example: [podcast_subscribe id="1789"] )
5. (Optional) Add an attribute (type="inline" / "modal" / "list") to override the button type on different locations. (example: [podcast_subscribe id="1789" type="inline"] )


== Frequently Asked Questions ==

= Do you support any additional networks or icons? =
Sure. If you feel something is missing, please reach out and we will ensure to add in a future update.

== Screenshots ==

1. Display a Modal (Pop-Up Lightbox) with a list of subscribe icons.
2. Inline buttons that can fit on any page.
3. Show a list of buttons on your sidebar or within posts and pages.

== Changelog ==

= 1.1.0 =
* Added a new "Type" attribute (defaults to "null", can accept "inline" / "modal" / "list") to override the button type. (example: [podcast_subscribe id="1789" type="inline"] )
* Bumped compatibility to WordPress 5.2.

= 1.0.9 =
* Fixed list button styles.

= 1.0.8 =
* Updated compatibility with WordPress 5.1.
* Updated CMB2 to latest version.

= 1.0.7 =
* Added Anchor.fm and Radio Public icons.
* Added support for custom buttons with custom URLs.
* Updated CMB2 to latest version.

= 1.0.6 =
* You can now add multiple buttons and modals per page without conflicts.
* Spotify added as an exception protocol to support Spotify URIs.
* Removed Clammr from the icon list (it was shut down more than a year ago).

= 1.0.5 =
* Changed modal class to prevent theme conflicts.

= 1.0.4 =
* Fixed query conflict on pages/posts with comments. 
* Fixed CastBox icon.
* Added podcast.de icon.

= 1.0.3 =
* Compatibility with WordPress 5.0 and Gutenberg.

= 1.0.2 =
* Fixed unresponsive buttons.

= 1.0.1 =
* Added demo screenshots.
* Modified readme.txt file.
* Check if CMB2 is already installed.

= 1.0 =
* Initial Release.
