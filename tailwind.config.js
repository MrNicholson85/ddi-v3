/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './*.{php,html,css,js}',
    './components/blocks/**/*.{php,html,css,js}',
    './components/modules/**/*.{php,html,css,js}',
    './assets/styles/components/*.{php,html,css,js}',
    './content/**/*.{php,html,css,js}',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
