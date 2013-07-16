module.exports = function(grunt) {
	'use strict';

	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		watch: {

			styles: {
				files: ['scss/**/*.{scss,sass}'],
				tasks: ['compass', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},

			scripts: {
				files: ['js/source/**/*.js', 'js/vendor/**/*.js'],
				tasks: ['jshint', 'uglify'],
				options: {
					debounceDelay: 500
				}
			},

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

		jshint: {
			options: {
				jshintrc: '.jshintrc',
				'force': true
			},
			gruntfile: ['Gruntfile.js'],
			source: ['js/source/**/*.js']
		},

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

		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},

		cssmin: {
			dist: {
				files: {
					'style.min.css': ['style.css']
				}
			}
		},

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

	grunt.registerTask('default', ['jshint', 'uglify', 'compass', 'cssmin']);
};
