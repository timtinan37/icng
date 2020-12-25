
new Vue({
  el: '#transportation',
  data: {
    checkedTransits: [],
    carriageOptions: [],
  },
  methods: {
    getCarriages(){
      var carriageOptions = this.carriageOptions
      this.checkedTransits.forEach(function (element) {
        axios.get(`/transits/${element}`, {params: {'ajax': 1}})
             .then(function (response) {
               carriageOptions.push({'name': response.data.name, 'id': response.data.id})
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
