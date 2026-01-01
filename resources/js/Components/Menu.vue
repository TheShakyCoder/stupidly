<script setup>
import { usePage } from '@inertiajs/vue3';

import {
    Popover,
    PopoverButton,
    PopoverOverlay,
    PopoverPanel,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    Bars3Icon,
    BellIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'
import ResponsiveNavLink from './ResponsiveNavLink.vue';

const page = usePage()

const user = {
    name: page.props.auth.user.name,
    email: page.props.auth.user.email,
    role: '',
    imageUrl: page.props.auth.user.profile_photo_url,
}
const navigation = [
    { name: 'Home', route: 'home' },
    { name: 'Dashboard', route: 'dashboard' },
    { name: 'Profile', route: 'profile.show' },
]

defineEmits(['logout'])
</script>

<template>
    <Popover v-slot="{ open }">

        <!-- Menu button -->
        <div class="">
            <!-- Mobile menu button -->
            <PopoverButton
                class="relative inline-flex items-center justify-center rounded-md bg-transparent p-2 text-sky-200 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white dark:focus:ring-sky-900">
                <span class="absolute -inset-0.5" />
                <span class="sr-only">Open main menu</span>
                <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
                <XMarkIcon v-else class="block size-6" aria-hidden="true" />
            </PopoverButton>
        </div>

        <TransitionRoot as="template" :show="open">
            <div class="">
                <TransitionChild as="template" enter="duration-150 ease-out" enter-from="opacity-0"
                    enter-to="opacity-100" leave="duration-150 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                    <PopoverOverlay class="fixed inset-0 z-20 bg-black/50" />
                </TransitionChild>

                <TransitionChild as="template" enter="duration-150 ease-out" enter-from="opacity-0 scale-95"
                    enter-to="opacity-100 scale-100" leave="duration-150 ease-in" leave-from="opacity-100 scale-100"
                    leave-to="opacity-0 scale-95">
                    <PopoverPanel focus
                        class="absolute inset-x-0 top-0 z-30 mx-auto w-full max-w-xl origin-top transform p-2 transition">
                        <div
                            class="divide-y divide-gray-200 rounded-lg bg-white dark:bg-sky-950 shadow-lg ring-1 ring-black/5">
                            <div class="pb-2 pt-3">
                                <div class="flex items-center justify-between px-4">
                                    <div class="-mr-2">
                                        <PopoverButton
                                            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500">
                                            <span class="absolute -inset-0.5" />
                                            <span class="sr-only">Close menu</span>
                                            <XMarkIcon class="size-6" aria-hidden="true" />
                                        </PopoverButton>
                                    </div>
                                </div>
                                <div class="mt-3 space-y-1 px-2">
                                    <ResponsiveNavLink v-for="item in navigation" :key="item.name"
                                        :href="route(item.route)" :active="route().current(item.route)">
                                        {{ item.name }}
                                    </ResponsiveNavLink>

                                    <ResponsiveNavLink v-if="page.props.auth.user.is_admin" :href="route('admin.index')"
                                        :active="route().current('admin.index')">
                                        Admin
                                    </ResponsiveNavLink>

                                    <ResponsiveNavLink as="button" @click="$emit('logout')">
                                        Log Out
                                    </ResponsiveNavLink>

                                </div>
                            </div>
                            <div class="pb-2 pt-4">
                                <div class="flex items-center px-5">
                                    <div class="shrink-0">
                                        <img class="size-10 rounded-full" :src="user.imageUrl" alt="" />
                                    </div>
                                    <div class="ml-3 min-w-0 flex-1">
                                        <div class="truncate text-base font-medium text-gray-200">{{ user.name }}</div>
                                        <div class="truncate text-sm font-medium text-gray-400">{{ user.email }}</div>
                                    </div>
                                    <button type="button"
                                        class="relative ml-auto shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                        <span class="absolute -inset-1.5" />
                                        <span class="sr-only">View notifications</span>
                                        <BellIcon class="size-6" aria-hidden="true" />
                                    </button>
                                </div>

                            </div>
                        </div>
                    </PopoverPanel>
                </TransitionChild>
            </div>
        </TransitionRoot>
    </Popover>

</template>
