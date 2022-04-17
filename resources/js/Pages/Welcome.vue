<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="inline-flex items-center px-7 py-2 mx-2 border-2 rounded-3xl border-denim-400 text-sm font-medium leading-5 text-denim-400 focus:outline-none focus:border-denim-700 transition duration-150 ease-in-out"
            >
                داشبورد
            </Link>

            <template v-else>
                <Link  v-if="false"
                    :href="route('login')"
                    class="inline-flex items-center px-7 py-2 mx-2 border-2 rounded-3xl border-denim-400 text-sm font-medium leading-5 text-denim-400 focus:outline-none focus:border-denim-700 transition duration-150 ease-in-out"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister && false"
                    :href="route('register')"
                    class="ml-4 inline-flex items-center px-7 py-2 mx-2 border-2 rounded-3xl border-denim-400 text-sm font-medium leading-5 text-denim-400 focus:outline-none focus:border-denim-700 transition duration-150 ease-in-out"
                >
                    Register
                </Link>
            </template>
        </div>

        <div class="py-12 w-full">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8 w-full">
                <!-- <div
                    class="bg-welcome bg-cover overflow-hidden shadow-xl sm:rounded-3xl"
                >
                    <div
                        class="p-6 sm:px-20 border-b border-gray-200 text-white"
                    >
                        <div class="mt-8 text-6xl max-w-md leading-snug">
                            وقت هدیه دادن و هدیه گرفتنه
                        </div>

                        <div class="mt-6 text-white">
                            عید سال نو یا تولدت نزدیکه؟ چیزهایی که دوست داری
                            هدیه بگیری رو به لیست خواستنی‌هات اضافه کن و لیستت
                            رو با هرکی که می‌خوای به اشتراک بذار
                        </div>

                        <div class="mt-6">
                            <BreezeButtonLink
                                href="/test"
                                :active="route().current('add')"
                            >
                                دعوت از دوستان
                            </BreezeButtonLink>
                        </div>
                    </div>
                </div> -->

                <div class="w-full mx-auto flex flex-col items-center gap-4">
                    <img
                        src="/images/happy-people.jpg"
                        class="rounded-3xl drop-shadow shadow w-80 h-80"
                        alt=""
                    />

                    <div class="mt-8 text-xl max-w-md leading-snug">
                        وقت هدیه دادن و هدیه گرفتنه
                    </div>

                    <div class="mt-6">
                        عید سال نو یا تولدت نزدیکه؟ چیزهایی که دوست داری هدیه
                        بگیری رو به لیست خواستنی‌هات اضافه کن و لیستت رو با هرکی
                        که می‌خوای به اشتراک بذار
                    </div>

                    <div class="flex flex-row">
                        <Link :class="'px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 mr-4'" href="/login" :active="true">
                            ورود
                        </Link>
                        <Link :class="'px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 mr-4'" href="/register">
                            ثبت نام
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
export default {
    components: {
        Head,
        Link,
        BreezeButtonLink,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
