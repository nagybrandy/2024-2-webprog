const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

ctx.fillStyle = 'green'
ctx.fillRect(10,20,50,30)

ctx.fillStyle = '#336699'
ctx.strokeStyle = 'lightblue'
ctx.lineWidth = 10
ctx.beginPath()
ctx.moveTo(100,100)
ctx.lineTo(500,250)
ctx.lineTo(200,250)
ctx.closePath()
ctx.fill()
ctx.stroke()

ctx.beginPath()
ctx.arc(30,300,20,0,Math.PI*2)
ctx.fill()
ctx.stroke()