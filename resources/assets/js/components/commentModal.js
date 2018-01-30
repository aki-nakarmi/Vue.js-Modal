Vue.component('CommentModal', {
    template: '#comment-modal-template',
    props: ['show'],
    data: function () {
        return {
            body: '',
        }
    },
    methods: {
        close: function () {
            this.$emit('close');
            this.body = '';
        },
        savePost: function () {
            // Some save logic goes here...

            this.close();
        }
    }
});