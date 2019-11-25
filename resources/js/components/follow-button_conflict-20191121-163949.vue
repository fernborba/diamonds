<template>
    <div>
        <div class="ml-5"><button @click="followUser()" class="btn btn-primary">{{ btnAction }}</button></div>
    </div>
</template>

<script>
    export default {
        props: ['userid','status'],

        data: function () {
            return {
                status:
                    this.status,

            }

        },
        computed:{
            btnAction(){
                if (this.status){
                    return 'Unfollow';
                }else {
                    return 'Follow';
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            followUser: function () {
                axios.post('/follower/'+this.userid)
                    .then(response =>{
                        console.log(response.data);
                    })
            }
        }
    }
</script>
