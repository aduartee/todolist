import './bootstrap';
import '../css/dist/build.css';
import axios from 'axios';
import { createApp } from 'vue';
import App from '../components/App.vue';
import Menu from '../components/Menu.vue';

const app = createApp();
app.component('app', App);
app.component('main-menu', Menu);
app.mount('#app');
