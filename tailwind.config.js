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
        'loading': "url('/assets/images/pacman-loading.gif')",
        'mesh-yellow': "url('/assets/images/mesh-yellow.png')",
        'riasec-r': "url('/assets/images/custom/riasec-cards/R.webp')",
        'riasec-i': "url('/assets/images/custom/riasec-cards/I.webp')",
        'riasec-a': "url('/assets/images/custom/riasec-cards/A.webp')",
        'riasec-s': "url('/assets/images/custom/riasec-cards/S.webp')",
        'riasec-e': "url('/assets/images/custom/riasec-cards/E.webp')",
        'riasec-c': "url('/assets/images/custom/riasec-cards/C.webp')",
        'cs-beige': "url('/assets/images/custom/dashboard-rooms/cs-beige.webp')",
        'it-beige': "url('/assets/images/custom/dashboard-rooms/it-beige.webp')",
        'cs-blue': "url('/assets/images/custom/dashboard-rooms/cs-blue.webp')",
        'it-blue': "url('/assets/images/custom/dashboard-rooms/it-blue.webp')",
        'home-bg': "url('/assets/images/home-bg.webp')",
        'about-bg': "url('/assets/images/about-bg.webp')",
      },

      colors: {
        blackpri: '#1A1A1A',
        blackhead: '#2D2D2D',
        blacksec: '#404040',
        blackless: '#666666',
        whitecon: '#F8F8F8',
        whitealt: '#F5F5F5',
        whitebord: '#EEEEEE',
        beige: '#FFF6E9',

        blue3: '#03346E',
        blue2: '#6EACDA',
        blue1: '#E2EEF8',
        orangeaccent: '#DF9F5E', 
        greenaccent: '#A4D867',
        purpleaccent: '#D8B0CF',
        pinkaccent: '#FFB6C1',
        peachaccent: '#FF9980',
        yellowaccent: '#FFE575',

        rederr: '#FF6B6B',
        greensuccess: '#69DB7C',
        greydisabled: '#E9ECEF',
        greige: '#E3E0DB', 
      },
      content: {
        'gen-team': '"generate teams by passion"',
      },

      fontFamily: {
        ginto: ['ginto', 'sans-serif'],

        clashreg: ['clashreg', 'sans-serif'],
        clashmed: ['clashmed', 'sans-serif'],
        clashbold: ['clashbold', 'sans-serif'],
        clashsemibold: ['clashsemibold', 'sans-serif'],

        satoshireg: ['satoshireg', 'sans-serif'],
        satoshimed: ['satoshimed', 'sans-serif'],
        satoshilight: ['satoshilight', 'sans-serif'],
        satoshiblack: ['satoshiblack', 'sans-serif'],
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
      },

      keyframes: {
        'star-shine': {
          '0%, 100%': { 
            transform: 'scale(1)',
            opacity: '1'
          },
          '50%': { 
            transform: 'scale(1.2)',
            opacity: '0.8'
          }
        }
      },
      animation: {
        'star-shine': 'star-shine 2s ease-in-out infinite'
      }
    },
  },
  plugins: [],
}