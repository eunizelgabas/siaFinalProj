<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    employee: Object,
    expense: Object
})

</script>

<template>
    <Head title="Employee" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Employee | {{ employee.last_name }}, {{ employee.first_name }}</h2>
                <div class="flex">
                    <Link :href="'/employees/email/' +employee.id" class="flex p-2 rounded border border-gray-300 shadow mr-2">Send Email</Link>
                    <a :href="'/employees/pdf/'+employee.id" class="flex p-2 rounded border border-gray-300 shadow" target="_blank">
                        <svg fill="#66666" height="30" width="30" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd"> <path d="M1251.654 0c44.499 0 88.207 18.07 119.718 49.581l329.223 329.224c31.963 31.962 49.581 74.54 49.581 119.717V1920H169V0Zm-66.183 112.941H281.94V1807.06h1355.294V564.706H1185.47V112.94Zm112.94 23.379v315.445h315.445L1298.412 136.32Z"></path> <path d="M900.497 677.67c26.767 0 50.372 12.65 67.991 37.835 41.901 59.068 38.965 121.976 23.492 206.682-5.308 29.14.113 58.617 16.263 83.125 22.814 34.786 55.68 82.673 87.981 123.219 23.718 29.93 60.198 45.854 97.13 40.885 23.718-3.276 52.292-5.986 81.656-5.986 131.012 0 121.186 46.757 133.045 89.675 6.55 25.976 3.275 48.678-10.165 65.506-16.715 22.701-51.162 34.447-101.534 34.447-55.793 0-74.202-9.487-122.767-24.96-27.445-8.81-55.906-10.617-83.69-3.275-55.453 14.456-146.936 36.48-223.284 46.983-40.772 5.647-77.816 26.654-102.438 60.875-55.454 76.8-106.842 148.518-188.273 148.518-21.007 0-40.32-7.567-56.244-22.701-23.492-23.492-33.544-49.581-28.574-79.85 13.778-92.95 128.075-144.79 196.066-182.625 16.037-8.923 28.687-22.589 36.592-39.53l107.86-233.223c7.68-16.377 10.051-34.56 7.228-52.518-12.537-79.059-31.06-211.99 18.748-272.075 10.955-13.44 26.09-21.007 42.917-21.007Zm20.556 339.953c-43.257 126.607-119.718 264.282-129.996 280.32 92.273-43.37 275.916-65.28 275.916-65.28-92.386-88.998-145.92-215.04-145.92-215.04Z"></path> </g> </g></svg>
                        Export
                    </a>
                    <Link href="/employees" class="flex p-2 rounded border border-gray-300 shadow ml-3">Back</Link>

                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex justify-between">

                <div class="bg-white p-4 rounded shadow w-[30%]">
                    <h4 class="text-2xl mb-3 ">Employee Info</h4>
                    <div class="flex-2 justify-center">
                        <Link v-if="$page.props.auth.user.permissions.includes('delete-employee')" class="px-4 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700 mr-2 mb-2" :href="'/employees/' + employee.id" method="delete" as="button">Delete</Link>
                        <Link v-if="$page.props.auth.user.permissions.includes('edit-employee')" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700" :href="'/employees/edit/' + employee.id" as="button">Edit</Link>
                    </div>
                    <hr>
                    <img :src="employee.picUrl" alt="Profile pic" class="aspect-square w-[40%] object-cover mb-3">
                    <table class="min-w-[100%] table">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ employee.last_name }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ employee.first_name }}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>{{ employee.department }}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>{{ employee.position }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ employee.phone_no }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Expenses</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Amount</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <tr class="hover:bg-gray-50" v-for="exp in employee.expenses" :key="exp.id">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ exp.date }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">

                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            {{ exp.name }}

                        </td>
                        <td class="px-6 py-4"> {{ exp.description }}</td>

                        <td class="px-6 py-4">{{ exp.amount }}</td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                            <Link x-data="{ tooltip: 'Delete' }" v-if="$page.props.auth.user.permissions.includes('delete-expense')" :href="'/expenses/' + exp.id" method="delete" as="button">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                />
                                </svg>
                            </Link>
                            <Link x-data="{ tooltip: 'Edit' }" v-if="$page.props.auth.user.permissions.includes('edit-expense')" :href="'/expenses/edit/' + exp.id" as="button">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                />
                                </svg>
                            </Link>
                            </div>
                        </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
