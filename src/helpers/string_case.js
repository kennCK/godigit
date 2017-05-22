import Vue from 'vue'

Vue.mixin({
  methods: {
    StringToCamelCase(){
    },
    StringToUnderscoreCase(string){
      return string.toLowerCase().replace(/ /g, '_')
    }
  }
})
