import hybridly from 'hybridly/vite'
import { defineConfig } from 'vite'

export default defineConfig({
	plugins: [
		hybridly({
			customIcons: ['custom'],
			icons: {
				autoInstall: true,
			},
		}),
	],
})
