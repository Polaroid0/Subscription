<script setup>
import {Head} from '@inertiajs/vue3'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    subscription: Object,
    payments: Object,
})
</script>

<template>
    <Head title="Subscription Payment"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Subscription Status
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


                <div class="p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 v-if="subscription" class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Subscription is active until: {{ subscription.data.end_date }}, Plan: {{ subscription.data.subscription_plan.name }}</h5>
                    <h5 v-else class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Subscription is not active</h5>
                </div>


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Transaction ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Card holder name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Card number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Amount
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="payment in payments.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ payment.id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ payment.transaction_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ payment.card_holder_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ payment.card_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ payment.amount }}€
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>