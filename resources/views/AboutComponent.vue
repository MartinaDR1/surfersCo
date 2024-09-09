<template>
  <div class="about-us">
    <div class="text-about">
      <h1 class="text-uppercase">about us</h1>
    </div>
  </div>
  <div class="about">
    <div class="box d-flex">
      <div class="left">
        <h5 class="text-uppercase text-center">We are surfers co. <br>x</h5>
        <p class="fst-italic py-5" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Fusce iaculis feugiat arcunum fermentum hendrerit. Suspendisse auctor labor nisi, et interdum iam facilisis, aliquam pulvinar semi egetis belle sollicitudin ut. Nullam tincidun finibustus scelerisque.</p>
        <a href="#"class="fw-semibold pt-4">Read me</a>
      </div>
      <div class="right">
        <div class="video-container">
          <iframe 
          src="https://www.youtube.com/embed/L2bcP9Vf9sM" 
          frameborder="0" 
          allowfullscreen 
          title="YouTube video player"
          ></iframe>
        </div>
      </div>
    
    </div>
  </div>
  </template>
  
  <script>
  export default {
    name: 'AboutComponent',
  };
  </script>
  
<style lang="scss" scoped>
@use '../scss/style/variables' as *;

.about {
  background-image: url(/surfista.jpeg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;  
   
  height: 500px; 
  margin-bottom: 300px;
}

.about-us {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;  
  align-items: center;  
 
  position:relative;
}

.text-about{
  position: relative;
  bottom: -50px;
  z-index: -1;
}
.about-us h1 {
  font-size: 12vw;  
  color:$light;
  margin: 0;
  text-align: center;
}

a{
  color:$blue-light
}

.box {
  display: flex;
  justify-content: space-between;
  height: 500px;
  position: relative;
}

.left, .right {
  flex: 1;
  box-sizing: border-box;
  padding: 20px;
}

.left {
  background-color: white;
  width: 45%;
  height: 500px;
  position: absolute;
  top: 250px;
  padding: 120px;
}

.right {
  position: absolute;
  right: 90px;
  top: 400px;
}
.video-container{
  width: 500px;
  height: 250px;
}
.video-container iframe {
  width: 100%;
  height: 100%;

}

</style>
  