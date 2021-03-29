const colors = require('tailwindcss/colors')

module.exports = {
  purge: {
    preserveHtmlElements: true,
    content: [
      './resources/**/*.css',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
    ],
    options: {
      safelist: ['uppercase'],
    },
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',

      black: colors.black,
      white: colors.white,
      gray: {
        light: '#f0f0f0',
        DEFAULT: '#d7d7d7',
        dark: '#646464',
      },
      red: 'red',
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
  corePlugins: {
    container: false,
  },
}
