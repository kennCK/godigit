<template>
  <div class="content-holder">
    <transition >
      <router-view ></router-view>
    </transition>
  </div>
</template>
<style type="text/css">
  .content-holder{
    width: 80%; 
    min-height: 100%;
    float: left;
    overflow: hidden;
  }/*-- content-holder --*/
</style>
