
export default{
  routes: [{
    path: '/salise',
    name: 'salise',
    component: resolve => require(['modules/test/Salise.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  }]
}
