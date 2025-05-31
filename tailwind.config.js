/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'primary' : '#4F46E5',
      }
    },
    // colors: {
    //   'primary' : '#0066CC',
    //   'white': '#FFFFFF',
      
    // },
    backgroundImage: {
      'financial' : "url('/img/financial-items.jpg')",
    }
  },
  plugins: [],
}

