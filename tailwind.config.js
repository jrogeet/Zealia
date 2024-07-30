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
        '18': '4.5rem',
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
      },

      inset: {
        '33': '8.25rem',
        '34': '8.5rem',
        '35': '8.75rem',
        '37': '9.25rem',
        '38': '9.5rem',
        '39': '9.75rem',
        '41': '10.25rem',
        '42': '10.5rem',
        '43': '10.75rem'
      }
    },
  },
  plugins: [],
}

