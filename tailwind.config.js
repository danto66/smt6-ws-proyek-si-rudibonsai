const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ],
        options: {
            safelist: [/^bg-/, /^text-/, /^border-/, /^ring-/]
        }
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            ringColor: ['hover', 'active'],
            ringWidth: ['hover', 'active'],
            pointerEvents: ['hover', 'focus'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
