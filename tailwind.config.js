/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/**/*.js",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {
      boxShadow: {
        '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
      },
      scale: {
        '104': '1.04',
        '102': '1.02',
      },
      colors: {
        'toblue': '#040cf3'
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      }
    },
  },
  plugins: [
   
    require("tw-elements/dist/plugin.cjs"),
   
    
  ],
  darkMode: "class",
  variants: {
    fill: ['hover', 'focus'], // this line does the trick
  },
}