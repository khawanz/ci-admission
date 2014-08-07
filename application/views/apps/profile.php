<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » profile
</div>     
<!--<div class='menu-div'>
    <a href='<?php echo base_url(); ?>schedule'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Add</div></a>
</div>-->

<div id='container'>           
                  
            <div id='content-container'>

                    <div id='content'>
                        <?php echo validation_errors();?>
                        
                        <?php 
                        $attributes = array('class' => 'basic-grey');
                        echo form_open('schedule/create',$attributes) ?>
                        <h1>Account
                            <!--<span>Please fill all the texts in the fields.</span>-->
                        </h1>
                        <label>
                            Username : Hadik                          
                        </label><br/>
                         <label>
                            Email : Hadi@yahoo.com                            
                        </label><br/>
                        <label>
                            Status : Aktif                            
                        </label><br/>
                        
                                               
                        <?php echo form_close(); ?>
                            
                        <div id="tabmenu">
                            <ul>
                                <li id="nav-personal"><a href="#" rev="data_personal.php">Pribadi</a></li>
                                <li id="nav-parent" class="onlink"><a href="#"  class="onlink" rev="data_parent.php">Orangtua</a></li>
                                <li id="nav-school"><a href="#" rev="data_school.php">Sekolah</a></li>
                                <li id="nav-mark"><a href="#">Nilai</a></li>
                                <li id="nav-others"><a href="#">Lain-lain</a></li>
                            </ul>
                       </div><br/>
                        <div id="profile-content">
                            
                    </div>
                   
            </div>
        </div>
    
		
    <script src="<?php echo base_url(); ?>/assets/css/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function buka(){                      
                    var dir = $('#tabmenu a').attr('rev');alert(dir);
                    //$("#result").html("<img src='img/ajax-loader.gif'/>");
                     $.ajax({
                        type:"post",
                        url:"<?php echo base_url(); ?>/application/views/apps/"+dir,
                        data:"judul=tes",
                        success:function(data){
                            $("#profile-content").html(data);
                         }
                      });
                                        
                 }

                  $("#nav-personal a").click(function(){
                  	buka();
                  });
                  
                   $("#nav-school a").click(function(){
                  	buka();
                  });
                  
                  $("#nav-parent a").click(function(){
                  	 buka();
                         $("a").removeClass("onlink");
                         $(this).addClass("onlink");
                         $("nav-parent li").addClass("onlink");
                  });

//                  $('#search').keyup(function(e) {
//                     if(e.keyCode == 13) {
//                        search();
//                      }
//                  });
            });
            
            
        </script>