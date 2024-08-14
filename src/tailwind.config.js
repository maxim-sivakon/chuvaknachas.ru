/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './bin/**/*.css',
    './html/**/*.html',
    '../**/*.html',
    './assets/**/*.js'
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Gotham-Pro']
      },
      screens: {
        'm': '280px',
        's': '360px',
        '2xl': '1320px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
  ],
}