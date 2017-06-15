<template>
  <div>
    <table-filter></table-filter>
    <table class="table">
      <thead>
        <tr>
          <th>Column 1</th>
          <th>Column 2</th>
          <th>Column 3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><div>Val 1</div></td>
          <td>Val 2</td>
          <td>Val 3</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
  export default{
    components: {
      'table-filter': require('./Filter.vue')
    },
    create(){

    },
    mounted(){

    },
    data(){
      return {

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
