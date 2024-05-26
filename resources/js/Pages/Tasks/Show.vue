<script setup>
import { ref } from "vue";
import { router } from '@inertiajs/vue3';

const title = ref("");
const description = ref("");
const dueDate = ref("");
const statusItems = {1:'Pending', 2: 'Completed'};
const selectedStatus = ref(1);

function addTask() {
    router.visit('/tasks', {
        method: 'post',
            data: {
                'title': title.value,
                'description': description.value,
                'due_date': dueDate.value,
                'status': selectedStatus.value,
            },
        })
    }
</script>

<template>
    <div class="font-semibold mt-10 text-2xl text-center">
        Add your task
    </div>

    <div class="flex py-4">
        <label>Title</label>
        <input v-model="title" type="text">
    </div>

    <div class="flex py-4">
        <label>Decription</label>
        <input v-model="description" type="text">
    </div>

    <div class="flex py-4">
        <label>due date</label>
        <input v-model="dueDate" type="date">
    </div>

    <div>
        <label>Statuses</label>
        <select v-model="selectedStatus">
            <option v-for="statusId in Object.keys(statusItems)" :key="status" :value="statusId">
                {{ statusItems[statusId] }}
            </option>
        </select>
    </div>

    <div class="ml-3 px-6">
        <button type="button" class="bg-gray-800 px-2 py-2 rounded text-white" @click="addTask">
            Add task
        </button>
    </div>
</template>