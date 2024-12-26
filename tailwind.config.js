const defaultTheme = require('tailwindcss/defaultTheme')

/** @type import('tailwindcss').Config */
module.exports = {
	content: [
		'./resources/**/*.blade.php',
		'./resources/**/*.ts',
		'./resources/**/*.vue',
	],
	theme: {
		extend: {
			colors: {
				orange: {
					darker: '#6F0E09',
					dark: '#B52C19',
					DEFAULT: '#E6511E',
					light: '#FD7960',
					lighter: '#FEAFA6',
				},
				blue: {
					darker: '#537884',
					dark: '#6CA3B5',
					DEFAULT: '#A0CBD9',
					light: '#ABD5E3',
					lighter: '#C2E3ED',
					lightest: '#E0F0F4',
				},
				gray: {
					darker: '#080B14',
					dark: '#15202F',
					DEFAULT: '#263B49',
					light: '#435F76',
					lighter: '#839CBA',
					lightest: '#F6F7F9',
				},
				ocre: {
					darker: '#42370F',
					dark: '#594B18',
					DEFAULT: '#756320',
					light: '#BAB08F',
					lighter: '#E3E0D2',
					lightest: '#F3F3F0',
				},
				danger: {
					DEFAULT: '#F96662',
				},
			},
			fontFamily: {
				sans: ['Europa', ...defaultTheme.fontFamily.sans],
				display: ['Optima', ...defaultTheme.fontFamily.sans],
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms')({ strategy: 'class' }),
		require('@tailwindcss/typography'),
	],
}
