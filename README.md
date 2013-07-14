# WordPress Theme Boilerplate

This is a starter theme I use when creating a custom theme for a site.

## Tools

Theme Boilerplate is build with [Hybrid Core](https://github.com/justintadlock/hybrid-core). It uses [Grunt](http://gruntjs.com) for build automation, [Sass](http://sass-lang.com) and [Compass](http://compass-style.com) for styles, and [JSHint](http://jshint.com) for JavaScript linting.

### [Grunt](http://gruntjs.com)

Grunt requires node to run. Download and install [nodejs](http://nodejs.org), open a terminal and install the Grunt CLI:

    npm install -g grunt-cli

Next change to the theme directory, and run:

    npm install

This will install the required node modules needed to run Grunt. Then you can run `grunt` or `grunt watch` in the theme directory to lint and minify JavaScrpt, and compile Sass stylesheets to minified CSS.

A complete `Gruntfile.js` is available in the theme root. You might want to open up `package.json` and change the information there. Keep in mind that the version number listed in `package.json` must be at least three digits (like `0.1.0` or `3.0.1.2`), and you'll want to keep a `README.md` file in the theme root to stop node from bugging you about it.

### [Compass](http://compass-style.com)

A Compass `config.rb` file is available in the theme root, and some Sass (SCSS) stylesheets in `assets/scss/`. Compilation is taken care of if you choose to use Grunt (see above), or you can just run Compass from the command line or from a GUI.

Compass requires Ruby to work. On Linux or Mac where Ruby is already installed, installing Compass is as easy as:

    gem install compass

If, like me, you use Windows, check out [this article I wrote](http://bungeshea.com/installing-sass-compass-on-windows) on how to get Ruby along with the Sass and Compass gems (and a few Compass extensions) up and running on Windows.

### [JSHint](http://jshint.com)

If you use Grunt, JavaScript linting with JSHint is automatic. If you prefer to run JSHint manually, a `.jshintrc` config file is available in the theme root. This file will also be used by Grunt.

## Components

### CSS/SCSS

The uncompiled SCSS source is stored in `assets/scss/`. The files are compiled into the theme root, and `style.css` is minified into `style.min.css`. `editor-style.css` is not minified.

### JavaScript

Scripts are stored in `assets/js/source/`; vendor scripts in `assets/js/vendor/`. Grunt uses Uglify to concatenate a mixture of these scripts into `assets/js/plugins.min.js` and `assets/js/scripts.min.js`, and create source maps under `assets/js/map`

### Theme Templates

The template files included in this theme are a modified version of those included in Justin Tadlock's [Hybrid Base](https://github.com/justintadlock/hybrid-base) theme.

### Hybrid Core

Theme Boilerplate uses [Hybrid Core](https://github.com/justintadlock/hybrid-core) to enhance the theme's functionality. Hybrid Core is stored as a Git submodule under `library/`. The setting up of Hybrid Core is done in `functions.php`.

### Languages

Theme Boilerplate is fully ready for localization. No language templates are provided, but it should be fairly trivial to generate a `.pot` file and add `.po` and `.mo` files as required.

### Images

Images used within the theme should be stored under `assets/images/`. Running the `grunt imagemin` command will compress PNG and JPEG files to save bandwidth and load times on the server. Included are a sample favicon and Apple Touch Icon.

### Fonts

Fonts, including icon fonts and textual fonts, are to be stored under `assets/fonts/`. The fantastic [Open Sans](http://opensans.com) font is included with the theme. If you want to add others, simply add the files under the `assets/fonts/` directory and edit `assets/scss/_fonts.css` as appropriate.

## Replacements

It's a good idea to replace the Theme Boilerplate branding with branding more closely related to your theme. An easy way to do this is to perform a find-and-replace on the theme templates.

1. Search for `'theme-boilerplate'` (inside single quotations) to capture the text domain.
2. Search for `boilerplate_` to capture all the function names.
3. Search for `Theme_Boilerplate` to capture DocBlock packages.
4. Search for `Theme Boilerplate` to capture comments.
5. Search for `boilerplate-` to capture prefixed handles.
