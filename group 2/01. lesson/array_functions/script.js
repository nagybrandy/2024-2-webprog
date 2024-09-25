let shapes = ["circle", "rect", "rect", "circle", "circle", "rect", "circle", "circle", "rect"];
let originalDiv = document.querySelector("#original");
let t1div = document.querySelector("#t1");
let t2div = document.querySelector("#t2");
let t3div = document.querySelector("#t3");
let t4div = document.querySelector("#t4");
let t5div = document.querySelector("#t5");
let t6div = document.querySelector("#t6");
let t7div = document.querySelector("#t7");
let t8div = document.querySelector("#t8");

// Original
draw(shapes, originalDiv);

// 1. Make every element of the original array a circle!
let task1 = shapes.map(() => "circle");

/* function first(e){
    console.log(e == "circle")
    return "circle"
}  */
draw(task1, t1div);

shapes.indexOf
// 2. What is the sum of this array? [1,2,3,4,5]
t2div.innerHTML =  [1, 2, 3, 4, 5].reduce((p, c) => p + c);

// 3. Keep only the squares!
let task3 = [];

// 4. Where is the first square located?
let task4;

// 5. Do we have a square in the array?
let task5;

// 6. Are all elements circles?
let task6; 

// 7. How many squares and circles are there?
let task7;

// 8. Starting from the third element, make every element a circle!
let task8 = [];

function draw(array, div) { // Draws the array and where to display it
    for (let i = 0; i < array.length; i++) {
        var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        let svgNS = svg.namespaceURI;
        svg.setAttribute('width', 60);
        svg.setAttribute('height', 60);
        var shape = document.createElementNS(svgNS, array[i]);
        if (array[i] == "rect") {
            shape.setAttribute('width', 60);
            shape.setAttribute('height', 60);
            shape.setAttribute('fill', '#fcba03');
        } else {
            shape.setAttribute('cx', 30);
            shape.setAttribute('cy', 30);
            shape.setAttribute('r', 30);
            shape.setAttribute('fill', '#034701');
        }
       
        svg.appendChild(shape);
        div.appendChild(svg);
    }
}
