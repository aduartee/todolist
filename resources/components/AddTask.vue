<template>
    <div class="mt-10 flex flex-row p-2 w-11/12">
        <input type="text" name="taskName" v-model="inputValue" id="taskName" class="block min-w-0 grow py-1.5 h-20 rounded pl-1 pr-3 text-base text-gray-900 placeholder:text-white bg-neutral-400 focus:outline focus:outline-0 md:text-md/6" placeholder="Play Guitar">
        <button type="button" @click="handleClick" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 ms-3 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Task</button>
    </div>

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
                            Date<a href="#"></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="(item, index) in tasksArray" :key="item">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input id="vue-checkbox-list" :value="index" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    </th>
                    <td class="px-6 py-4">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item.createdAt }}
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
    import axios from 'axios';
    import {ref} from 'vue';

    export default {
        setup() {
            const tasksArray = ref([]);
            const inputValue = ref('');
            // const registerTaskEndPointUrlLocal = "http://locahost:8000/task/create";
            const registerTaskEndPointUrlLocal = 'http://127.0.0.1:8000/task/create';

            const handleClick = async () => {
                if(inputValue.value.trim() != "") {
                    const taskData = {
                        'name' : inputValue.value,
                        'createdAt': new Date().toISOString(),
                    };

                    try {
                        await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
                        await axios.post(registerTaskEndPointUrlLocal, taskData);
                    } catch(error) {
                        console.error(error);
                    }

                    inputValue.value = '';
                } 
            };

            return {
                tasksArray,
                inputValue,
                handleClick
            }
        }
    }
</script>