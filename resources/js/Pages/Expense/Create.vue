<template>
    <Head title="Create Expenses" />

    <AppLayout>

        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Expense</h2>
                <div>
                    <Link href="/employees" class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8 w-[800px] mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label label class="block mt-2 text-xs font-semibold text-gray-600 uppercase" for="emp_id">Category</label>
                    <select id="emp_id" name="emp_id" v-model="form.emp_id" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-purple-200 focus:shadow-inner">
                        <option value="" disabled>Select a Employee</option>
                        <option v-for="emp in employees" :value="emp.id" :key="emp.id"> {{ emp.first_name }} {{ emp.last_name }}</option>
                    </select>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="date">Date</label>
                    <input type="date" id="date" v-model="form.date" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.date">{{ form.errors.date }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="name">Expense Name</label>
                    <input type="text" id="name" v-model="form.name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" v-model="form.description" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="price">Amount</label>
                        <input type="number" step="0.01" id="price" v-model="form.amount" class="h-full border-gray-400 rounded text-right" />
                        <div class="text-red-600" v-if="form.errors.amount">{{ form.errors.amount }}</div>
                    </div>
                </div>

                <button class="px-4 py-2 bg-purple-300 w-full rounded border shadow hover:bg-white">
                    Create Expenses
                </button>
            </form>

        </div>

    </AppLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    employees: Object,
    expense:Object
})
const form =  useForm({
    name: null,
    description: null,
    amount: 0,
    date: null,
    emp_id: ''
})

function submit() {
    form.post(`/expenses`);
}
</script>

