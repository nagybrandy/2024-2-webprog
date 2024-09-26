let grades = [22, 13, 26, 27, 28, 30, 30, 25, 17, 18, 21, 21, 25, 26]
const t1 = document.querySelector('#f1-1')
const t2 = document.querySelector('#f1-2')
const t3 = document.querySelector('#f1-3')

t1.innerHTML += grades.filter(e => e > 24).length
t2.innerHTML += grades.reduce((p,c) =>  p + c, 0)/grades.length
t3.innerHTML += grades.some(e => e < 10) ? " Yes, there is" : " No, there isn't"

const rowInput = document.querySelector('#rows')
const colInput = document.querySelector('#cols')
const button = document.querySelector('button')
const table = document.querySelector('table')
const output = document.querySelector('#output')

let nums = {
    num1: null,
    num2: null, 
}
function colorCell(e){
    console.log(e)
    console.log(e.target, this)
    if(e.target.matches('td')) {
        if(!nums.num1) {
            nums.num1 = parseInt(e.target.innerHTML)
        } else if (!nums.num2) {
            nums.num2 = parseInt(e.target.innerHTML)
            console.log(nums)
            output.innerHTML = `${nums.num1} * ${nums.num2} = ${nums.num1*nums.num2}` 
        } else if(nums.num2 && nums.num1)  {
            nums.num1 = parseInt(e.target.innerHTML)
            nums.num2 = null
            output.innerHTML = ''
            table.querySelectorAll('td').forEach(e => e.style.backgroundColor = 'unset')
        }
        e.target.style.backgroundColor = 'lightblue'

    }

}
// delegation, bubbling
table.addEventListener('click', colorCell)

button.addEventListener('click', ()=> {
    table.innerHTML = ''
    const rowNum = parseInt(rowInput.value)
    const colNum = parseInt(colInput.value)

    for (let i = 0; i < rowNum; i++) {
       const row = document.createElement('tr')
       for (let j = i*colNum; j < (i+1)*colNum; j++) {
            const td = document.createElement('td')
            td.innerHTML = j+1
            // td.addEventListener('click', colorCell)
            row.append(td)
       }
       table.append(row)
    }
})