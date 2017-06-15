<template>
  <div>
    <modal>
      <div slot="body" class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 align-right">
          {{message}}
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
  export default{
    name: '',
    components: {
      'modal': require('../../components/modal/Modal.vue')
    },
    create(){

    },
    mounted(){

    },
    data(){
      return {
        message: 'Hello nanananna...clap3x'
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
