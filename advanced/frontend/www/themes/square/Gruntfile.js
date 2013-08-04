module.exports = function(grunt) {
	grunt.initConfig({
        less: {
            core: {
                options: {
//                    paths: ['less']
                },
                files: {
                    'dist/css/bootstrap.css': 'less/bootstrap.less',
                    'dist/css/square-ui.css': 'dist/less/square-ui.less'
                }
            }
        },
        concat: {
            js: {
                src: [
                    'js/bootstrap-tooltip.js',
                    'js/*.js'
                ],
                dest: 'dist/js/bootstrap.js'
            }
        },
        uglify: {
            js: {
                files: {
                    'dist/js/bootstrap.min.js': ['dist/js/bootstrap.js']
                }
            }
        },
        htmllint: {
            index: {
                src: ['dist/index.html']
            }
        },
        watch: {
            less: {
                options: { livereload: true },
                files: ['less/*.less', 'dist/less/*.less'],
                tasks: ['less']
            },
            js: {
                options: { livereload: true },
                files: 'js/*.js',
                tasks: ['concat:js', 'uglify']
            },
            html: {
                options: { livereload: true },
                files: ['dist/index.html'],
//                tasks: ['htmllint']
                tasks: []
            }
        }
    });
    grunt.registerTask('default', ['less', 'concat', 'uglify']);

    grunt.loadNpmTasks("grunt-contrib-less");
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-html");
}
