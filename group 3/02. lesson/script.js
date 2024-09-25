// Task 1
const button1 = document.querySelector('div#task1 button')
const input1 = document.querySelector('div#task1 input')
const text1 = document.querySelector('#helloText')

button1.addEventListener('click', task1)

function task1(){
    text1.innerHTML = `Hello ${input1.value}!`
}
// Task 2
const div2 = document.querySelector('#task2')
const button2 = div2.querySelector('button')
const input2 = div2.querySelector('input')
const helloDiv = div2.querySelector('div')

button2.addEventListener('click', () => {
    let num = parseInt(input2.value)
    for (let i = 0; i < num; i++) {
        const h3 = document.createElement('h3')
        h3.innerHTML = "Hello World!"
        h3.style.fontSize = `${(i+1)*10}px`
        helloDiv.append(h3)
        //prepend
        //helloDiv.innerHTML += `<h3 style='font-size: ${(i+1)*10}px'>Hello World!</h3>`
    }
})

// Task 3
const button3 = document.querySelector('div#task3 button')
const input3 = document.querySelector('div#task3 input')
const text3 = document.querySelector('#circleResult')

button3.addEventListener('click', ()=> {
    text3.innerHTML = input3.value * 2 * Math.PI
})
// Task 4
const allLinks = document.querySelectorAll('div#task4 a')
const hyperlinksList = document.querySelector('#hyperlinksList')

allLinks.forEach(e => {
    const li = document.createElement('li')
    li.innerHTML = e.href
    hyperlinksList.append(li)
})
// Task 5

// Task 6
const children = [
    { name: "Anna", class: "3/A", age: 8 },
    { name: "Bence", class: "4/B", age: 9 },
    { name: "Cecilia", class: "2/C", age: 7 },
    { name: "David", class: "5/D", age: 10 },
    { name: "Emma", class: "1/E", age: 6 }
];
const table6 = document.querySelector('#task6 table')
const inputs = document.querySelectorAll('#task6 input')
const button6 = document.querySelector('#task6 button')

button6.addEventListener('click', ()=> {
    const values = [...inputs].map(e => e.value)
    addNewChild(values)
})
// we want to create a new row to the table for each children
children.forEach(child => addNewChild(child))

function addNewChild(child){
    //creating the new row
    const tr = document.createElement('tr')

    Object.values(child).forEach(data_of_child => {
        // creating a new cell for the new row
        const cell = document.createElement('td')
        // adding the child's name to the new cell
        cell.innerHTML = data_of_child
        // adding the cell to the row
        tr.append(cell)
    })

    // adding the row to the big table
    table6.append(tr)
}
// Task 7
const booksList = [
    {
        author: "J.K. Rowling",
        title: "Harry Potter and the Philosopher's Stone",
        publicationYear: 1997,
        publisher: "Bloomsbury",
        isbn: "978-0747532743"
    },
    {
        author: "George Orwell",
        title: "1984",
        publicationYear: 1949,
        publisher: "Secker & Warburg",
        isbn: "978-0451524935"
    },
    {
        author: "Harper Lee",
        title: "To Kill a Mockingbird",
        publicationYear: 1960,
        publisher: "J. B. Lippincott & Co.",
        isbn: "978-0061120084"
    },
    {
        author: "F. Scott Fitzgerald",
        title: "The Great Gatsby",
        publicationYear: 1925,
        publisher: "Charles Scribner's Sons",
        isbn: "978-0743273565"
    },
    {
        author: "Leo Tolstoy",
        title: "War and Peace",
        publicationYear: 1869,
        publisher: "The Russian Messenger",
        isbn: "No ISBN"
    }
];

// Task 8

// Task 9

// Task 10

document.querySelectorAll("ul li a").forEach(function(link) {
    link.addEventListener("click", function(e) {
        e.preventDefault(); // Prevent the page from jumping to the link on click
        const targetId = this.getAttribute("href").substring(1); // Get the value of the "href" attribute without the "#" symbol
        const tasks = document.querySelectorAll(".task");
        tasks.forEach(function(task) {
            if (task.id === targetId) {
                task.classList.add("current");
            } else {
                task.classList.remove("current");
            }
        });
    });
});
