<template>
   <div class="main-sidebar navbar-collapse sidebar-collapse " v-bind:class="hide" id="godigitSidebar" >
    <div class="sidebar">
      <ul class="sidebar-menu">
          <li class="header"><label v-bind:class="hide">MAIN TASKS</label>
              <span class="pull-right">
                <i v-bind:class="toggleSidebar" aria-hidden="true" v-on:click="changeToggleSidebarIcon()"></i>
              </span>
          </li>
          <li v-for="(item,index) in menu" v-if="item.parent_id == 0" v-bind:class="{ appActive: isActive(item.id) }" v-on:click="setActive(item.id)">
              <a v-on:click="navigateTo(item.method)" data-toggle="collapse" :data-target="'#'+item.id" v-bind:class="hide">
                <i v-bind:class="item.right_icon" v-if="toggleSidebarFlag != false"></i>
                <span v-bind:class="'sm-title'" v-if="toggleSidebarFlag != false">{{item.title}}
                </span>
                <span v-bind:class="'pull-right-container'">  
                  <i v-bind:class="item.left_icon + ' pull-right'"></i>
                </span>
              </a>
              <ul class="collapse" v-if="item.id == menu[index+1].parent_id" :id="item.id">
                <li v-for="subItem in menu" v-if="subItem.parent_id != 0 && item.id == subItem.parent_id"  v-bind:class="{ appSubActive: isSubActive(subItem.id) }" v-on:click="setSubActive(subItem.id)">
                  <a v-on:click="navigateTo(item.method + '/' + subItem.method)" v-bind:class="hide">
                    <span v-bind:class="'pull-right-container'">
                      <i v-bind:class="subItem.left_icon  + ' pull-right'"></i>
                    </span>
                    <span v-bind:class="'sm-title'" v-if="toggleSidebarFlag != false">{{subItem.title}}</span>
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
      menu: [],
      toggleSidebar: 'fa fa-toggle-on',
      toggleSidebarFlag: true,
      hide: '',
      alignAtHide: 'pull-right'
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
    },
    changeToggleSidebarIcon(){
      this.toggleSidebarFlag = !this.toggleSidebarFlag
      this.hide = (this.toggleSidebarFlag === true) ? '' : 'hidden'
      this.alignAtHide = (this.toggleSidebarFlag === false) ? 'text-center' : 'pull-right'
      var icon = (this.toggleSidebarFlag === true) ? 'on' : 'off'
      this.toggleSidebar = 'fa fa-toggle-' + icon
    }
  }
}
</script>
<style>
.main-sidebar{  
  min-height: 100%;
  float: left;
  overflow: hidden;
  margin-bottom: 50px;
  transition: all 1s ease 0s;
}
.main-sidebar.hidden{
  margin-left: -15%;
  transition: all 1s ease 0s;
}
.main-sidebar i{
  padding:0 10px 0 10px;
}
.sidebar-menu .header{
  font-weight: 700; 
  padding: 15px 2% 15px 2%;
  color: #000;
  text-align: center;
}
.sidebar-menu, .sidebar-menu  ul {
  list-style: none;
  margin: 0;
  padding: 0;
  color: #000;
}
.header i{
  font-size: 30px;
  color: #006600;
  }/*-- toggle-sidebar i --*/
.header i:hover{
  cursor: pointer;
  color: #009900;
}/*-- .toggle-sidebar i:hover --*/
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
  padding: 10px 20px 10px 50px;
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
@media (min-width: 1200px){
  .main-sidebar{
    width:20%;
    font-size: 14px;
    float: left;
  }
  .sidebar-collapse{
    display: block;
  }
  .sidebar-menu .header span{
    display: block;
  }
}

/* meduim screen*/
@media screen (min-width: 992px), screen and (max-width: 1199px){
  .main-sidebar{
    width: 25%;
    font-size: 13px;
  }
  .main-sidebar.active{
    padding-left:15%;
  }
  .sidebar-collapse{
    display: block;
  }
  .sidebar-menu .header span{
  display: block;
}
}
/* small screen*/
@media screen (min-width: 768px), screen and (max-width: 991px){
  .main-sidebar{
    width: 100%;
    font-size: 16px;
  }
  .sm-title{
    text-align: center;
  }
   .sidebar-collapse{
    display: none;
  }
  .sidebar-menu .header span{
    display: none;
  }
}

/* xs screen*/
@media (max-width: 767px){
  .main-sidebar{
    width: 100%;
    font-size:16px;
  }
   .sm-title{
    text-align: center;
  }
   .sidebar-collapse{
    display: none;
  }
  .sidebar-menu .header span{
    display: none;
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
  .sidebar-menu .header span{
    display: none;
  }
}
</style>
