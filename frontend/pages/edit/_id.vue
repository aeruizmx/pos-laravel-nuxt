<template>
  <div>
    <JcLoader :load="load"></JcLoader>
  <AdminTemplate>
    <div slot="body">
      <div class="row justify-content-center"> 
        
        <div class="col-sm-8 col-12">
          <div class="card">
            <div class="card-header">
              <h3>Actualizar</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input v-model="model.name" type="text" name="" class="form-control" id="">
                  </div>
                </div>
                <div class="col-6">
                  <button class="btn btn-info w-100" @click="$router.back()">Regresar</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-dark w-100" @click="Save()">Actualizar</button>
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
    name: "UpdatePage",
    head() {
        return {
            title: "Actualizar"
        };
        ;
    },
    data(){
      return {
        load: true,
        model: {
          name: ''
        }
      }
    },  
    methods:{
      async GET_DATA(path){
        const result = await this.$api.$get(path)
        return result
      },
      async Save(){
        try {
          this.load = true
          const result = await this.$api.$put('brands/'+this.model.id, this.model)
          this.$swal.fire({
              title: 'Actualizado!',
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: 'Ok',
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.back()
              }
            })
        } catch (error) {
          console.log(error)
        } finally {
          this.load = false
        }
      }
    },
    mounted(){
      this.$nextTick( async () => {
        try {
          await Promise.all([this.GET_DATA('brands/'+this.$route.params.id)]).then((response) => {
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
