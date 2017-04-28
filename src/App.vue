<template>
  <div id="app" style="height:80%">
    <div v-bind:style="(globalVariables.showModal) ? 'overflow-y:hidden; height:'+deviceHeight+'px!important': ''" style="min-height:100%">
      <div v-if="!tokenData.verifyingToken" style="">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom affix-top" v-bind:class="user.type === 3? 'navbar-fixed-top half-width push-half-right' : ''">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <router-link ref="logo" class="navbar-brand" to="/">GoDigit</router-link>
            </div>
            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li v-if="user.type === 1"><router-link to="/product_management"> Products</router-link></li>
                <li v-if="user.type === 1"><router-link to="/product_order_management"> Orders</router-link></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li ><router-link to="/about">About</router-link></li>
                <li v-if="user.userID" class="dropdown">
                  <a href="#"
                      class="dropdown-toggle"
                      data-toggle="dropdown"
                      role="button" aria-haspopup="true"
                      aria-expanded="false">
                    Hi <span class="text-uppercase">{{user.username}}</span>! <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li role="separator" class="divider"></li>
                    <li><a  @click="logOut" ><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="content" style="min-height:100%">
          <transition >
            <router-view ></router-view>
          </transition>
        </div>
      </div>
      <div v-else>
        Loading please wait. {{tokenData.verifyingToken}}
      </div>
    </div>
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright © GoDigit 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
.footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
</style>
