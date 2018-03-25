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


### End Credits



## License and Copyright
© Rusu Florin Alexandru, 2018
