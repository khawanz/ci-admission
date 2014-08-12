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
                          
                            <h4>Login</h4>
                            <?php echo validation_errors(); ?>

                            <?php echo form_open('login') ?>

                            <input type="text" name="username" size="15" placeholder="Username"><br/>
                            <input type="password" name="password" size="15" placeholder="Password"><br/>                      
                            <div id="captcha"> 
                                <?php    echo $cap['image'];?><br/> 
                                What code?
                                <input type="text" name="captcha" size="10">
                            </div>
                            <input type="button" class="button" value="Login">
                            
                            <div><a href="<?php echo base_url().'users/register';?>">Register?</a></div>
                         <?php echo form_close();?>

                        
                    </div>
                
                <div id="main-content">
                    <h2>Jadwal Ujian</h2>
                           <table class="bordered">
                            <thead>

                            <tr>
                                <th>NO</th>        
                                <th>GEL</th>
                                <th>TGL USM</th>
                                <th>JAM</th>
                                <th>TEMPAT</th>
                                <th>KOTA</th>
                                
                            </tr>
                            </thead>
                            <?php 
                             $no = 1;
                             for($i=0;$i<5;$i++){
                                 $tanggal = date('d M Y', strtotime('now'));
                                 $gel = $no+2;
                                 echo "<tr>
                                        <td>$no</td>        
                                        <td>$gel</td>
                                        <td>$tanggal</td>
                                        <td>00.05 sd 02.00</td>
                                        <td>SMU 5</td>  
                                        <td>Jakarta</td>"; 
                          
                                $no++;
                              } 
                          ?> 
                           </table><br/>
                </div>
                    
<!--                    <div id="aside">
                           
                    </div>                  -->
            </div>
        </div>
    </body>
</html>
