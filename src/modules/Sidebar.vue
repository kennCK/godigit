<template>
   <div class="main-sidebar" >
    <div class="sidebar">
      <ul class="sidebar-menu">
          <li class="header">MAIN TASKS</li>
          <li v-for="(item,index) in menu" v-if="item.parent_id == 0" v-bind:class="{ appActive: isActive(item.id) }" v-on:click="setActive(item.id)">
              <a v-on:click="navigateTo(item.method)" data-toggle="collapse" :data-target="'#'+item.id">
                <i v-bind:class="item.left_icon"></i>
                <span class="sm-title">{{item.title}}</span>
                <span class="pull-right-container">  
                  <i v-bind:class="item.right_icon + ' pull-right'"></i>
                </span>
              </a>
              <ul class="collapse" v-if="item.id == menu[index+1].parent_id" :id="item.id">
                <li v-for="subItem in menu" v-if="subItem.parent_id != 0 && item.id == subItem.parent_id"  v-bind:class="{ appSubActive: isSubActive(subItem.id) }" v-on:click="setSubActive(subItem.id)">
                  <a v-on:click="navigateTo(item.method + '/' + subItem.method)">
                    <i v-bind:class="subItem.left_icon  + ' fa-xs'"></i>
                    <span class="sm-title">{{subItem.title}}</span>
                    <span class="pull-right-container">
                        <i v-bind:class="subItem.right_icon + ' pull-right'"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </div>  
</template>
<script>
export default {
  mounted(){
    this.getMenu()
  },
  data(){
    return{
      activeItem: '',
      activeSubItem: '',
      menu: []
    }
  },
  methods: {
    getMenu (){
      var conditionEntry = {
        'sort': {
          'id': 'asc'
        }
      }
      this.APIRequest('menu_settings/retrieve', conditionEntry).then(response => {
        this.menu = response.data
      })
    },
    isActive(menuItem){
      return this.activeItem === menuItem
    },
    setActive(menuItem){
      this.activeItem = menuItem
      var intMenu = parseInt(menuItem)
      var intSubMenu = parseInt(this.activeSubItem)
      this.activeSubItem = (intSubMenu < (intMenu + 10) && intSubMenu > intMenu) ? this.activeSubItem : ''
    },
    isSubActive(menuItem){
      return this.activeSubItem === menuItem
    },
    setSubActive(menuItem){
      this.activeSubItem = menuItem
      this.activeItem = ''
    },
    navigateTo(method){
      this.$router.push('/' + method)
    }
  }
}
</script>
<style>
.main-sidebar{
  position: absolute;
  top: 0;
  left: 0;    
  min-height: 100%;
  margin-top: 55px;
  z-index: 810;
  -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  -moz-transition: -moz-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  -o-transition: -o-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
  background: #f4f4f4;
}
.sidebar-menu .header{
  background: #006600;
  font-weight: 700;
  padding: 15px 2% 15px 2%;
  color: #fff;
}

.sidebar-menu, .sidebar-menu  ul {
  list-style: none;
  margin: 0;
  padding: 0;
  color: #000;
}

.sidebar-menu li{
  min-height: 50px;
  overflow-x: hidden;
}
.sidebar-menu ul li{
  min-height: 40px;
  overflow-x: hidden;
}
.sidebar-menu li, .sidebar-menu ul > li {
  position: relative;
  margin: 0;
  padding: 0;
}
.sidebar-menu  li > a{
  padding: 15px 2% 15px 2%;
  display: block;
}
.sidebar-menu  ul li > a{
  padding: 10px 1% 10px 5%;
  display: block;
}
.sidebar-menu li > a:hover,.sidebar-menu ul li > a :hover{
    cursor: pointer;
    background: #eaeaea;
}
.appActive, .appSubActive{
  background: #eaeaea;
}/*-- app-active --*/

.appActive ul{
  background: #f4f4f4;
}
@media (min-width: 1111px){
  .main-sidebar{
    width:20%;
    font-size: 14px;
  }
}
@media screen (min-width: 768px), screen and (max-width: 1110px){
  .main-sidebar{
    width: 30%;
    font-size: 14px;
  }
  .sm-title{
    text-align: center;
  }
}
@media (max-width: 767px){
  .main-sidebar{
    width: 100%;
    font-size:16px;
  }
   .sm-title{
    text-align: center;
  }
}
@media (max-width: 239px){
  .main-sidebar{
    width: 100%;
    font-size:16px;
  }
  .sm-title,.header{
    display: none;
  }
  .sidebar-menu  li > a{
  padding: 15px 20px 15px 15px;
  display: block;
  }
  .sidebar-menu  ul li > a{
  padding: 10px 15px 10px 25px;
  display: block;
  }
}
</style>
