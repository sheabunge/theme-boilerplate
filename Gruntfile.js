module.exports = function (grunt) {
	'use strict';

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		/**
		 * Watch for changes in files
		 * and run tasks when they are modified
		 */
		watch: {

			/**
			 * Compile, minify, and move Sass stylesheets
			 */
			styles: {
				files: ['scss/**/*.{scss,sass}'],
				tasks: ['compile-css'],
				options: {
					debounceDelay: 500
				}
			},

			/**
			 * Vendor and source JavaScript
			 */
			scripts: {
				files: ['js/source/**/*.js', 'js/vendor/**/*.js'],
				tasks: ['jshint', 'uglify'],
				options: {
					debounceDelay: 500
				}
			},

			/**
			 * Send commands to the LiveReload browser extension
			 */
			livereload: {
				options: {
					livereload: true
				},
				files: [
					'style.css',
					'js/*.js',
					'*.html',
					'*.php',
					'images/**/*.{png,jpg,jpeg,gif,webp,svg}'
				]
			}
		},

		/**
		 * Lint JavaScript
		 */
		jshint: {
			options: {
				force: true,
				smarttabs: true,
				eqeqeq: true,
				newcap: true,
				eqnull: true
			},
			gruntfile: {
				options: {
					globals: {
						module: true
					}
				},
				files: {
					'Gruntfile.js'
				}
			},
			source: ['js/source/**/*.js']
		},

		/**
		 * Compress JavaScript and create source maps
		 */
		uglify: {

			plugins: {
				options: {
					sourceMap: 'js/map/source-map-plugins.js.map'
				},
				files: {
					'js/plugins.min.js': [
						'js/source/plugins.js',
						'js/vendor/**/*.js',
						'!js/vendor/modernizr*.js'
					]
				}
			},

			main: {
				options: {
					sourceMap: 'js/map/source-map-main.js.map'
				},
				files: {
					'js/main.min.js': [
						'js/source/main.js'
					]
				}
			}
		},

		/**
		 * Use Compass to compile Sass stylesheets
		 */
		compass: {
			dist: {}
		},

		/**
		 * Fix the relative URLs and copy the CSS files into
		 * the theme root
		 */
		replace: {
			css: {
				src: ['css/style.css', 'css/editor-style.css'],
				dest: './',
				replacements: [{
					from: '../',
					to: ''
				}]
			}
		},

		/**
		 * Remove the duplicate CSS
		 */
		clean: {
			css: {
				src: ['<%= replace.css.src %>']
			}
		},

		/**
		 * Minify style.css and all files in the css/ directory
		 * to be compatible with SCRIPT_DEBUG
		 *
		 * editor-style.css is not minified by convention
		 * Minify style.css to be compatible with SCRIPT_DEBUG
		 */
		cssmin: {
			style: {
				files: {
					'style.min.css': ['style.css']
				}
			},
			css: {
				expand: true,
				cwd: 'css/',
				src: ['*.css', '!*.min.css'],
				dest: 'css/',
				ext: '.min.css'
			}
		},

		/**
		 * Compress images to save bandwidth and load times.
		 *
		 * This task must be ran manually using `grunt imagemin`
		 */
		imagemin: {
		    dist: {
		        options: {
		            optimizationLevel: 7,
		            progressive: true
		        },
		        files: [{
		            expand: true,
		            cwd: 'images/',
		            src: '**/*',
		            dest: 'images/'
		        }]
		    }
		}

	});

	grunt.registerTask('compile-css', ['compass', 'replace:css', 'clean:css', 'cssmin'] );
	grunt.registerTask('default', ['jshint', 'uglify', 'compile-css'] );
};
