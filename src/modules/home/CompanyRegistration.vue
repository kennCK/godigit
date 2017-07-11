<template>
    <div class="col-sm-4 offset-sm-4 custom-container">
      <div class="header-title">
        <i class="fa fa-home" aria-hidden="true" v-on:click="redirect()"></i>
        <span>Company Registration</span>
      </div>
        <input-group
          :inputs="inputs" :form_status="'create'" :error_list="errorList"
        ></input-group>
        <button class="btn btn-primary pull-right" v-on:click="register()">Register</button>
    </div>
</template>
<script>
import ROUTER from '../../router'
export default {
  name: '',
  components: {
    'input-group': require('components/input_field/InputGroup.vue')
  },
  mounted(){
  },
  data(){
    return{
      inputs: {
        business_type_id: {
          label_colspan: 0,
          input_type: 'select',
          input_setting: {
            options: [{
              value: 1,
              label: 'Call Center'
            }]
          }
        },
        name: {
          label_colspan: 0,
          db_name: 'company_branches[name]',
          placeholder: 'Company Name'
        },
        code: {
          label_colspan: 0,
          db_name: 'company_branches[code]',
          placeholder: 'Company Code'
        },
        email: {
          label_colspan: 0,
          db_name: 'company_branches[email]',
          placeholder: 'Company Email'
        },
        address: {
          label_colspan: 0,
          db_name: 'company_branches[address]',
          placeholder: 'Company Address'
        },
        contact_number: {
          label_colspan: 0,
          db_name: 'company_branches[contact_number]',
          placeholder: 'Company Contact Number'
        },
        fax_number: {
          label_colspan: 0,
          db_name: 'company_branches[fax_number]',
          placeholder: 'Company Fax Number'
        }
      },
      errorList: {}
    }
  },
  methods: {
    register(){
      this.APIFormRequest('company/create', this.form).then(response => {
        console.log(response.data)
      })
    },
    redirect(){
      ROUTER.push('/')
    }
  }
}
</script>
</style>
