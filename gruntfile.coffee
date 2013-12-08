module.exports = (grunt) ->
  require("time-grunt") grunt
  require("load-grunt-tasks") grunt

  grunt.initConfig

    sass:
      dev:
        options:
          style: 'expanded',
          compass: false,
          trace: true
        files:
          './public/css/builds/app.css': './app/assets/sass/app.sass'
      dist:
        options:
          style: 'compressed',
          compass: true
        files:
          './app/css/builds/app.css': './app/assets/sass/*.sass'

    coffee:
      dev:
        options:
          bare: true
        files: [
          expand: true
          cwd: './app/assets/coffee'
          src: ['**/*.coffee']
          dest: '.coffee-cache'
          ext: '.js'
        ]

    clean:
      build:
        src: ["public/js/builds/*.js", "public/css/builds/*.css", ".coffee-cache/**/*"]

      deploy:
        src: ["public/js/builds/*.js", "!public/js/builds/build.min.js", "public/css/builds/*.css", "!public/css/builds/main.min.css"]

    jshint:
      files: [".coffee-cache/**/*.js"]

    watch:
      libs:
        files: ["public/js/libs/**/*.js"]
        tasks: ["concat:libs"]
        options:
          livereload: true

      sass:
        files: ["./app/assets/sass/*.sass"]
        tasks: ["sass:dev"]
        options:
          livereload: true

      coffee:
        files: ["./app/assets/coffee/**/*.coffee"]
        tasks: ["coffee:dev", "concat"]
        options:
          livereload: true

      css:
        files: ["public/css/*.css", "public/js/libs/**/*.css"]
        tasks: ["concat:css"]
        options:
          livereload: true

    connect:
      server:
        port: 8000
        base: "public"
        keepalive: true

    concat:
      app:
        src: [".coffee-cache/**/*.js"]
        dest: "public/js/builds/app.js"
        options:
          separator: ";"

      libs:
        src: ["public/js/libs/jquery/jquery.min.js", "public/js/libs/bootstrap/dist/js/bootstrap.js"]
        dest: "public/js/builds/libs.js"
        options:
          separator: ";"

      css:
        src: ["public/js/libs/bootstrap/dist/css/bootstrap.css", "public/css/style.css"]
        dest: "public/css/builds/main.css"

      deploy:
        src: ["public/js/builds/libs.js", "public/js/builds/app.js"]
        dest: "public/js/builds/build.js"
        options:
          separator: ";"

    uglify:
      js:
        src: "public/js/builds/build.js"
        dest: "public/js/builds/build.min.js"

    shell:
      serve:
        command: "php artisan serve && echo \"hey\""

    cssmin:
      minify:
        src: "public/css/builds/main.css"
        dest: "public/css/builds/main.min.css"

  grunt.event.on "watch", (action, filepath, target) ->
    grunt.log.writeln target + ": " + filepath + " has " + action

  grunt.registerTask "serve", ["shell:serve"]
  grunt.registerTask "build", ["jshint", "clean:build", "sass:dev", "coffee:dev", "concat"]
  grunt.registerTask "default", ["build", "watch"]
  grunt.registerTask "deploy", ["concat:deploy", "uglify", "cssmin", "clean:deploy"]