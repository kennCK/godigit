
export default{
  routes: [{
    path: '/plenos',
    name: 'plenos',
    component: resolve => require(['modules/test/Plenos.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  },
  {
    path: '/dev_table_component',
    name: 'dev_table_component',
    component: resolve => require(['modules/test/TableComponent.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  }]
}
