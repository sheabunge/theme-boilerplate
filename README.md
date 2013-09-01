# Theme Boilerplate

Theme Boilerplate is a starter theme for WordPress, designed to give you a base to use when creating your own WordPress theme.

Theme Boilerplate is built with [Hybrid Core](https://github.com/justintadlock/hybrid-core), [Sass](http://sass-lang.com) and [Compass](http://compass-style.com). It uses [Grunt](http://gruntjs.com) for build automation, and [Composer](http://getcomposer.org) for dependency management.

# Getting Started

## Clone the repo

First of all, clone the boilerplate using Git into a new theme directory (replace `my-awesome-theme` with the slug of your theme):

	git clone https://github.com/bungeshea/theme-boilerplate my-awesome-theme
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

## Building the theme

Theme Boilerplate requires [Composer](http://getcomposer.org/download/), [Grunt](http://gruntjs.com/getting-started), and [Compass](https://github.com/bungeshea/theme-boilerplate/wiki/Installing-Compass) to be installed.

Once you have installed those three software by following the instructions on the linked pages, you can ready to build the theme. Initially, you will need to install Composer packages and Node modules:

	composer install
	npm install

The next step is to build the assets. This is done using Grunt. To compile Sass into CSS, minify the compiled CSS, and minify and concatenate JavaScript, all you need to do is run the default task like so:

	grunt

Compressing images is not available through the default task, and must be ran manually:

	grunt imagemin

Once you have run the default task for the first time, you can run the `watch` task which will poll for changed files and run the appropriate tasks on them. If you have the [LiveReload browser extension](http://go.livereload.com/extensions) installed, you can enable it when running the `watch` task, and everything will just work.

	grunt watch

## Staying up to date

When a new version of Theme Boilerplate is released, you can pull in the changes using Git:

	git pull boilerplate master

Make sure all of your changes are committed first.
