/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/follow-button.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('follow-button', require('./components/follow-button.vue').default);

Vue.component('followers-info', require('./components/followers-info.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.store({
    state: {
        followers: 0
    },
    mutations: {
        increment: state => state.followers++,
        decrement: state => state.followers--
    }

})
/*
{
    debug: true,
    state: {
        message: 'Hello!'
    },
    setMessageAction (newValue) {
        if (this.debug) console.log('setMessage triggered with', newValue)
        this.state.message = newValue
    },
    clearMessageAction (){
        if (this.debug) console.log('clearMessage triggered with', newValue)
        this.state.message = ''
    }
};

 */
const app = new Vue({
    el: '#app',
    computed: {
        countFollowers() {
            return store.state.followers
        }
    }
    methods: {
        followed: function (){
            console.log('followed');
            store.commit('increment')
        },
        unfollowed: function (){
            console.log('unfollowed');
            store.commit('decrement')
        },
    },
});
