//import './assets/main.css'
import './assets/main2.css'

import { createApp } from 'vue'
import App2 from './App2.vue'
import router from './router'

const app2 = createApp(App2)

app2.use(router)

app2.mount('#app')
