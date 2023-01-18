<template>
  <div>
    <JcLoader :load="load"></JcLoader>
  <AdminTemplate :page="page" :module="module">
    <div slot="body">
      <div class="row justify-content-center"> 
        <div class="col-sm-8 col-12">
          <div class="card">
            <div class="card-header">
              <h3>Actualizar</h3>
            </div>
            <div class="card-body">
              <CrudUpdate :model="model" :apiUrl="apiUrl">
                <div slot="body" class="row">
                  <div class="form-group col-12">
                    <label for="">Nombre</label>
                    <input v-model="model.name" type="text" name="" class="form-control" id="">
                  </div>
                </div>
              </CrudUpdate>
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
    head() {
      return {
        title: this.module
      };
    },
    data(){
      return {
        load: true,
        model: {
          name: ''
        },
        apiUrl:'categories',
        module: 'Categorias',
        page:'Configuración',
      }
    },  
    methods:{
      async GET_DATA(path){
        const result = await this.$api.$get(path)
        return result
      },
    },
    mounted(){
      this.$nextTick( async () => {
        try {
          await Promise.all([this.GET_DATA(this.apiUrl+'/'+this.$route.params.id)]).then((response) => {
            this.model = response[0]
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
