<template>
    <div class="container">
        <div class="header d-flex align-items-center justify-content-between p-3">
            <div class="logo">
                <h1>Surfers Co.</h1>
            </div>
            <div class="menu d-flex fw-semibold">
                <button class="menu-toggle d-flex d-lg-none" @click="toggleMenu">
                    <i class="fa-solid fa-bars"></i> 
                </button>
                <div v-for="(item, index) in items" :key="index" class="menu-item mx-2"  :class="{ 'menu-open': isMenuOpen }">
                    {{ item }}
                </div>
            </div>
            <div class="social d-flex text-white">
                <a v-for="(social, index) in socialLinks" :key="index" :href="social.url" target="_blank" class="social-item text-decoration-none ">
                    <i :class="social.iconClass" class="mx-2"></i>
                </a>
            </div>
        </div>
        <div class="text text-center">
            <h3>Ride every wave as if it's your last</h3>
            <p class="text-white">We love the motion of the ocean</p>
        </div>
    </div>
</template>

<script>
export default{
    name:'HeaderComponent',
    data(){
        return{
            isMenuOpen: false,
            items: [
                'Boards',
                'Accessories',
                'Blog',
                'Technology',
                'Team',
                'Dealers'
            ],
            socialLinks: [
                {
                    iconClass: 'fa-brands fa-facebook',
                    url: 'https://www.facebook.com'
                },
                {
                    iconClass: 'fa-brands fa-instagram',
                    url: 'https://www.instagram.com'
                },
                {
                    iconClass: 'fa-regular fa-envelope',
                    url: 'mailto:info@surfersco.com'
                }
            ]
        }
    },
    methods: {
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
        }
    }
}
</script>

<style lang="scss" scoped>
@use '../../scss/style/variables' as *;
 
.menu-item {
    text-transform: uppercase;
    cursor: pointer; 
    padding: 5px 10px;
}
.menu-item:hover {
    background-color: $blue-light;
    color:white;
}

.social-item {
    background-color: $dark;
    border-radius: 50px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center; 
    justify-content: center;
    margin: 3px;
    cursor: pointer;
}
 
a{
    color:white
}

.text {
    margin: 80px 0 80px 0;
}

@media (max-width: 768px) {
    .menu-toggle{
        display: contents;
    }
}

@media (max-width: 480px) {
    /* Stili per smartphone */
}

 
</style>
