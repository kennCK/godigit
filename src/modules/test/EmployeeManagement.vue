<template>
  <div>
    <module :api="api" :table_setting="table_setting" :form_setting="form_setting"></module>
  </div>
</template>
<script>
  export default{
    name: '',
    components: {
      'module': require('components/common_module/CommonModule.vue')
    },
    create(){

    },
    mounted(){

    },
    data(){
      let filterSetting = {
        employee_id: {},
        first_name: {
          name: 'Name'
        },
        position: {
          input_type: 'select',
          input_setting: {
            options: [{
              value: '1',
              label: 'General Manager'
            }]
          }
        },
        department: {
          input_type: 'select',
          input_setting: {
            options: [{
              value: '1',
              label: 'Software Development'
            }]
          }
        }
      }
      let columnSetting = {
        employee_id: {},
        first_name: {},
        last_name: {},
        middle_name: {},
        contact_number: {},
        department: {}
      }
      let tableSetting = {
        filterSetting: filterSetting,
        columnSetting: columnSetting
      }
      let formSetting = {
        inputs: {
          account: {
            name: 'Have an Account already?',
            input_type: 'checkbox'
          },
          username: {},
          email: {},
          first_name: {},
          middle_name: {},
          last_name: {}
        }
      }
      return {
        api: 'account_information',
        table_setting: tableSetting,
        form_setting: formSetting
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
