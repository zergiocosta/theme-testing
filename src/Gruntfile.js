// -------------------------------------------------------
// Gruntfile.js for Sergio Costa's projects
// Version: 2.0.0
//
// Author:  Sergio Costa
// URL:     http://www.sergiocosta.net.br
// Contact: sergio.costa@outlook.com
// -------------------------------------------------------
"use strict";

module.exports = function(grunt) {

    // Para instalar matchdep na pasta src do projeto: $ npm install matchdep
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    var projectConfig = {

        // Setting Directories
        dirs: {
            app:  "../",
            js:   "../assets/js",
            sass: "../assets/sass",
            css:  "../assets/css",
            img:  "../assets/img"
        },

        // Metadata
        pkg: grunt.file.readJSON("package.json"),
        banner:
        "\n" +
        "/*\n" +
         "* -------------------------------------------------------\n" +
         "* Project: {Project Name}\n" +
         "* Version: 1.0.0\n" +
         "*\n" +
         "* Author:  Sergio Costa\n" +
         "* URL:     http://sergiocosta.net.br\n" +
         "* Contact: sergio.costa@outlook.com\n" +
         "*\n" +
         "*\n" +
         "* Copyright (c) 2014 - {Project Name}\n" +
         "* -------------------------------------------------------\n" +
         "*/\n" +
         "",

        // Watch 
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-watch --save-dev
        watch: {
            options: {
                livereload: true
            },
            compass: {
                files: [
                    "<%= dirs.css %>/{,*/}*.css",
                    "<%= dirs.sass %>/{,*/}*.{scss,sass}"
                ],
                tasks: ["compass", "notify:compass"]
            },
            js: {
                files: [
                    "<%= dirs.js %>/main.js",
                    "<%= dirs.js %>/plugins.js"
                ],
                tasks: ["uglify", "notify:js"]
            },
            html: {
                files: [
                    // supported files: html, htm, shtml, shtm, xhtml, php, jsp, asp, aspx, erb, ctp
                    "<%= dirs.app %>/*.{html,htm,shtml,shtm,xhtml,php,jsp,asp,aspx,erb,ctp}"
                ]
            }
        },

        // Uglify
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-uglify --save-dev
        uglify: {
            options: {
                mangle: false,
                banner: "<%= banner %>"
            },
            dist: {
                files: {
                    "<%= dirs.js %>/main.min.js": [
                    "<%= dirs.js %>/plugins.js",
                    "<%= dirs.js %>/main.js"
                    ]
                }
            }
        },

        // Compass
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-compass --save-dev
        compass: {
            dist: {
                options: {
                    sassDir: '../assets/sass',
                    cssDir: '../assets/css',
                    environment: "development",
                    outputStyle: "compressed",
                    force: true,
                    config: "config.rb"
                }
            }
        },

        // Notify
        // Para instalar na pasta src do projeto: $ npm install grunt-notify --save-dev
        notify: {
          compass: {
            options: {
              title: "SASS - <%= pkg.title %>",
              message: "Compilado e minificado com sucesso!"
            }
          },
          js: {
            options: {
              title: "Javascript - <%= pkg.title %>",
              message: "Minificado e validado com sucesso!"
            }
          },
          image: {
            options: {
              title: "<%= pkg.title %>",
              message: "Imagens minificadas!"
            }
          }
        },

        // Image Optimization
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-imagemin --save-dev
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 3,
                    progressive: true
                },
                files: [{
                    expand: true,
                    cwd: "<%= dirs.img %>/",
                    src: "<%= dirs.img %>/**",
                    dest: "<%= dirs.img %>/"
                }]
            }
        }

    };

    // Init Grunt
        grunt.initConfig(projectConfig);


    // Register Tasks
    // ----------------

    // Watch Project - $ grunt
    grunt.registerTask( "default", [ "watch" ]);

    // Uglify js - $ grunt u
    grunt.registerTask( "u", [ "uglify" ]);

    // Optimize the images files - $ grunt o
    grunt.registerTask( "o", [ "imagemin" ]);


};