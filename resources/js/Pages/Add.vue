<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between text-4xl">
                    <h2>افزودن به لیست</h2>
                </div>

                <form @submit.prevent="submit">
                    <div class="md:flex md:items-start mb-6">
                        <div class="md:w-1/3">
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-full-name"
                            >
                                آدرس آیتم در دیجیکالا
                            </label>
                        </div>
                        <div class="md:w-2/3 text-left">
                            <input v-model="address_form.address"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-address"
                                type="text"
                            />
                            <button
                                type="submit" :disabled="address_form.processing"
                                class="shadow mt-2 bg-gray-600 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 rounded"
                            >
                                دریافت
                            </button>
                        </div>
                    </div>
                </form>

                <form @submit.prevent="submit">
                    <div class="md:flex md:items-start mb-6">
                        <div class="md:w-1/3">
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-password"
                            >
                                نام کالا
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                v-model="form.title"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-name"
                                type="text"
                                placeholder=""
                            />
                        </div>
                    </div>

                    <div class="md:flex md:items-start mb-6">
                        <div class="md:w-1/3">
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-password"
                            >
                                قیمت
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                v-model="form.price"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-name"
                                type="text"
                                placeholder=""
                            />
                        </div>
                    </div>

                    <div class="md:flex md:items-start mb-6">
                        <div class="md:w-1/3">
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-password"
                            >
                                تصویر
                            </label>
                        </div>
                        <div class="md:w-1/3">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-name"
                                type="file"
                                placeholder=""
                            />
                        </div>
                        <div class="md:w-1/3" v-if="form.picture">
                            <img class="w-40 h-40" :src="form.picture" alt="">
                        </div>
                    </div>

                    <div class="md:flex md:items-start">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 text-left">
                            <button
                                type="submit"
                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            >
                                ثبت
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, useForm } from "@inertiajs/inertia-vue3";

export default {
    setup() {
        const address_form = useForm({
            address: "https://www.digikala.com/product/dkp-3091579/%D9%85%DB%8C%D8%B2-%D8%AA%D8%AD%D8%B1%DB%8C%D8%B1-%D9%85%D8%AF%D9%84-%D9%81%D9%88%DA%A9%D8%A7#/tab-comments/&page=1&order=newest_comment"
        });
        const form = useForm({
            address: address_form.address,
            title: "",
            price: "",
            picture: false,
        }, form);

        return { form, address_form };
    },
    methods: {
        submit() {
            console.log("we hereee");
            this.address_form.post("/add", {
                preserveScroll: true,
                onSuccess: (response) => {
                    console.log(response.props.data);
                    if (response.props.data.type == 'product') {
                        this.form.title = response.props.data.title
                        this.form.price = response.props.data.price
                        this.form.picture = response.props.data.image
                    } else {
                        console.log('encountered an error')
                    }
                    console.log("test");
                },
            });

            // return { form, submit }
        },
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
};
</script>
