<template>
  <div class="wave">
    <HeaderComponent></HeaderComponent>

    <div class="slider-container d-flex flex-column">
      <div class="slider-box" @mouseover="stopSlideShow" 
        @mouseout="startSlideShow">
        <div class="slider-wrapper" :style="wrapperStyle" >
          <div v-for="(slide) in store.slides" :key="slide.id" class="card">
            <div class="card-content d-flex mt-4 mb-3">
              <div class="card-image">
                <img :src="slide.image" alt="Image for {{ slide.nameTable }}">
              </div>
              <div class="card-details d-flex flex-column">
                <h3 class="p-3">{{ slide.nameTable }}</h3>
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
        <p class="bg-dark text-center text-white py-1">{{ currentIndex + 1 }}/{{ store.slides.length }}</p>
      </div>
    </div>
    
  </div>
</template>

<script>
import { ref, computed, onMounted } from 'vue';
import { store } from '../../js/store';
import HeaderComponent from './partials/HeaderComponent.vue';

export default {
  name: 'SlideComponent',
  components: {
    HeaderComponent,
  },
  setup() {
    const currentIndex = ref(0); 
    const activeTab = ref('description');
    let slideInterval = null;

    const goToSlide = (index) => {
      if (index < 0) {
        currentIndex.value = 0;
      } else if (index >= store.slides.length) {
        currentIndex.value = 0;
      } else {
        currentIndex.value = index;
      }
    };

    const nextSlide = () => goToSlide(currentIndex.value + 1);
    const prevSlide = () => goToSlide(currentIndex.value - 1);
    
    const startSlideShow = () => {
      slideInterval = setInterval(() => {
        nextSlide();
      }, 8000); 
    };

     const stopSlideShow = () => {
      if (slideInterval) {
        clearInterval(slideInterval);  
        slideInterval = null;  
      }
    };

    const wrapperStyle = computed(() => ({
      transform: `translateX(-${currentIndex.value * 100}%)`,  
      transition: 'transform 0.5s ease',
    }));

    const isActiveTab = (tab) => activeTab.value === tab;
 
    onMounted(() => {
      if (!store.slidesLoaded) {
        store.fetchSlides();
      } startSlideShow(); 
    });
 
    return {
      store,
      currentIndex,  
      activeTab,
      wrapperStyle,
      nextSlide,
      prevSlide,
      startSlideShow,  
      stopSlideShow,
      isActiveTab,
    };
  },
};
</script>


<style lang="scss" scoped>
@use '../../scss/style/variables' as *;

.wave {
  background-image: url('/onde.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 500px;
  margin-bottom: 250px;
  position: relative;  
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
  transition: transform 0.5s ease;
}

.card {
  background-image: url('/progetto.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  flex: 0 0 100%; 
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  border-radius: 0;
}

.card-content {
  display: flex;
  width: 100%;
}

.card-image {
  flex: 0 0 300px; 
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: auto; 
  object-fit: cover; 
}

.card-details {
  padding-left: 20px;
  flex: 1; 
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

.card-body p {
  padding-top:10px;
}

.card-nav button.active {
  border-bottom: 2px solid $blue-light;
  color: $dark;
  font-weight: bolder;

}

.counter {
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

.card-footer {
  display: flex;
  gap: 4px;
  align-items: center;
  background-color: white;
  border: 0;
}

.card-footer button {
  border-radius: 0;
  border: 0;
  text-transform: uppercase;
  width: 150px;
  background-color: $blue-light;
}

a {
  color: $blue-light;
}


/*Fonts*/

*{
  font-family: 'Roboto Condensed', sans-serif;
  font-weight: 600;
}

.card-body p {
  font-weight: 200;
}

/* Tablet */
@media (max-width: 1024px) {
  .wave {
    height: 800px;
  }
  
  .slider-container {
    max-width: 100%;
  }
 
  .card {
    flex: 0 0 calc(100% - 40px); 
    margin: 0 20px;
  }

  .counter {
    margin-right: 20px;
  }
}

/* Mobile */
@media (max-width: 768px) {
  .wave {
    height: 1000px;
  }
  
  .slider-container {
    padding: 0 5px;
    max-height: 850px;
    overflow: hidden;
  }
  
  .slider-wrapper {
    width: 100%;
  }
  
  .card {
 
    flex-direction: column;
    align-items: center;
    min-height: 400px;
  }
  
  .card-content {
    flex-direction: column;
    width: 100%;
  }
  
  .card-image {
    width: 100%; 
    height: auto; 
  }
  
  .card-details {
    padding-left: 0;
    text-align: center;
  }
  
  .card-nav button {
    padding: 3px 6px;
    margin-right: 5px;
    font-size: 14px;
  }
  
  .card-footer {
    flex-direction: column;
    align-items: center;
  }
  
  .card-footer button {
    width: 100%;
    margin-top: 10px;
  }
  
  .counter {
    top: 10%;
    right: 5px;
  }
}
</style>




