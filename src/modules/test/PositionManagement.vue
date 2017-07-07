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
        title: {
        },
        status: {
        },
        slot: {
        }
      }
      let columnSetting = {
        title: {},
        position_status: {},
        description: {},
        slot: {}
      }
      let tableSetting = {
        filterSetting: filterSetting,
        columnSetting: columnSetting
      }
      let formSetting = {
        inputs: {
          title: {},
          position_status: {},
          description: {},
          slot: {}
        }
      }
      return {
        api: 'position',
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
