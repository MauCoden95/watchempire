/** @type {import('tailwindcss').Config} */
import withMT from "@material-tailwind/html/utils/withMT";

module.exports = {
  content: [
    "./public/index.html",
    "./src/**/*.{html,js}",
    './node_modules/preline/preline.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
}

