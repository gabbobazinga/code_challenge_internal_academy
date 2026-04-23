<script setup>
import { Head, Link } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    workshops: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout title="Workshops">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Workshops
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="mb-4 flex justify-end">
                    <Link
                        href="/workshops/create"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md"
                    >
                        + Create Workshop
                    </Link>
                </div>

                <!-- Table -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Capacity</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="workshop in workshops" :key="workshop.id">
                                <td class="px-6 py-4">
                                    {{ workshop.title }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ new Date(workshop.date_time).toLocaleString() }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ workshop.capacity }}
                                </td>

                                <td class="px-6 py-4 text-right space-x-2">
                                    <Link
                                        :href="`/workshops/${workshop.id}/edit`"
                                        class="text-indigo-600 hover:underline"
                                    >
                                        Edit
                                    </Link>

                                    <Link
                                        :href="`/workshops/${workshop.id}`"
                                        method="delete"
                                        as="button"
                                        class="text-red-600 hover:underline"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>

                            <tr v-if="workshops.length === 0">
                                <td colspan="4" class="text-center py-6 text-gray-500">
                                    No workshops found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
