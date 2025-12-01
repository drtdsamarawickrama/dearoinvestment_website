import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                'theme-blue':'#0749B0',
                'theme-blue-lite':'#DFECFF',
                'theme-orange':'#FFB22E',
                'theme-orange-ribbon':'#fbea0b',//'#FFD48A',
                'theme-orange-lite':'#FFEDCF',
                'theme-gray':'#2A2A29',
                'theme-gray-lite':'#E4E4E4',
                'theme-red':'#D6360A',
            },
            fontFamily: {
                lato: ['Lato'],
            },
            fontSize: {
                'md': ['16px', {
                  lineHeight: '28px',
                }],
            }
        },
    },

    plugins: [forms],
};
