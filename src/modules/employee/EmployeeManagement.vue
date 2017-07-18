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
        input_type: 'hidden',
        default_value: AUTH.user.company_branch_id
      },
      employee_id: {},
      first_name: {
        input_name: 'Name',
        input_type: 'select2'
      },
      position: {
        input_type: 'select2'
      },
      department: {
        input_type: 'select2'
      }
    }
    let columnSetting = {
      employee_id: {},
      'account_information[first_name]  ': {
        name: 'First Name'
      },
      last_name: {},
      middle_name: {},
      contact_number: {},
      position: {},
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
