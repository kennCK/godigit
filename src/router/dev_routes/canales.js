
export default{
  routes: [{
    path: '/testing/canales',
    name: 'canales',
    component: resolve => require(['modules/test/Canales.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  }
  ]
}
