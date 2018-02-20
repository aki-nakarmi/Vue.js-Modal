import Vue from 'vue';

Vue.component('AccessibilityQuestion', {
    props: ['question_name', 'value', 'dependent_on', 'dependent_value', 'dependent_condition'],
    data: function () {
        return {
            selected: '',
            showDiv: false,
            questionsData: '',
        };
    },
    mounted() {
        if (this.dependent_on.length === 0) {
            this.showDiv = true;
        }
        this.questionsData = this.getQuestions();
    },
    watch: {
        selected() {
            console.log('change selected', this.selected);
            let _self = this;

            _self.questionsData[_self.question_name] = _self.selected;
            _self.questionsData = Object.assign({}, _self.questionsData);

            this.$emit('update:value', _self.questionsData);
        },

        value() {
            this.questionsData = this.getQuestions();
            console.log('change questions', this.questionsData);
            if (this.dependent_on.length === 0) {
                this.showDiv = true;
            } else {
                let values = JSON.parse(this.dependent_value);
                let _self = this;
                let status = false;
                values.forEach((data) => {
                    if (this.questionsData[_self.dependent_on] === data) {
                        status = true;
                    }
                });

                if (status === false ) {
                    _self.selected = '';
                    _self.showDiv = false;
                } else {
                    _self.showDiv = true;
                }
            }

        }
    },
    methods: {
        getQuestions() {
            let questions = this.value;
            if (typeof this.value === 'string') {
                questions = JSON.parse(this.value);
            }
            return questions;
        },
    }
})
;
