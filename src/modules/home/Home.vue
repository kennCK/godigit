<template>
  <div>
    
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    name: '',
    create(){

    },
    components: {
      'modal': require('../../components/modal/Modal.vue')
    },
    mounted(){
      this.retrieveProducts()
    },
    data(){
      return {
        productListByDay: {},
        productList: {},
        orderProductID: 0,
        showModal: false,
        orderForm: {
          product_id: 0,
          name: null,
          email: null,
          mobile_number: null,
          payment_method: null,
          daily_menu: {},
          alacarte_menu: []
        },
        orderSending: false,
        orderResponse: false,
        errorMessage: false
      }
    },
    props: {
    },
    methods: {
      addWeeklyMenu(productID){
        if(typeof this.orderForm.daily_menu[productID] === 'undefined'){
          Vue.set(this.orderForm.daily_menu, productID, {
            id: productID,
            rice_option: 0,
            barley_option: 0
          })
          Vue.set(this.orderForm.daily_menu[productID], 'basmati_option', 0)
        }
        console.log(this.orderForm.daily_menu)
        this.showModal = true
      },
      sendOrder(){
        this.orderSending = true
        let param = this.orderForm
        param.product_id = this.orderProductID
        param.day = this.productList[this.orderProductID]['day']
        this.errorMessage = false
        this.APIRequest('product_order/create', param, (response) => {
          if(response.data){
            this.orderResponse = true
          }else{
            this.orderResponse = false
            this.errorMessage = ''
            if(response.error.status === 100){
              for(var x in response.error.message){
                this.errorMessage += '<i class="fa  fa-chevron-right" aria-hidden="true"></i> ' + response.error.message[x][0] + '<br>'
              }
            }
          }
          this.orderSending = false
        }, () => {
          this.orderSending = false
        })
      },
      retrieveProducts(){
        let param = {
          condition: [
            {
              column: 'status',
              value: 1
            }
          ],
          sort: {
            day: 'asc'
          }
        }
        this.APIRequest('product/retrieve', param, (response) => {
          this.productListByDay = {}
          this.productList = {}
          for(let x = 0; x < response['data'].length; x++){
            if(typeof this.productListByDay[response['data'][x]['day']] === 'undefined'){
              Vue.set(this.productListByDay, response['data'][x]['day'], {
                products: [],
                day: this.convertDay(response['data'][x]['day'])
              })

            }
            this.productListByDay[response['data'][x]['day']]['products'].push(response['data'][x])
            if(this.productListByDay[response['data'][x]['day']]['image'] === ''){
              Vue.set(this.productListByDay[response['data'][x]['day']], 'image', response['data'][x]['image'])
            }
            if(this.productListByDay[response['data'][x]['day']]['details'] === ''){
              Vue.set(this.productListByDay[response['data'][x]['day']], 'details', response['data'][x]['details'])
            }

            Vue.set(this.productList, response['data'][x]['id'], response['data'][x])
          }
          console.log(this.productListByDay)
        })
      },
      modalChangeState(value){
        this.showModal = value
      },
      convertDay(value){
        let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        return days[value - 1]
      }
    }

  }
</script>
<style scoped>
.half-rule {
  margin-left: 0;
  text-align: left;
  width: 50%;
}
</style>
