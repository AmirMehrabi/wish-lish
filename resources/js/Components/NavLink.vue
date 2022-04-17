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
                ? 'inline-flex items-center px-7 py-2 mx-2 drop-shadow bg-gray-100 hover:bg-white  rounded-lg text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-denim-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-7 py-2 mx-2 border-2 rounded-lg border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
        }
    }
}
</script>
