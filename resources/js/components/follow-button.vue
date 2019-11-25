<template>
    <div>
        <div class="ml-5"><button @click="followUser()" class="btn btn-primary">{{ btnStatus }}</button></div>
    </div>
</template>

<script>

    export default {
        props: ['userid','follows'],

        data: function () {
            return {
                status:
                    this.follows,

            }
        },
        computed:{
            btnStatus(){
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
                        this.status = !this.status;
                        if (this.status){
                            this.$emit('followed');
                        } else {
                            this.$emit('unfollowed');
                        }

                    })
                    .catch(error => {
                        if (error.response.status == 401){
                            return window.location = '/login';
                        }
                    })
            }
        }
    };
</script>
