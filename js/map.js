const tecnologias = new Map()
tecnologias.set('react', {framework: false})
tecnologias.set('angular', {framework: true})

console.log(tecnologias.react) // undefined
console.log(tecnologias.get('react')) // { framework: false }
console.log(tecnologias.get('react').framework) // false

const chavesVariadas = new Map([
    [function () { }, 'Fun��o'],
    [{}, 'Objeto'],
    [123, 'N�mero'],
])

chavesVariadas.forEach((vl, ch) =>{
    console.log(ch, vl) 
    // [Function] 'Fun��o'
    // {} 'Objeto'
    //123 'N�mero'
})

console.log(chavesVariadas.has(123)) //true
chavesVariadas.delete(123) //tamb�m retorna t ou f
console.log(chavesVariadas.has(123))//false
console.log(chavesVariadas.size) //2 (2 elementos contidos)

chavesVariadas.set(123, 'a')
chavesVariadas.set(123, 'b')
chavesVariadas.set(456, 'b')
console.log(chavesVariadas)
//Map { [Function] => 'Fun��o', {} => 'Objeto', 123 => 'b', 456 => 'b' }

