<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-end">
          <div class="col-12 col-sm-7">
            <div class="row">
              <div class="col-12">
                <div class="card bg-gradient-dark">
                  <div class="card-header bg-transparent py-2 px-3">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-12">
                        <div class="input-group input-group-lg">
                          <span class="input-group-text text-white bg-transparent border-0">
                            <i class="ni ni-archive-2 text-lg" aria-hidden="true" ></i>
                          </span>
                          <input type="text" class="form-control bg-transparent border-0 text-white" placeholder="Buscar..." v-model="article_to_search"/>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12 my-auto ms-auto">
                        <div class="input-group input-group-lg">
                          <span class="input-group-text text-white bg-transparent border-0">
                            <i class="ni ni-box-2 text-lg" aria-hidden="true" ></i>
                          </span>
                          <select
                            name=""
                            id=""
                            class="form-control bg-transparent border-0 text-white"
                            v-model="brand_to_search"
                          >
                            <option value="all" class="text-dark">
                              Todas las marcas
                            </option>
                            <option class="text-dark" v-for="brand in brands" :value="brand.id" >{{brand.name}}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 py-2" style="min-height: 60vh;max-height: 60vh;overflow-y: scroll;overflow-x: none;">
                <div class="row">
                  
                  <div class="col-3" v-for="article in articlesCategory">
                    <PosArticle :article="article" />
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body d-flex p-3">
                    <h6 class="my-auto">Categor??a</h6>
                    <div class="nav-wrapper position-relative ms-auto w-50">
                      <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item active" role="presentation">
                          <a
                            class="nav-link mb-0 px-0 py-1"
                            data-bs-toggle="tab"
                            href="#cam1"
                            role="tab"
                            aria-controls="cam1"
                            aria-selected="true"
                          >
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="dropdown pt-2">
                      <a
                        href="javascript:;"
                        class="text-secondary ps-4"
                        id="dropdownCam"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3"
                        aria-labelledby="dropdownCam"
                        style=""
                      >
                        <li>
                          <a
                            class="dropdown-item border-radius-md"
                            href="javascript:;"
                            @click="category_to_search='all'"
                            >Todo</a
                          >
                        </li>
                        <li v-for="category in categories">
                          <a
                            class="dropdown-item border-radius-md"
                            href="javascript:;"
                            @click="category_to_search=category.id"
                            >{{category.name}}</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="card card-pricing">
              <div
                class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative"
              >
                <div class="z-index-1 position-relative">
                  <h1 class="text-white mt-2 mb-0"><small></small>0.00</h1>
                  <h6 class="text-white">Total</h6>
                </div>
              </div>
              <div class="position-relative mt-n5" style="height: 50px">
                <div class="position-absolute w-100">
                  <svg
                    class="waves waves-sm"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 40"
                    preserveAspectRatio="none"
                    shape-rendering="auto"
                  >
                    <defs>
                      <path
                        id="card-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
                      ></path>
                    </defs>
                    <g class="moving-waves">
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="-1"
                        fill="rgba(255,255,255,0.30"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="3"
                        fill="rgba(255,255,255,0.35)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="5"
                        fill="rgba(255,255,255,0.25)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="8"
                        fill="rgba(255,255,255,0.20)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="13"
                        fill="rgba(255,255,255,0.15)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="16"
                        fill="rgba(255,255,255,0.99)"
                      ></use>
                    </g>
                  </svg>
                </div>
              </div>
              <div class="card-body text-center p-3">
                <div class="d-flex align-items-center px-2">
                  <h6>CARRITO</h6>
                  <button
                    type="button"
                    class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"

                  >
                    <i class="fas fa-trash" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="table-responsive p-0" style="min-height: 30vh">
                  <table
                    class="table align-items-center justify-content-center mb-0"
                  >
                    <thead>
                      <tr>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Art??culo
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Cantidad
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Total
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr  >
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                           0
                          </p>
                        </td>
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                            0
                          </p>
                        </td>
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                           0
                          </p>
                        </td>
                        <td>
                          <div class="input-group input-group-sm">
                            <button
                              class="btn btn-outline-primary mb-0 btn-sm"
                              type="button"

                            >
                              <i class="fas fa-pen"></i>
                            </button>
                            <button
                              class="btn btn-outline-danger mb-0 btn-sm"
                              type="button"

                            >
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a
                  href="javascript:void(0);"
                  class="btn bg-gradient-dark w-100 mt-4 mb-0"

                >
                  <i class="fas fa-save mx-2"></i> GUARDAR
                </a>
              </div>
            </div>
          </div>
          <div
            class="modal fade"
            :class="modalEdit ? 'showModal' : ''"
            id="AjusteModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Editar art??culo
                  </h5>
                  <button
                    type="button"
                    class="btn-close text-dark"
                    @click="modalEdit = false"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group has-success">
                        <label for="">Articulo</label>
                        <input
                          type="text"
                          placeholder=""
                          disabled
                          class="form-control"

                        />
                      </div>
                    </div>



                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    @click="modalEdit = false"
                    class="btn bg-gradient-secondary w-100"
                    data-bs-dismiss="modal"
                  >
                    Cerrar
                  </button>
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



export default {
  head() {
    return {
      title: this.modulo,
    };
  },

  data() {
    return {
      modulo: "Nueva compra",
      page: "Compras",
      load: true,
      modalEdit: false,
      articles:[],
      brands:[],
      categories:[],
      article_to_search:'',
      brand_to_search:'all',
      category_to_search:'all'
    };
  },
  computed:{
    articlesFiltered(){
      let search = this.article_to_search.toLowerCase()
      if(search != ''){
        return this.articles.filter( element => {
          let name = element.name != null?element.name:''
          return name.toLowerCase().indexOf(search) != -1
        })
      }
      return this.articles
    },
    articlesBrand(){
      let search = this.brand_to_search
      if(search != 'all'){
        return this.articlesFiltered.filter( element => {
          return element.brand_id == search
        })
      }
      return this.articlesFiltered
    },
    articlesCategory(){
      let search = this.category_to_search
      if(search != 'all'){
        return this.articlesBrand.filter( element => {
          return element.category_id == search
        })
      }
      return this.articlesBrand
    }
  },
  methods: {
    async GET_DATA(path){
      const result = await this.$api.$get(path)
      return result
    },
    async data(path){
      this.load = true
      try {
          await Promise.all([this.GET_DATA('brands'),this.GET_DATA('categories'),this.GET_DATA('articles')]).then((response) => {
            this.brands = response[0]
            this.categories = response[1]
            this.articles = response[2]
          })
        } catch (error) {
          console.log(error)
        } finally{
          this.load = false
        }
    },
  },
  mounted() {

    this.$nextTick(async () => {
      this.data()
    });
  },
};
</script>
<style>
  .showModal{
    visibility: visible;
    display:block;
    opacity: 1 !important;
  }
</style>
