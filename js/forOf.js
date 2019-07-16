for (let letra of "Cod3r") {
    console.log(letra)
}
//C 
//o 
//d
//3
//r

const assuntosEcma = ['Map', 'Set', 'Promise']
for (let i in assuntosEcma){
    console.log(i)
    // 0 \n 1 \n 2
}

for (let assunto of assuntosEcma) {
    console.log(assunto)
    // Map \n Set \n Promise
}

const assuntosMap = new Map[(
    ['Map', {abordado: true}],
    ['Set', {abordado: true}],
    ['Promise', {abordado: false}]
)]

for (let assunto of assuntosMap) {
    console.log(assunto)
    // ['Map', {abordado: true}], etc
}

for (let chave of assuntosMap.keys()){
    console.log(chave)
    //Map \n Set \n Promise
}

for (let valor of assuntosMap.values()){
    console.log(valor)
    // { abordado: true }, etc
}

for (let [ch, vl] of assuntosMap.entries()){
    console.log(ch, vl)
    //Map {abordado: true} \n Set {abordado: true} \n 
    //Promise {abordado: false}
}

const s = new Set(['a', 'b', 'c'])
for (let letra of s){
    console.log(letra)
    //a \n b \n c
}