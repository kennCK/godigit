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
      path: '/canales',
      name: 'Test',
      component: resolve => require(['modules/test/Canales.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: false
      }
    },
    {
      path: '/plenos',
      name: 'Test',
      component: resolve => require(['modules/test/Plenos.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: false
      }
    },
    {
      path: '/casera',
      name: 'Test',
      component: resolve => require(['modules/test/Casera.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: false
      }
    },
    {
      path: '/salise',
      name: 'Test',
      component: resolve => require(['modules/test/Salise.vue'], resolve),
      beforeEnter: beforeEnter,
      meta: {
        tokenRequired: false
      }
    }
  ]
}
