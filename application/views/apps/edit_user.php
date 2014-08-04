<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » edit-user
</div>     
<div class='menu-div'>
    <a href='<?php echo base_url(); ?>users'><div class='menu-list'>List</div></a>
    <a href='#'><div class='menu-list'>Edit</div></a>
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
                        echo form_open('users/step2',$attributes) ?>
                            
                            
                            <fieldset class="row1">
                                <legend>Account Details
                                </legend>
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
                                
                            </fieldset>
                            
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
                                        if($data_personal['dp_status'] == 'belum menikah'){
                                            echo "<option value='belum menikah' selected>Belum Menikah</option>";
                                            echo "<option value='menikah'>Menikah</option>";
                                        }
                                        else{
                                            echo "<option value='belum menikah'>Belum Menikah</option>";
                                            echo "<option value='menikah' selected>Menikah</option>";
                                        }
                                        ?>
                                        
                                        <option value="menikah" >Menikah</option>
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
                                    <input type="text" maxlength="10" name="hp"  value="<?php echo empty($data_personal['dp_hp'])?'':$data_personal['dp_hp']; ?>"/>
                                </p>
                            </fieldset>
                            
                            <fieldset class="row2">
                                <legend>Data Sekolah
                                </legend>
                                <p>
                                    <label>Sekolah Asal*
                                    </label>
                                    <input type="text"  name="sekolah_asal"/>e.g. SMU N 35
                                </p>
                                <p>
                                    <label>Jurusan
                                    </label>
                                    <select class="jurusan" name="jurusan">
                                        <option value="ipa">IPA
                                        </option>
                                        <option value="ips">IPS
                                        </option>
                                        <option value="bahasa">Bahasa
                                        </option>
                                    </select>
                                    
                                    <label>Tahun Lulus
                                    </label>
                                    <select class="tahun-lulus" name="tahun_lulus">
                                        <option value="2014">2014
                                        </option>
                                        <option value="2013">2013
                                        </option>
                                        <option value="2012">2012
                                        </option>
                                        <option value="2011">2011
                                        </option>
                                        <option value="2010">2010
                                        </option>
                                    </select>
                                </p>
                                <p>
                                    <label>Alamat *
                                    </label>
                                    <textarea cols="30" rows="3" name="alamat_sekolah"></textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" name="kota_sekolah"/>
                                </p>
                                <p>
                                    <label>Kode Pos
                                    </label>
                                    <input class="year" type="text" size="8" name="kodepos_sekolah"/>
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
                                         if($data_parent['do_status'] == 'ayah'){
                                             echo "<option value='ayah' selected>Ayah</option>
                                             <option value='ibu'>Ibu</option>";
                                         }
                                         else if($data_parent['do_status'] == 'ibu'){
                                             echo "<option value='ayah'>Ayah</option>
                                             <option value='ibu' selected>Ibu</option>";
                                         }
                                         ?>
                                        
                                     </select>
                                    <input type="text" name="status_wali2" placeholder="Lainnya sebutkan"/>
                                </p>
                                <p>
                                    <label>Nama *
                                    </label>
                                    <input type="text" maxlength="10" name="nama_wali"/>
                                </p>
                                 <p>
                                    <label>Pendidikan</label>
                                    <select class="tahun-lulus" name="pendidikan_wali">
                                        <option value="1">S3
                                        </option>
                                        <option value="2">S2
                                        </option>
                                        <option value="2">S1
                                        </option>
                                        <option value="2">D3
                                        </option>
                                        <option value="2">SMU
                                        </option>
                                        <option value="2">Lainnya
                                        </option>
                                     </select>
                                </p>
                                <p>
                                    <label>Pekerjaan
                                    </label>
                                    <input type="text" maxlength="10" name="pekerjaan_wali"/>
                                </p>
                                <p>
                                    <label>Jabatan
                                    </label>
                                    <input type="text" maxlength="10" name="jabatan_wali"/>
                                </p>
                                <p>
                                    <label>Telepon Kantor
                                    </label>
                                    <input type="text" maxlength="10" name="telp_kantor_wali"/>
                                </p>
                                <p>
                                    <label>Telepon Rumah
                                    </label>
                                    <input type="text" maxlength="10" name="telp_rumah_wali"/>
                                </p>
                                <p>
                                    <label>HP
                                    </label>
                                    <input type="text" maxlength="10" name="hp_wali"/>
                                </p>
                                <p>
                                    <label>Email
                                    </label>
                                    <input type="text" maxlength="10" name="email_wali"/>
                                </p>
                                 <p>
                                    <label>Alamat *
                                    </label>
                                     <textarea cols="30" rows="3" name="alamat_wali"></textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" name="kota_wali"/>
                                </p>
                                 <p>
                                    <label>Kode Pos
                                    </label>
                                     <input class="year" type="text" size="8" name="kodepos_wali"/>
                                </p>
                                <p>
                                    <label>Penghasilan Orang Tua *</label>
                                    <select name="penghasilan_wali">
                                        <option selected="selected" value="1">0 - 999.999</option>
                                        <option value="3">1.000.000 - 2.999.999</option>
                                        <option value="5">3.000.000 - 4.999.999</option>
                                        <option value="7">5.000.000 - 6.999.999</option>
                                        <option value="10">7.000.000 - 9.999.999</option>
                                        <option value="11">> 10.000.000</option>
                                     </select>
                                </p>
<!--                                <div class="infobox"><h4>Helpful Information</h4>
                                    <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>-->
                            </fieldset>
<!--                            <fieldset class="row4">
                                <legend>Terms and Mailing
                                </legend>
                                <p class="agreement">
                                    <input type="checkbox" value=""/>
                                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                                </p>
                                <p class="agreement">
                                    <input type="checkbox" value=""/>
                                    <label>I want to receive personalized offers by your site</label>
                                </p>
                                <p class="agreement">
                                    <input type="checkbox" value=""/>
                                    <label>Allow partners to send me personalized offers and related services</label>
                                </p>
                            </fieldset>-->
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
