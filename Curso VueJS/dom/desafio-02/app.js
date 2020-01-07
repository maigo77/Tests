new Vue({
    el: '#desafio',
    data: {
        valor: '',
        valor2: ''
    },
    methods: {
        exibeAlerta(){
            alert('Alerta Exibido')
        },
        armazenaValor(event){
            this.valor = event.target.value
        },
        armazenaValorEnter(event){
            this.valor2 = event.target.value
        }
    }
})