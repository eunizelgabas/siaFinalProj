<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    expense: Object
})

const form = useForm({
    name: props.expense.name,
    description: props.expense.description,
    amount: props.expense.amount,
    pic: props.expense.pic,
    date: props.expense.date
})

function submit() {
    form.patch('/expenses/'+ props.expense.id)
}
</script>

<template>
    <Head title="Expenses" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Expenses</h2>
                <div>
                    <Link href="/expenses" class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8 w-[800px] mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="date">Date</label>
                    <input type="date" id="date" v-model="form.date" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.date">{{ form.errors.date }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="name">Name</label>
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

                <button class="px-4 py-2 bg-purple-200 w-full rounded border border-purple-300 shadow hover:bg-white">
                    Update Expenses
                </button>
            </form>

        </div>
    </AppLayout>
</template>
