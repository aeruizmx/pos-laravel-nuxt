<template>
  <div>
    <JcLoader :load="load"></JcLoader>
  <AdminTemplate :page="page" :module="module">
    <div slot="body">
      <div class="row justify-content-end"> 
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th class="py-0 px-1">#</th>
                    <th class="py-0 px-1">Nombre</th>
                    <th class="py-0 px-1">Código de barras</th>
                    <th class="py-0 px-1">Marca</th>
                    <th class="py-0 px-1">Categoria</th>
                    <th class="py-0 px-1">Stock</th>
                    <th class="py-0 px-1">Inversión</th>
                    <th class="py-0 px-1">Valorizado</th>
                    <th class="py-0 px-1">Ganancia</th>
                    <th class="py-0 px-1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(element,index) in list">
                    <td class="py-0 px-1">{{index+1}}</td>
                    <td class="py-0 px-1">{{element.name}}</td>
                    <td class="py-0 px-1">{{element.barcode}}</td>
                    <td class="py-0 px-1">{{element.brand.name}}</td>
                    <td class="py-0 px-1">{{element.category.name}}</td>
                    <td class="py-0 px-1">
                      <span :class="['badge','text-xxs',(element.stock < element.minimun_stock)?'badge-danger':'badge-success']">{{element.stock}} {{element.measure.code}}</span>
                    </td>
                    <td class="py-0 px-1">{{Number(element.investment).toFixed(2)}}</td>
                    <td class="py-0 px-1">{{Number(element.valued).toFixed(2)}}</td>
                    <td class="py-0 px-1">{{Number(element.revenue).toFixed(2)}}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <nuxt-link :to="url_edit+element.id" type="button" class="btn btn-info btn-sm py-1 px-2">
                          <i class="fas fa-eye"></i>
                        </nuxt-link>
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
        apiUrl:'inventories',
        module: 'General',
        page:'inventories',
        url_edit:'/inventories/kardex/'
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
