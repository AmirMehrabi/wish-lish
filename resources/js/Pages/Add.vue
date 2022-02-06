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
                        <div class="md:w-2/3">
                        <div class="w-full text-left flex flex-col lg:flex-row">
                            <input v-model="address_form.address"
                                class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-address"
                                type="text"
                            />
                            <button
                                type="submit" :disabled="address_form.processing"
                                class="shadow mt-2 lg:mt-0 bg-gray-600 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 rounded"
                            >
                                دریافت
                            </button>
                            
                        </div>
                        <div v-if="errors.address" class="text-red-700" >{{errors.address}}</div>

                        </div>
                    </div>
                </form>

                <form @submit.prevent="submitItem">
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
                                class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-name"
                                type="text"
                                placeholder=""
                            />
                            <div v-if="errors.title" class="text-red-700" >{{errors.title}}</div>
                        </div>
                        
                    </div>

                    <div class="md:flex md:items-start mb-6">
                        <div class="md:w-1/3">
                        
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-password"
                            >
                                توضیحات
                            </label>
                        </div>
                        <div class="md:w-2/3">
                        <textarea v-model="form.description"
                                class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="" cols="30" rows="10"></textarea>
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
                                class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="inline-name"
                                type="text"
                                placeholder=""
                            />
                            <div v-if="errors.price" class="text-red-700">{{ errors.price }}</div>
                        </div>
                        
                    </div>

                    <div class="md:flex md:items-start mb-6" v-if="form.picture">
                        <div class="md:w-1/3">
                            <label
                                class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-password"
                            >
                                تصویر
                            </label>
                        </div>

                        <div class="md:w-1/3" v-if="form.picture">
                            <img class="w-40 h-40" :src="form.picture" alt="">
                        </div>
                    </div>

                    <div class="md:flex md:items-start">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 text-left">
                            <button
                                type="submit" :disabled="form.processing"
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
    props: {
        errors: Object,
    },
    setup() {
        const address_form = useForm({
            address: "https://www.digikala.com/product/dkp-3091579/%D9%85%DB%8C%D8%B2-%D8%AA%D8%AD%D8%B1%DB%8C%D8%B1-%D9%85%D8%AF%D9%84-%D9%81%D9%88%DA%A9%D8%A7#/tab-comments/&page=1&order=newest_comment"
        });
        const form = useForm({
            address: address_form.address,
            title: "",
            description: "",
            price: "",
            picture: "",
        });

        return { form, address_form };
    },
    methods: {
        submit() {
            console.log("we hereee");
            this.form.address = this.address_form.address
            this.address_form.post("/add", {
                preserveScroll: true,
                onSuccess: (response) => {
                    console.log(response.props.data);
                    if (response.props.data.type == 'product') {
                        this.form.title = response.props.data.title
                        this.form.description = response.props.data.description
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

        submitItem() {
            console.log("we submitting fooorm");
            this.form.post("/item", this.form, {
                preserveScroll: true,
                onSuccess: (response) => {
                    console.log(response);

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
