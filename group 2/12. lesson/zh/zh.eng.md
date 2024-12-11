# Web Programming Retake Exam

## Important information

- You have **210 minutes** to complete the exam. Filling in the included `README.eng.md` template, reading the tasks, downloading the materials, compressing and uploading your solution is **included** in the time limit.
- Solutions must be uploaded to ELTE Canvas. **The system closes at 19:00 (Hungarian time) and there will be no opportunity to submit your solution after the aforementioned time**.
- You can use your pre-uploaded materials in the Exam System to solve the problems, and the [JavaScript](https://developer.mozilla.org/en-US/) and [PHP documentation](https://www.php.net/) enabled in test mode. **Human assistance** (synchronous, asynchronous, chat, forum, etc.) **and artificial intelligence** (ChatGPT, Bing AI, GitHub Copilot, etc.) **are not allowed during the duration of the exam!** You agree to accept them in the `README.eng.md` file in the starter pack, in which you also acknowledge the possible consequences.
- The tasks are independent and can be solved **in any order**.
- To begin your work you should first [download the starting package we have prepared](???). Each task is stored in a separate library. In each directory we have prepared the HTML, CSS, JavaScript, PHP files. Work in those directories! In the client-side tasks, you usually only need to edit the `.js` file, but you can modify the HTML if you need to, and you can even split your solution into several `.js` files, but this is not expected at all.
- The starting package contains a template called `README.eng.md` where you should fill in your name and Neptun code (the <> characters must be removed). **Submissions without a properly filled `README.eng.md` file will not be graded!**
- Each directory contains a file named `TASKS.md`. Replace the space in `[ ]` with an `x` where you have (even partially) succeeded to complete the task. This will make us easier to find your solution when we grade your exam.
- To install PHP, download the [`PhpComposerInstaller.exe`](???) file and execute it!

## JavaScript tasks

### 1. Tickets (js-1-tickets, 10 points)

On the Hungarian national lottery, you have to match as many of the five numbers drawn from 1 to 90 as possible. The `data.js` file, already embedded in the initial HTML document, defines a `tickets` array containing the numbers played on lottery tickets. Look at the data structure, then use this array to **programmatically** solve the following problems. _(Help: you can read the correct answers from the attached image.)_ Since `index.js` is embedded in the document after the `data.js` script, the latter can use the array in the former without any problems, as shown by the `console.log()` you have entered.

- a. (1 point) In the element identified as `task1`, write the total number of tickets.
- b. (2 points) In the element identified as `task2`, write the number of tickets which contain the number 42.
- c. (2 points) In the element identified as `task3`, write any ticket that does not contain any number greater than 20. (It is assumed that there is at least one such ticket.)
- d. (2 points) In the element identified as `task4`, write the average of all played numbers.
- e. (3 points) In the element identified as `task5`, write the number that has been played most frequently.


### 2. Draw (js-2-draw, 12 points)

Every Saturday night, millions of people are glued to their TV screens watching the lottery draw. Many watch eagerly to see which colored ball will emerge from under the glass bowl. Your task now is to create an animation of a lottery sphere using JavaScript canvas technology!

- a. (1 point) The glass bowl used for the draw is a circle when viewed from the side. Draw this circle in the animation cycle with the center and radius described by the `bowl` object.
- b. (1 point) The filling of the bowl should be slightly transparent grey, and its outline should be thicker than the default setting and colored black.
- c. (1 point) The `ball` object describes a single numbered ball. Draw the ball described in the `ball` object as a yellow circle to the screen.
- d. (1 point) Write the number stored in the `id` property of the object into the drawn ball. (For simplicity, the number does not need to be rotated during the movement of the ball.)
- e. (2 points) Move the ball in the x and y directions at the  `vx` and `vy` velocity stored in the object.
- f. (2 points) Using the `circleCollision` function (parameters are the ball and the bowl object), check if the moving ball collides with the inner wall of the bowl. If a collision is detected, call the `calculateReflection` function (parameter is the ball object), and modify the `vx, vy` velocities of the ball based on the values read from the object returned by the function. With a correct solution, the ball will reflect properly from the edge of the circle.
- g. (2 points) Ensure that not only one ball is in motion, but all balls in the `balls` array move and are drawn correctly.
- h. (2 points) When opening the page, fill the `balls` array with 90 balls, whose `id` property ranges from 1 to 90. Set the initial position of the balls randomly within the bowl, and also give them a random initial velocity. You can use the `random` function provided in the starter package for random number generation.


### 3. Money division (js-3-money, 14 points)

In this task, we need to distribute money among the winners. By clicking on each banknote, you can increase the amount to be paid, and then the amount can be transferred to the selected winner using the appropriate button. The `data.js` file contains the data of the people in a "hardcoded" array. Since the `data.js` script is followed by the `index.js` embedded in the document, the array found in the former can be used in the latter without any particular difficulty, as demonstrated by the entered `console.log()`.

- a. (1 point) When clicking on the banknotes, increase the current value in the `span` element with the ID `amount` by the number found in the `data-value` attribute of the clicked image.
- b. (2 points) Solve the previous task (a.) using delegation, so do not register a separate event handler for each image.
- c. (2 points) When the page loads, generate a table about the people found in the `people` object following the examples given in the starter pack. Each person should have one **column**.
- d. (2 points) Populate the empty dropdown list with the names of the people.
- e. (2 points) When clicking the button, increase the amount paid (`paid`) to the selected person by the amount found in the `amount` element, then reset the value in `amount` to zero.
- f. (2 points) If the paid prize for someone is greater than the amount to be paid (`to_pay`) to that person, apply the `overpaid` style class to the cell indicating the paid amount.
- g. (2 points) Ensure that clicking on a person's picture selects that person in the dropdown list.
- h. (1 point) Solve the previous task (g.) using delegation, so do not register a separate event handler for each picture.


## PHP tasks

### 4. Statistics (php-4-stats, 12 points)

In this task, you have access to the data of the past ten years' five-number national lottery draws in the `data.php` file: the date of the draw, the drawn winning numbers, and the number of hits for each prize category (2, 3, 4 and 5 hits are paid), along with the amounts of money paid for them. If there were no hits in a particular category in a given draw, the amount shown is 0 Ft. _(Tip: for efficient solving of the computational tasks, it is advisable but not mandatory to use PHP array functions such as `array_filter`, `array_map`, `array_sum`, etc.)_

- a. (2 points) Generate a table from the data found in the `$data` associative array with columns as seen in the example.
- b. (2 points) If there were no winners in a particular category in a draw, instead of the `0 (0 Ft)` label, display the text `---`. (Tip: it might be worth to write a reusable solution, e.g. a function, as you will need to use it in several columns.)
- c. (2 points) Change the display of the draw date from the stored `YYYY-mm-dd` format to the Hungarian `YYYY.mm.dd.` format. (Replace the hyphens with dots and add a dot at the end of the date.)
- d. (1 point) If there was a ticket with five hits in a draw, apply the `jackpot` style class to the row describing the draw.
- e. (2 points) In the last row of the table, sum up the total number of hits for each category. (You can merge and/or leave the first two columns empty.)
- f. (3 points) At the top of the page, **programmatically** display the date of the most recent draw with five hits. (If necessary, you can take advantage of the fact that the array is already sorted by date.)


### 5. Registration (php-5-registration, 12 points)

Hooray! You've won the lottery! However, before you can claim your prize, you need to register by providing your personal details. In this task, you are required to create a PHP script to validate the information needed to claim the prize.

- a. (2 points) Filling in the full name, email address, year of birth, and bank account number fields is mandatory.
- b. (1 point) The full name must consist of at least 2 words.
- c. (1 point) The email format must be correct.
- d. (1 point) The year of birth must be an integer.
- e. (1 point) The year of birth must be between 1900 and 2006.
- f. (1 point) The bank account number must consist of exactly 26 characters.
- g. (3 points) The 9th and 18th characters of the bank account number must be a hyphen (`-`), and all other characters must be digits 0-9. (e.g. `12345678-00000000-12345678`)
- h. (1 point) It's mandatory to check the checkbox.
- i. (1 point) Upon successful validation, the `success` element should appear, and the `errors` element should be hidden.


### 6. Log (php-6-log, 12 points)

Many people wonder if it's even worth gambling in the long run. In this task, you need to create a server-side application where we can log our expenses and earnings from various lottery draws. **You don't need to validate the form!** You should store the data in JSON format and be able to read it from there.

- a. (3 points) Using the form at the top of the page, you should be able to create a new record in the log, which includes the date of the draw and the financial change related to that draw. (A negative number indicates a loss on that day.)
- b. (3 points) If we want to record a new entry for a day that already exists in the log, do not add a new record. Instead, modify the existing entry so that the sum of the entered amount and the existing value becomes the new financial change for that day.
- c. (2 points) Below the form, list the days and total amounts found in the file in the format shown in the example.
- d. (2 points) Clicking on the link next to a list item should allow you to delete that day from the log.
- e. (2 points) Ensure that the list items are ordered by date, even if they are not added in that order.
