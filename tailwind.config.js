// tailwind.config.js
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/css/**/*.css',
        './storage/framework/views/*.php',
        './node_modules/tailwindcss/**/*.js', // Si tu utilises des composants ou autres plugins
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
