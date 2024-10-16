const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

ctx.fillStyle = 'green'
ctx.fillRect(10,10,100,50)

ctx.fillStyle='lightblue'
ctx.beginPath();
ctx.strokeStyle = '#00ff00'
ctx.moveTo(300,300)
ctx.lineTo(100,100);
ctx.lineTo(100,350)
ctx.closePath();
ctx.fill()
ctx.stroke();

ctx.beginPath();
ctx.arc(400,200,100,0,Math.PI*2)
ctx.fill()
ctx.stroke()