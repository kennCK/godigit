<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h4>Product Order Management</h4>
      </div>
      <div class="col-sm-12 no-overlay">
        <common-module
          :form_setting="formSetting"
          :form_input_setting="formInputSetting"
          :filter_setting="tableFilterSetting"
          :table_setting="tableSetting"
          :column_setting="tableColumnSetting"
          :api="api">
        </common-module>
      </div>
    </div>
  </div>
</template>
<script>
  export default{
    name: 'ProductManagement',
    components: {
      'common-module': require('../../components/common_module/CommonModule.vue')
    },
    create(){
    },
    mounted(){

    },
    data(){
      let tableSetting = {
        foreign_table: ['product']
      }
      let tableFilterSetting = [
        {
          name: 'status',
          value: '3',
          clause: '!=',
          always: true
        },
        {
          name: 'status',
          value: '0',
          clause: '!=',
          always: true
        }
      ]
      let tableColumnSetting = [
        {
          name: 'day',
          value_function: (rowValue) => {
            let days = [
              'Sun',
              'Mon',
              'Tue',
              'Wed',
              'Thu',
              'Fri',
              'Sat',
              'Ala Carte'
            ]
            return days[rowValue['day'] - 1]
          }
        },
        {
          name: 'name'
        },
        {
          name: 'email'
        },
        {
          name: 'mobile_number'
        },
        {
          name: 'product description',
          db_name: 'product.description'

        },
        {
          name: 'status',
          value_function: (rowValue) => {
            let stats = [
              'Pending',
              'Processed',
              'Delivered'
            ]
            return stats[rowValue['status'] - 1]
          }
        }
      ]
      let formSetting = {
        title: 'Product',
        no_create: true
      }
      let formInputSetting = {
        name: {
          read_only: true
        },
        'product.description': {
          name: 'Product',
          read_only: true
        },
        day: {
          type: 'select',
          default_value: 1,
          select_option: {
            options: [
              {value: 1, text: 'Sunday'},
              {value: 2, text: 'Monday'},
              {value: 3, text: 'Tuesday'},
              {value: 4, text: 'Wednesday'},
              {value: 5, text: 'Thursday'},
              {value: 6, text: 'Friday'},
              {value: 7, text: 'Saturday'},
              {value: 8, text: 'A la Carte'}
            ]
          },
          read_only: true
        },
        rice_option: {
          type: 'number',
          default_value: 0,
          read_only: true
        },
        barley_option: {
          type: 'number',
          default_value: 0,
          read_only: true
        },
        basmati_option: {
          type: 'number',
          default_value: 0,
          read_only: true
        },
        payment_method: {
          type: 'select',
          read_only: true,
          default_value: 1,
          select_option: {
            options: [
              {value: 1, text: 'DBS Paylah!'},
              {value: 2, text: 'DBS/POSB iBanking Transfer'},
              {value: 3, text: 'ADVANCE CASH PAYMENT'}
            ]
          }
        },
        status: {
          type: 'select',
          default_value: 1,
          select_option: {
            options: [
              {value: 1, text: 'Pending'},
              {value: 2, text: 'Processed'},
              {value: 3, text: 'Delivered'}
            ]
          }
        }
      }
      return {
        api: 'product_order',
        tableSetting: tableSetting,
        tableFilterSetting: tableFilterSetting,
        tableColumnSetting: tableColumnSetting,
        formSetting: formSetting,
        formInputSetting: formInputSetting
      }
    },
    props: {
    },
    methods: {
    }

  }
</script>
<style scoped>

</style>
