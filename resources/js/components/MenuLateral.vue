<template>
    <el-menu :default-active="activeIndex" class="el-menu-vertical-demo position-fixed h-100" style="z-index:15;top:0;" :collapse="isCollapse" @open="handleOpen" @close="handleClose">
        <el-menu-item index="1">
            <i v-show="isCollapse==true" class="el-icon-menu" @click="isCollapse=false" />
            <i v-show="isCollapse==false" class="el-icon-s-grid" @click="isCollapse=true" />
        </el-menu-item>
        <el-menu-item index="2" @click="$router.push({name:'tablaUsuarios'})" :disabled="user.rol==2">
             <fa v-show="isCollapse==true" icon="user" fixed-width />
            <span slot="title">Usuarios</span>
        </el-menu-item>
        <el-menu-item index="3" @click="$router.push({name:'tablaClientes'})">
            <fa v-show="isCollapse==true" icon="address-card" fixed-width />
                <span slot="title">Clientes</span>
        </el-menu-item>
        <el-menu-item index="4" @click="$router.push({name:'tablaProductos'})">
             <fa v-show="isCollapse==true" icon="shopping-cart" fixed-width />
                <span slot="title">productos</span>
        </el-menu-item>

    </el-menu>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    middleware: 'auth',

    data(){
        return {
            isCollapse: true,
            activeIndex: '2'
        }
    },
    computed: {
        ...mapGetters({
            user: 'auth/user'
        }),
    },
    mounted(){
        if( this.$route.name ==='tablaProductos'){
            this.activeIndex= '4'        
        }else if(this.$route.name ==='tablaClientes'){
            this.activeIndex= '3'        
        }
    },
    methods: {
        handleOpen(key, keyPath){
            // console.log(key, keyPath)
        },
        handleClose(key, keyPath){
            // console.log(key, keyPath)
        },

    }
}
</script>
<style>

.el-menu-item {
    color: white;
    fa {
        color: white;
    }
    span {
        color: white;
    }
    &:hover {
        i {
            color: #30498e !important;
        }
        span {
            color: #30498e !important;
        }
    }
}
</style>
