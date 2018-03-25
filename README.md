# BITCAKE CAKEPHP2 Documentation
**Version 0.1**

## Table of Contents
- About
- Requirements & Installation
- Database
- MVC
- Other Frameworks
- Algorithm 
- End Credits
##

### About

The project is a simple *Model-View-Controller* framework based on *CAKEPHP2.8* that:
- connects to a mysql database (tables: balls, logs)
- shows pages for the existing tables, amongst: add/edit/view/delete
- resolves a ball group-sorting algorithm
- saves back the groups in the logs table

### Requirements & Installation

- Server used: WAMP 
	- Apache 2.4.23
	- PHP 5.6.25
	- MySQL 5.7.14

- Database integrated via PHPMyAdmin, called "bitcake"
- Browser used: Chrome (but any browser is ok)


### Database
The SQL export is: *bitcake.sql* located in the main dir.
Import it into your prefered SQL database.
To **configure the database connection to the MVC framework**, go to **app/Config/database.php** (rename database.php.default to database.php), under DATABASE_CONFIG, to configure your host, root user and password and database (database should be 'bitcake')

### MVC
- Models: *Bitballs* and *Logs* (located @ app/Model)
	- Creates a datasource link (db<->view)
- Controllers (located @ app/Controllers): 
1. *Bitballs*:
	- index: list of existing Bitball types in the db, link: /bitballs
	- add: create a new Bitball entity, link: /bitballs/add
	- view: view page of an existing Bitball, link: /bitballs/view/X, where X is the bitball PK
	- delete: can delete a specific Bitball entity
2. *Logs*:
	- index: list of existing Log types in the db, link: /logs
	- view: view page of an existing Log entity, link: /logs/view/X, where X is the log PK
	- delete: deletes a selected Log entity
3. *Algorithm*:
	- 2 main pages (algorithm and display)
	- solves a grouping issue with a given number of balls/given ball colors

- Views (located @ app/Views)
	- for Bitballs, Logs and Algorithm
	- shows form input pages 	

### Other frameworks
Frameworks I've used and where:
1. HTML + Bootstrap3 

a. @ app/View/Layout/default.ctp (initialize)
```php
 echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
 echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
```

b. @ app/View/Pages/home.ctp (menu usage)
```html
<div class="container">
    <div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">...
```

c. @ app/View/Algorithm/algorithm.ctp (layout and modal usage)
```html
<div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog modal-lg">
```

d. @ app/View/Algorithm/display.ctp (table usage)
```html
<div class="table-responsive">
                    <table class="table">
                        <thead>
```

2. JQuery 

a. @ app/View/Algorithm/algorithm.ctp (modal init)

b. @ @ app/View/Layout/default.ctp (initialize)
```php
echo $this->Html->script('https://code.jquery.com/jquery-3.3.1.js');
```
3. Javascript 

a. @ app/View/Algorithm/algorithm.ctp (button disabling)
```javascript
<script type="text/javascript">
$(document).ready(function() {
    document.getElementById('Colors').readOnly = true;
    $('#colorModal').prop('disabled', true);
});
........
```
++ but also the getValue() function that grabs all color values from checkboxes from inside the value, at the "Save Changes" button onclick reaction. 
```javascript
function getValue(){

    console.log('Clicked modal submit!');
    var counterChecked = 0;
    var checks = document.getElementsByClassName('checks');
    var str= "";
    var colorLength = <?php echo $counter; ?>;
    for(i=0; i< colorLength; i++){
        if(checks[i].checked === true){
            str += checks[i].value + ", ";
            counterChecked++;
        }


    }
    console.log(str);

    var newstr;
    newstr = str.substring(0, str.length-1);
    //document.getElementById("Colors").placeholder = str;
    document.getElementById("Colors").value = newstr;

}
```

### Algorithm
The main logic is located in the app/Controllers/Algorithm.php file.
Two methods used: **algorithm** and **display**
How they work:

A. Algorithm:
- gets all "Bitball" entities and passes them (along with the count of Bitball entities) in the algorithm view
- this view will show them inside the modal (if the "Select Colors" method is chosen) for them to be passed as POST data to display view
- this view will show the allowed max number to input (on the left side of the form); if the user selects more than the max number, the submit will not work, else the number of Bitballs will be passed as POST data to the display view

B. Display:
- 2 decisional branches here: 
	- in case number is passed:
		- generates an array of random ball colors from the db, via **getRandomBall()** 
		- set the distribution of the Bitballs and saves it inside the initial array, via **setDistribution()**
		- sets a new group array, with the groups of Bitballs available, via **setGroups()**
		- passes the distribution and group array inside the display view via display.ctp
		- saves the total number of Bitballs and the group array(as a string) in the Logs table of the database.
		
	- in case the colors are passed:
		- creates an array from the passed color array and counts the number of colors, powering at 2 for total ball count
		- set the distribution of the Bitballs and saves it in the color array, via **setDistribution()**
		- sets a new group array, with the groups of Bitballs available, via **setGroups()**
		- passes the distribution and group array inside the display view via display.ctp
		- saves the total number of Bitballs and the group array(as a string) in the Logs table of the database.

More in-detail about the display() methods used:

1. **getRandomBall(&$arr, $number)**

 - memory stores the array after it saves it changes
 - $number is the total color count supplied
 - gets all the BitBall entities and saves their colors in an X array
 - array_rands inside the X array a number of $number times
 - saves the resulting array inside the $arr
 
 2. **setDistribution(&$arr, $numberOfColors)**
 
 - gets the total number of BitBalls by empowering by 2 the $numberOfColors variable
 - creates a constructor array that initially has the length of $numberOfColors but it is also populated by 1 (where 1 is an initial ball count value; we're under the pressumption that all colors passed have atleast 1 ball)
 - gets the remaining balls from the difference totalNumberOfBalls - $numberOfColors
 - loops inside the constructor array and, for each value, randomizes a number between 1 and the difference above (totalNumberOfBalls - $numberOfColors), adding it to the initial value (of 1);
 - updates the totalNumberOfBalls by substracting from them the randomly generated number; the loop ends when there are no more totalNumberOfBalls
 - combines the elements of the randomBall array with the values of the contructor Array and saves them back to $arr
 
 3. **setGroups($arr, $numberOfColors)**
 
 - returns a group array
 - initializes an empty group array
 - gets the distribution array and populates the contents of the group array likewise:
 	- if the color value is > $numberOfColors, it will randomize a number between 1 and the $numberOfColors and populates the group array with that color as key and the random number as value; it will also resave the constructor color's value by difference between initial value and random number
	- if the color value is <= $numberOfColors, will place a random number between 1 and the color value in the group array (on the same color value) and will update the constructor by difference	
	- the numbers randomized above will then be added as initial ARRAYS inside the main group array
- evaluates the constructor array to check if there are values of 0 on the keys, if there are, unset the key-value pair
- loops in the main group array, to add the difference of balls by color:
	- everytime it enters a new loop interation, it evaluates the count of elements inside each subarray; if it is 2 or above, it will move to the next iteration directly;
	- if the count is not 2 or above, then:
		- picks a random colorKey and colorValue from within the remaining contructor array
		- if the colorValue is > $numberOfColors, then updates the contructor-array via the colorKey with the difference (colorValue - $numberOfColors), and after set the colorValue as $numberOfColors; if the colorValue is <= $numberOfColors, unset the constructor array via colorKey directly
		- check if the key already exists in the main group:
			- if YES, add the colorValue to the colorKey 
			- if NO, add a new element inside that subarray

### End Credits
Project started on 22.03.2018 with the CAKEPHP framework installation and baking of views/controllers/models.
Algorithm page and front-end page side-projects started on 24.03.2018 and ended on 25.03.2018.

## License and Copyright
© Rusu Florin Alexandru, 2018
