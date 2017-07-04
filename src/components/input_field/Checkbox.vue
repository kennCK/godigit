<template>
  <div>
    <div v-if="form_status !== 'view'" class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"

        v-bind:name="db_name"
        v-bind:value="form_data[db_name] ? form_data[db_name] : defaultValue"
        @change="valueChanged"
        > {{form_data[db_name]}}
      </label>
    </div>
    <span v-else class="">
      <i v-if="form_data[db_name]" class="fa fa-check" aria-hidden="true"></i>
      <i v-else class="fa fa-square-o" aria-hidden="true"></i>
    </span>
  </div>
</template>
<script>
  export default{
    name: '',
    create(){

    },
    mounted(){
      this.defaultValue = this.default_value ? this.default_value : null
    },
    data(){
      return {
        defaultValue: null
      }
    },
    props: {
      input_setting: Object,
      default_value: String,
      db_name: String,
      form_data: Object,
      form_status: String
    },
    methods: {
      valueChanged(e){
        console.log(e)
        console.log($(e.target).is(':checked'))
        $(e.target).val($(e.target).is(':checked'))
        this.$emit('value_changed', e)
      }
    }

  }
</script>
<style scoped>

</style>
