// não aceita repetição/não indexada
const times = new Set()
times.add('Vasco')
times.add('São Paulo').add('Palmeiras').add('Corinthians')
times.add('Flamengo')
times.add('Vasco') //é ignorado pois é uma repetição

console.log(times)
//Set { 'Vasco', 'São Paulo', 'Palmeiras', 'Corinthians', 'Flamengo' }
console.log(times.size) // 5
console.log(times.has('vasco')) // false
console.log(times.has('Vasco')) // true
times.delete('Flamengo')
console.log(time.has('Flamengo')) // false

const nomes = ['Raquel', 'Lucas', 'Julia', 'Lucas']
const nomesSet = new Set(nomes)
console.log(nomesSet)
// Set { 'Raquel', 'Lucas', 'Julia' }