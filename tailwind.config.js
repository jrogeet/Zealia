/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // "./public/assets/css/**/*.css",
    "./public/assets/js/*.js",
    "./app/views/**/*.php",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'blue-noise': "url('/assets/images/background.png')"
      },
      
      fontFamily: {
        eurostile: "eurostile"
      },

      height: {
        '144':'36rem',
        '168': '42rem',
        '192': '48rem',
        '216': '54rem',
        '240': '60rem',
      },

      width: {
        '144':'36rem',
        '168': '42rem',
        '192': '48rem',
        '216': '54rem',
        '240': '60rem',
        'web': '1536px'
      }
    },
  },
  plugins: [],
}

