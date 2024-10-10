// ==== GAME VARIABLES ====
let timer = 0;

// ==== SELECTORS ====
const menuDiv = document.querySelector('#menu')
const playDiv = document.querySelector('#playScreen')
menuDiv.style.display = 'block';
playDiv.style.display = 'none'

// menu selectors
const nameInput = menuDiv.querySelector('input[type=text]')
const numberInput = menuDiv.querySelector('input[type=number]')
const startBtn = menuDiv.querySelector('button.btn-primary')
const gameRulesBtn = menuDiv.querySelector('button.btn-link')
const rules = menuDiv.querySelector('#rules')
startBtn.disabled = true
rules.style.display = 'none'

// playscreen selectors
const colorInput = playDiv.querySelector('input')
const table = playDiv.querySelector('table')
const timerSpan = playDiv.querySelector('span')
const backToTheMenuBtn = playDiv.querySelector('button')

// ==== EVENT HANDLERS ====

nameInput.addEventListener('input', (e) => {
    startBtn.disabled = e.target.value === ''
})

startBtn.addEventListener('click', startGame)

gameRulesBtn.addEventListener('click', () => {
    rules.style.display = rules.style.display == 'block' ? 'none' : 'block'
})

backToTheMenuBtn.addEventListener('click', () => {
    menuDiv.style.display = 'block';
    playDiv.style.display = 'none'
})

table.addEventListener('click', (e) => {
    if (e.target.matches('td')) {
            e.target.style.backgroundColor = e.ctrlKey ? 'unset' : colorInput.value
    }
})
// ==== HELPER FUNCTIONS ====

function createTable(num){
    table.innerHTML = ''
    for (let i = 0; i < num; i++) {
        const tr = document.createElement('tr')
        for (let j = 0; j < num; j++) {
           const td = document.createElement('td')
           tr.append(td)
        }
        table.append(tr)
    }
}

function startGame() {
    menuDiv.style.display = 'none';
    playDiv.style.display = 'block';
    playDiv.querySelector('h1').innerHTML = `PixelArt - ${nameInput.value}`
    createTable(numberInput.value)
    setInterval(()=> {
        timer++;
        timerSpan.innerHTML = `Timer: ${timer} seconds`
    }, 1000)
}