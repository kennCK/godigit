<template>
  <div>
    <div v-if="messageList.length" class="alert alert-warning">
      <div v-for="message in messageList">
        <strong>{{message['label']}}</strong>
        {{message['message']}}
      </div>
    </div>
    <form ref="form" slot="body" enctype="multipart/form-data" role="form" method="POST">
      <input type='hidden' name="id" v-bind:value='entryID' >
      <input-group
        :inputs="inputs"
        :form_data="formData"
        :form_data_updated="formDataUpdated"
        :form_status="formStatus"
        :error_list="errorList"
        v-on:form_data_changed="valueChanged"
      >
      </input-group>
    </form>
    <div class="row">
      <div class="col-sm-12 text-right">
        <template v-if="formStatus === 'delete_confirmation'">
          <label class="float-left form-label"><strong>Are you sure?</strong></label>
          <button @click="deleteForm" class="btn btn-danger">Yes, delete</button>
          <button @click="formStatus = 'editing'" class="btn btn-default">No</button>
        </template>
        <template v-else>
          <button @click="formStatus = 'delete_confirmation'" v-if="formStatus === 'editing'" v-bind:disabled="formStatus === 'loading'? true : false" type="button" class="btn btn-outline-danger pull-left"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          <label v-if="formStatus === 'loading'" class="text-primary">Please wait...</label>
          <label v-else-if="formStatus === 'success'" class="text-success">Success!</label>
          <label v-else-if="formStatus === 'failed'" class="text-danger">Failed!</label>
          <button v-if="formStatus === 'editing' || formData['id'] === 0" @click="submitForm" v-bind:disabled="formStatus === 'loading'? true : false" type="button" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
          <button v-if="formStatus === 'editing'" @click="viewForm(formData['id'])" type="button"  v-bind:disabled="formStatus === 'loading'? true : false" class="btn btn-secondary">Cancel</button>
          <button v-if="formData['id'] !== 0 && formStatus === 'view'" @click="formStatus = 'editing'" v-bind:disabled="formStatus === 'loading'? true : false" type="button" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
          <button v-if="formStatus === 'view' || formData['id'] === 0" @click="$emit('form_close')" type="button"  v-bind:disabled="formStatus === 'loading'? true : false" class="btn btn-secondary">Close</button>
        </template>
      </div>
    </div>
  </div>
</template>
<script>
  import Vue from 'vue'
  export default{
    name: '',
    components: {
      'input-group': require('../input_field/InputGroup.vue')
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
        errorList: {},
        /*
          formStatus (String) the status of the form
          view
          loading
          success
          failed
          closed
        */
        formStatus: 'view',
        links: {
          create: '',
          retrieve: '',
          update: '',
          delete: ''
        },
        inputList: {
        },
        formData: {},
        formDataUpdated: false,
        entryID: 0
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
        let link = (this.formData['id'] * 1) ? this.links.update : this.links.create
        this.APIFormRequest(link, this.$refs.form, (response) => {
          if(response['error']['status'] * 1 === 100){
            this.errorList = response['error']['message']
            for(let field in response['error']['message']){
              let label = field
              if(typeof this.inputList[field] !== 'undefined'){
                // this.inputList[field]['feedback_status'] = 2
                // this.inputList[field]['feedback_message'] = response['error']['message'][field][0]
                // label = this.inputList[field]['name']
              }else{
                this.messageList.push({
                  label: label,
                  message: response['error']['message'][field][0]
                })
              }
            }
            this.formStatus = 'failed'
          }else{
            this.formStatus = 'success'
            setTimeout(() => {
              this.formStatus = 'view'
              this.viewForm(typeof response['data'] === 'boolean' ? this.entryID : response['data'])
              console.log(response)
              console.log(this.formData['id'] + '---' + response['data'])
            }, 1500)
            this.$emit('form_updated', response['data'])
          }

        }, (response, status) => {
          this.formStatus = 'failed'
        })
      },
      viewForm(id){
        this.entryID = id
        this.formStatus = 'loading'
        if(id === 0){
          $(this.$refs.form).trigger('reset')
          this.formData = {
            id: 0
          }
          this.formStatus = 'normal'
          this.formDataUpdated = !this.formDataUpdated
        }else{
          let requestOption = {
            id: id
          }
          this.APIRequest(this.links.retrieve, requestOption, (response) => {
            if(response['data']){
              this.formData = response['data']
              for(let x in this.valueFunctionList){
                this.valueFunctionList[x]['value_function'](this.formData)
              }
              this.formDataUpdated = !this.formDataUpdated
            }
            this.formStatus = 'view'
          })
        }
      },
      deleteForm(){
        let requestOption = {
          id: this.entryID
        }
        this.APIRequest(this.links.delete, requestOption, (response) => {
          if(response['data']){
            this.$emit('form_deleted', this.formData['id'])
            this.$emit('form_close')
          }else{
          }
        })
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
      initializeInput(){
        this.inputList = this.inputs
        Vue.set(this.inputList, 'id', {
          db_name: 'id',
          input_type: 'hidden',
          data_format: 'number'
        })
      },
      valueChanged(fieldName, value){
        if(typeof this.formData[fieldName] === 'undefined'){
          Vue.set(this.formData, fieldName, null)
        }
        Vue.set(this.formData, fieldName, value)

      }
    }
  }
</script>
<style scoped>
</style>
