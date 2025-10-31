# Bootscore Child Theme

[![Github All Releases](https://img.shields.io/github/downloads/bootscore/bootscore-child/total.svg)](https://github.com/bootscore/bootscore-child/releases)
[![Packagist Prerelease](https://img.shields.io/packagist/vpre/bootscore/bootscore-child?logo=packagist&logoColor=fff)](https://packagist.org/packages/bootscore/bootscore-child)

Start developing your new WordPress project right away in a upgrade-safe way using overrides by copying files from [Bootscore](https://github.com/bootscore/bootscore) parent theme.

## Installation

1. Download latest [bootscore-child.zip](https://github.com/bootscore/bootscore-child/releases/latest/download/bootscore-child.zip) release.
2. In your admin panel, go to Appearance > Themes and click the Add New button.
3. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
4. Click Activate to use your new theme right away.

## Minifying CSS
1. First, make sure you have node and npm installed.
⋅⋅⋅⋅* If you are on a mac you can install it using homebrew (https://formulae.brew.sh/formula/node)
⋅⋅⋅⋅* You can also install it directly from npm (https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

2. All styling changes should be made in the scss files. Bootscore automatically compiles the scss into `main.css`
3. While developing, run `npm run watch-css` to minify CSS. This will compile the main.css file in `assets/css` to `main.min.css`