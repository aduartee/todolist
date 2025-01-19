import { createApp } from 'vue';
import App from './components/App.vue';

const myApp = {
    data() {
        return {
            name: "Arthur"
        }
    }
}

const app = createApp(App);
app.mount('#app');