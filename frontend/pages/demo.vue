<template>
  <AdminTemplate>
    <div slot="body">
      <div class="row"> 
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>#</th>
                  <th>Nombre</th>
                  <th></th>
                </thead>
                <tbody>
                  <tr v-for="(m,i) in ip">
                    <td class="py-0 px-1">{{i+1}}</td>
                    <td class="py-0 px-1">{{m.name}}</td>
                    <td class="py-0 px-1"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
        ip: []
      }
    },  
    methods:{
      async fetchSomething(){
        const ip = await this.$api.$get('measures')
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
