<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form =  useForm({
    subject: null,
    message: null,
})

const submit = () =>{
    form.post('/admin/send-email')

    form.subject = ''
    form.message = ''

}

</script>

<template>
    <Head title="Admin" />

    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h2>
        </template>

        <div class="py-4 w-[400px]  mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3 ">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" v-model="form.subject" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.subject">{{ form.errors.subject }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="message">Message</label>
                    <textarea id="message" v-model="form.message" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.message">{{ form.errors.message }}</div>
                </div>
                <button class="px-4 py-2 bg-purple-200 w-full rounded border border-purple-300 shadow hover:bg-white">
                   Send
                </button>
            </form>

        </div>
    </AppLayout>
</template>
