const mix = require('laravel-mix');

let sassFiles = [
    'resources/css/login.sass',
    'resources/css/profile.sass',
    'resources/css/subject.sass',
    'resources/css/change.sass',
    'resources/css/topic.sass',
    'resources/css/question.sass',
    'resources/css/curator.sass',
    'resources/css/faculty.sass',
    'resources/css/curator-add.sass',
    'resources/css/question-add.sass',
    'resources/css/test.sass',
    'resources/css/test-add.sass',
    'resources/css/testing.sass',
    'resources/css/testing-add.sass'
]

mix.js('resources/js/burger.js', 'public/js')
    .js('resources/js/add-topic.js', 'public/js')
    .js('resources/js/add-variant.js', 'public/js')
    .js('resources/js/print-test.js', 'public/js');
for (let i = 0; i < sassFiles.length; i++){
    mix.sass(sassFiles[i], 'public/css')
        .options({
            postCss: [
                require('autoprefixer')({
                    browsers: ['last 4 versions']
                })
            ]
        });
    };


