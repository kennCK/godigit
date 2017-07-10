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
        parent_id: {
        },
        name: {
        },
        code: {
        }
      }
      let columnSetting = {
        name: {
        },
        code: {}
      }
      let tableSetting = {
        filterSetting: filterSetting,
        columnSetting: columnSetting
      }
      let formSetting = {
        modal_size: 'modal-lg',
        inputs: {
          logo_input_group: {
            input_type: 'group',
            col: 6,
            inputs: {
              logo_file: {
                label_colspan: 0,
                input_type: 'single_image',
                col: 12
              }
            }
          },
          detail_input_group: {
            input_type: 'group',
            col: 6,
            inputs: {
              company_branch_id: {
                default_value: 1
              },
              name: {
                colspan: 6
              },
              code: {
                input_type: 'checkbox',
                colspan: 6
              },
              location: {
                colspan: 6
              },
              contact_number: {
                colspan: 6
              },
              email: {
                colspan: 6
              },
              fax_number: {
                colspan: 6
              }
            }
          }
        }
      }
      return {
        api: 'department',
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
