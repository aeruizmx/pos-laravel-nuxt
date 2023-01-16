<template>
  <div>
    <JcLoader :load="load"></JcLoader>
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
                  <tr v-for="(element,index) in list">
                    <td class="py-0 px-1">{{index+1}}</td>
                    <td class="py-0 px-1">{{element.name}}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm py-1 px-2">
                          <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm py-1 px-2">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminTemplate>
  </div>
</template>

<script>
import AdminTemplate from '~/components/AdminTemplate.vue';

export default {
    name: "DemoPage",
    head() {
        return {
            title: "Demo"
        };
        ;
    },
    data(){
      return {
        list: [],
        load: true
      }
    },  
    methods:{
      async GET_DATA(path){
        const result = await this.$api.$get(path)
        return result
      }
    },
    mounted(){
      this.$nextTick( async () => {
        try {
          await Promise.all([this.GET_DATA('brands')]).then((response) => {
            this.list = response[0]
          })
        } catch (error) {
          console.log(error)
        } finally{
          this.load = false
        }
      })
    }
};
</script>
