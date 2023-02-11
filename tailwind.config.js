const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
 purge: [
   './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
       './resources/views/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {

    extend: {
        fontFamily:{
        'MyFont':["ほのぼのポップ"],
    },},
  },
  variants: {
    opacity: ['hover'], // hover時のopacityを許可する
    extend: {},
  },
  plugins: [],


}
