const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

const images = {
    bird: new Image(),
    bg: new Image(),
    col: new Image()
}

let highscores = []
if(localStorage.getItem("score")){
    highscores = JSON.parse(localStorage.getItem("score"))
}
highscores.forEach(e => {
    const div = document.createElement('div')
    div.innerHTML = `${e.name} - ${e.score}`
    document.querySelector('#highscores').append(div)
})
let game = true;
let score = 0;
images.bird.src = 'bird.png'
images.bg.src = 'bg.png'
images.col.src = 'column.png'

const bird = {
    x: 50,
    y: canvas.height/2,
    w: 35,
    h: 35,
    vy: 0,
    ay: 250
}

let columns = {
    space: 150,
    speed: -200,
    elements: []
}

function newColumns(){
    columns.elements = []
    const h1 = random(10, canvas.height/2)
    columns.elements.push({
        w: 30,
        h: h1,
        x: canvas.width-30,
        y: 0
    }, {
        w: 30,
        h: canvas.height-h1-columns.space,
        x: canvas.width-30,
        y: h1+columns.space
    })
}
function random(a, b) {
    return Math.floor(Math.random() * (b - a + 1)) + a;
}

function isColliding(a, b) {
    return !(
        b.y + b.h < a.y ||
        a.x + a.w < b.x ||
        a.y + a.h < b.y ||
        b.x + b.w < a.x
    );
}
function gameOver(){
    ctx.font = '40px Arial'
    ctx.textAlign = 'center'
    ctx.fillText('Game Over!', canvas.width/2, canvas.height/2)
     let name = prompt("Put your name here!")
    let highscore = {
        name,
        score
    }
    highscores.push(highscore)
    localStorage.setItem("score", JSON.stringify(highscores))
    location.reload();
}

function update(dt){
    bird.vy += bird.ay * dt
    bird.y += bird.vy * dt

    columns.elements.forEach(col => {
      col.x += columns.speed * dt
      if(isColliding(col, bird) || bird.y < 0 || bird.y > canvas.height-bird.h) {
        game = false
        gameOver()
      }
    });

    if(columns.elements[0].x < 0){
        newColumns()
        score++;
    }
}

document.addEventListener('keypress', (e)=> {
    e.preventDefault()
    if(e.code = 'Space'){
        bird.vy = -250;
    }
})
function render() {
    ctx.drawImage(images.bg,-2,-5,canvas.width+10, canvas.height+10)
    ctx.drawImage(images.bird, bird.x, bird.y, bird.w, bird.h)

    columns.elements.forEach(col => {
        ctx.drawImage(images.col, col.x, col.y, col.w, col.h)
    });
    ctx.font = '30px Arial'
    ctx.textAlign = 'right'
    ctx.fillText(`Score: ${score}`, canvas.width-10, 30)
}

let lastTime = performance.now()

function step(currentTime = performance.now()){
    if(game) {
        let dt = (currentTime-lastTime) / 1000
        lastTime = currentTime
        if(game) update(dt)
        if(game) render()
    
        requestAnimationFrame(step)
    }
}

newColumns()
step()