<template>
    <Head title="داشبورد" />

    <GuestLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                داشبورد
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between text-normal md:text-lg lg:text-xl xl:text-2xl mb-6 pb-2 border-b font-extrabold">
                    <h2>لیست {{ user.name }}</h2>
                </div>

                <div class="rounded-2xl bg-gray-100 flex p-2 mt-4 gap-4">
                    <button
                        class="all rounded-2xl px-4 py-2"
                        @click="sortBy('all')"
                        :class="{ 'bg-white drop-shadow': search == 'all' }"
                    >
                        همه
                    </button>
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

                </div>
                <div class="mt-7 overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <tbody>
                            <tr
                                tabindex="0"
                                class="focus:outline-none h-16 border border-slate-300 border-gray-100 rounded mb-4 pb-4"
                                v-for="item in filtered_items"
                                :key="item.id"
                            >
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p
                                            class="text-base font-medium leading-none text-gray-700 mr-2"
                                        >
                                            {{ item.title }}
                                        </p>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <path
                                                d="M6.66669 9.33342C6.88394 9.55515 7.14325 9.73131 7.42944 9.85156C7.71562 9.97182 8.02293 10.0338 8.33335 10.0338C8.64378 10.0338 8.95108 9.97182 9.23727 9.85156C9.52345 9.73131 9.78277 9.55515 10 9.33342L12.6667 6.66676C13.1087 6.22473 13.357 5.62521 13.357 5.00009C13.357 4.37497 13.1087 3.77545 12.6667 3.33342C12.2247 2.89139 11.6251 2.64307 11 2.64307C10.3749 2.64307 9.77538 2.89139 9.33335 3.33342L9.00002 3.66676"
                                                stroke="#3B82F6"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                            <path
                                                d="M9.33336 6.66665C9.11611 6.44492 8.8568 6.26876 8.57061 6.14851C8.28442 6.02825 7.97712 5.96631 7.66669 5.96631C7.35627 5.96631 7.04897 6.02825 6.76278 6.14851C6.47659 6.26876 6.21728 6.44492 6.00003 6.66665L3.33336 9.33332C2.89133 9.77534 2.64301 10.3749 2.64301 11C2.64301 11.6251 2.89133 12.2246 3.33336 12.6666C3.77539 13.1087 4.37491 13.357 5.00003 13.357C5.62515 13.357 6.22467 13.1087 6.66669 12.6666L7.00003 12.3333"
                                                stroke="#3B82F6"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                        </svg>
                                    </div>
                                </td>
                                <td class="pl-24">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                            fill="none"
                                        >
                                            <path
                                                d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                                stroke="#52525B"
                                                stroke-width="1.25"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                            <circle
                                                cx="7.50004"
                                                cy="7.49967"
                                                r="1.66667"
                                                stroke="#52525B"
                                                stroke-width="1.25"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></circle>
                                        </svg>
                                        <p
                                            class="text-sm leading-none text-gray-600 ml-2"
                                        >
                                            {{ item.ReadablePrice }} ت
                                        </p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center" v-if="item.address">
                                        <a :href="item.address"
                                            class="text-sm leading-none text-gray-800 ml-2 underline hover:text-black"
                                        >
                                            لینک محصول
                                        </a>
                                    </div>
                                </td>
                                
                                <!-- <td class="pl-5">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                            fill="none"
                                        >
                                            <path
                                                d="M12.5 5.83339L7.08333 11.2501C6.75181 11.5816 6.56556 12.0312 6.56556 12.5001C6.56556 12.9689 6.75181 13.4185 7.08333 13.7501C7.41485 14.0816 7.86449 14.2678 8.33333 14.2678C8.80217 14.2678 9.25181 14.0816 9.58333 13.7501L15 8.33339C15.663 7.67034 16.0355 6.77107 16.0355 5.83339C16.0355 4.8957 15.663 3.99643 15 3.33339C14.337 2.67034 13.4377 2.29785 12.5 2.29785C11.5623 2.29785 10.663 2.67034 10 3.33339L4.58333 8.75005C3.58877 9.74461 3.03003 11.0935 3.03003 12.5001C3.03003 13.9066 3.58877 15.2555 4.58333 16.2501C5.57789 17.2446 6.92681 17.8034 8.33333 17.8034C9.73985 17.8034 11.0888 17.2446 12.0833 16.2501L17.5 10.8334"
                                                stroke="#52525B"
                                                stroke-width="1.25"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                        </svg>
                                        <p
                                            class="text-sm leading-none text-gray-600 ml-2"
                                        >
                                            04/07
                                        </p>
                                    </div>
                                </td> -->
                                <td class="pl-5">
                                    <span :class="item.classes"
                                        class="p-1 text-sm focus:outline-none leading-none rounded"
                                    >
                                        {{ item.status }}
                                    </span>
                                </td>
                                <td class="pl-4">
                                    <button @click.prevent="reserveItem(item)" 
                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                    v-text="item.IsReservedByCurrentUser == true ? 'لغو' : 'رزرو'" 
                                    >
                                    </button>
                                </td>
                                <!-- <td class="pl-4" v-if="this.$attrs.auth.user && this.$attrs.auth.user.id == item.user_id">
                                    <button
                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-red-100 rounded hover:bg-red-200 focus:outline-none"
                                    >
                                        حذف
                                    </button>
                                </td> -->
                                <!-- <td>
                                    <div class="relative px-5 pt-2">
                                        <button
                                            class="focus:ring-2 rounded-md focus:outline-none"
                                            onclick="dropdownFunction(this)"
                                            role="button"
                                            aria-label="option"
                                        >
                                            <svg
                                                class="dropbtn"
                                                onclick="dropdownFunction(this)"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                            >
                                                <path
                                                    d="M4.16667 10.8332C4.62691 10.8332 5 10.4601 5 9.99984C5 9.5396 4.62691 9.1665 4.16667 9.1665C3.70643 9.1665 3.33334 9.5396 3.33334 9.99984C3.33334 10.4601 3.70643 10.8332 4.16667 10.8332Z"
                                                    stroke="#9CA3AF"
                                                    stroke-width="1.25"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                ></path>
                                                <path
                                                    d="M10 10.8332C10.4602 10.8332 10.8333 10.4601 10.8333 9.99984C10.8333 9.5396 10.4602 9.1665 10 9.1665C9.53976 9.1665 9.16666 9.5396 9.16666 9.99984C9.16666 10.4601 9.53976 10.8332 10 10.8332Z"
                                                    stroke="#9CA3AF"
                                                    stroke-width="1.25"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                ></path>
                                                <path
                                                    d="M15.8333 10.8332C16.2936 10.8332 16.6667 10.4601 16.6667 9.99984C16.6667 9.5396 16.2936 9.1665 15.8333 9.1665C15.3731 9.1665 15 9.5396 15 9.99984C15 10.4601 15.3731 10.8332 15.8333 10.8332Z"
                                                    stroke="#9CA3AF"
                                                    stroke-width="1.25"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                ></path>
                                            </svg>
                                        </button>
                                        <div
                                            class="dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 hidden"
                                        >
                                            <div
                                                tabindex="0"
                                                class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
                                            >
                                                <p>Edit</p>
                                            </div>
                                            <div
                                                tabindex="0"
                                                class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
                                            >
                                                <p>Delete</p>
                                            </div>
                                        </div>
                                    </div>
                                </td> -->
                            </tr>
                            <tr class="h-3" v-for="item in filtered_items"
                        :key="item.id"></tr>
                            
                        
                        </tbody>
                    </table>
                </div>
                <!-- <div
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

                                <button
                                    @click.prevent="reserveItem(item.id)"
                                    class="py-1 px-2 rounded-xl bg-white shadow"
                                >
                                    رزرو
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/Unauthenticated.vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import LoginModal from "@/Components/LoginModal.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from '@/Components/Button.vue'


export default {
    data() {
        return {
            search: "all",
            open: false,
            filtered_items: this.$props.items,
        };
    },
    props: {
        items: Object,
        user: Object,
    },
    mounted: function () {
        this.sortBy(this.search);
    },
    methods: {
        reserveItem(item ) {
            
            if (!this.$attrs.auth.user) {
                alert('لطفا اگر قصد رزرو آیتمی را دارید، به سیستم وارد شوید.')
                return;
            }
            if (this.$attrs.auth.user && this.$attrs.auth.user.id == item.user_id) {
                alert('امکان رزرو آیتم خودتان وجود ندارد.')
                return;
            }
            if(item.is_reserved == true) {
                var message = "آیا واقعا قصد لغو رزرو این محصول را دارید؟"
            } else {
                var message = "آیا واقعا قصد رزرو این محصول را دارید؟"
            }
            if (confirm(message)) {
            axios.post('/item/'+item.id+'/reserve')
            .then(function (response) {
                item.reserved_by = response.data.item.reserved_by;
                item.is_reserved = response.data.item.is_reserved;
                item.IsReservedByCurrentUser = response.data.item.IsReservedByCurrentUser;
                item.status = response.data.item.status;
                item.classes = response.data.item.classes;
                
                console.log(response);

            })
            .catch(function (error) {
                console.log(error);
            });
         }
        },

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
        GuestLayout,
        Head,
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeButtonLink,
        BreezeResponsiveNavLink,
        Link,
        LoginModal,
        BreezeButton,
    },
};
</script>
