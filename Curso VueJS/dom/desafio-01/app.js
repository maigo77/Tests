new Vue({
  el: '#desafio',
  data: {
    nome: 'Augusto',
    idade: 19,
    src: 'http://files.cod3r.com.br/curso-vue/vue.jpg'
  },
  methods: {
    geraRandomico(){
      return Math.random().toFixed(2)
    }
  }
})