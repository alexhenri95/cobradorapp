const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Cairo', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                trueGray: colors.trueGray,
                blueGray: colors.blueGray,
                orange: colors.orange,
                greenLime: colors.lime,
                cyan: colors.cyan,
                fuchsia: colors.fuchsia,
                rose: colors.rose,
                pink: colors.pink,
                purple: colors.purple,
                violet: colors.violet,
                lightBlue: colors.lightBlue,
                cyan: colors.cyan,
                emerald: colors.emerald,
                amber: colors.amber,
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
