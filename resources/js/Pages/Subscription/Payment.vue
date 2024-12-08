<template>
    <Head title="Subscription Payment"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Subscription Payment
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div v-if="errors" class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span v-for="error in errors" class="font-medium">{{ error }}</span>
                    </div>
                </div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
                        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                            <div class="mx-auto max-w-5xl">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                                    Payment
                                </h2>
                                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                                    <form @submit.prevent="submit" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                                        <div class="mb-6 grid grid-cols-2 gap-4">
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="card_holder_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Full name (as displayed on card)*
                                                </label>
                                                <input
                                                    v-model="form.card_holder_name"
                                                    type="text"
                                                    id="card_holder_name"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Bonnie Green"
                                                    required/>
                                            </div>

                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Card number*
                                                </label>
                                                <input
                                                    v-model="form.card_number"
                                                    type="text"
                                                    id="card-number-input"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="xxxx-xxxx-xxxx-xxxx"
                                                    required/>
                                            </div>

                                            <div>
                                                <label for="card-expiration-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Card expiration*
                                                </label>
                                                <div class="relative">
                                                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                                clip-rule="evenodd"
                                                            />
                                                        </svg>
                                                    </div>
                                                    <input
                                                        v-model="form.card_exp"
                                                        id="card-expiration-input"
                                                        type="text"
                                                        max="5"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                        placeholder="12/23"
                                                        required/>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="card_cvv-input" class="mb-2 flex items-center gap-1 text-sm font-medium text-gray-900 dark:text-white">
                                                    CVV*
                                                </label>
                                                <input
                                                    v-model="form.card_cvv"
                                                    type="number"
                                                    id="card_cvv-input"
                                                    aria-describedby="helper-text-explanation"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="•••"
                                                    required/>
                                            </div>
                                        </div>
                                        <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            Pay now
                                        </button>
                                    </form>

                                    <div class="mt-6 grow sm:mt-8 lg:mt-0">
                                        <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                                            <div class="space-y-2">
                                                <dl class="flex items-center justify-between gap-4">
                                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ plan.data.price }} €</dd>
                                                </dl>

                                                <dl class="flex items-center justify-between gap-4">
                                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                                    <dd class="text-base font-medium text-gray-900 dark:text-white">0 €</dd>
                                                </dl>
                                            </div>

                                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                                <dd class="text-base font-bold text-gray-900 dark:text-white">{{ plan.data.price }} €</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import {ref} from "vue";

const props = defineProps({
    plan: {
        type: Object
    }
});

const errors = ref(null);

const form = useForm({
    card_holder_name: 'Test User',
    card_number: '1234-1234-1234-1234',
    card_exp: '12/25',
    card_cvv: '123',
});

const submit = () => {
    form.post(route('subscription.payment', {subscriptionPlan: props.plan.data.id}), {
        onError: (error) => {
            errors.value = error;
        },
        onSuccess: () => {
            errors.value = null;
        },
    });
};
</script>