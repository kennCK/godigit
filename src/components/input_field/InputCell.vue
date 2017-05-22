<template>
  <div class="form-group row">
    <input v-if="inputType === 'hidden'" type="hidden">
    <template v-else>
      <label class="col-form-label" v-bind:class="'col-sm-' + labelColspan">{{labelText}} :</label>
      <div v-bind:class="'col-sm-' + (12 - (labelColspan !== 12 ? labelColspan : 0))">
        <radio-button
          v-if="inputType === 'radio'"
          :input_setting="input_setting"
          >
        </radio-button>
        <check-list
          v-if="inputType === 'checklist'"
          :input_setting="input_setting"
          >
        </check-list>
        <select-input
          v-if="inputType === 'select'"
          :input_setting="input_setting"
          >
        </select-input>
        <textarea-input
          v-if="inputType === 'textarea'"
          :input_setting="input_setting"
          >
        </textarea-input>
        <input v-else
          v-bind:name="dbName"
          v-bind:placeholder="inputPlaceholder"
          v-bind:type="inputType"
          class="form-control">
      </div>
    </template>
  </div>
</template>
<script>
  export default{
    name: '',
    components: {
      'radio-button': require('./RadioButton.vue'),
      'check-list': require('./CheckList.vue'),
      'select-input': require('./Select.vue'),
      'textarea-input': require('./Textarea.vue')
    },
    create(){

    },
    mounted(){
      this.initSetting()
    },
    props: {
      name: String,
      db_name: String,
      label: String,
      label_style: Object,
      label_colspan: Number,
      input_type: String,
      input_setting: Object,
      input_style: Object,
      placeholder: String
    },
    data(){
      return {
        dbName: null,
        labelText: null,
        labelStyle: {},
        labelColspan: 2,
        inputType: 'text',
        inputSetting: {},
        inputStyle: {},
        inputPlaceholder: null
      }
    },
    methods: {
      initSetting(){
        this.dbName = this.db_name ? this.db_name : this.StringToUnderscoreCase(this.name)
        this.labelText = this.label ? this.label : this.name
        this.labelStyle = this.label_style
        this.labelColspan = this.label_colspan ? this.label_colspan : 2
        this.inputType = this.input_type ? this.input_type : 'text'
        this.inputStyle = this.input_style
        this.inputPlaceholder = this.placeholder ? this.placeholder : this.name
      }

    }

  }
</script>
<style scoped>

</style>
