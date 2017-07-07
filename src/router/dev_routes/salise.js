
export default{
  routes: [{
    path: '/salise',
    name: 'salise',
    component: resolve => require(['modules/test/Salise.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  },
  {
    path: '/position_management',
    name: 'positionManagement',
    component: resolve => require(['modules/test/PositionManagement.vue'], resolve),
    meta: {
      tokenRequired: false
    }
  }
  ]
}
