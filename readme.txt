=== Bootscore Child Theme ===

Contributors: Bastian Kreiter, Justin Kruit, DrDBanner

Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 6.0.0
License: MIT License
License URI: https://github.com/bootscore/bootscore-child/blob/main/LICENSE


== Description ==

Child Theme for Bootscore, Copyright 2019 - 2024 Bootscore.

Start developing your new project right away in a upgrade-safe way using overrides by copying files from Bootscore parent theme.


== Live preview ==

https://bootscore.me


== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.


== Documentation ==

https://bootscore.me/documentation/using-the-child-themes/


== Changelog ==

Please visit https://github.com/bootscore/bootscore-child/releases for a detailed changelog.

== Minifying CSS ==
First make sure you have node and npm installed.
If you are on a mac you can install it using homebrew:
https://formulae.brew.sh/formula/node

You can also install it directly from npm:
https://docs.npmjs.com/downloading-and-installing-node-js-and-npm

All css changes should be made in the scss files. Bootscore automatically compiles the scss into main.css

While developing, run npm run watch-css to minify CSS
This will compile the main.css file in assets/css to main.min.css

