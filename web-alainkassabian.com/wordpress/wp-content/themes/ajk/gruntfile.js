module.exports = function(grunt) {

    //Get all tasks from the package.json file
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /* Concurrent Task */

        concurrent: {
            watch: {
                tasks: ['watch', 'compass:dev', 'browserSync'],
                options: {
                    logConcurrentOutput: true
                }
            }
        },

        /* SASS task */

         compass: {
            dev: {
                options: {
                  sassDir: ['sass/'],
                  cssDir: ['css/'],
                  environment: 'development', /* development | production */
                  importPath: ['sass/'],
                  outputStyle: 'compressed', /* expanded for development | compressed for production */
                  watch: true,
                  sourcemap: true
                },
            },
            live: {
                options: {
                  sassDir: ['sass/'],
                  cssDir: ['css/'],
                  environment: 'production', /* development | production */
                  importPath: ['sass/'],
                  outputStyle: 'compressed', /* expanded for development | compressed for production */
                  force: true,
                  sourcemap: false
                },
            },
        },

        /* Javascript Tasks */

        uglify: {
            // Uglify files

            build: {
                src: 'js/src/**/*.js',
                dest: 'js/build/scripts.min.js'
            }

        },

        /* Run tasks when needed */

        watch: {
            js: {
                files: 'js/src/*.js',
                tasks: ['uglify']
            },
            gruntfile: {
                files: ['gruntfile.js'],
                options: {
                    reload: true
                }
            }
        },

        /* Browser Reload with BrowserSync */

        browserSync: {
            bsFiles: {
                src : [
                    'css/*.css',
                    'js/build/*.js',
                    '**/*.php'
                ]
            },
        }


    });

    // Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concurrent:watch']);
    grunt.registerTask('live', ['compass:live']);
};
