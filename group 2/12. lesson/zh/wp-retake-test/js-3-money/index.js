const amountSpan = document.querySelector("#amount");
const banknoteContainer = document.querySelector("#banknotes");
const table = document.querySelector("tbody");
const select = document.querySelector("select");
const transferButton = document.querySelector("button");

console.log(people);

banknoteContainer.addEventListener("click", (e)=> {
    if(e.target.matches('img')){
        amountSpan.innerHTML = parseInt(amountSpan.innerHTML) + parseInt(e.target.dataset.value)
    }
})

const trs = table.querySelectorAll('tr')
trs.forEach(e => e.innerHTML = "")

people.forEach((winner, index) => {
    const option = document.createElement('option')
    option.innerHTML = winner.name
    option.value = index
    select.append(option)

    Object.keys(winner).forEach((e,i) => {
        const td = document.createElement('td')
        if(e === "photo") {
            const img = document.createElement('img')
            img.src = `img/${winner[e]}`
            img.dataset.index = index
            td.append(img)
            trs[i].append(td)
        } else {
            td.innerHTML = winner[e]
            td.dataset.max = winner.to_pay
            trs[i].append(td)
        }
    })

})

transferButton.addEventListener('click', ()=> {
    const moneyTo = select.value
    const amount = parseInt(amountSpan.innerHTML)
    let baseMoney = trs[2].querySelectorAll('td')[moneyTo]
    let maxMoney = parseInt(baseMoney.dataset.max)
    baseMoney.innerHTML = parseInt(baseMoney.innerHTML) + amount
    if(parseInt(baseMoney.innerHTML) + amount > maxMoney) {
        baseMoney.classList.add('overpaid')
    }
    amountSpan.innerHTML = 0
})


table.addEventListener('click', (e)=> {
    if (e.target.matches("img")) {
        console.log(e.target.dataset.index)
        select.value = e.target.dataset.index
    }
})