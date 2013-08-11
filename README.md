# Theme Boilerplate

Theme Boilerplate is a starter theme for WordPress, designed to give you a base to use when creating your own WordPress theme.

Theme Boilerplate is built with [Hybrid Core](https://github.com/justintadlock/hybrid-core). It uses [Grunt](http://gruntjs.com) for build automation, and [Sass](http://sass-lang.com) and [Compass](http://compass-style.com) for styles.

For more information, see the [wiki](https://github.com/bungeshea/theme-boilerplate/wiki).

# Getting Started

## Clone the repo

First of all, clone the boilerplate using Git into a new theme directory (replace my-awesome-theme with the slug of your theme):

	git clone --recursive https://github.com/bungeshea/theme-boilerplate my-awesome-theme
	cd my-awesome-theme

Next, rename the boilerplate remote:

	git remote rename origin boilerplate

If you're planning to deploy this theme using Git, add your own origin remote:

	git remote add origin https://github.com/your-username/my-awesome-theme

## Rebranding

You might like to rebrand the theme templates with the name of your theme. This can be accomplished by performing several search-and-replaces on the theme templates:

1. Search for `'theme-boilerplate'` to capture the text domain.
2. Search for `boilerplate_` to capture all the function names.
3. Search for `Theme_Boilerplate` to capture DocBlock packages.
4. Search for `Theme Boilerplate` to capture comments.
5. Search for `boilerplate-` to capture prefixed handles.

Also open up `scss/style.scss` and `package.json` and manually replace the information contained in those files. `scss/style.css` is used by WordPress to determine the theme information, and `package.json` is used by node when installing modules such as Grunt plugins.

Keep in mind that the version number listed in `package.json` must be at least three digits (like `0.1.0` or `3.0.1.2`), and you'll want to keep a `README.md` file in the theme root to stop node from bugging you about it.

## Building the theme

Theme Boilerplate uses [Grunt](https://gruntjs.com) for compiling and building the theme assets. See the wiki for information on [how to install and use Grunt](https://github.com/bungeshea/theme-boilerplate/wiki/Grunt). You will also need to [install Compass](https://github.com/bungeshea/theme-boilerplate/wiki) if you haven't already.

## Staying up to date

When a new version of Theme Boilerplate is released, you can pull in the changes using Git:

	git pull boilerplate master

Make sure all of your changes are committed first.

# Components

### CSS/SCSS

The uncompiled SCSS source is stored in `scss`. The files are compiled into the theme root, and `style.css` is minified into `style.min.css`. `editor-style.css` is not minified.

### JavaScript

Scripts are stored in `js/source`; vendor scripts in `js/vendor`. Grunt uses [UglifyJS](http://lisperator.net/uglifyjs/) to concatenate a mixture of these scripts into `js/plugins.min.js` and `js/scripts.min.js`, and create source maps under `js/map`

### Hybrid Core

Theme Boilerplate uses [Hybrid Core](https://github.com/justintadlock/hybrid-core) to enhance the theme's functionality. Hybrid Core is stored as a Git submodule under `library`. The setting up of Hybrid Core is done in `functions.php`.

### Images

Images used within the theme should be stored under `images`. Running the `grunt imagemin` command will compress PNG and JPEG files to save bandwidth and load times on the server.

### Fonts

Fonts, including icon fonts and textual fonts, are to be stored under `fonts`. The fantastic [Open Sans](http://opensans.com) font is included with the theme. If you want to add others, simply add the files under the `fonts` directory and edit `scss/_fonts.css` as appropriate. See the Compass website for information about using

### Theme Templates

The template files included in this theme are a modified version of those included in Justin Tadlock's [Hybrid Base](https://github.com/justintadlock/hybrid-base) theme.

### Languages

Theme Boilerplate is fully ready for localization. No language templates are provided, but it should be fairly trivial to generate a `.pot` file and add `.po` and `.mo` files as required.
