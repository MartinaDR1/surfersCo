<template>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1>Surfers Co.</h1>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center w-100">
                    <li v-for="(item, index) in items" :key="index" class="menu-item ">
                        <a class="nav-link fw-semibold" href="#">{{ item }}</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <a v-for="(social, index) in socialLinks" :key="index" :href="social.url" target="_blank" class="social-item text-decoration-none text-white">
                        <i :class="social.iconClass" class="mx-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="text text-center">
        <h3>Ride every wave as if it's your last</h3>
        <p class="text-white">We love the motion of the ocean</p>
    </div>
</template>


<script>
export default {
    name: 'HeaderComponent',
    data() {
        return {
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
    }
}
</script>

<style lang="scss" scoped>
@use '../../../scss/style/variables' as *;

.menu-item {
    text-transform: uppercase;
    padding: 5px 10px;
    a:hover {
        background-color: $blue-light;
        color:white;
    }
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
 
/*Fonts*/

.logo {
    font-family: 'Roboto Condensed', sans-serif;
    h1{
        font-weight: 600; 
    }
}

.text {
    margin: 80px 0;
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: large;
    h3{
        font-size: 50px;
        font-weight: 200;
    }
}

</style>

