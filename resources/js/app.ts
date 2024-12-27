import './bootstrap'
import { createApp } from 'vue'
import { createHybridly } from '@hybridly/vue'
import { plugin as formPlugin } from '@hybridly/form'
import { router } from '@hybridly/vue'

const app = createApp({})

app.use(createHybridly())
app.use(formPlugin)

app.mount('#app') 