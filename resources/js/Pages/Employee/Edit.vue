<template>
    <Head title="Create Expenses" />

    <AppLayout>

        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Employee</h2>
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
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" v-model="form.first_name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" v-model="form.last_name" class="h-full border-gray-400 rounded"/>
                    <div class="text-red-600" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="email">Email</label>
                    <input id="email" v-model="form.email" class="h-full border-gray-400 rounded"/>
                    <div class="text-red-600" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="department">Department</label>
                    <textarea id="department" v-model="form.department" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.department">{{ form.errors.department }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="position">Position</label>
                    <textarea id="position" v-model="form.position" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.position">{{ form.errors.position }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="phoneno">Phone No</label>
                        <input type="text" step="0.01" id="phoneno" v-model="form.phone_no" class="h-full border-gray-400 rounded text-right" />
                        <div class="text-red-600" v-if="form.errors.phone_no">{{ form.errors.phone_no }}</div>
                    </div>
                    <!-- <div class="flex flex-col mb-3">
                        <label for="pic">Profile Picture</label>
                        <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div> -->
                </div>

                <button class="px-4 py-2 bg-purple-300 w-full rounded border shadow hover:bg-white">
                    Update Employee
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
    employee: Object
})

const form =  useForm({
    last_name: props.employee.last_name,
    first_name: props.employee.first_name,
    department:props.employee.department,
    position: props.employee.position,
    phone_no: props.employee.phone_no,
    email: props.employee.email

})

function submit() {
    form.patch('/employees/' + props.employee.id)
}
</script>
