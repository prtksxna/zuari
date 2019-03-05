module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        files: {
          'style.css': 'style.scss'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');


  grunt.registerTask('default', ['sass']);

};
