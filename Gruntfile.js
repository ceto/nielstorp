'use strict';
module.exports = function(grunt) {
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  var jsFileList = [
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/transition.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/alert.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/button.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/carousel.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/collapse.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/modal.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/popover.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/scrollspy.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/tab.js',
    // 'assets/vendor/bootstrap-sass-official/assets/javascripts/bootstrap/affix.js',
    'assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
    'assets/vendor/isotope/dist/isotope.pkgd.min.js',
    'assets/vendor/masterslider/masterslider.js',
    'assets/js/plugins/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/**/*.min.*'
      ]
    },
    sass: {
      dev: {
        files: {
          'assets/css/main.css': ['assets/scss/main.scss']
        },
        options: {
          outputStyle: 'nested',
          sourceMap: true
        }
      },
      build: {
        files: {
          'assets/css/main.min.css': ['assets/scss/main.scss']
        },
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/scripts.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      dev: {
        options: {
          map: true
        },
        src: 'assets/css/main.css'
      },
      build: {
        src: 'assets/css/main.min.css'
      }
    },
    modernizr: {
      build: {
        devFile: 'assets/vendor/modernizr/modernizr.js',
        outputFile: 'assets/js/vendor/modernizr.min.js',
        files: {
          'src': [
            ['assets/js/scripts.min.js'],
            ['assets/css/main.min.css']
          ]
        },
        extra: {
          shiv: false
        },
        uglify: true,
        parseFiles: true
      }
    },
    version: {
      default: {
        options: {
          format: true,
          length: 32,
          manifest: 'assets/manifest.json',
          querystring: {
            style: 'roots_css',
            script: 'roots_js'
          }
        },
        files: {
          'lib/scripts.php': 'assets/{css,js}/{main,scripts}.min.{css,js}'
        }
      }
    },
    notify: {
      options: {
        enabled: true,
        max_jshint_notifications: 5, // maximum number of notifications from jshint output
        title: "Project Name" // defaults to the name in package.json, or will use project directory's name
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/*.scss',
          'assets/scss/**/*.scss'
        ],
        tasks: [
          'sass:dev',
          'autoprefixer:dev'
        ]
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/main.css',
          'assets/js/scripts.js',
          'templates/*.php',
          '*.php'
        ]
      }
    }
  });

  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'jshint',
    'sass:dev',
    'autoprefixer:dev',
    'concat',
    'notify'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify',
    'modernizr',
    'version',
    'notify'
  ]);
};
