// SELECTORS
const menuDiv = document.querySelector('#menu')
const playScreenDiv = document.querySelector('#playScreen')
playScreenDiv.style.display = 'block'
menuDiv.style.display = 'none'

// menu selectors
const startBtn = menuDiv.querySelector('button#start')
const nameInput = menuDiv.querySelector('input[type=text]')
const numberInput = menuDiv.querySelector('input[type=number]')


// playerscreen selectors
const backtoMenuBtn = playScreenDiv.querySelector('button')
const table = playScreenDiv.querySelector('table')
const colorInput = playScreenDiv.querySelector('input')

// EVENT HANDLERS
nameInput.addEventListener('input', (e)=> {
    console.log(e.target.value !== '')
    if(e.target.value !== '') {
        startBtn.disabled = false
    } else {
        startBtn.disabled = true
    }
})

startBtn.addEventListener('click', startGame)

backtoMenuBtn.addEventListener('click', ()=> {
    menuDiv.style.display = 'block';
    playScreenDiv.style.display = 'none'
})

table.addEventListener('click', (e)=> {
    if(e.target.matches('td')){
        if(e.ctrlKey) {
            e.target.style.backgroundColor = 'unset'
        } else {
            e.target.style.backgroundColor = colorInput.value
        }
    }
})
// HELPER FUNCTIONS

function startGame(){
    menuDiv.style.display = 'none';
    playScreenDiv.style.display = 'block'
    createNewTable(numberInput.value !== '' ? numberInput.value : 7)
    document.querySelector('#playScreen h1').innerHTML = "PixelArt - Player: " + (!nameInput.value ? "Anonymus" : nameInput.value)
}

function createNewTable(num){
    table.innerHTML = ''
    for (let i = 0; i < num; i++) {
        const row = document.createElement('tr')
        for (let j = 0; j < num; j++) {
            const cell = document.createElement('td')
            row.append(cell)
        }
        table.append(row)
    }
}

startGame()



