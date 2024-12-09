<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';

const props = defineProps({
    plans: Array
})

const selectPlan = (planID) => {
    router.visit(route('subscription.show', {subscriptionPlan: planID}));
};
</script>

<template>
    <Head title="Subscription Plans"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Subscription Plans
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="bg-gray-700 px-4 py-16">
                        <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
                            <div class="mb-10 space-y-4 px-6 md:px-0">
                                <h2 class="text-center text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                                    Pricing
                                </h2>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-center gap-4">
                                <div
                                    v-for="plan in plans"
                                    class="flex flex-col items-center aspect-auto p-4 sm:p-8 border rounded-3xl bg-gray-800 border-gray-700 shadow-gray-600/10 shadow-none m-2 flex-1 max-w-md">
                                    <h2 class="text-lg sm:text-xl font-medium text-white mb-2">
                                        {{ plan.name }}
                                    </h2>
                                    <p class="text-lg sm:text-xl text-center mb-8 mt-4 text-gray-400">
                                        <span class="text-3xl sm:text-4xl font-bold text-white">{{ plan.price }}€</span> / Month
                                    </p>
                                    <ul class="list-none list-inside mb-6 text-center text-gray-300">
                                        <li v-for="feature in plan.features">
                                            {{ feature }}
                                        </li>
                                    </ul>
                                    <a @click.prevent="selectPlan(plan.id)"
                                       class="cursor-pointer lemonsqueezy-button relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-white before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                                        <span class="relative text-sm font-semibold text-black">
                                            Get Started
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>