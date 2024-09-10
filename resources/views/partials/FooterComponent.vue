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
@use '../../scss/style/variables' as *;

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
 /* Tablet Landscape and Below */
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
    margin-right: 5px; /* Riduci il margine per adattare meglio agli schermi più piccoli */
  }
 }
 @media (max-width: 768px) {
  .footer {
    display: flex;
    flex-direction: column;
    padding: 20px; /* Riduci il padding per smartphone */
    align-items: center; /* Centra il contenuto */
    position: static; /* Cambia la posizione da absolute a static */
  }

  .menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Due colonne per smartphone */
    gap: 10px; /* Spazio tra le righe */
    width: 100%; /* Assicurati che la larghezza sia al 100% */
    max-width: none; /* Rimuovi la larghezza massima per il smartphone */
    padding-left: 0; /* Rimuovi il padding a sinistra */
    text-align: center; /* Centra il testo */
  }

  .menu i {
    margin-right: 5px; /* Riduci il margine per adattare meglio agli schermi più piccoli */
  }
}
</style>
