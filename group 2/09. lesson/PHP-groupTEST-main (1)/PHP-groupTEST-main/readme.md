# PHP GROUP TEST
```
<Student's Name>
<Neptun code>
Web Programming - PHP Group Test
This solution was submitted and prepared by the aforementioned student
for the Web Programming course's PHP Group Test.
I declare that this solution is my own work. I have not copied or used third-party solutions.
I have not shared this solution with fellow students, nor have I made it public.
The Regulations of the Student Requirements System of Eötvös Loránd University (ELTE Organizational and Operational Regulations, Volume II, Section 74/C.) state that as long as a student presents the work of another student - or at least a significant part of it - as their own work, it constitutes a disciplinary offense. The most serious consequence of this offense is dismissal from the university.

```

## Description
The task is to create the server-side code for the rudimentary record-keeping page intended for the Cheeseology Department. The initial files and their functionalities are as follows:
- index.php: Displays cheeses listed, with cheeses older than 24 months receiving the "old" style class.
- addcheese.php: Allows adding a new cheese, where validation occurs; the data is stored in cheese_stock.json.
- cheese_stock.json: Stores cheese names, types, places of origin, and age in months.

For the simplest solution, PHP is the only necessary language to use. However, you can extend to other languages if necessary.

## Preparations
1. Download the initial files from GitHub.
2. Enhance the README.md file.

## Tasks

### <span style="color:green">index.php</span>
|Number|Task|Points|
|----|----|----|
| 1. | The base of the table is ready; display the data dynamically by reading it from the JSON, then remove the placeholders. Display the country of origin image in the respective column; these images can be found in the img folder.  | <span style="color:red"> 2 points </span>|
| 2. | Add the ".old" class to cheese rows that are older than 24 months! |<span style="color:red"> 1 point </span>|

### <span style="color:green">addcheese.php</span>
|Number|Task|Points|
|----|----|----|
| 1.| Check the attributes of the inputs in the form; these will help in retrieving the entered data in isvalid.php through the request.  ||
| 2. | You can see the possible error messages; use their texts. Beneath the error messages, there are links to assist in validation. ||
| | a. Accept the name only if it exists and is at least 4 characters long without spaces at the beginning or end! | <span style="color:red"> 1 point </span>|
|  | b. Validate the type using this regular expression:`/^[a-zA-Z\s]/` |<span style="color:red"> 1 point </span>|
|  | c. Validate the months as an integer using the filter_var function! |<span style="color:red"> 1 point </span>||
| 3. | Assign the origin country to the 'origin' key, then append the new data to cheese_stock.json! | <span style="color:red"> 2 points </span>|
| 4. | Depending on whether there is an error in validation, display the appropriate sections on the page! |<span style="color:red"> 1 point </span>|
| 5. | Preserve the form's state except for the dropdown field! |<span style="color:red"> 1 point </span>|

