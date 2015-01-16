module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        less: {
            development: {
                options: {
                    compress: false, // flase makes minified version
                    yuicompress: false, // bibliotēka, lai CSS padarītu mazāku
                    optimization: 2, // 0 - priekš debug, 2 - sataisa css optimizētaāku
                    sourceMap: true, // sourceMap faili paredzēti, lai varētu redzēt oriģinālos failus caur inspektoru
                    sourceMapFilename: 'public/css/site.css.map', // kur grantam ielikt source map
                    sourceMapURL: '/css/site.css.map', // 
                    sourceMapRootpath: '/',
                    outputSourceFiles: true  //  
                },
                files: {
                    "public/css/site.css": "public/less/init.less"
                }
            }
            prod: {
                options: {
                    compress: true,
                    cleancss: true,
                    optimization: 2,
                    sourceMap: false
                },
                files: {
                    "public/css/compiled.css": "public/less/init.less"
                }
            }
        },
        watch: {
            styles: {
                files: ['public/less/**/*.less'], // faili, kurus vērot, ** - visās mapēs
                tasks: ['less'], // atrodot failus tiek pielietots uzdevums (task) "less"
                options: {
                    nospawn: true // true neizvadīs komadrindā tehnisko informāciju
                }
            }
        }

    });

    // Load the plugin that provides the tasks.
    grunt.loadNpmTasks('grunt-contrib-less'); // kompilē less failus uz css
    grunt.loadNpmTasks('grunt-contrib-watch'); // vēro un pārkompilē less failu izmaiņas

    // Default task(s).
    grunt.registerTask('default', ['watch']);

};

