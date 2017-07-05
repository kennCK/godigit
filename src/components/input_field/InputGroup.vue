<template>
  <div>
    <div class="row">
      <template v-for="input in inputList">
        <div class="col-sm-6" v-bind:class="input['input_type'] === 'hidden' ? 'hidden' : ''" >
          <input-cell
            :name="input['name']"
            :db_name="input['db_name']"
            :input_setting="input['input_setting']"
            :input_type="input['input_type']"
            :input_style="input['input_style']"
            :colspan="input['colspan']"
            :label_colspan="input['label_colspan']"
            :placeholder="input['placeholder']"
            :default_value="input['default_value']"
            :feedback_message="input['feedback_message']"
            :feedback_status="input['feedback_status']"
            :muted_text="input['muted_text']"
            :form_data="form_data"
            :form_data_updated="form_data_updated"
            :form_status="form_status"
            :error_list="error_list"
            v-on:value_changed="valueChanged"
          >
          </input-cell>
        </div>
      </template>
    </div>
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    name: '',
    components: {
      'input-cell': require('../input_field/InputCell.vue'),
      'input-group': require('../input_field/InputGroup.vue')
    },
    create(){

    },
    mounted(){
      this.initializeInput()
    },
    data(){
      return {
        inputList: {},
        valueFunctionList: {},
        valueChangedList: {},
        inputInitialized: false
      }
    },
    props: {
      inputs: Object,
      form_data: Object,
      form_data_updated: Boolean,
      form_status: String,
      error_list: Object
    },
    watch: {
      form_data_updated(value){
        for(let key in this.inputList){
          let dbName = this.inputList[key]['db_name']
          this.formDataChanged(dbName, this.form_data[dbName])
        }
      }
    },
    methods: {
      valueChanged(e){
        let fieldName = $(e.target).attr('name')
        if(typeof this.valueChangedList[fieldName] !== 'undefined'){
          let newFormData = this.valueChangedList[fieldName](this.formData)
          for(let formKey in newFormData){
            this.formDataChanged(formKey, newFormData[formKey])
          }
        }else{
          this.formDataChanged(fieldName, $(e.target).val())
        }

      },
      formDataChanged(fieldName, value){

        this.$emit('form_data_changed', fieldName, this.dataFormat(fieldName, value))
      },
      initializeInput(){
        this.inputList = {}

        for(let key in this.inputs){
          Vue.set(this.inputList, key, this.inputs[key])
          typeof this.inputList[key]['name'] === 'undefined' ? Vue.set(this.inputList[key], 'name', this.StringUnderscoreToPhrase(key)) : ''
          typeof this.inputList[key]['input_type'] === 'undefined' ? Vue.set(this.inputList[key], 'input_type', 'text') : ''
          Vue.set(this.inputList[key], 'db_name', key)
          Vue.set(this.inputList[key], 'feedback_status', 0)
          Vue.set(this.inputList[key], 'feedback_message', '')
          if(typeof this.inputList[key]['default_value'] === 'undefined'){
            Vue.set(this.inputList[key], 'default_value', null)
          }
          if(typeof this.inputList[key]['data_format'] === 'undefined'){
            let defaultDataFormat
            switch(this.inputList[key]['input_type']){
              default:
                defaultDataFormat = 'text'
            }
            Vue.set(this.inputList[key], 'data_format', defaultDataFormat)
          }
          this.formDataChanged(this.inputList[key]['db_name'], this.inputList[key]['default_value'])
          if(typeof this.inputList[key]['value_function'] !== 'undefined'){
            this.valueFunctionList[key] = this.inputList[key]
          }
          if(typeof this.inputList[key]['value_changed'] !== 'undefined'){
            this.valueChangedList[key] = this.inputList[key]
          }
        }
        this.inputInitialized = true
      },
      dataFormat(dbName, value){
        if(typeof dbName === 'undefined'){
          return null
        }
        let finalValue = value || this.inputList[dbName]['default_value']
        switch(this.inputList[dbName]['data_format']){
          case 'decimal':
            return (finalValue * 1).toFixed(2)
          case 'number':
            return finalValue * 1
          default:
            return finalValue
        }
      }
    }

  }
</script>
<style scoped>
.hidden{
  display: none
}
</style>
