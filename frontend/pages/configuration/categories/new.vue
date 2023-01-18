<template>
  <div>
    
  <AdminTemplate :module="module" :page="page">
    <div slot="body">
      <div class="row justify-content-center"> 
        
        <div class="col-sm-8 col-12">
          <div class="card">
            <div class="card-header">
              <h3>Agregar</h3>
            </div>
            <div class="card-body">
              <CrudCreate :model="model" :apiUrl="apiUrl">
                <div slot="body" class="row">
                  <div class="form-group col-12">
                    <label for="">Nombre</label>
                    <input v-model="model.name" type="text" name="" class="form-control" id="">
                  </div>
                </div>
              </CrudCreate>
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
        model: {
          name: ''
        },
        apiUrl:'categories',
        module: 'Categorias',
        page:'Configuración',
      }
    },  
    methods:{
      
    },
    mounted(){
      this.$nextTick( async () => {
        try {
          
        } catch (error) {
          console.log(error)
        } finally{
          this.load = false
        }
      })
    }
};
</script>
