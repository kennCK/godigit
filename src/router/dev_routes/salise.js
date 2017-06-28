
export default{
  routes: [{
    path: '/testing/salise',
    name: 'salise',
    component: resolve => require(['modules/test/Salise.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  }]
}
