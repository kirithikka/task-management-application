<script setup>
import { computed } from "vue";
import { useDateFormat } from '@vueuse/core'
import { usePage, router } from '@inertiajs/vue3';

const tasks = computed(() => usePage().props.tasks)

function addNewTask() {
    router.get(route('tasks.show'));
}

function deleteTask(taskId) {
    router.delete(route('tasks.delete', taskId));
}

const PENDING = 1;
const COMPLETED = 2;
</script>
<template>
    <div class="font-semibold mt-10 text-2xl text-center">
        Your tasks
    </div>

    <div class="ml-3 px-6">
        <button type="button" class="bg-gray-800 px-2 py-2 rounded text-white" @click="addNewTask">
            Add new task
        </button>
    </div>

    <div>
        <table class="border my-10 table-fixed w-full">
            <tr class="bg-gray-200">
                <th class="py-3">
                    Title
                </th>
                <th>
                    Description
                </th>
                <th>
                    Due date
                </th>
                <th>
                    Mark as completed
                </th>
                <th>
                    Actions
                </th>
            </tr>


            <tr v-for="task in tasks" :key="task" class="text-center">
                <td class="py-2">{{ task.title }}</td>
                <td>{{ task.description }}</td>
                <td>{{ useDateFormat(task.due_date, 'DD MMM, YYYY').value }}</td>
                <td>
                    <span v-if="task.status === PENDING" class="material-icons">close</span>
                    <span v-if="task.status === COMPLETED" class="material-icons">check</span>
                </td>

                <td>
                    <span class="material-icons px-4">edit</span>
                    <span class="material-icons" @click="deleteTask(task.id)">delete</span>
                </td>
            </tr>
        </table>
    </div>
</template>