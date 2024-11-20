const obj = {
    name: "Bendi",
    score: 7
}
localStorage.setItem('group2', JSON.stringify(obj))
console.log(JSON.parse(localStorage.getItem('group2')))
// VARIABLES, STATES
const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')
const images = {
    bird: new Image(),
    column: new Image(),
    bg: new Image(),
}
images.bird.src = 'bird.png'
images.column.src = 'column.png'
images.bg.src = 'bg.png'

let game = true
let score = 0;

const bird = {
    x: 50,
    y: canvas.height / 2,
    w: 30,
    h: 30,
    vy: 0,
    ay: 250
}
let columns = []
const SPACE_BETWEEN = 150;
const COL_VELOCITY = -200;

// EVENTLISTENERS

document.addEventListener('keypress', (e) => {
    if (e.code === 'Space') {
        bird.vy = -200
    }
})
// HELPER FUNCTIONS 
function random(a, b) {
    return Math.floor(Math.random() * (b - a + 1)) + a;
}
function gameOver() {
    game = false;
    console.log("GAME OVER!")
    ctx.textAlign = 'center'
    ctx.drawImage(images.bg, -5, -5, canvas.width + 10, canvas.height + 10)
    ctx.fillText('GAME OVER', canvas.width / 2, canvas.height / 2)
}
function new_Columns() {
    const h = random(10, canvas.height / 2)
    columns.push(
        {
            x: canvas.width,
            y: 0,
            w: 30,
            h: h
        },
        {
            x: canvas.width,
            y: h + SPACE_BETWEEN,
            w: 30,
            h: canvas.height - h - SPACE_BETWEEN,
        }
    )
}

function isColliding(a, b) {
    return !(
        b.y + b.h < a.y ||
        a.x + a.w < b.x ||
        a.y + a.h < b.y ||
        b.x + b.w < a.x
    );
}
// GAME FUNCTIONS
let lastFrameTime = performance.now()

function next(now = performance.now()) {
    if (game) {
        dt = (now - lastFrameTime) / 1000
        update(dt)
        if(game) render()

        lastFrameTime = now
        requestAnimationFrame(next)
    }
}

function update(dt) {
    bird.vy += bird.ay * dt
    bird.y += bird.vy * dt
    columns.forEach(e => {
        e.x += COL_VELOCITY * dt
        if (isColliding(e, bird)) {
            gameOver()
        }
    })

    if (bird.y < 0 || bird.y > canvas.height) {
        gameOver()
    }

    if (columns[0].x < 0) {
        columns = []
        new_Columns();
        score++;
    }
}


function render() {
    ctx.drawImage(images.bg, -5, -5, canvas.width + 10, canvas.height + 10)
    ctx.drawImage(images.bird, bird.x, bird.y, bird.w, bird.h)

    columns.forEach(col => {
        console.log(col, images.column)
        ctx.drawImage(images.column, col.x, col.y, col.w, col.h)
    })
    ctx.font = '30px Arial'
    ctx.textAlign = 'right'
    ctx.fillText(`Score: ${score}`, canvas.width - 5, 30)
}

new_Columns()
next()