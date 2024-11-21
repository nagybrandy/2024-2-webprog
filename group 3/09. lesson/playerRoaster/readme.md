# PHP Group Test

In this task you have football players saved in a json file and you have to create a web app to store all your players in your club, and add one if a new player comes. You store the the following properties for each player:

```json
    {
        "name": "Emanuel Blanc",
        "positions": [
            "Rightback",
            "Midfielder",
            "LeftBack"
        ],
        "goals2024": 6,
        "goals2023": 4,
        "img" : "grunwald.jpg"
    },
```
- name - string
- positions - array, contains 1-3 things
- goals2024 - goals from season 2024
- goals2023 - goals from season 2023
- img - the picture of the player

## index.php
- [x] Read the data from the json file and save it as a variable! - 1 point
- [x] Display all players name, picture on the cards! - 1 point
- [x] We saved the players positions as an array. Display them all as badges! The first position is the main position, so it should have the `badge-primary` class, all the others should get the `badge-outline` class. - 2 points
- [x] Display the player goals from 2024 and count the difference between the players goals from last season. If its less then last season, then just display "Less than last season" if its more, display the exact number of precentages like in the example, if it is the same, display "Same as last season" - 1 point

## addplayer.php
- Check the attributes of the inputs in the form; these will help in retrieving the entered data in isvalid.php through the request.	
- You can see the possible error messages; use their texts. Beneath the error messages, there are links to assist in validation.	
    - [ ] Accept the name only if it exists and is at least 4 characters long without spaces at the beginning or end! - 1 point
    - [ ] Validate the positions using this regular expression:/^([^,]+)(,\s*[^,]+)*$/ . Save the data with splitting the string: https://www.php.net/manual/en/function.explode.php - 1 point
    - [ ] Validate the `goals2024` as an integer using the filter_var function! 1 point
So overall there should be these error messages:
- Enter a name!
- Enter a name that is at least 4 characters long!
- Enter the positions!
- Enter the positions separated with comas!
- Enter the number of goals!
- The number of goals must be integers!
3.	If all the entered values are correct, assign the `goals2023` with the value of '0' to the correct data and the selected image's value as 'img'. Append the new data to `players.json`!	2 points
4.	Depending on whether there is an error in validation, display the appropriate sections on the page!	1 point
5.	Preserve the form's state except for the dropdown field!	1 point