<template>
  <div v-if="alert" class="alert alert-success text-start" role="alert">
      Messaggio inviato con successo!
  </div>

    <form @submit.prevent="sendForm" class="mb-5 px-5">
      <div class="mb-3">
        <input
          required
          type="text"
          name="name"
          id="name"
          v-model="form.name"
          class="form-control"
          :class="{ 'is-invalid': errors.name }"
          placeholder="Name"
        />
        <p
          v-for="(error, index) in errors.name"
          :key="`name-error-${index}`"
          class="invalid-feedback"
        >
          {{ error }}
        </p>
      </div>

      <div class="mb-3">
        <input
          required
          type="email"
          name="email"
          id="email"
          v-model="form.email"
          class="form-control"
          :class="{ 'is-invalid': errors.email }"
          placeholder="Email"
        />
        <p
          v-for="(error, index) in errors.email"
          :key="`email-error-${index}`"
          class="invalid-feedback"
        >
          {{ error }}
        </p>
      </div>

      <div class="birt d-flex justify-content-between">
        <div class="mb-3 ">
          <input
            required
            type="text"
            name="birthPlace"
            id="birthPlace"
            v-model="form.birthPlace"
            class="form-control"
            :class="{ 'is-invalid': errors.birthPlace }"
            placeholder="BirthPlace"
          />
          <p
            v-for="(error, index) in errors.birthPlace"
            :key="`birthPlace-error-${index}`"
            class="invalid-feedback"
          >
            {{ error }}
          </p>
        </div>
        <div class="mb-3">
          <input
            required
            type="date"
            name="birthday"
            id="birthday"
            v-model="form.birthday"
            class="form-control"
            :class="{ 'is-invalid': errors.birthday }"
            placeholder="Birthday"
          />
          <p
            v-for="(error, index) in errors.birthday"
            :key="`birthday-error-${index}`"
            class="invalid-feedback"
          >
            {{ error }}
          </p>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <div class="mb-3">
          <input
            required
            type="tel"
            name="phone"
            id="phone"
            v-model="form.phone"
            class="form-control"
            :class="{ 'is-invalid': errors.phone }"
            placeholder="Phone"
          />
          <p
            v-for="(error, index) in errors.phone"
            :key="`phone-error-${index}`"
            class="invalid-feedback"
          >
            {{ error }}
          </p>
        </div>
        <div class="mb-3">
          <input
            type="text"
            name="company"
            id="company"
            v-model="form.company"
            class="form-control"
            placeholder="Company"
          />
        </div>
      </div>

      <div class="mb-3">
        <textarea
          required
          rows="5"
          name="message"
          id="message"
          v-model="form.message"
          class="form-control"
          :class="{ 'is-invalid': errors.message }"
          placeholder="Message"
        ></textarea>
        <p
          v-for="(error, index) in errors.message"
          :key="`message-error-${index}`"
          class="invalid-feedback"
        >
          {{ error }}
        </p>
      </div>

      <div class="form-group">
        <input
          type="checkbox"
          id="policy"
          v-model="form.policy"
          required
        />
        <label for="policy" class="px-2"> Accept privacy policy</label>
        <span v-if="errors.policy" class="error">{{ errors.policy }}</span>
      </div>

      <div class="d-flex ">
        <button
          class="btn py-2 px-3 my-3"
          type="submit"
          :disabled="loading"
        >
          {{ loading ? 'Sending...' : 'Send' }}
        </button>
      </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
  name: "EmailComponent",
  data() {
    return {
      form: {
        name: '',
        email: '',
        birthday: '',
        birthPlace: '',  
        phone: '',          
        company: '',       
        message: '',
        policy: false,
      },
      loading: false,
      alert: false,
      errors: {},
    };
    
  },
  methods: {
    sendForm() {
      this.loading = true;
      this.errors = {};

      axios
        .post(`/api/contact`, this.form)
        .then((response) => {
          if (response.data.errors) {
            this.errors = response.data.errors;
          } else {
            this.resetForm();
            this.alert = true;
          }
          this.loading = false;
        })
        .catch((error) => {
          console.error('There was an error!', error.response.data);
          this.loading = false;
        });
    },
    resetForm() {
      this.form = {
        name: '',
        email: '',
        birthday: '',
        birthPlace: '',
        phone: '',
        company: '',
        message: '',
        policy: false,
      };
      this.alert = false;
      this.errors = {};
    }
  }
};
</script>

<style lang="scss" scoped>
@use '../../../scss/style/variables' as *;

*, input::placeholder, textarea::placeholder{
  color:#8d8d8d
}

.btn{
  background-color: $blue-light;
  color:white;
  border-radius: 0;
  width: 150px;
}

/*Fonts*/
*{
  font-family: 'Roboto Condensed', sans-serif;
  font-weight: 600;
}

</style>
