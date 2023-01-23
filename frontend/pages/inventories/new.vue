<template>
  <div>
    <JcLoader :load="load"></JcLoader>
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
                  <div class="form-group col-6">
                    <label for="">Código de barras</label>
                    <input v-model="model.barcode" type="text" name="" class="form-control" id="">
                  </div>
                  <div class="form-group col-6">
                    <label for="">Marcas</label>
                    <select name="" id="" class="form-control" v-model="model.brand_id"> 
                      <option v-for="brand in brands" :value="brand.id">{{brand.name}}</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="">Categoria</label>
                    <select name="" id="" class="form-control" v-model="model.category_id"> 
                      <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="">Unidad de Medida</label>
                    <select name="" id="" class="form-control" v-model="model.measure_id"> 
                      <option v-for="measure in measures" :value="measure.id">{{measure.name}} - {{measure.code}}</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="">Stock minimo</label>
                    <input v-model="model.minimun_stock" type="number" name="" class="form-control" id="">
                  </div>
                  <div class="form-group col-6">
                    <label for="">Precio compra</label>
                    <input v-model="model.buy_price" type="number" name="" class="form-control" id="">
                  </div>
                  <div class="form-group col-6">
                    <label for="">Precio venta</label>
                    <input v-model="model.sale_price" type="number" name="" class="form-control" id="">
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
        load: true,
        model: {
          name: '',
          barcode:'',
          minimun_stock:0,
          buy_price:0,
          sale_price:0,
          brand_id:'',
          measure_id:'',
          category_id:''
        },
        apiUrl:'articles',
        module: 'Artículos',
        page:'Configuración',
        brands:[],
        categories:[],
        measures:[]
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
          await Promise.all([this.GET_DATA('brands'), this.GET_DATA('measures'),this.GET_DATA('categories')]).then((response) => {
            this.brands = response[0]
            this.measures = response[1]
            this.categories = response[2]
            if(this.brands.length){
              this.model.brand_id = this.brands[0].id
            }
            if(this.measures.length){
              this.model.measure_id = this.measures[0].id
            }
            if(this.categories.length){
              this.model.category_id = this.categories[0].id
            }
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
