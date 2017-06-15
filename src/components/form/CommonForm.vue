<template>
  <div>
    <div v-if="messageList.length" class="alert alert-warning">
      <div v-for="message in messageList">
        <strong>{{message['label']}}</strong>
        {{message['message']}}
      </div>
    </div>
    <form v-if="inputInitialized" ref="form" slot="body" enctype="multipart/form-data" role="form" method="POST">
      <template v-for="input in inputList">
        {{input['label_colspan']}}
        <input-cell
          :name="input['name']"
          :db_name="input['db_name']"
          :input_setting="input['input_setting']"
          :input_type="input['input_type']"
          :input_style="input['input_style']"
          :label_colspan="input['label_colspan']"
          :placeholder="input['placeholder']"
          :feedback_message="input['feedback_message']"
          :feedback_status="input['feedback_status']"
          :muted_text="input['muted_text']"
          v-on:value_changed="valueChanged"
        >
        </input-cell>
      </template>
    </form>
    <div class="row">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6 text-right">
        <label v-if="formStatus === 'loading'" class="text-primary">Please wait...</label>
        <label v-else-if="formStatus === 'success'" class="text-success">Success!</label>
        <label v-else-if="formStatus === 'failed'" class="text-danger">Failed!</label>
        <button @click="submitForm" v-bind:disabled="formStatus === 'loading'? true : false" type="button" class="btn btn-primary">Save</button>
        <button type="button"  v-bind:disabled="formStatus === 'loading'? true : false" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    name: '',
    components: {
      'input-cell': require('../input_field/InputCell.vue')
    },
    create(){
    },
    mounted(){
      this.initializeLink()
      this.initializeInput()
    },
    data(){
      return {
        /*
          messageList (Array of Object) list of messages to be displayed
          [{
            label: String // label for the message
            message: String // the actual message
          }]
        */
        messageList: [],
        /*
          formStatus (String) the status of the form
          normal
          loading
          success
          failed
          closed
        */
        formStatus: 'normal',
        links: {
          create: '',
          retrieve: '',
          update: '',
          delete: ''
        },
        inputList: {
        },
        inputInitialized: false
      }
    },
    props: {
      api: String,
      no_create: Boolean,
      no_delete: Boolean,
      read_only: Boolean,
      inputs: Object,
      entry_id: Number
    },
    methods: {
      submitForm(){
        this.formStatus = 'loading'
        this.messageList = []
        let link = (this.entry_id) ? this.links.update : this.links.create
        this.APIFormRequest(link, this.$refs.form, (response) => {
          if(response['error']['status'] * 1 === 100){
            for(let field in response['error']['message']){
              let label = field
              if(typeof this.inputList[field] !== 'undefined'){
                this.inputList[field]['feedback_status'] = 2
                this.inputList[field]['feedback_message'] = response['error']['message'][field][0]
                label = this.inputList[field]['name']
              }
              this.messageList.push({
                label: label,
                message: response['error']['message'][field][0]
              })
            }
          }
          this.formStatus = 'normal'
        }, (response, status) => {
          this.formStatus = 'normal'
        })
      },
      initializeInput(){
        this.inputList = {}
        for(let key in this.inputs){
          Vue.set(this.inputList, key, this.inputs[key])
          typeof this.inputList[key]['name'] === 'undefined' ? Vue.set(this.inputList[key], 'name', this.StringUnderscoreToPhrase(key)) : ''
          Vue.set(this.inputList[key], 'db_name', key)
          Vue.set(this.inputList[key], 'feedback_status', 0)
          Vue.set(this.inputList[key], 'feedback_message', '')
        }
        this.inputInitialized = true
      },
      initializeLink(){
        if(!this.no_create){
          this.links.create = this.api + '/create'
        }
        this.links.retrieve = this.api + '/retrieve'
        if(!this.read_only){
          this.links.update = this.api + '/update'
        }
        if(!this.no_delete){
          this.links.delete = this.api + '/delete'
        }
      },
      valueChanged(e){
        let fieldName = $(e.target).attr('name')
        if(typeof this.inputList[fieldName] !== 'undefined'){
          this.inputList[fieldName]['feedback_status'] = 0
          this.inputList[fieldName]['feedback_message'] = ''
        }
      }
    }
  }
</script>
<style scoped>
</style>
