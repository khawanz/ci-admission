<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » edit-user
</div>     
<div class='menu-div'>
    <a href='<?php echo base_url(); ?>users'><div class='menu-list'>List</div></a>
    <a href='<?php echo base_url(); ?>users/add'><div class='menu-list'>Add</div></a>
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
                        echo form_open('users/update',$attributes) ?>
                            
                            
                            <fieldset class="row1">
                                
                            <input type='hidden' name="uid" value="<?php echo $user->uid;?>"/>
                        
                                <legend>Account Details</legend>
                                <p>
                                    <label>Username *
                                    </label>
                                    <input type="text" name="username" value="<?php echo $user->username; ?>"/>
                                </p>
                                <p>
                                    <label>Email *
                                    </label>
                                    <input type="text" name="email" value="<?php echo $user->email; ?>"/>                                  
                                </p>
                                <p>
                                    <label>Password*
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
                                                $checked = FALSE;
                                                if(in_array($role['name'], $user->roles)){
                                                    $checked = TRUE;
                                                }
                                                echo form_checkbox("roles[$role[rid]]",$role['name'], $checked); 
                                                echo $role['name'];
                                                ?>
                                           </p>
                                   <?php
                                        endforeach;
                                    ?>
                                </p>
<!--                                 <p>
                                    <label>Status *</label>
                                    <input type="radio" value="1" name="status" <?php echo ($user->status)?  'checked':  null; ?>/>
                                    <label class="gender">Aktif</label>
                                    <input type="radio" value="0" name="status" <?php echo (!$user->status)?  'checked': null; ?>/>
                                    <label class="gender">Non-aktif</label>
                                </p>-->
                            </fieldset>
                            
                        <?php
                        if(isset($data_personal)):
                        ?>
                            <h1>Complete Further Information</h1>
                            
                            <fieldset class="row2">
                                <legend>Data Pribadi
                                </legend>
                                <p>
                                    <label>Nama *
                                    </label>
                                    <input type="text" class="long" name="nama" value="<?php echo empty($data_personal['dp_name'])? '':$data_personal['dp_name']; ?>"/>
                                </p>
                                <p>
                                    <label>Panggilan 
                                    </label>
                                    <input type="text" class="long" name="panggilan"  value="<?php echo empty($data_personal['dp_nick'])? '':$data_personal['dp_nick'];  ?>"/>
                                </p>
                                <p>
                                    <label>Jenis Kelamin *</label>
                                    <input type="radio" value="laki" name="sex" <?php echo ($data_personal['dp_sex']=='l')?  'checked':  null; ?>/>
                                    <label class="gender">Laki-laki</label>
                                    <input type="radio" value="perempuan" name="sex" <?php echo ($data_personal['dp_sex']=='p')?  'checked': null; ?>/>
                                    <label class="gender">Perempuan</label>
                                </p>
                                <p>
                                    <label>Tempat Lahir 
                                    </label>
                                    <input type="text" class="long" name="tempat_lahir" value="<?php echo empty($data_personal['dp_birthplace'])? '':$data_personal['dp_birthplace']; ?>"/>
                                </p>
                                <p>
                                    
                                    <?php
                                    if(!is_null($data_personal['dp_birthdate'])){
                                        $tgl_lahir = explode('-', $data_personal['dp_birthdate']);
                                        $tanggal = (int)$tgl_lahir[2];
                                        $bulan = (int)$tgl_lahir[1];
                                        $tahun = $tgl_lahir[0];
                                    }
                                     else{
                                        $tanggal = 01;
                                        $bulan = 01;
                                        $tahun = 1990;
                                     }   
                                    ?>
                                    <label>Tanggal Lahir *
                                    </label>
                                    <select class="birthdate" name="tanggal_lahir">
                                        <?php
                                        for($i = 1; $i < 32; $i++){
                                            $tggl = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            if($i == $tanggal){
                                                echo "<option value=$i selected>$tggl</option>";
                                            }
                                            else{
                                                echo "<option value=$i>$tggl</option>";
                                            }
                                        }
                                            
                                        ?>
                                        
                                    </select>
                                    <select name="bulan_lahir">
                                         <?php
                                         $months = array('January','February','March','April','Mey','Juny','July',
                                             'August','September','November','December');
                                        for($i = 1; $i < 13; ){   
                                            $month = $months[$i-1];
                                            if($i == $bulan){
                                                echo "<option value=$i selected>$month</option>";
                                            }
                                            else{
                                                echo "<option value=$i>$month</option>";
                                            }
                                            $i++;
                                        }
                                            
                                        ?>
                                    </select>
                                    <input class="year" type="text" size="4" maxlength="4" name="tahun_lahir" value="<?php echo empty($tahun)?'':$tahun; ?>"/>e.g 1976
                                </p>
                                
                                <p>
                                    <label>Status
                                    </label>
                                    <select name="status">
                                        <?php
                                        
                                        if(!$data_personal['dp_status']){
                                            echo "<option value='0' selected>Belum Menikah</option>";
                                            echo "<option value='1'>Menikah</option>";
                                        }
                                        else{
                                            echo "<option value='0'>Belum Menikah</option>";
                                            echo "<option value='1' selected>Menikah</option>";
                                        }
                                        ?>                                                                                
                                    </select>
                                </p>
                                <p>
                                    <label>Agama
                                    </label>
                                    <?php
                                    $religions = array('islam','kristen','hindu','budha','katolik','lainnya');
                                    ?>
                                    <select name="agama">
                                        <?php
                                        foreach($religions as $religion){
                                            $text_religion = ucfirst($religion);
                                            if($data_personal['dp_religion'] == $religion){
                                                echo "<option value='$religion' selected>$text_religion</option>";
                                            }
                                            else{
                                                echo "<option value='$religion'>$text_religion</option>";
                                            }
                                            
                                        }
                                        ?>
                                       
                                    </select>
                                </p>                                
                                 <p>
                                    <label>HP *
                                    </label>
                                    <input type="text" name="hp"  value="<?php echo empty($data_personal['dp_hp'])?'':$data_personal['dp_hp']; ?>"/>
                                </p>
                            </fieldset>
                            
                            <fieldset class="row2">
                                <legend>Data Sekolah
                                </legend>
                                <p>
                                    <label>Sekolah Asal*
                                    </label>
                                    <input type="text"  name="sekolah_asal" value="<?php echo empty($data_school['ds_asal'])?'':$data_school['ds_asal']; ?>"/>e.g. SMU N 35
                                </p>
                                <p>
                                    <label>Jurusan
                                    </label>
                                    <select class="jurusan" name="jurusan">
                                        <?php
                                        $data_school['ds_jurusan'] = isset($data_school['ds_jurusan'])? $data_school['ds_jurusan']:'ipa';
                                        $jurusans = array('ipa','ips','bahasa','lainnya');
                                        foreach($jurusans as $jurusan){
                                            $text_jurusan = strtoupper($jurusan);
                                            if($jurusan == $data_school['ds_jurusan']){                                           
                                                echo "<option value='$jurusan' selected>$text_jurusan</option>";
                                            }
                                            else{
                                                echo "<option value='$jurusan'>$text_jurusan</option>";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                    
                                    <label>Tahun Lulus
                                    </label>
                                    <select class="tahun-lulus" name="tahun_lulus">
                                        <?php
                                        
                                        $current_year = date('Y');
                                        $data_school['ds_tahunlulus'] = 
                                                isset($data_school['ds_tahunlulus'])?$data_school['ds_tahunlulus']:$current_year;
                                        $periode = 10;
                                        for($i = $current_year; $i>($current_year-$periode); $i--){
                                            if($i == $data_school['ds_tahunlulus']){
                                                echo "<option value='$i' selected>$i</option>";
                                            }
                                            else{
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                </p>
                                <p>
                                    <label>Alamat *
                                    </label>
                                    <textarea cols="30" rows="3" name="alamat_sekolah" ><?php echo empty($data_school['ds_alamat'])?'':trim($data_school['ds_alamat']); ?>
                                    </textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" name="kota_sekolah" value="<?php echo empty($data_school['ds_kota'])?'':$data_school['ds_kota']; ?>"/>
                                </p>
                                <p>
                                    <label>Kode Pos
                                    </label>
                                    <input class="year" type="text" size="8" name="kodepos_sekolah" value="<?php echo empty($data_school['ds_kodepos'])?'':$data_school['ds_kodepos']; ?>"/>
                                </p>
                                
                            </fieldset>
                            
                            <fieldset class="row3">
                                <legend>Data Orang Tua/Wali
                                </legend>
                                <p>
                                    <label>Orang Tua/Wali</label>
                                    <select class="tahun-lulus" name="status_wali1">
                                         <option>-pilih-</option>
                                         <?php
                                         $do_status = FALSE;
                                         if($data_parent['do_status'] == 'ayah'){
                                             $do_status = TRUE;
                                             echo "<option value='ayah' selected>Ayah</option>
                                             <option value='ibu'>Ibu</option>";
                                         }
                                         else if($data_parent['do_status'] == 'ibu'){
                                             $do_status = TRUE;
                                             echo "<option value='ayah'>Ayah</option>
                                             <option value='ibu' selected>Ibu</option>";
                                         }
                                         ?>
                                        
                                     </select>
                                    <input type="text" name="status_wali2" placeholder="Lainnya sebutkan" value="<?php echo ($do_status)?'':$data_parent['do_status']; ?>"/>
                                </p>
                                <p>
                                    <label>Nama *
                                    </label>
                                    <input type="text" maxlength="10" name="nama_wali" value="<?php echo empty($data_parent['do_name'])?'':$data_parent['do_name']; ?>"/>
                                </p>
                                 <p>
                                    <label>Pendidikan</label>
                                    <select class="tahun-lulus" name="pendidikan_wali">
                                        <?php
                                      
                                        $data_parent['do_education'] =
                                                isset($data_parent['do_education'])?$data_parent['do_education']:'s1';
                                        $educations = array('s3','s2','s1','d3','smu','lainnya');
                                        foreach($educations as $education){
                                            $text_edu = strtoupper($education);
                                            if($education == $data_parent['do_education']){                                               
                                                echo "<option value='$education' selected>$text_edu</option>";
                                            }
                                            else{
                                                echo "<option value='$education'>$text_edu</option>";
                                            }
                                        }
                                        ?>
                                       
                                     </select>
                                </p>
                                <p>
                                    <label>Pekerjaan
                                    </label>
                                    <input type="text" maxlength="10" name="pekerjaan_wali" value="<?php echo empty($data_parent['do_job'])?'':$data_parent['do_job']; ?>"/>
                                </p>
                                <p>
                                    <label>Jabatan
                                    </label>
                                    <input type="text" maxlength="10" name="jabatan_wali" value="<?php echo empty($data_parent['do_position'])?'':$data_parent['do_position']; ?>"/>
                                </p>
                                <p>
                                    <label>Telepon Kantor
                                    </label>
                                    <input type="text" maxlength="10" name="telp_kantor_wali" value="<?php echo empty($data_parent['do_office_telp'])?'':$data_parent['do_office_telp']; ?>"/>
                                </p>
                                <p>
                                    <label>Telepon Rumah
                                    </label>
                                    <input type="text" maxlength="10" name="telp_rumah_wali" value="<?php echo empty($data_parent['do_house_telp'])?'':$data_parent['do_house_telp']; ?>"/>
                                </p>
                                <p>
                                    <label>HP
                                    </label>
                                    <input type="text" name="hp_wali" value="<?php echo empty($data_parent['do_hp'])?'':$data_parent['do_hp']; ?>"/>
                                </p>
                                <p>
                                    <label>Email
                                    </label>
                                    <input type="text" maxlength="10" name="email_wali" value="<?php echo empty($data_parent['do_email'])?'':$data_parent['do_email']; ?>"/>
                                </p>
                                 <p>
                                    <label>Alamat *
                                    </label>
                                     <textarea cols="30" rows="3" name="alamat_wali"><?php echo empty($data_parent['do_address'])?'':trim($data_parent['do_address']); ?>
                                     </textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" name="kota_wali" value="<?php echo empty($data_parent['do_city'])?'':$data_parent['do_city']; ?>"/>
                                </p>
                                 <p>
                                    <label>Kode Pos
                                    </label>
                                     <input class="year" type="text" size="8" name="kodepos_wali" value="<?php echo empty($data_parent['do_zipcode'])?'':$data_parent['do_zipcode']; ?>"/>
                                </p>
                                <p>
                                    <label>Penghasilan Orang Tua *</label>
                                    <select name="penghasilan_wali">
                                        <?php
                                        $ranges = array(
                                            1 => '0 - 999.999',
                                            3 => '1.000.000 - 2.999.999',
                                            5 => '3.000.000 - 4.999.999',
                                            7 => '5.000.000 - 6.999.999',
                                            10 => '7.000.000 - 9.999.999',
                                            11 => '> 10.000.000',
                                        );
                                        foreach($ranges as $key => $range){
                                            if($key == $do_parent['do_salary']){
                                                echo "<option value=$key selected>$ranges[$key]</option>";
                                            }
                                            else{
                                                echo "<option value=$key>$ranges[$key]</option>";
                                            }
                                        }
                                        ?>
                                        
                                     </select>
                                </p>
<!--                                <div class="infobox"><h4>Helpful Information</h4>
                                    <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>-->
                            </fieldset>
                        <?php
                            endif;
                        ?>
                            <div>
                            <button type='submit' name='updateForm' class='button' value='updateButton' >Update</button>   
                            <button type='submit' name='updateForm' class='button' value='cancelButton' >Cancel</button> 
                            </div>
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
