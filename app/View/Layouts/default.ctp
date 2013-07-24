<?php
/**
 *
 * PHP 5
 *
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Wayfor | What Are You For?
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		
		echo $this->Html->script('jquery');  
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('application');
	?>
</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50">
  <div id="container-fluid" >
  <!-- Navbar ============================================= -->
  <div class="row-fluid">
  <div class="span10 offset1">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </a>
        <a class="brand" href="./index.html">WAYFOR | What are you for?</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li>
            	<?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'home'), array('class'=>'button')); ?>
            </li>
            <li>
            	<?php echo $this->Html->link('My Widgets', array('controller'=>'widgets', 'action' => 'index'), array('class'=>'button')); ?>
            </li>
            <li class="pull-right">
            <?php echo $this-> element('login_menu'); ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid" style="border: 1px solid #333;">
  	<?php echo $this->Session->flash(); ?>
  </div>
  <div id="row-fluid" >
    <?php echo $content_for_layout; ?>
  </div>
  </div>
  <div class="row-fluid" id="footer">
		
  </div>
  <!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>