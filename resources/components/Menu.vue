<template>
    <ul>
        <li v-for="(route, item) in items" :key="item">
            <a :href="route" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">
                {{ item }}
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                items: {
                    'Home' : '/',
                    'Tasks' : '/tasks',
                    'About' : '/about',
                }
            }
        }
    }
</script>