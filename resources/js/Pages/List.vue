<template>
    <Head title="داشبورد" />

    <BreezeAuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                داشبورد
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between text-4xl">
                    <h2>
                        لیست
                        <span>{{ person.name }}</span>
                    </h2>
                </div>

                <div class="rounded-2xl bg-gray-100 flex p-2 mt-4 gap-4">
                    <button
                        class="remaining rounded-2xl px-4 py-2"
                        @click="sortBy('remaining')"
                        :class="{
                            'bg-white drop-shadow': search == 'remaining',
                        }"
                    >
                        باقی مانده
                    </button>
                    <button
                        class="reserved rounded-2xl px-4 py-2"
                        @click="sortBy('reserved')"
                        :class="{
                            'bg-white drop-shadow': search == 'reserved',
                        }"
                    >
                        رزرو شده
                    </button>
                    <button
                        class="all rounded-2xl px-4 py-2"
                        @click="sortBy('all')"
                        :class="{ 'bg-white drop-shadow': search == 'all' }"
                    >
                        همه
                    </button>
                </div>

                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-4 grid-flow-row"
                >
                    <div
                        v-for="item in filtered_items"
                        :key="item.id"
                        class="w-full group bg-gradient-to-bl from-denim-100 rounded-3xl drop-shadow-md shadow mt-10 outline-offset-2 hover:ring-2 flex flex-row grid grid-cols-4"
                    >
                        <div v-if="item.picture">
                            <img
                                v-if="item.picture"
                                :src="item.picture"
                                class="h-full rounded-r-3xl rounded-br-3xl"
                                alt=""
                            />
                        </div>
                        <div
                            class="p-4 flex flex-col justify-between"
                            :class="item.picture ? 'col-span-3' : 'col-span-4'"
                        >
                            <div class="text-xl">{{ item.title }}</div>
                            <div class="font-bold text-2xl">
                                {{ item.ReadablePrice }} ت
                            </div>
                            <div class="flex justify-between">
                                <a v-if="item.address" :href="item.address">
                                    مشاهده روی دیجیکالا
                                </a>

                                <a
                                    v-if="item.is_reserved == 0"
                                    href="#"
                                    class="opacity-0 group-hover:opacity-100 py-1 px-2 rounded-xl bg-white shadow"
                                >
                                    رزرو</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    data() {
        return {
            search: "remaining",
            filtered_items: this.$props.items,
        };
    },
    props: {
        items: Object,
        person: Object,
    },
    mounted: function () {
        this.sortBy(this.search);
    },
    methods: {
        sortBy(sortKey) {
            this.search = sortKey;
            if (sortKey == "all") {
                this.filtered_items = this.items.filter((item) => {
                    return item;
                });
            } else if (sortKey == "reserved") {
                this.filtered_items = this.items.filter((item) => {
                    return item.is_reserved == 1;
                });
            } else if (sortKey == "remaining") {
                this.filtered_items = this.items.filter((item) => {
                    return item.is_reserved == 0;
                });
            }
        },
    },

    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeButtonLink,
        BreezeResponsiveNavLink,
        Link,
    },
};
</script>
