<script setup>
import NavLink from '@/Components/NavLink.vue';
import { usePage } from '@inertiajs/vue3';

import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
    PopoverButton,
    PopoverOverlay,
    PopoverPanel,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    AcademicCapIcon,
    BanknotesIcon,
    Bars3Icon,
    BellIcon,
    CheckBadgeIcon,
    ClockIcon,
    ReceiptRefundIcon,
    UsersIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'
import ResponsiveNavLink from './ResponsiveNavLink.vue';

const page = usePage()

const user = {
    name: 'Chelsea Hagon',
    email: 'chelsea.hagon@example.com',
    role: 'Human Resources Manager',
    imageUrl:
        'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
}
const navigation = [
    { name: 'Home', route: 'home' },
    { name: 'Dashboard', route: 'dashboard' },
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
]
const stats = [
    { label: 'Vacation days left', value: 12 },
    { label: 'Sick days left', value: 4 },
    { label: 'Personal days left', value: 2 },
]
const actions = [
    {
        icon: ClockIcon,
        name: 'Request time off',
        href: '#',
        iconForeground: 'text-teal-700',
        iconBackground: 'bg-teal-50',
    },
    {
        icon: CheckBadgeIcon,
        name: 'Benefits',
        href: '#',
        iconForeground: 'text-purple-700',
        iconBackground: 'bg-purple-50',
    },
    {
        icon: UsersIcon,
        name: 'Schedule a one-on-one',
        href: '#',
        iconForeground: 'text-sky-700',
        iconBackground: 'bg-sky-50',
    },
    {
        icon: BanknotesIcon,
        name: 'Payroll',
        href: '#',
        iconForeground: 'text-yellow-700',
        iconBackground: 'bg-yellow-50',
    },
    {
        icon: ReceiptRefundIcon,
        name: 'Submit an expense',
        href: '#',
        iconForeground: 'text-rose-700',
        iconBackground: 'bg-rose-50',
    },
    {
        icon: AcademicCapIcon,
        name: 'Training',
        href: '#',
        iconForeground: 'text-indigo-700',
        iconBackground: 'bg-indigo-50',
    },
]
const recentHires = [
    {
        name: 'Leonard Krasner',
        handle: 'leonardkrasner',
        imageUrl:
            'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        href: '#',
    },
    {
        name: 'Floyd Miles',
        handle: 'floydmiles',
        imageUrl:
            'https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        href: '#',
    },
    {
        name: 'Emily Selman',
        handle: 'emilyselman',
        imageUrl:
            'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        href: '#',
    },
    {
        name: 'Kristin Watson',
        handle: 'kristinwatson',
        imageUrl:
            'https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        href: '#',
    },
]
const announcements = [
    {
        id: 1,
        title: 'Office closed on July 2nd',
        href: '#',
        preview:
            'Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque cum consectetur dolores.',
    },
    {
        id: 2,
        title: 'New password policy',
        href: '#',
        preview:
            'Alias inventore ut autem optio voluptas et repellendus. Facere totam quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est sit autem mollitia.',
    },
    {
        id: 3,
        title: 'Office closed on July 2nd',
        href: '#',
        preview:
            'Tenetur libero voluptatem rerum occaecati qui est molestiae exercitationem. Voluptate quisquam iure assumenda consequatur ex et recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur quis dignissimos voluptatem nisi.',
    },
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
                                    <div>
                                        <img class="h-8 w-auto"
                                            src="https://tailwindui.com/plus/img/logos/mark.svg?color=sky&shade=600"
                                            alt="Your Company" />
                                    </div>
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
                                        <div class="truncate text-base font-medium text-gray-800">{{ user.name }}</div>
                                        <div class="truncate text-sm font-medium text-gray-500">{{ user.email }}</div>
                                    </div>
                                    <button type="button"
                                        class="relative ml-auto shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                        <span class="absolute -inset-1.5" />
                                        <span class="sr-only">View notifications</span>
                                        <BellIcon class="size-6" aria-hidden="true" />
                                    </button>
                                </div>
                                <div class="mt-3 space-y-1 px-2">
                                    <a v-for="item in userNavigation" :key="item.name" :href="item.href"
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">{{
                                            item.name }}</a>
                                </div>
                            </div>
                        </div>
                    </PopoverPanel>
                </TransitionChild>
            </div>
        </TransitionRoot>
    </Popover>

</template>
