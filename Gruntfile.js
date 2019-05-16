module.exports = function(grunt) {

	// ===========================================================================
	// CONFIGURE GRUNT ===========================================================
	// ===========================================================================
	grunt.initConfig({

		// get the configuration info from package.json ----------------------------
		// this way we can use things like name and version (pkg.name)
		pkg: grunt.file.readJSON('package.json'),

		// configure jshint to validate js files -----------------------------------
		jshint: {
			options: {
				reporter: require('jshint-stylish')
			},
			all: ['Grunfile.js', 'assets/js/**/*.js']
		},

		// configure uglify to minify js files -------------------------------------
		uglify: {
			options: {
				banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
			},
			build: {
				files: {
					'assets/js/project.min.js': 'assets/js/**/*.js'
				}
			}
		},

		// compile sass stylesheets to css -----------------------------------------
		sass: {
			dist: {
				files: {
					'assets/css/style.css' : 'assets/sass/style.scss'
				}
			}
		},

		// configure cssmin to minify css files ------------------------------------
		cssmin: {
			options: {
				banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
			},
			build: {
				files: {
					'assets/css/style.min.css': 'assets/css/style.css'
				}
			}
		},

		// configure optimizing images ------------------------------------
		imagemin: {
			dynamic: {
				options: {
					progressive: true
				},
				files: [{
					expand: true,
					cwd: 'assets/images',
					src: ['**/*.{png,jpg,jpeg,gif}'],
					dest: 'assets/images/'
				}]
			}
		},

		// configure watch to auto update ------------------------------------------
		watch: {
			sass: {
				files: 'assets/sass/**/*.scss',
				tasks: ['sass', 'cssmin']
			},
			scripts: {
				files: 'assets/js/**/*.js',
				tasks: ['jshint', 'uglify']
			}
		}

	});

	// ===========================================================================
	// LOAD GRUNT PLUGINS ========================================================
	// ===========================================================================
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-notify');

	// ===========================================================================
	// CREATE TASKS ==============================================================
	// ===========================================================================
	grunt.registerTask('default', ['jshint', 'uglify', 'cssmin', 'sass', 'imagemin']);

};