<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-10">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Task Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Description
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="(item, index) in taskArray" :key="item">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input id="vue-checkbox-list" :value="index" type="checkbox" :checked = "item.completed"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    </th>
                    <td class="px-6 py-4">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.description }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const taskArray = ref([]);
        const fetchTasksEndpointUrl = 'http://127.0.0.1:8000/task/list'
        const dataRequest = async () => {
            try {
                const response = await axios.get(fetchTasksEndpointUrl);
                taskArray.value = response.data.tasks;
            } catch (error) {
                console.error(error);
            }
        };

        onMounted(dataRequest);

        return {
            taskArray
        }
    }
}
</script>