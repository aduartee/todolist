import './bootstrap';
import '../css/dist/build.css';
import { createApp } from 'vue';
import AddTask from '../components/AddTask.vue';

const registerComponet = createApp();
registerComponet.component('register-task', AddTask);
registerComponet.mount('#register-task-component');