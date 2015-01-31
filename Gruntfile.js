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
            },
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
        
        autoprefixer: {
            dist: {
                options: {
                    // Task-specific options go here.
                    // Default browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
                    // lai atjaunotu statistiku par izmantotajām pārlūku versijām
                    // komandridā jāieraksta: npm update caniuse-db
                    browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9', 'ie 10']
                },
//                src: "public/css/site.css", // ja izmanto src bez dist, tad tas automātiski prefikso un nomaina
//                dest: "public/css/site.dist.css"
                files: {
                    "public/css/site.dist.css": "public/css/site.css"
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
        },
        bower: {
            install: {
               //just run 'grunt bower:install' and you'll see files from your Bower packages in lib directory
                options: {
                    targetDir: "public/assets"
                }
            }
        }
    });

    // Load the plugin that provides the tasks.
    grunt.loadNpmTasks('grunt-contrib-less'); // kompilē less failus uz css
    grunt.loadNpmTasks('grunt-contrib-watch'); // vēro un pārkompilē less failu izmaiņas
    grunt.loadNpmTasks('grunt-autoprefixer'); // 
    grunt.loadNpmTasks('grunt-bower-task');
    
    // Default task(s).
    grunt.registerTask('default', ['watch']); // 
    grunt.registerTask('my-comand', ['bower:install','less:development','autoprefixer:dist']); // 

};

// SĀKOT STRĀDĀT PIE PROJEKTA
//
// $ grunt wathc / izslēdz ar ctrl+c