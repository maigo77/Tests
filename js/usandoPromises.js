// Refatorando 'callbackAninhada.js' com promise

const http = require('http')

const getTurma = letra => {
    const url = `http://files.cod3r.com.br/curso-js/turma${letra}.json`
    return new Promise((resolve, reject => {
            http.get(url, res => {
            let resultado = ''

            res.on('data', dados => {
                resultado += dados
            })

            res.on('end', () =>{
                try{
                    resolve(JSON.parse(resultado))
                } catch(e){
                    reject(e)
                }
            })
        })
    }))
}

/*
let nomes = []
getTurma('A').then(alunos => {   
    nomes = nomes.concat(alunos.map(a => `A: ${a.nome}`))
    getTurma('B').then(alunos => {
        nomes = nomes.concat(alunos.map(a => `B: ${a.nome}`))   
        getTurma('C').then(alunos => {
            nomes = nomes.concat(alunos.map(a => `C: ${a.nome}`))
            console.log(nomes)
           // Lista todos os nomes vindo da turmaA, turmaB e turmaC
        })
    })
})
*/

Promise.all([getTurma('A'), getTurma('B'), getTurma('C')])
    .then(x => console.log(x))
    // Foi recebido um array, que dentro possui um array para cada turma
    .then(turmas => [].concat(...turmas))
    // Um único array com todos os elementos
    .then(alunos => alunos.map(aluno => aluno.nome))
    .then(nomes => console.log(nomes))
    // Lista todos os nomes vindo da turmaA, turmaB e turmaC
    .catch(e => console.log(e.message))

getTurma('D').catch(e => console.log(e.message))
// Unexpected token < in JSON at position 0