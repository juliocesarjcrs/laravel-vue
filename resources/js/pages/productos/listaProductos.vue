<template>
    <section>
        <div class="container">
            <div class="row mx-1 my-3">
                <span class="text-dark f-600 f-14">Lista de productos</span>
                <div class="col my-auto">
                    <hr />
                </div>
                    <el-tooltip class="item" effect="dark" content="Exporta la página actual" placement="top-start">
                        <a type="button" :href="`/api/productos/exportar-productos?page=${pagination.current_page}`" download="file.xlsx" >
                            <button v-loading="loading" type="button" class="btn btn-primary" >
                                Exportar a Excel
                            </button>
                        </a>
                    </el-tooltip>
            </div>
        </div>
        <div class="container">
            <div class="row mx-2 my-3">
                <div v-loading="loadingTable" class="col-12">
                    <el-table :data="tableRegistros" height="350" style="width: 100%">
                        <el-table-column align="center" prop="id" label="Código" width="75" />
                        <el-table-column align="left" prop="producto" label="Producto" />
                        <el-table-column align="left" prop="titular" label="Titular" />
                        <el-table-column align="left" prop="fechavencimiento" label="Fecha Vencimiento" />
                        <el-table-column prop="fechaexpedicion" label="Fecha expedición" />
                    </el-table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                      <el-pagination
                        @current-change="listRegistros"
                        :current-page="pagination.current_page"
                        :page-size="pagination.per_page"
                        layout="prev, pager, next"
                        :total="pagination.total">
                    </el-pagination>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    middleware: 'auth',
    data(){
        return {
            ruta: '/api/productos',
            tableRegistros: [],
            pagination: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
            },
            loading: false,
            loadingTable: false
        }
    },
    mounted(){ 
        this.listRegistros()
    },
    methods: {
        async listRegistros(page){
            try {
                this.loadingTable = true
                const { data } = await axios(`${this.ruta}/listar-productos`, {params:{page:page}})
                this.loadingTable = false
                this.$validar(data)

                this.tableRegistros = data.productos.data 
                this.pagination.total = data.productos.total
                this.pagination.current_page = data.productos.current_page
                this.pagination.per_page = data.productos.per_page
                this.pagination.last_page = data.productos.last_page
                this.pagination.from = data.productos.from
                this.pagination.to = data.productos.to
                

            } catch (e){
                this.error_catch(e)
            }
        }

    }
}
</script>

<style lang="css" scoped>
</style>
