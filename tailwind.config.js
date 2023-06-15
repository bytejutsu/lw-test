/** @type {import('tailwindcss').Config} */
export default {
  content:[
    "./resources/**/*.blade.php",

    "./vendor/masmerise/livewire-toaster/resources/views/*.blade.php",

    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

