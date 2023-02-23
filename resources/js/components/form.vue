<template>
    <section id="app" class="section">
        <div class="form-group">
            <label for="email">Your Email Address</label>
            <input type="text"
                   id="email"
                   class="form-control"
                   v-model="userData.email">
        </div>
        <div class="form-group">
            <label for="email">Your Password</label>
            <input type="text"
                   id="email"
                   class="form-control"
                   v-model="userData.password">
        </div>
        <div class="form-group">
            <label for="satisfaction">Satisfaction with Job (10 for best, 1 for worst)</label>
            <input min="1"
                   max="10"
                   type="number"
                   id="satisfaction"
                   class="form-control"
                   v-model.number="userData.satisfaction">
        </div>
        <div class="form-group">
            <label for="message">Describe yourself!</label>
            <textarea id="message"
                      rows="5"
                      class="form-control"
                      v-model="message"></textarea>
        </div>

        <div class="form-group">
            <label for="male">
                <input type="radio"
                       id="male"
                       value="Male"
                       v-model="radioBoxOption"> Male
            </label>

            <label for="female">
                <input type="radio"
                       id="female"
                       value="Female"
                       v-model="radioBoxOption"> Female
            </label>\

            <label for="other">
                <input type="radio"
                       id="other"
                       value="Other"
                       v-model="radioBoxOption"> Other
            </label>\
        </div>
        <button class="btn btn-primary"
                @click.prevent="submit">Submit!
        </button>
    </section>
</template>

<script>
import { required, email, minLength} from '@vuelidate/validators'
import Vuelidate from 'vuelidate'
export default {
    data() {
        return {
            validate: Vuelidate(),
            userData: {
                email: '',
                password: '',
                satisfaction: '',
            },
            message: 'Describe yourself...',
            radioBoxOption: 'Male',
            isSubmitted: false
        }
    },
    mounted() {
        if(localStorage.email) {
            this.userData.email = localStorage.email
        }
        if(localStorage.password) {
            this.userData.password = localStorage.password
        }
        if(localStorage.satisfaction) {
            this.userData.satisfaction = localStorage.satisfaction
        }
        if(localStorage.message) {
            this.email = localStorage.message
        }
        if(localStorage.radioBoxOption) {
            this.email = localStorage.radioBoxOption
        }
    },
    methods: {
        submit: function (e) {
            this.validate.validate();
            if(!this.validate.$error) {
                alert('Form Submitted');
                localStorage.email = this.userData.email;
                localStorage.password = this.userData.password;
                localStorage.satisfaction = this.userData.satisfaction;
                localStorage.message = this.message;
                localStorage.radioBoxOption = this.radioBoxOption;
            } else {
                alert('Form Failed Validation');
            }
        },

        // Save Form Data into Database {{Endpoint not written for this!}}
        saveFormData() {
            axios.post("/form/save-data", {
                    user: this.userData,
                    message: this.message,
                    gender: this.radioBoxOption
                })
                .then(() => {
                    this.$swal.fire(
                        'Form Saved!',
                        'success'
                    )
                })
                .catch(er => {
                    console.log(er);
                });
        },
    },
    validations() {
        return {
            userData: {
                email:{required, email},
                password:{required, minLength: minLength(8)},
                satisfaction:{required},
            },
            message: {required},
            radioBoxOption: {required}
        }
    }
}
</script>
