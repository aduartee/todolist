<template>
    <div class="mt-10 p-2 flex flex-col w-8/12 mx-auto">
        <div class="flex flex-col w-full">
            <label for="taskName" class="">Task</label>
            <input type="text" name="taskName" v-model="taskName" id="taskName"
                class="block w-full py-1.5 h-12 rounded pl-1 pr-3 text-base text-gray-900 placeholder:text-white bg-neutral-400 focus:outline focus:outline-0 md:text-md/6"
                placeholder="Play Guitar">

            <div class="flex flex-col w-full mt-10">
                <label for="taskDescription">Description</label>
                <input type="text" name="taskDescription" v-model="taskDescription" id="taskDescription"
                    class="block w-full py-1.5 h-12 rounded pl-1 pr-3 text-base text-gray-900 placeholder:text-white bg-neutral-400 focus:outline focus:outline-0 md:text-md/6"
                    placeholder="Play guitar every Monday">

                <button type="button" @click="handleClick"
                    class="text-white w-5/12 mt-10 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Add Task
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
    setup() {
        const taskName = ref('');
        const taskDescription = ref('');
        let response;
        const registerTaskEndPointUrlLocal = 'http://127.0.0.1:8000/task/create';

        const handleClick = async () => {
            if (taskName.value.trim() != "") {
                const taskData = {
                    'name': taskName.value,
                    'description': taskDescription.value,
                };

                try {
                    await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
                    response = await axios.post(registerTaskEndPointUrlLocal, taskData);
                } catch (error) {
                    console.error(error);
                }

                taskName.value = '';
            }
        };
        return {
            taskName,
            taskDescription,
            handleClick
        }
    }
}
</script>