<template>
    <div class="footer bg-black">
        <div class="menu">
            <div  v-for="(item , index) in items" :key="index" >
                <i class="fa-solid fa-minus"></i>
                <a href="#" class="text-decoration-none text-white">{{ item }}</a>
            </div>
        </div>
    </div>

</template>

<script>
  export default{
    name:'FooterComponent',
    data(){
      return{
        items:[
          'About',
          'Technology',
          'Boards',
          'Team',
          'Accessories',
          'Dealers',
          'Blog',
          'Contact us'
        ]
      }
    }
  }
</script>

<style lang="scss" scoped>
@use '../../../scss/style/variables' as *;

.footer {
  display: flex;
  justify-content: flex-end;  
  align-items: center;  
  padding: 30px 0 60px 0;
  width: 100%;

  position:absolute;
  bottom: -70px;
}

.menu {
  display: grid;
  grid-template-columns: repeat(2, max-content);  
  gap: 10px 40px;  
  color: white; 
  width: 50%;

  padding-left: 50px;
}
 
.menu i {
  margin-right: 10px;  
  color:$yellow
}

 /* Tablet */
 @media (max-width: 1024px) {
  .footer {
    display: flex;
    flex-direction: column;
    padding: 30px 10px; 
    align-items: center; 
    position: static; 
  }

  .menu {
    display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 10px 20px; 
    width: 100%; 
    text-align: center; 
    
  }

  .menu i {
    margin-right: 5px; 
  }
 }
 @media (max-width: 768px) {
  .footer {
    display: flex;
    flex-direction: column;
    padding: 20px; 
    align-items: center; 
    position: static; 
  }

  .menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr); 
    gap: 10px;
    width: 100%;
    max-width: none; 
    padding-left: 0; 
    text-align: center; 
  }

  .menu i {
    margin-right: 5px; 
  }
}
</style>
