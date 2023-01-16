<template>
  <div>
    <JcLoader :load="load"></JcLoader>
  <AdminTemplate>
    <div slot="body">
      <div class="row justify-content-center"> 
        
        <div class="col-sm-8 col-12">
          <div class="card">
            <div class="card-header">
              <h3>Agregar</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input v-model="model.name" type="text" name="" class="form-control" id="">
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-dark w-100" @click="Save()">Guardar</button>
                </div>
              </div>
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
    name: "NewPage",
    head() {
        return {
            title: "Nuevo"
        };
        ;
    },
    data(){
      return {
        load: false,
        model: {
          name: ''
        }
      }
    },  
    methods:{
      async Save(){
        const result = await this.$api.$post('brands', this.model)
        console.log(result)
      }
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
