<template>
  <div>
    <img @click="triggerFileInput" v-bind:src="imageSrc" v-bind:style="imgStyle">
    <input @change="inputFileChanged" ref="fileInput" type="file" style="display:none">
    <small>Click the image to select an image file to upload</small>
  </div>
</template>
<script>
  export default{
    name: '',
    create(){

    },
    mounted(){
      this.initInputSetting()
    },
    data(){
      return {
        imgStyle: {},
        defaultImageSrc: require('../../assets/img/no_image.png'),
        imageSrc: null
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
      initInputSetting(){
        if(typeof this.input_setting !== 'undefined'){
          this.imgStyle = (typeof this.input_setting['image_style'] !== 'undefined') ? this.input_setting['image_style'] : {width: '100%'}
          this.defaultValue = this.default_value ? this.default_value : null
        }else{
          this.imgStyle = {width: '100%'}
        }
        this.imageSrc = this.defaultImageSrc
      },
      triggerFileInput(){
        $(this.$refs.fileInput).trigger('click')
      },
      inputFileChanged(e){
        let input = e.target
        if (input.files && input.files[0]) {
          var reader = new FileReader()
          reader.onload = (e) => {
            this.imageSrc = e.target.result
          }
          reader.readAsDataURL(input.files[0])
        }
      },
      valueChanged(e){
        this.$emit('value_changed', e)
      }
    }

  }
</script>
<style scoped>

</style>
