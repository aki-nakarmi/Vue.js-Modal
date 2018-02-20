import Form from "../services/Form";

Vue.component('AddAccessibilityModal', {
    template: '#add-accessibility-template',
    props: ['show', 'questions_data'],
    data: function () {
        return {
            form: new Form(),
            values: {},
            fileInput: {},
            questions: {},

        };
    },
    mounted() {
        if (this.questions_data.length > 0) {
            this.questions = this.questions_data;
        }
    },
    computed: {},
    watch: {},
    methods: {
        close: function () {
            this.$emit('close');
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
                if (value !== '') {
                    self.values[name] = value;
                }
            });

            $.extend(this.values, this.fileInput);
            this.form = new Form(this.values);
            this.form.post(action).then(function (response) {
                if (response.redirect !== undefined) {
                    location.reload(true);
                }
            }).catch(function (error) {
                $('.loader-div').addClass('hide');
                console.log(error);
            });
            this.values = {};
        },
        update(questions) {
            console.log(questions)
        }
    }
});
