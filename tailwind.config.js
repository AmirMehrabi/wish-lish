const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './app/Models/*.php',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',
    ],

    theme: {
        extend: {
            colors: {
                flamingo: {
                  '50':  '#f3f5fb',
                  '100': '#e9e7fb',
                  '200': '#d6cafa',
                  '300': '#c2acfa',
                  '400': '#af80fa',
                  '500': '#9b53fb',
                  '600': '#8136f8',
                  '700': '#530cf4',
                  '800': '#5025c6',
                  '900': '#4121a2',
                },
                orchid: {
                  '50':  '#f9f8fa',
                  '100': '#f6eff9',
                  '200': '#eed4f5',
                  '300': '#e6b3f0',
                  '400': '#e081eb',
                  '500': '#d954e4',
                  '600': '#be35d3',
                  '700': '#8f2ab0',
                  '800': '#682281',
                  '900': '#501d62',
                },
                cerise: {
                  '50':  '#fcf9f9',
                  '100': '#fcf1f4',
                  '200': '#f9d6e8',
                  '300': '#f7b2d4',
                  '400': '#f87bb2',
                  '500': '#f84e8c',
                  '600': '#ed3065',
                  '700': '#c82450',
                  '800': '#971e3e',
                  '900': '#741931',
                },
                tomato: {
                  '50':  '#fcf9f7',
                  '100': '#fcf0ee',
                  '200': '#fad9d9',
                  '300': '#f8b7b7',
                  '400': '#f88380',
                  '500': '#f85751',
                  '600': '#ef3634',
                  '700': '#cd292f',
                  '800': '#a0212b',
                  '900': '#7d1c25',
                },
                mango: {
                  '50':  '#fbf8f4',
                  '100': '#fbf2e5',
                  '200': '#f8e1c3',
                  '300': '#f5c68d',
                  '400': '#f39b4b',
                  '500': '#f17124',
                  '600': '#e14d16',
                  '700': '#ba3919',
                  '800': '#8e2d1c',
                  '900': '#6f251a',
                },
                carrot: {
                  '50':  '#fbf9f4',
                  '100': '#faf6e3',
                  '200': '#f6eab7',
                  '300': '#f0d679',
                  '400': '#e6b235',
                  '500': '#da8c16',
                  '600': '#bd660d',
                  '700': '#904c10',
                  '800': '#6a3a14',
                  '900': '#502e14',
                },
                olive: {
                  '50':  '#fafbf7',
                  '100': '#f7f8eb',
                  '200': '#edf0c7',
                  '300': '#dee093',
                  '400': '#bcc24d',
                  '500': '#91a022',
                  '600': '#697c14',
                  '700': '#4f5f16',
                  '800': '#3b4718',
                  '900': '#2e3717',
                },
                pine: {
                  '50':  '#f7fafa',
                  '100': '#eef7f5',
                  '200': '#d9ede8',
                  '300': '#bbdcd7',
                  '400': '#81bdba',
                  '500': '#4c9995',
                  '600': '#367570',
                  '700': '#305b59',
                  '800': '#284545',
                  '900': '#213738',
                },
                denim: {
                  '50':  '#f5fafc',
                  '100': '#e6f6fb',
                  '200': '#c6e8f7',
                  '300': '#9ed4f5',
                  '400': '#63aff1',
                  '500': '#3486ed',
                  '600': '#2562e0',
                  '700': '#244dbe',
                  '800': '#1f3b8d',
                  '900': '#1a306c',
                },
                royalblue: {
                  '50':  '#f5fafd',
                  '100': '#e6f6fc',
                  '200': '#c5e5fa',
                  '300': '#9ecff9',
                  '400': '#68a7f8',
                  '500': '#397af6',
                  '600': '#2857ef',
                  '700': '#2444d5',
                  '800': '#1e35a3',
                  '900': '#192b7e',
                },
              },
              
            backgroundImage: theme => ({

                'welcome': "url('/images/bg/welcome.png')",
               }),
            fontFamily: {
                sans: ['estedad', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
