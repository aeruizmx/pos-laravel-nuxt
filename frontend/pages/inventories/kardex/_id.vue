<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-lg-flex">
                  <div>
                    <h5 class="mb-0">Kardex de artículo</h5>
                  </div>
                  <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <div class="ms-auto my-auto">
                      <button
                        @click="$router.back()"
                        class="btn bg-gradient-info btn-sm mb-0"
                      >
                        <i class="ni ni-bold-left"></i> Regresar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="!load" class="card-body">
                <div class="row">
                  <div class="col-12 col-lg-5 mx-auto">
                    <h3 class="mt-lg-0 mt-4">{{model.name}}</h3>
                    <div class="rating">
                      <i class="fas fa-barcode" aria-hidden="true"></i>
                      {{model.barcode}} |
                      <i class="fas fa-boxes" aria-hidden="true"></i>
                      {{ model.category.name }} |
                      <i class="fas fa-bookmark" aria-hidden="true"></i>
                      {{ model.brand.name }}
                    </div>
                    <br />
                    <div class="d-flex justify-content-between">
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Precio Compra</h6>
                        <h5>{{ model.buy_price }}</h5>
                      </div>
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Precio Venta</h6>
                        <h5>{{ model.sale_price }}</h5>
                      </div>
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Ganancia Unitaria</h6>
                        <h5>{{Number(model.sale_price - model.buy_price).toFixed(2)}}</h5>
                      </div>
                    </div>
                    <span :class="['badge',(model.stock<model.minimun_stock)?'badge-danger':'badge-success']"
                      ><i class="fas fa-archive" aria-hidden="true"></i> {{ model.stock }} en
                      Stock</span
                    >
                    <br />
                    <div class="d-flex justify-content-between">
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Inversion</h6>
                        <h5>{{Number(model.investment).toFixed(2)}}</h5>
                      </div>
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Valorizado</h6>
                        <h5>{{Number(model.valued).toFixed(2)}}</h5>
                      </div>
                      <div class="mx-1">
                        <h6 class="mb-0 mt-3">Ganancia</h6>
                        <h5>{{Number(model.revenue).toFixed(2)}}</h5>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-12">
                        <button
                          class="btn bg-gradient-primary mb-0 mt-lg-auto w-100"
                          type="button"
                          name="button"
                          data-bs-toggle="modal"
                          data-bs-target="#AjusteModal"
                        >
                          <i class="fas fa-cog"></i>
                          Ajustar Stock
                        </button>
                        <div
                          class="modal fade"
                          id="AjusteModal"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="exampleModalLabel"
                          aria-hidden="true"
                        >
                          <div
                            class="modal-dialog modal-dialog-centered"
                            role="document"
                          >
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                  Nuevo Ajuste
                                </h5>
                                <button
                                  type="button"
                                  class="btn-close text-dark"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-group has-success">
                                      <label for="">Cantidad</label>
                                      <input
                                        type="text"
                                        placeholder=""
                                        class="form-control"
                                        v-model="inventory.amount"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group has-success">
                                      <label for="">Tipo de ajuste</label>
                                      <select
                                        name=""
                                        id=""
                                        class="form-control"
                                        v-model="inventory.type"
                                      >
                                        <option value="1">ENTRADA</option>
                                        <option value="2">SALIDA</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group has-success">
                                      <label for="">Precio Compra</label>
                                      <input
                                        type="text"
                                        placeholder=""
                                        class="form-control"
                                        v-model="model.buy_price"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group has-success">
                                      <label for="">Precio Venta</label>
                                      <input
                                        type="text"
                                        placeholder=""
                                        class="form-control"
                                        v-model="model.sale_price"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group has-success">
                                      <label for="">Motivo</label>
                                      <input
                                        type="text"
                                        placeholder=""
                                        class="form-control"
                                        v-model="inventory.motive"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn bg-gradient-secondary"
                                  data-bs-dismiss="modal"
                                >
                                  Cancelar
                                </button>
                                <button
                                  type="button"
                                  class="btn bg-gradient-primary"
                                  data-bs-dismiss="modal"
                                  @click="Save()"
                                >
                                  Continuar
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-7">
                    <h5 class="ms-1">Movimientos de stock</h5>
                    <div class="table table-responsive">
                      <table class="table align-items-center mb-0 table-sm">
                        <thead>
                          <tr>
                            <th
                              class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7 px-1"
                            >
                              Detalle
                            </th>
                            <th
                              class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            >
                              Cantidad
                            </th>
                            <th
                              class="text-uppercase text-secondary text-left text-xxs font-weight-bolder opacity-7 ps-2"
                            >
                              Compra
                            </th>
                            <th
                              class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            >
                              Venta
                            </th>
                            <th
                              class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                            ></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="m in model.inventories">
                            <td>
                              <div class="d-flex px-1 py-1">
                                <div class="text-xxs">{{m.motive}}</div>
                                <div
                                  class="d-flex flex-column justify-content-center"
                                >
                                  <!-- <h6 class="mb-0 text-xxs">, {{m.amount}}</h6> -->
                                </div>
                              </div>
                            </td>
                            <td>
                              <h6><span :class="['badge','text-xxs',(m.type==2)?'badge-danger':'badge-success']">{{m.amount}} {{model.measure.code}}</span></h6>
                            </td>
                            <td class="text-xxs">{{Number(m.buy).toFixed(2)}}</td>
                            <td class="align-middle text-sm text-xxs">{{Number(m.sale).toFixed(2)}}</td>
                            <td class="align-middle text-center text-xxs">
                              <a
                                href="javascript:void(0);"
                                @click="DeleteItem(0)"
                                data-bs-toggle="tooltip"
                                data-bs-original-title="Delete product"
                              >
                                <i
                                  class="fas fa-trash text-secondary"
                                  aria-hidden="true"
                                ></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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
export default {
  head() {
    return {
      title: this.modulo,
    };
  },

  data() {
    return {
      load: true,
      list: [],
      apiUrl: "inventories",
      page: "Inventario",
      modulo: "General",
      url_editar: "/inventories/kardex/",
      model: {
          name: '',
          barcode:'',
          minimun_stock:0,
          buy_price:0,
          sale_price:0,
          brand_id:'',
          measure_id:'',
          category_id:'',
          brand:{
            name:''
          },
          measure:{
            code:0,
            name:''
          },
          category:{
            name:''
          },
          inventories:[]
        },
        inventory:{
          amount:1,
          type:1,
          motive:''
        }
    };
  },
  methods: {
    async GET_DATA(path) {
      const res = await this.$api.$get(path);
      return res;
    },
    async Save(){
        try {
          this.load = true
          this.inventory.article_id = this.model.id
          this.inventory.buy_price = this.model.buy_price
          this.inventory.sale_price = this.model.sale_price
          const response = await this.$api.$post('inventories', this.inventory)
          this.$swal.fire({
              title: 'Guardado!',
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: 'Ok',
            }).then((result) => {
              if (result.isConfirmed) {
                this.loadKardex()
              }
            })
        } catch (error) {
          console.log(error)
        } finally {
          this.load = false
        }
      },
      loadKardex(){
        this.load = true
        this.$nextTick(async () => {
        try {
          await Promise.all([this.GET_DATA('/inventories/kardex/'+this.$route.params.id)]).then((v) => {
            this.model = v[0];
          });
        } catch (e) {
          console.log(e);
        } finally {
          this.load = false;
        }
      });
      }
  },
  mounted() {
    this.loadKardex()
  },
};
</script>
