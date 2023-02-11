<template>
    <div>
        <div>
            <textarea v-model="message"></textarea><br>
            <button type="button" v-on:click="send()">送信</button>
        </div>

        <div v-for="m in messages" :key="m.id">
            <span v-text="m.text"></span>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        messages: Array,
    },
    data: function () {
        return {
            message: '',
        }
    },
    methods: {
        send() {
            const formData = new FormData()
            formData.append('message', this.message)

            this.$inertia.post('/chat', formData, {
                onSuccess: () => (this.message = ''),
                })
    },
},
    }
</script>
