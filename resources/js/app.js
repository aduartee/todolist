import './bootstrap';
import { createApp } from 'vue';
import App from '../components/App.vue';
import Menu from '../components/Menu.vue';
import '../css/dist/build.css';

const app = createApp();
app.component('app', App);
app.component('main-menu', Menu)
app.mount('#app');
