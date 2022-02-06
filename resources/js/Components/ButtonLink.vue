<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'inline-flex items-center px-7 py-2 mx-2 border-2 rounded-3xl border-denim-400 text-sm font-medium leading-5 text-denim-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-7 py-2 mx-2 border-2 rounded-3xl border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
        }
    }
}
</script>
