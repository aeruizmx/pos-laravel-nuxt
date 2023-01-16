<template>
  <AdminTemplate>
    <div slot="body">
      <p>ip {{ ip }}</p>
    </div>
  </AdminTemplate>
</template>

<script>
import AdminTemplate from '~/components/AdminTemplate.vue';

export default {
    name: "DemoPage",
    head() {
        return {
            title: "Demo",
        };
        ;
    },
    data(){
      return {
        ip: {}
      }
    },  
    methods:{
      async fetchSomething(){
        const ip = await this.$axios.$get('http://localhost/api/brands')
        this.ip = ip
      }
    },
    mounted(){
      this.$nextTick( async () =>{
        await this.fetchSomething()
      })
    }
};
</script>
