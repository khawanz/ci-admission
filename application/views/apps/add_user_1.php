<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » add-user
</div>     
<div class='menu-div'>
    <a href='<?php echo base_url(); ?>users'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Add</div></a>
</div>

<div id='container'>           
                  
            <div id='content-container'>
<!--                    <div id='section-navigation'>
                            <ul>
                                  
                            </ul>
                    </div>-->
                    <div id='content'>
                        <?php echo validation_errors();?>
                        
                        <?php 
                        $attributes = array('class' => 'register');
                        echo form_open('users/step1',$attributes) ?>

                            <h1>Add User</h1>
                            <fieldset class="row1">
                                <legend>Account Details
                                </legend>
                                <p>
                                    <label>Username *
                                    </label>
                                    <input type="text" name="username"/>
                                </p>
                                <p>
                                    <label>Email *
                                    </label>
                                    <input type="text" name="email"/>                                  
                                </p>
                                <p>
                                    <label>Password *
                                    </label>
                                    <input type="password" name="password"/>
                                    <label>Repeat Password*
                                    </label>
                                    <input type="password" name="passconf"/>  
                                    <label class="obinfo">* obligatory fields
                                    </label>
                                </p>
                                <p>
                                    <label>Roles *
                                    </label>
                                    <?php 
                                        foreach($roles as $role):?>
                                           <p class="role">
                                            <?php
                                            $x = 1;
                                                if($role['name'] == 'authenticated user'){
                                                    echo form_checkbox("roles[$role[rid]]",$role['name'], TRUE); 
                                                    echo $role['name'];
                                                }
                                                else if($role['name'] != 'anonymous user'){
                                                    echo form_checkbox("roles[$role[rid]]",$role['name']); 
                                                    echo $role['name'];
                                                }
                                                
                                                ?>
                                           </p>
                                   <?php
                                        endforeach;
                                    ?>
                                </p>
                                
                            </fieldset>
                           
                            <div><input type="submit" value="Next" class="button"></div>
                        </form>
                            
                        
                    </div>
<!--                    <div id='aside'>
                            
                    </div>-->
                   
            </div>
        </div>
    
		<!--loading jQuery and other library-->
		<script type='text/javascript' src='http://code.jquery.com/jquery-1.10.1.min.js'></script>
		<script type='text/javascript' src='http://code.jquery.com/ui/1.10.3/jquery-ui.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/jquery-ui-timepicker-addon.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/jquery-ui-sliderAccess.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>/assets/javascript/script.js'></script>
