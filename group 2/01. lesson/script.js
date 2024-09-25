console.log("Hello");

let variable = 5;
let string = "Hello";
let empty = null || undefined;

if(true) {
    console.log("Hello");
} else {
    console.log("Hello");
}

// 5! -> 5*4*3*2*1
function fact(num){
    if(num == 0) return 1
    return num * fact(--num) 
}

console.log(fact(5))