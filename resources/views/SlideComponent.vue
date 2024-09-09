<template>
  <div class="wave">
    <HeaderComponent></HeaderComponent>
    <div class="slider-container d-flex flex-column">
      <div class="slider-box">
        <div class="slider-wrapper" :style="wrapperStyle">
          <div v-for="(slide, index) in store.slides" :key="slide.id" class="card">
            <div class="card-content d-flex mt-4 mb-3">
              <div class="card-image">
                <img :src="slide.image" alt="Image for {{ slide.nameTable }}">
              </div>
              <div class="card-details d-flex flex-column">
                <h3>{{ slide.nameTable }}</h3>
                <div class="card-body">
                  <div class="card-nav d-flex mt-3">
                    <button :class="{ active: isActiveTab('description') }" @click="activeTab = 'description'">Description</button>
                    <button :class="{ active: isActiveTab('features') }" @click="activeTab = 'features'">Features</button>
                    <button :class="{ active: isActiveTab('dimensions') }" @click="activeTab = 'dimensions'">Dimensions</button>
                  </div>
                  <p v-if="activeTab === 'description'">{{ slide.description }}</p>
                  <p v-if="activeTab === 'features'">{{ slide.features }}</p>
                  <p v-if="activeTab === 'dimensions'">{{ slide.dimensions }}</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex gap-4 align-items-center">
                  <h2>{{ slide.price }}</h2>
                  <button class="btn btn-primary btn-lg">Buy now</button>
                </div>
                <a href="#" class="fw-semibold pt-4">View all board</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="counter">
        <button @click="prevSlide" class="slider-button prev-button">&#10094;</button>
        <button @click="nextSlide" class="slider-button next-button">&#10095;</button>
        <p class="bg-dark text-center text-white py-1">{{ currentIndex + 1 }}/{{ store.slides.length}}</p>
      </div>
    </div>  
  </div>
</template>

<script>
  import { ref, computed, onMounted } from 'vue';
  import { store } from '../js/store';
  import HeaderComponent from './partials/HeaderComponent.vue';

  export default {
    name: 'SlideComponent',
    components: {
      HeaderComponent,
    },
    setup() {
      const currentIndex = ref(0); // Inizializza con 0
      const activeTab = ref('description');

      const goToSlide = (index) => {
        if (index < 0) {
          currentIndex.value = 0;
        } else if (index >= store.slides.length) {
          currentIndex.value = store.slides.length - 1; // Vai all'ultima slide
        } else {
          currentIndex.value = index;
        }
      };

      const nextSlide = () => goToSlide(currentIndex.value + 1);
      const prevSlide = () => goToSlide(currentIndex.value - 1);

      const wrapperStyle = computed(() => ({
        transform: `translateX(-${currentIndex.value * 800}px)`,
        transition: 'transform 0.5s ease',
      }));

      const isActiveTab = (tab) => activeTab.value === tab;

      onMounted(() => {
        store.fetchSlides(); // Assicura che le slide siano caricate
      });

      return {
        store,
        currentIndex, // Ritorna currentIndex per essere usato nel template
        activeTab,
        wrapperStyle,
        nextSlide,
        prevSlide,
        isActiveTab,
      };
    },
  };
</script>


<style lang="scss" scoped>
@use '../scss/style/variables' as *;

.wave {
  background-image: url('/onde.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
 
  height: 500px;
  margin-bottom: 250px;
}

.slider-container {
  position: relative;
  width: 100%;
  max-width: 800px;
  margin: auto;
  overflow: hidden;
}

.slider-wrapper {
  display: flex;
  width: 100%;
}

.card {
  background-image: url('/progetto.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;

  flex: 0 0 800px;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  align-items: center;

  border-radius: 0;
}

.card-content {
  display: flex;
  width: 100%;
  z-index: 1;
}

.card-image img {
  width: 100%;
  height: auto;
}

.card-details {
  z-index: 2;
  padding-left: 20px;
}

.card-nav button {
  background-color: transparent;
  color: lightgray;
  text-transform: uppercase;
  border: none;
  padding: 5px 10px;
  margin-right: 10px;
  cursor: pointer;
  border-bottom: 2px solid transparent;
  transition: border-color 0.3s, color 0.3s;
}

.card-nav button.active {
  border-bottom: 2px solid $blue-light;
  color: $dark;
  font-weight: bolder;
}

.counter{
  position: absolute;
  top: 8%;
  right: 0;
}

.slider-button {
  background-color: $yellow;
  border: none;
  padding: 10px;
  cursor: pointer;
  z-index: 2;
}

.prev-button {
  right: 29px;
  color: white;
}

.next-button {
  right: 0px;
  color: white;
}

.card-footer button{
  border-radius: 0;
  border:0px;
  text-transform: uppercase;
  width: 150px;
  background-color: $blue-light;
}

a{
  color: $blue-light;
}
</style>
