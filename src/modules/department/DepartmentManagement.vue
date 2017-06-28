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
        parent_id: {},
        name: {},
        code: {}
      }
      let tableSetting = {
        filterSetting: filterSetting,
        columnSetting: columnSetting
      }
      let formSetting = {
        inputs: {
          parent_id: {},
          name: {},
          code: {},
          location: {},
          contact_number: {},
          email_address: {},
          fax_number: {},
          logo: {
            input_type: 'single_image'
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
