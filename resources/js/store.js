import { reactive } from 'vue';
import axios from 'axios';

export const store = reactive({
  slides: [],
  slidesLoaded: false,
  error: null,
  form: {
    name: '',
    email: '',
    birthPlace: '',
    birthday: '',
    phone: '',
    company: '',
    message: '',
    policy: false
  },
  errors: {},
  fields: [
    { name: 'name', label: 'Name', type: 'text', placeholder: 'Enter your name', required: true },
    { name: 'email', label: 'Email', type: 'email', placeholder: 'Enter your email', required: true },
    { name: 'birthPlace', label: 'Birth Place', type: 'text', placeholder: 'Enter your birth place', required: false },
    { name: 'birthday', label: 'Birthday', type: 'date', placeholder: '', required: true },
    { name: 'phone', label: 'Phone', type: 'tel', placeholder: 'Enter your phone number', required: true },
    { name: 'company', label: 'Company', type: 'text', placeholder: 'Enter your company', required: false },
    { name: 'message', label: 'Message', type: 'textarea', placeholder: 'Enter your message', required: true }
  ],
  
  async fetchSlides() {
    try {
      const response = await axios.get('/api/slides');
      if (response.data.slides) {
        this.slides = response.data.slides;
        this.slidesLoaded = true;
      } else {
        this.slides = [];
      }
    } catch (error) {
      this.error = error.message;
    }
  },
  async handleSubmit() {
    console.log('Form data before validation:', this.form);
    if (this.validate()) {
      try {
        await axios.post('/api/contact', this.form);
        alert('Form submitted successfully!');
        this.resetForm();
      } catch (error) {
        console.error('There was an error!', error);
      }
    } else {
      console.error('Form validation failed:', this.errors);
    }
  }

});

