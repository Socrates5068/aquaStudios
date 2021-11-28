const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors')

module.exports = {
    //mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily: {
            'roboto': ['Roboto'],
            'mogra': ['Mogra']
        },

        extend: {
            textShadow: {
                'default': '0 2px 0 #000',
                'md': '0 2px 2px #000',
                'h2': '0 0 3px #FF0000, 0 0 5px #0000FF',
                'h1': '0 0 3px rgba(0, 0, 0, .8), 0 0 5px rgba(0, 0, 0, .9)',
            },

            backgroundImage: {
                'hero-pattern': "url('/img/boda.jpg')",
                'footer-texture': "url('/img/boda.jpg')",
            },

            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                trueGray: colors.trueGray,
                orange: colors.orange,
                greenLime: colors.lime,
                sky: colors.sky,
                cyan: colors.cyan,
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('daisyui'),
        require('tailwindcss-textshadow'),
    ],
};
