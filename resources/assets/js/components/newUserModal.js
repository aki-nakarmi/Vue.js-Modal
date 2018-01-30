import Form from "../services/Form";

Vue.component('NewUserModal', {
    template: '#new-user-modal-template',
    props: ['show'],
    data: function () {
        return {
            name: '',
            email: '',
            form: new Form(),
            values: {},
            fileInput: {},
        }
    },
    methods: {
        close: function () {
            this.$emit('close');
            this.name = '';
            this.email = '';
            this.form.reset();
        },

        submitForm(e) {
            let target = e.target.id;
            let action = e.target.action;
            let self = this;
            let o = {};
            let a = $('#' + target).serializeArray();
            $.each(a, function () {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            $.each(o, function (name, value) {
                self.values[name] = value;
            });

            $.extend(this.values, this.fileInput);
            this.form = new Form(this.values);
            this.form.post(action).then(function (response) {
                console.log(response);
                if (response.redirect !== undefined) {
                    window.location.href = response.redirect;
                }
            }).catch(function () {
                $("html, body").animate({scrollTop: ($($('.invalid')[0]).offset().top) - 80}, "slow");
            });
            this.values = {};

        }

    }
});