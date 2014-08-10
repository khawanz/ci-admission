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
                            Username : <?php echo $user->username; ?>                         
                        </label><br/>
                         <label>
                             Email : <?php 
                             echo $user->email;?>                         
                        </label><br/>
                        <label>
                            Status : <?php echo ($user->status)? 'Aktif':'Nonaktif'; ?>                            
                        </label><br/>                       
                                               
                        <?php echo form_close();?>
                            
                        <?php if(in_array('matriculant', $user->roles)): ?>
                            <div id="star">
                               <ul>
                                      <li><a href="#tabs-1">Pribadi</a></li>
                                      <li><a href="#tabs-2">Orant Tua</a></li>
                                      <li><a href="#tabs-3">Sekolah</a></li>
                                      <li><a href="#tabs-4">Nilai</a></li>
                                      <li><a href="#tabs-5">Lain-lain</a></li>
                               </ul>

                                <!--Data Pribadi-->
                               <div id="tabs-1">
                                      <p>Nama: <?php echo $personal['dp_name'];?></p>
                                      <p>Panggilan: <?php echo $personal['dp_nick'];?></p>
                                      <p>Tempat/Tanggal Lahir: 
                                          <?php 
                                            $tanggal_lahir = date('d M Y', strtotime($personal['dp_birthdate']));
                                            echo $personal['dp_birthplace'].', '.$personal['dp_birthdate'];
                                          ?></p>
                                      <p>Agama: <?php echo $personal['dp_religion'];?></p>
                                      <p>Jenis Kelamin: <?php echo ($personal['dp_sex']=='l')?'Laki-laki':'Perempuan';?></p>
                                      <p>Status: <?php echo ($personal['dp_status'])?'Menikah':'Belum Menikah';?></p>
                                      <p>Golongan Darah: <?php echo strtoupper($personal['dp_blood']);?></p>
                                      <p>HP: <?php echo $personal['dp_hp'];?></p>
                               </div>

                                 <!--Data Orang Tua-->
                               <div id="tabs-2">
                                      <p>Status: <?php echo $parent['do_status'];?></p>
                                      <p>Nama <?php echo $parent['do_status'].': '.$parent['do_name'];?></p>
                                      <p>Pendidikan: <?php echo $parent['do_education'];?></p>
                                      <p>Pekerjaan: <?php echo $parent['do_job'];?></p>
                                      <p>Jabatan: <?php echo $parent['do_position'];?></p>
                                      <p>Telepon Kantor: <?php echo $parent['do_office_telp'];?></p>
                                      <p>Telepon Rumah: <?php echo $parent['do_house_telp'];?></p>
                                      <p>hp: <?php echo $parent['do_hp'];?></p>
                                      <p>Alamat: <?php echo $parent['do_address'].', '.$parent['do_city'].' '.$parent['do_zipcode'];?></p>

                               </div>

                                  <!--Data Sekolah-->
                               <div id="tabs-3">
                                 <p>Sekolah Asal: <?php echo $school['ds_asal'];?></p>  
                                 <p>Jurusan: <?php echo strtoupper($school['ds_jurusan']);?></p>  
                                 <p>Tahun Lulus: <?php echo $school['ds_tahunlulus'];?></p>                               
                                 <p>Sekolah Asal: <?php echo $school['ds_alamat'].', '.$school['ds_kota'].' '.$school['ds_kodepos'];?></p>  
                               </div>
                                <div id="tabs-4">
                                      <p>Nama: Katrina Kaif</p>
                                      <p>Lahir: Hongkong, 16 Juli 1984</p>
                                      <p><img src="images/kaif.png" /></p>
                                      <p>Aktris berdarah campuran India-Inggris ini
                                         banyak bermain film di Bollywood.</p>
                               </div>
                                <div id="tabs-5">
                                      <p>Nama: Katrina Kaif</p>
                                      <p>Lahir: Hongkong, 16 Juli 1984</p>
                                      <p><img src="images/kaif.png" /></p>
                                      <p>Aktris berdarah campuran India-Inggris ini
                                         banyak bermain film di Bollywood.</p>
                               </div>
                            </div>
                        <?php endif; ?>

                        <div id="profile-content">
                            
                    </div>
                   
            </div>
        </div>
    
<script type="text/javascript" 
        src="<?php echo base_url(); ?>/assets/javascript/jquery-1.11.1.min.js"></script>
<script type="text/javascript" 
src="<?php echo base_url(); ?>/assets/javascript/jquery-ui-1.8.11.custom.min.js"></script>        
<link rel="stylesheet" type="text/css" 
href="<?php echo base_url(); ?>/assets/css/jquery-ui-1.8.11.custom.css" />                                
<script type="text/javascript">
   $(document).ready(function() {
      $("#star").tabs();
   });
</script>        
<!--
    
    <script src="<?php echo base_url(); ?>/assets/css/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function buka(classname){                      
                    var dir = $(classname).attr('rev');
                    var uid = $("#uid").val();
                    var personal = <?php echo $personal; ?>;alert(uid);
                     $.ajax({
                        type:"post",
                        url:"<?php echo base_url(); ?>/application/views/apps/"+dir,
                        data:"parent="+uid,
                        success:function(data){
                            $("#profile-content").html(data);
                         }
                      });
                                        
                 }

                  $("#nav-personal a").click(function(){
                  	buka("#nav-personal a");
                         $("a").removeClass("onlink");
                         $("li").removeClass("onlink");
                         $(this).addClass("onlink");
                         $("#nav-personal").addClass("onlink");
                  });                                 
                  
                  $("#nav-parent a").click(function(){
                  	 buka("#nav-parent a");
                          $("li").removeClass("onlink");
                         $("a").removeClass("onlink");
                         $(this).addClass("onlink");
                         $("#nav-parent").addClass("onlink");
                  });
                  
                  $("#nav-school a").click(function(){
                  	buka("#nav-school a");
                         $("li").removeClass("onlink");
                        $("a").removeClass("onlink");
                         $(this).addClass("onlink");
                         $("#nav-school").addClass("onlink");
                  });
            });
            
            
        </script>-->