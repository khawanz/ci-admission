<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/assets/css/mystyle.css">
    </head>
    <body>
        <div id="container">           
            <div id="nonavigation">
                                    
            </div>           
            <div id="content-container">
                    <div id="section-navigation">
                          
                    </div>
                    <div id="login-form">
                        <?php echo validation_errors(); ?>

                        <?php echo form_open('login') ?>
                            
                        <label>Username</label>:<input type="text" name="username" size="15"><br/>
                        <label>Password</label>:<input type="password" name="password" size="15"><br/>                      
                        <div id="captcha"> 
                            <?php    echo $cap['image'];?><br/> 
                            What code is in the image?
                            <input type="text" name="captcha" size="10">
                        </div>
                        <?php echo form_submit('submit', 'Login!');?>
                        <div><a href="<?php echo base_url().'users/register';?>">Register?</a></div>
                     <?php echo form_close();?>
                             
                    </div>
                    <div id="aside">
                           
                    </div>                  
            </div>
        </div>
    </body>
</html>
