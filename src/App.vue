<template>
  <div id="app">
    <div v-bind:style="(globalVariables.showModal) ? 'overflow-y:hidden; height:'+deviceHeight+'px!important': ''">
      <div v-if="!tokenData.verifyingToken" style="">
       <godigit-header></godigit-header>
       <godigit-sidebar></godigit-sidebar>
       <godigit-content></godigit-content> 
      </div>
      <div v-else>
        Loading please wait. {{tokenData.verifyingToken}}
      </div>
    </div>
    <godigit-footer></godigit-footer>
  </div>
</template>

<script>
import ROUTER from './router'
import AUTH from './services/auth'
import global from './helpers/global'
export default {
  name: 'app',
  mounted(){
  },
  data(){
    return {
      user: AUTH.user,
      tokenData: AUTH.tokenData,
      currentRoute: ROUTER.currentRoute.name,
      deviceHeight: document.documentElement.clientHeight,
      appGlobal: {
        showModal: false
      },
      globalVariables: global
    }
  },
  methods: {
    logOut(){
      AUTH.deaunthenticate()
      ROUTER.push({
        path: '/'
      })
    }
  },
  components: {
    'godigit-header': () => import('modules/Header.vue'),
    'godigit-sidebar': () => import('modules/Sidebar.vue'),
    'godigit-content': () => import('modules/Content.vue'),
    'godigit-footer': () => import('modules/Footer.vue')
  }
}
</script>

<style>
.half-width{
  width: 50%
}
.push-half-right{
  margin-left: 50%
}
.nav a{
  font-size: 15px
}
.dropdown-menu li a{
  padding: 10px;
}
.container {
   min-height:100%;
   position:relative;
}
</style>
