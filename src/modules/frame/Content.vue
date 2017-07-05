<template>
  <div class="content-holder">
    <transition >
      <router-view ></router-view>
    </transition>
  </div>
</template>
<style type="text/css">
  .content-holder{
    width: 96%;
    min-height: 500px;
    float: left;
    overflow: hidden;
    margin: 10px 2% 0 2%;
  }/*-- content-holder --*/
</style>
