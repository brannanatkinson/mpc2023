import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.antlers.html',
        './resources/views/templates/**/*.antlers.html',
    ],
    corePlugins: {
       preflight: false,
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'serif'],
                display: ['Playfair Display', 'sans-serif'],
            },
            colors: {
                'mp-blue-green': '#539291',
                'mp-light-lime': '#bad598',
                'mp-mossy-green': '#b7bd54',
                'mp-lime-yellow': '#e1e693',
                'mp-light-gray': '#e5e6e2',
                'mp-coral': '#f18d79',
                'mp-navy': '#0c385c' 
            }
        },
    },

    plugins: [forms, typography],
};
