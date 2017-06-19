<template>
  <div>
    <table-filter></table-filter>
    <table class="table">
      <thead>
        <tr>
          <th v-for="column in columnSetting[0]">
            {{column['name']}}
            <span class="pull-right">
              <i v-if="column['sort'] === 0" class="fa fa-sort" aria-hidden="true"></i>
              <i v-else-if="column['sort'] === 1"class="fa fa-sort-asc" aria-hidden="true"></i>
              <i v-else-if="column['sort'] === 2"class="fa fa-sort-desc" aria-hidden="true"></i>
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    components: {
      'table-filter': require('./Filter.vue')
    },
    mounted(){
      this.initFilterSetting()
      this.initColumnSetting()
    },
    data(){
      return {
        columnSetting: [
          [],
          []
        ]
      }
    },
    props: {
      api: String,
      filter_setting: Object,
      column_setting: Object
    },
    methods: {
      initFilterSetting(){
      },
      initColumnSetting(){
        for(let dbName in this.column_setting){
          let column = this.column_setting[dbName]
          Vue.set(column, 'db_name', dbName)
          this.initColumn(column)
          this.columnSetting[0].push(column)
        }
        console.log(this.columnSetting)
      },
      initColumn(column){
        typeof column['name'] === 'undefined' ? Vue.set(column, 'name', this.StringUnderscoreToPhrase(column['db_name'])) : null
        typeof column['type'] === 'undefined' ? Vue.set(column, 'type', 'text') : null
        typeof column['sort'] === 'undefined' ? Vue.set(column, 'sort', 0) : null
        typeof column['value_function'] === 'undefined' ? Vue.set(column, 'value_function', null) : null
      }
    }
  }
</script>
<style scoped>

</style>
