<template>
  <div class="form-group row" v-bind:class="[feedback_status ? 'has-feedback' :'', feedbackStatusClass]">
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
          class="form-control"
          v-on:change="valueChanged"
          >
          <div v-if="feedback_message" class="form-control-feedback">{{feedback_message}}</div>
          <small v-if="muted_text" class="form-text text-muted">{{muted_text}}</small>
      </div>
    </template>
  </div>
</template>
<script>
  export default{
    name: '',
    components: {
      'radio-button': require('./RadioButton.vue'),
      'check-box': require('./CheckList.vue'),
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
      input_value: Object,
      input_type: String,
      input_setting: Object,
      input_style: Object,
      placeholder: String,
      muted_text: String,
      feedback_message: String,
      feedback_status: Number // 0 - none, 1 - success, 2 - danger, 3 - warning
    },
    data(){
      return {
        dbName: null,
        labelText: null,
        labelStyle: {},
        labelColspan: 3,
        inputType: 'text',
        inputSetting: {},
        inputStyle: {},
        inputPlaceholder: null,
        feedbackStatusClass: '',
        feedbackStatus: 0,
        feedbackMessage: ''
      }
    },
    watch: {
      feedback_status(value){
        this.feedbackStatus = value
        this.feedbackMessage = this.feedback_message
        switch(value * 1){
          case 1:
            this.feedbackStatusClass = 'has-success'
            break
          case 2:
            this.feedbackStatusClass = 'has-danger'
            break
          case 3:
            this.feedbackStatusClass = 'has-warning'
            break
          default:
            this.feedbackStatusClass = ''
            break
        }
      }
    },
    methods: {
      initSetting(){
        this.dbName = this.db_name ? this.db_name : this.StringPhraseToUnderscoreCase(this.name)
        this.labelText = this.label ? this.label : this.name
        this.labelStyle = this.label_style
        this.labelColspan = this.label_colspan ? this.label_colspan : 4
        this.inputType = this.input_type ? this.input_type : 'text'
        this.inputStyle = this.input_style
        this.inputPlaceholder = this.placeholder ? this.placeholder : this.name
      },
      valueChanged(e){
        this.$emit('value_changed', e)
      }
    }

  }
</script>
<style scoped>

</style>
