require('../bootstrap');

Vue.component('transportation', {
  props: ['carriageOptions'],
  created: function () {
    this.$emit('init-transits')
    this.$emit('init-carriage')
  },
  template: '<span></span>'
})

new Vue({
  el: '#transportation',
  data: {
    checkedTransits: [],
    carriageOptions: [],
  },
  methods: {
    initTransits(checkedTransits){
      this.checkedTransits = checkedTransits
    },
    getCarriages(){
      var vm = this
      this.checkedTransits.forEach(function (element) {
          axios.get(`/transits/${element}?ajax=1`)
            .then(response => {
              vm.carriageOptions.push({name: response.data.name, id: response.data.id})
            })
      })
    }
  },
  created: function () {
      this.debouncedGetCarriages = _.throttle(this.getCarriages, 500)
  },
  watch: {
    checkedTransits(newCheckedTransits, oldCheckedTransits) {
      this.carriageOptions = []
      this.debouncedGetCarriages()
    }
  }
})
