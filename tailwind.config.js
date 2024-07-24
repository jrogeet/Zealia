/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/assets/css/**/*.css",
    "./public/assets/js/*.js",
    "./app/views/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'eurostile': 'assets/fonts/Eurostile-Extended-Regular.ttf',
      }
    },
  },
  plugins: [],
}

