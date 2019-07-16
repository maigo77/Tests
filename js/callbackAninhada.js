// Promises são mais interessantes que callback em algumas
// situações (como essa abaixo)

const http = require('http')

const getTurma = (letra, callback) => {
    const url = `http://files.cod3r.com.br/curso-js/turma${letra}.json`
    http.get(url, res => {
        let resultado = ''

        res.on('data', dados => {
            resultado += dados
        })

        res.on('end', () =>{
            callback(JSON.parse(resultado))
        })
    })
}

let nomes = []
getTurma('A', alunos => {
    //console.log(alunos)
    // Retorna todos os elementos para um array
    // http://files.cod3r.com.br/curso-js/turmaA.json
    nomes = nomes.concat(alunos.map(a => `A: ${a.nome}`))
    //console.log(nomes)
    // Lista todos os nomes vindo da turmaA
    getTurma('B', alunos => {
        nomes = nomes.concat(alunos.map(a => `B: ${a.nome}`))
       // console.log(nomes)
        // Lista todos os nomes vindo da turmaA e turmaB
        getTurma('C', alunos => {
            nomes = nomes.concat(alunos.map(a => `C: ${a.nome}`))
            console.log(nomes)
            // Lista todos os nomes vindo da turmaA, turmaB e turmaC
        })
    })
})