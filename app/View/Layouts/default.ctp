<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php
    echo $this->Html->charset();
    echo $this->Html->script('https://code.jquery.com/jquery-3.3.1.js');
    echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    ?>
	<title>
        Simple BitCake App
	</title>
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

    <style>
        dd{
            margin-top: -13px !important;
        }
        input[type=submit], .actions ul li a, .actions a{
            background: lightgrey !important;
            font-weight: bold;
            font-size: 13px;
        }
        a{
            text-decoration: none !important;
            color: white;
        }





    </style>

</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo '<span style="font-size:15px;">BitCake App</span>' ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content');


            ?>
		</div>
		<div id="footer">
            <center>&copy;2018 RUSU FLORIN</center>
		</div>
	</div>
</body>
</html>
