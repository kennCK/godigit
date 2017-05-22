import AUTH from 'services/auth'

let beforeEnter = (to, from, next) => {
  // TODO Redirect if no token when token is required in meta.tokenRequired
  AUTH.currentPath = to.path
  if(AUTH.user.userID || to.meta.tokenRequired !== true){
    next()
  }else{
    if(to.name !== 'login'){
      if(!AUTH.tokenData.verifyingToken){
        next({
          path: '/'
        })
      }
    }else{
      if(!AUTH.tokenData.verifyingToken){
        next()
      }
    }
  }
}
export default{
  routes: [
    {
      path: '/',
      name: 'home',
      component: resolve => require(['modules/home/Home.vue'], resolve),
      beforeEnter: beforeEnter

    },
    {
      path: '/admin',
      name: 'login',
      component: resolve => require(['modules/home/LogIn.vue'], resolve),
      beforeEnter: (to, from, next) => {
        AUTH.currentPath = to.path
        if(AUTH.user.userID){
          next({
            path: (AUTH.user.type === 1) ? '/product_management' : '/cashier'
          })
        }else{
          if(!AUTH.tokenData.verifyingToken){
            next()
          }
        }
      }
    },
    {
      path: '/employeeManagement',
      name: 'employeeManagement',
      component: resolve => require(['modules/employee/EmployeeManagement.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: true
      }
    },
    {
      path: '/test',
      name: 'Test',
      component: resolve => require(['modules/test/InputCell.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: false
      }
    }
  ]
}
