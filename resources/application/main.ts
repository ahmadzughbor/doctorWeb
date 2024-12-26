import { initializeHybridly } from 'virtual:hybridly/config'
import '@/css/tailwind.css'

initializeHybridly({
	enhanceVue: () => {},
	progress: {
		color: '#2DD4BF',
	},
})
