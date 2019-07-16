function falarDepoisDe(segundos, frase){
    return new Promise((resolve, reject) => {
        setTimeOut(() =>{
            //reject(frase)
            resolve(frase)
        }, segundos * 1000)
    })
}

falarDepoisDe(3, 'Que legal!')
    .then(frase => frase.concat('?!?'))
    .then(outraFrase => console.log(outraFrase))
    //.catch(e => console.log(e)) //Que legal!

//Após 3 segundos gera-se Que legal!?!?