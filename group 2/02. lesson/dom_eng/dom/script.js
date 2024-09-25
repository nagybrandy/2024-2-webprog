// Task 1
const button1 = document.querySelector('div#task1 button')
const input1 = document.querySelector('div#task1 input')
const text1 = document.querySelector('#helloText')

button1.addEventListener('click', task1)

function task1(){
    console.log('hello!!!')
    console.log(input1) 
    text1.innerHTML = `Hello ${input1.value}!`
}
// backtick
const task2div = document.querySelector('div#task2')
const button2 = task2div.querySelector('button')
const input2 = task2div.querySelector('input')
const div2 = task2div.querySelector('#helloRepeats')

button2.addEventListener('click', () => {
    div2.innerHTML = ""
    let num = parseInt(input2.value)
    for (let i = 0; i < num; i++) {
        let newH = document.createElement('h3')
        newH.innerHTML = 'Hello World!'
        // font-size -> fontSize
        newH.style.fontSize = `${(i+1)*10}px`
        div2.append(newH)
        // prepend 
    }
})

// Task 3
const button3 = document.querySelector('div#task3 button');
const input3 = document.querySelector('div#task3 input');
const text3 = document.querySelector('#circleResult');
button3.addEventListener('click', () => {
    let P = 2* Math.PI* input3.value
    text3.innerHTML = `Perimeter of your circle is: ${P}`
})
// Task 4
 
const text4 = document.querySelector('#hyperlinksList');

document.querySelectorAll('a').forEach(element =>{
    let newL = document.createElement('li');
    newL.innerHTML = element
    text4.append(newL)
})





// Task 2


// Task 3

// Task 4

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
const button6 = document.querySelector('div#task6 button');
const inputs6 = document.querySelectorAll('div#task6 input')

const addNewMember = (child) => {
    const tr = document.createElement('tr')
    Object.values(child).forEach(tablecell => {
        const td1 = document.createElement('td')
        td1.innerHTML = tablecell
        tr.append(td1)
    })
    table6.append(tr)
}

button6.addEventListener('click', () => {
    let values = [...inputs6].map(e=> e.value)
    addNewMember(values)
})
children.forEach(child => addNewMember(child))


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
