<!-- This example requires Tailwind CSS v2.0+ -->
<template>
<a
    @click.prevent="toggle"
    class="opacity-0 group-hover:opacity-100 py-1 px-2 rounded-xl bg-white shadow">
    <span v-text="itemReserveText"></span></a>
</template>

<script>
 

export default {
    props: {
        item: Object,
    },
    data() {
        return {
            itemReserveText : 'رزرو'
        }
    },
    methods: {
        toggle() {
            console.log(this.item)
            if (this.item.isReserved) {
                console.log('we here')
                axios.delete('/item/'+ this.item.id +'/reserve');
            } else {
                console.log('we there')
                axios.post('/item/'+ this.item.id +'/reserve');
            }
        }
    }
}
</script>