// n�o aceita repeti��o/n�o indexada
const times = new Set()
times.add('Vasco')
times.add('S�o Paulo').add('Palmeiras').add('Corinthians')
times.add('Flamengo')
times.add('Vasco') //� ignorado pois � uma repeti��o

console.log(times)
//Set { 'Vasco', 'S�o Paulo', 'Palmeiras', 'Corinthians', 'Flamengo' }
console.log(times.size) // 5
console.log(times.has('vasco')) // false
console.log(times.has('Vasco')) // true
times.delete('Flamengo')
console.log(time.has('Flamengo')) // false

const nomes = ['Raquel', 'Lucas', 'Julia', 'Lucas']
const nomesSet = new Set(nomes)
console.log(nomesSet)
// Set { 'Raquel', 'Lucas', 'Julia' }