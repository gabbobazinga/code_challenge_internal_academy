<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    title: '',
    description: '',
    date_time: '',
    capacity: '',
});

const submit = () => {
    form.post(route('workshops.store'));
};
</script>

<template>
    <AuthenticatedLayout title="Create Workshop">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Workshop
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white shadow-sm rounded-lg p-6">

                    <form @submit.prevent="submit">

                        <!-- TITLE -->
                        <div class="mb-4">
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError :message="form.errors.title" />
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-4">
                            <InputLabel for="description" value="Description" />
                            <textarea
                                id="description"
                                v-model="form.description"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                rows="4"
                            ></textarea>
                            <InputError :message="form.errors.description" />
                        </div>

                        <!-- DATE TIME -->
                        <div class="mb-4">
                            <InputLabel for="date_time" value="Date & Time" />
                            <input
                                id="date_time"
                                type="datetime-local"
                                v-model="form.date_time"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            />
                            <InputError :message="form.errors.date_time" />
                        </div>

                        <!-- CAPACITY -->
                        <div class="mb-4">
                            <InputLabel for="capacity" value="Capacity" />
                            <TextInput
                                id="capacity"
                                type="number"
                                v-model="form.capacity"
                                class="mt-1 block w-full"
                                min="1"
                                required
                            />
                            <InputError :message="form.errors.capacity" />
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex justify-end space-x-2 mt-6">
                            <Link
                                :href="route('workshops.index')"
                                class="px-4 py-2 bg-gray-200 rounded-md"
                            >
                                Cancel
                            </Link>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md"
                                :disabled="form.processing"
                            >
                                Create
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>