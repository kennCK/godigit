<template>
  <div class="row">
    <div class="col-sm-6">
      <h4>Position Management</h4>
    </div>
    <div class="col-sm-12 no-overlay">
      <common-module :form_setting="formSetting" :form_input_setting="formInputSetting" :table_setting="tableSetting" :column_setting="tableColumnSetting" :api="api"></common-module>
    </div>
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    name: 'EmployeeManagement',
    components: {
      'common-module': require('../../components/common_module/CommonModule.vue')
    },
    data(){
      let tableSetting = {
        foreign_table: [
          'product_options'
        ]
      }
      let tableFilterSetting = [
        {
          name: 'username'
        },
        {
          name: 'email'
        },
        {
          name: 'user_type_id',
          value: '1',
          always: true
        }
      ]
      let tableColumnSetting = [
        {
          name: 'id'
        },
        {
          name: 'username'
        },
        {
          name: 'email'
        },
        {
          name: 'type',
          db_name: 'user_type.description'
        }
      ]
      let formSetting = {
        title: 'Employee Information'
      }
      let formInputSetting = {
        form_group_credential: {
          group_name: 'User Credentials',
          input_setting: {
            username: {
              col: 7,
              col_label: 4
            },
            password: {
              type: 'password',
              col: 5,
              col_label: 4
            },
            email: {
              type: 'email',
              col: 7,
              col_label: 4
            },
            user_type_id: {
              name: 'Type',
              type: 'select',
              col: 5,
              col_label: 4,
              default_value: 2,
              select_option: {
                option_function: (moduleInstance) => {
                  moduleInstance.isLoading.push('user_type_option')
                  let formSetting = moduleInstance.formInputSetting.form_group_credential.input_setting
                  let key = 'user_type_id'
                  this.listDatabaseConstants('user_type/retrieve', key, formSetting[key]['select_option'], () => {
                    moduleInstance.isLoading.pop()
                  })

                }
              }
            }
          }
        },
        form_group_employee_information: {
          group_name: 'Employee Information',
          input_setting: {
            'user_informations.id': {
              type: 'hidden'
            },
            'user_informations.first_name': {
              name: 'First Name',
              col: 6,
              col_label: 4
            },
            'user_informations.middle_name': {
              name: 'Middle Name',
              col: 6,
              col_label: 4
            },
            'user_informations.last_name': {
              name: 'Last Name',
              col: 6,
              col_label: 4
            },
            'user_informations.contact_number': {
              name: 'Contact Number',
              col: 6,
              col_label: 4
            },
            'user_informations.business_position_id': {
              name: 'business_position',
              type: 'select',
              select_option: {
                option_function: (moduleInstance) => {
                  moduleInstance.isLoading.push('user_type_option')

                  let key = 'user_informations.business_position_id'
                  let link = 'business_position/retrieve'
                  let formSetting = moduleInstance.formInputSetting.form_group_employee_information.input_setting[key]['select_option']
                  this.listDatabaseConstants(link, key, formSetting, () => {
                    moduleInstance.isLoading.pop()
                  })
                }
              }
            }
          }
        }
      }
      return {
        api: 'user',
        tableSetting: tableSetting,
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
 .no-overlay{
   overflow-y: hidden;
 }
</style>
