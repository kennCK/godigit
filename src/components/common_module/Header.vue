<template>
  <div class="app-header">
      <div id="app-left" class="container-fluid">
          <img id="app-logo" v-bind:src="'./static/gocentral.png'"/>
          <span id="client-name" class="navbar-brand">{{companyName}}</span>
      </div>
      <div id="account-profile">
          <img id="profile-img" class="nav navbar-right" v-bind:src="'./static/gocentral.png'"/>
      </div>
  </div>
</template>
<script>
export default {
  name: 'header',
  mounted(){
  },
  data(){
    return {
      companyName: 'GoDigit',
      firstname: 'Kennette'
    }
  }
}
</script>
<style>
.app-header{
  background: #ffffff;
  position:absolute;
  width:100%;
  height:50px;
  color:#006600;
  border-bottom: 1px solid #f0f0f0;
}
#app-left{
  width:50%;
  float:left;
}
#app-logo{
  height:40px;
  width:40px;
  float:left;
  margin-top:5px;
}
#client-name{
  font-size:20px;
}
#account-profile{
  width:50%;
  float:right;
}
#profile-img{
  height:40px;
  width:40px;
  float:right;
  margin-top:5px;
  margin-right:10px; 
}
</style>

