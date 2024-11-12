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
        'table': "url('/assets/images/vectors/icons/table.png')",
        'cross': "url('/assets/images/icons/cross.png')",
        'check': "url('/assets/images/icons/check.png')",
        'sort': "url('/assets/images/icons/sorting.png')",
        'search': "url('/assets/images/icons/search.png')",
        'back': "url('/assets/images/icons/back.png')",
        'clear': "url('/assets/images/icons/clear.png')",
        'edit': "url('/assets/images/icons/edit.png')",
        'loading': "url('/assets/images/pacman-loading.gif')"
      },

      colors: {
        blackpri: '#1A1A1A',
        blackhead: '#2D2D2D',
        blacksec: '#404040',
        blackless: '#666666',
        white: '#FFFFFF',
        whitecon: '#F8F8F8',
        whitealt: '#F5F5F5',
        whitebord: '#EEEEEE',

        greenmain: '#A4D867',
        purplemain: '#D8B0CF',
        peachmain: '#FFB6C1',
        yellowmain: '#FFE575',
        orangemain: '#FF9980',
        bluemain: '#95C1E1',

        rederr: '#FF6B6B',
        greensuccess: '#69DB7C',
        blueinfo: '#4DABF7',
        greydisabled: '#E9ECEF',
      },
      content: {
        'gen-team': '"generate teams by passion"',
      },

      fontFamily: {
        ginto: ['ginto', 'sans-serif'],

        clashreg: ['clash-reg', 'sans-serif'],
        clashmed: ['clash-med', 'sans-serif'],
        clashbold: ['clash-bold', 'sans-serif'],
        clashsemibold: ['clash-semibold', 'sans-serif'],

        satoshireg: ['satoshi-reg', 'sans-serif'],
        satoshimed: ['satoshi-med', 'sans-serif'],
        satoshilight: ['satoshi-light', 'sans-serif'],
        satoshiblack: ['satoshi-black', 'sans-serif'],

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

      boxShadow: {
        'inside': 'rgb(255, 200, 180) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.6) -3px -3px 6px 1px inset',
        'inside1': 'rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;',
        'inside2': 'rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;',
        'inside3': 'rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;',
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
  plugins: [
    // require('@tailwindcss/forms'),
  ],
}

