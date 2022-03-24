const { xor } = require("lodash");
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: ["./resources/**/*.{html,js,php,blade.php}"],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [require("@tailwindcss/forms")],
};
