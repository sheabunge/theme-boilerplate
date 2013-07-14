module.exports = function(grunt) {
	'use strict';

	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		watch: {

			styles: {
				files: ['assets/scss/**/*.{scss,sass}'],
				tasks: ['compass', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},

			scripts: {
				files: ['assets/js/source/**/*.js', 'assets/js/vendor/**/*.js'],
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
					'assets/js/*.js',
					'*.html',
					'*.php',
					'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}'
				]
			}
		},

		jshint: {
			options: {
				jshintrc: '.jshintrc',
				'force': true
			},
			gruntfile: ['Gruntfile.js'],
			source: ['assets/js/source/**/*.js']
		},

		uglify: {

			plugins: {
				options: {
					sourceMap: 'assets/js/map/source-map-plugins.js.map'
				},
				files: {
					'assets/js/plugins.min.js': [
						'assets/js/source/plugins.js',
						'assets/js/vendor/**/*.js',
						'!assets/js/vendor/modernizr*.js'
					]
				}
			},

			main: {
				options: {
					sourceMap: 'assets/js/map/source-map-main.js.map'
				},
				files: {
					'assets/js/main.min.js': [
						'assets/js/source/main.js'
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
		            cwd: 'assets/images/',
		            src: '**/*',
		            dest: 'assets/images/'
		        }]
		    }
		}

	});

	grunt.registerTask('default', ['jshint', 'uglify', 'compass', 'cssmin']);
};
