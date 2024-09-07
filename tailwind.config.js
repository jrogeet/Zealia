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
        'cropped-breakdance': "url('/assets/images/vectors/human/breakdance-whiteshade-cropped.png')",
        'threshold-cropped-solid': "url('/assets/images/threshold-cropped-solid.webp')",
        'howtouse': "url('/assets/images/howtouse.webp')",
        'about': "url('/assets/images/about.webp')",
        'tiles': "url('/assets/images/vectors/icons/tiles.png')",
        'borger': "url('/assets/images/vectors/icons/borger.png')",
      },

      colors: {
        white1: '#FFF6E9',
        white2: '#E6DDD2',
        grey1: '#99948C',
        grey2: '#807B75',
        black1: '#2B2D2F',
        blue3: '#03346E',
        blue2: '#6EACDA',
        blue1: '#E2EEF8',
        orange1: '#DF9F5E',
        red1: '#B31312',
        green1: '#0DE830',
      },
      content: {
        'gen-team': '"generate teams by passion"',
      },

      fontFamily: {
        eurostile: "eurostile",
        synereg: ['Syne-Reg', 'sans-serif'],
        synemed: ['Syne-Med', 'sans-serif'],
        synesemi: ['Syne-semibold', 'sans-serif'],
        synebold: ['Syne-bold', 'sans-serif'],
        syneboldextra: ['Syne-Extrabold', 'sans-serif'],
        
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

