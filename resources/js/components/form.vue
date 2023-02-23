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
            <label for="satisfaction">Satisfaction (10 for best, 1 for worst)</label>
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

        <button class="btn btn-primary"
                @click.prevent="submitted">Submit!
        </button>
    </section>
</template>

<script>
import { store } from './store.js'

export default {
    data() {
        return {
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
    methods: {
        submitted() {
            this.isSubmitted = true;
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
        }
    },
}
</script>
