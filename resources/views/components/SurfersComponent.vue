 <template>
    <div >
      <SlideComponent></SlideComponent>
      <AboutComponent></AboutComponent>
      <ContactComponent></ContactComponent>
    </div>
</template>
  
<script>
  import SlideComponent from './SlideComponent.vue';
  import AboutComponent from './AboutComponent.vue';
  import ContactComponent from './ContactComponent.vue';

  export default {
    name: 'Home',
    components: {
      SlideComponent,
      AboutComponent,
      ContactComponent,
    }
  };
</script>
  
<style>
</style>
  