import Form from "../services/Form";

Vue.component('UserEditModal', {
    template: '#user-edit-modal-template',
    props: ['show', 'user_id'],
    data: function () {

        return {
            name: '',
            email: '',
            form: new Form(),
            values: {},
            fileInput: {},
            user: {}
        }
    },
    mounted() {
        var _self = this;
        axios.get('http://modal.valet/user/2')
            .then(function (response) {
                _self.user = response.data.user;
                _self.name = _self.user.name;
                _self.email = _self.user.email;
                console.log(_self.user);
            })
            .catch(function (error) {
                console.log(error)
            });
    },
    methods: {
        close: function () {
            this.$emit('close');
            this.name = this.user.name;
            this.email = this.user.email;
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