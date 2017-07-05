
export default{
  routes: [{
    path: '/canales',
    name: 'canales',
    component: resolve => require(['modules/test/Canales.vue'], resolve),
    meta: {
      tokenRequired: true
    }
  },
  {
    path: '/employee_management',
    name: 'employee',
    component: resolve => require(['modules/test/EmployeeManagement.vue'], resolve),
    meta: {
      tokenRequired: true
    }
  },
  {
    path: '/company_selection',
    name: 'companySelection',
    component: resolve => require(['modules/home/CompanySelection.vue'], resolve),
    meta: {
      tokenRequired: true
    }
  }
  ]
}
