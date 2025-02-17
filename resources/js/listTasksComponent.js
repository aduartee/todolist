import './bootstrap';
import '../css/dist/build.css';
import { createApp } from 'vue';
import listTasks from '../components/listTask.vue';

const registerComponet = createApp();
registerComponet.component('list-tasks', listTasks);
registerComponet.mount('#list-tasks-component');

