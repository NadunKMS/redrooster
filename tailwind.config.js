/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'false',
  content: [
    "./src/**/*.{html,php}",
    "./**/*.{html,php}",
    "./public/**/*.{html,php}",
    "./staff/**/**/*.{html,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontSize: {
        'h1': '48px',
        'h2': '36px',
        'h3': '24px',
        'h4': '18px',
        'h5': '16px',
        'h6': '14px',
      },
      colors: {
        primary:'#FF4539',
        primary_hover:'#e63e33',
        primary_bg:'#ffdad7',
      },
      fontFamily: {
        "lexend": ["Lexend Deca", "sans-serif"],
        "redhat": ["Red Hat Text", "serif"],
      },
    },
  },
  variants: {
    extend: {
      display: ['group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require("@tailwindcss/forms"),
    require('flowbite/plugin'),
  ],
};