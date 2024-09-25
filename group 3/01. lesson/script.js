console.log("Hello World!")

if(true) {

}

// 5! => 5*4*3*2*1 -> 120
function fact(num) {
    // for loops
    // recursively
    if(num == 0) return 1
    return fact(num-1) * num
}

console.log(fact(5))