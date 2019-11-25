<template>
    <div>
        <strong>{{ followers }}</strong> followers
    </div>
</template>

<script>

    export default {
        props: {
            count: {
                required: true
            }
        },
        computed: {
            followers() {
                return this.count;
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
