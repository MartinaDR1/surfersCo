<template>
  <div class=" container">
    <div class="instagram">
      <div class="text-instagram text-center">
        <h1 class="text-uppercase">instagram</h1>
      </div>
    </div>
  </div>
  <div class="container contacts d-flex justify-content-center mt-3">
    <div class="social">
      <div class="photo-grid">
        <div v-for="(photo, index) in photos" :key="index" class="photo-item">
          <img :src="photo" alt="Photo" class="img-fluid" />
        </div>
      </div>
      <div class="footer pt-3 bg-white">
        <div class="footer-contact  d-flex  align-items-center justify-content-between ">
          <h5 class="follow text-uppercase fw-bold d-flex ">
            <p class="px-3"><i class="fa-brands fa-instagram fa-xl"></i></p>
            Follow us
          </h5>
          <p>@surfersco</p>
        </div>
      </div>
    </div>
    <div class="email">
      <EmailComponent></EmailComponent>
    </div>
  </div>
  <div class="footer-page">
    <FooterComponent></FooterComponent>
  </div>
</template>
  
<script>
  import EmailComponent from './EmailComponent.vue';
  import FooterComponent from './partials/FooterComponent.vue';

  export default {
    name: "ContactComponent",
    data() {
      return {
        photos: [
          'https://st.ilfattoquotidiano.it/wp-content/uploads/2023/04/24/fraser-island.jpg', 
          'https://www.tradingblog.it/wp-content/uploads/2021/01/Suerte-Amigo-Tradingblog.jpg',
          'https://wmfmoments.it/wp-content/uploads/2019/08/surf.png',
          'https://www.uilscuola.bz.it/wp-content/uploads/vacanza-660x330.jpg'
        ]
      };
    },
    components:{
      EmailComponent,
      FooterComponent
    }
  };
</script>
  
<style lang="scss" scoped>
@use '../scss/style/variables' as *;

.instagram {
  width: 50%;
}

.text-instagram {
  position: relative;
  bottom: -40px;
  z-index: -1;
}

.instagram h1 {
  font-size: 6vw;  
  color: $light;
}

.contacts {
  width: 100%;
}

.social, .email {
  flex: 1;
  margin: 0 10px;
  z-index: 1;
}

.photo-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr); 
}

.photo-item {
  position: relative;
  width: 100%;
  padding-bottom: 100%; 
}

.photo-item img {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  object-fit: cover; 
  transform: translate(-50%, -50%);
  display: block;
}

.footer-contact {
  width: 50%;
}

.follow{
  color:$blue-light
}

.footer-page{
  position: relative;
}
 
</style>

  