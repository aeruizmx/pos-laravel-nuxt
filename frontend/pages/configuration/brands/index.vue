<template>
  <div>
    <JcLoader :load="load"></JcLoader>
  <AdminTemplate :page="page" :module="module">
    <div slot="body">
      <div class="row justify-content-end"> 
        <div class="col-2 text-right">
          <nuxt-link :to="url_new" class="btn btn-dark btn-sm w-100">
            <i class="fas fa-plus"></i> Agregar
          </nuxt-link>
        </div>
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
                        <nuxt-link :to="url_edit+element.id" type="button" class="btn btn-info btn-sm py-1 px-2">
                          <i class="fas fa-pen"></i>
                        </nuxt-link>
                        <button type="button" @click="deleteElement(element.id)" class="btn btn-danger btn-sm py-1 px-2">
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
    head() {
      return {
        title: this.module
      };
    },
    data(){
      return {
        list: [],
        load: true,
        apiUrl:'brands',
        module: 'Marcas',
        page:'Configuración',
        url_new:'/configuration/brands/new',
        url_edit:'/configuration/brands/edit/'
      }
    },  
    methods:{
      async GET_DATA(path){
        const result = await this.$api.$get(path)
        return result
      },
      async deleteItem(id){
        this.load = true
        try {
          const result = await this.$api.$delete(this.apiUrl+'/'+id)
          await Promise.all([this.GET_DATA(this.apiUrl)]).then((response) => {
            this.list = response[0]
          })
        } catch (error) {
          console.log(error)
        } finally {
          this.load = false
        }
        
        return result
      },
      deleteElement(id){
        let self = this
        this.$swal.fire({
          title: '¿Deseas eliminar el elemento?',
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'Eliminar',
          cancelButtonText: 'Cancelar',
        }).then(async (result) => {
          if (result.isConfirmed) {
            await self.deleteItem(id)
          }
        })
      }
    },
    mounted(){
      this.$nextTick( async () => {
        try {
          await Promise.all([this.GET_DATA(this.apiUrl)]).then((response) => {
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
