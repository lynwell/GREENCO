module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*!版权所有 <%= pkg.name %> 李松阳 494886251@qq.com <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      my_target: {
        files: {
          'src/js/lib/swfobject.min.js': ['src/js/lib/swfobject.js'],
          'src/js/lib/search.min.js': ['src/js/lib/search.js']
        }
      }
    },
    imagemin: {
      /* 压缩图片大小 */
      dist: {
          options: {
              optimizationLevel: 3 //定义 PNG 图片优化水平
          },
          files: [
              {
              expand: true,
              cwd: 'src/img/',
              src: ['**/*.{png,jpg,jpeg}'], // 优化 img 目录下所有 png/jpg/jpeg 图片
              dest: 'src/img1/' // 优化后的图片保存位置，覆盖旧图片，并且不作提示
              }
            ]
          }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  // Default task(s).
  grunt.registerTask('default', ['uglify','imagemin']);

};