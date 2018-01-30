/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
require('./components/newUserModal');
require('./components/commentModal');
require('./components/userEditModal');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('Modal', {
    template: '#modal-template',
    props: ['show'],
    mounted: function () {
        document.addEventListener("keydown", (e) => {
            if (this.show && e.keyCode == 27) {
                this.close();
            }
        });
    },
    methods: {
        close: function () {
            this.$emit('close');
        },
    }
});
new Vue({
    el: '#app',
    data: {
        showNewUserModal: false,
        showCommentModal: false,
        showUserEditModal: false
    }
});