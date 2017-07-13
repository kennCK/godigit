<template>
  <div>
    <module :api="api" :table_setting="table_setting" :form_setting="form_setting"></module>
  </div>
</template>
<script>
import AUTH from '../../services/auth'
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
      company_branch_id: {
        default_value: AUTH.user.company_branch_id
      },
      employee_id: {},
      first_name: {
        input_name: 'Name'
      }
      // position: {
      //   input_type: 'select',
      //   input_setting: {
      //     options: [{
      //       value: '1',
      //       label: 'General Manager'
      //     }]
      //   }
      // },
      // department: {
      //   input_type: 'select',
      //   input_setting: {
      //     options: [{
      //       value: '1',
      //       label: 'Software Development'
      //     }]
      //   }
      // }
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
      columnSetting: columnSetting,
      retrieveParameter: {
        with_foreign_table: [
          'account_information',
          'company_branch'
        ]
      }
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
        last_name: {}
      }
    }
    return {
      api: 'company_branch_employee',
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
