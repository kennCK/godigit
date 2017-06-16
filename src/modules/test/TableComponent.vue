<template>
  <div>
    <api-table :api="api" :filter_setting="filterSetting" :column_setting="columnSetting"></api-table>
  </div>
</template>
<script>
  export default{
    components: {
      'api-table': require('components/table/TableComponent.vue')
    },
    create(){

    },
    mounted(){

    },
    data(){
      let filterSetting = {

      }
      let columnSetting = {
        parent_id: {},
        module: {}
      }
      return {
        api: 'menu_settings',
        filterSetting: filterSetting,
        columnSetting: columnSetting
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
