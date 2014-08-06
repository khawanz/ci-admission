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
                        echo form_open('users/step2',$attributes) ?>
                            <!--HIDDEN VALUE from previous step-->
                            <input type="hidden" name="username" value="<?php echo $username ?>"/>
                            <input type="hidden" name="email" value="<?php echo $email ?>"/>
                            <input type="hidden" name="password" value="<?php echo $password ?>"/>
                            <div style="display: none">
                            <?php 
                                foreach($roles as $rid => $role):?>
                                   <p class="role">
                                    <?php
                                        echo form_checkbox("roles[$rid]",$role, set_checkbox('roles', $role),TRUE); 
                                        echo $role;
                                        ?>
                                   </p>
                           <?php
                                endforeach;
                            ?>
                           </div>
                            <!--END OF HIDDEN VALUE-->
                            
                            <h1>Complete Further Information</h1>
                            
                            <fieldset class="row2">
                                <legend>Data Pribadi
                                </legend>
                                <p>
                                    <label>Nama *
                                    </label>
                                    <input type="text" class="long" name="nama"/>
                                </p>
                                <p>
                                    <label>Panggilan 
                                    </label>
                                    <input type="text" class="long" name="panggilan"/>
                                </p>
                                <p>
                                    <label>Jenis Kelamin *</label>
                                    <input type="radio" value="l" name="sex"/>
                                    <label class="gender">Laki-laki</label>
                                    <input type="radio" value="p" name="sex"/>
                                    <label class="gender">Perempuan</label>
                                </p>
                                <p>
                                    <label>Tempat Lahir 
                                    </label>
                                    <input type="text" class="long" name="tempat_lahir"/>
                                </p>
                                <p>
                                    <label>Tanggal Lahir *
                                    </label>
                                    <select class="birthdate" name="tanggal_lahir">
                                        <option value="1">01
                                        </option>
                                        <option value="2">02
                                        </option>
                                        <option value="3">03
                                        </option>
                                        <option value="4">04
                                        </option>
                                        <option value="5">05
                                        </option>
                                        <option value="6">06
                                        </option>
                                        <option value="7">07
                                        </option>
                                        <option value="8">08
                                        </option>
                                        <option value="9">09
                                        </option>
                                        <option value="10">10
                                        </option>
                                        <option value="11">11
                                        </option>
                                        <option value="12">12
                                        </option>
                                        <option value="13">13
                                        </option>
                                        <option value="14">14
                                        </option>
                                        <option value="15">15
                                        </option>
                                        <option value="16">16
                                        </option>
                                        <option value="17">17
                                        </option>
                                        <option value="18">18
                                        </option>
                                        <option value="19">19
                                        </option>
                                        <option value="20">20
                                        </option>
                                        <option value="21">21
                                        </option>
                                        <option value="22">22
                                        </option>
                                        <option value="23">23
                                        </option>
                                        <option value="24">24
                                        </option>
                                        <option value="25">25
                                        </option>
                                        <option value="26">26
                                        </option>
                                        <option value="27">27
                                        </option>
                                        <option value="28">28
                                        </option>
                                        <option value="29">29
                                        </option>
                                        <option value="30">30
                                        </option>
                                        <option value="31">31
                                        </option>
                                    </select>
                                    <select name="bulan_lahir">
                                        <option value="1">January
                                        </option>
                                        <option value="2">February
                                        </option>
                                        <option value="3">March
                                        </option>
                                        <option value="4">April
                                        </option>
                                        <option value="5">May
                                        </option>
                                        <option value="6">June
                                        </option>
                                        <option value="7">July
                                        </option>
                                        <option value="8">August
                                        </option>
                                        <option value="9">September
                                        </option>
                                        <option value="10">October
                                        </option>
                                        <option value="11">November
                                        </option>
                                        <option value="12">December
                                        </option>
                                    </select>
                                    <input class="year" type="text" size="4" maxlength="4" name="tahun_lahir"/>e.g 1976
                                </p>
                                
                                <p>
                                    <label>Status
                                    </label>
                                    <select name="status">
                                        <option value="0">Belum Menikah</option>
                                        <option value="1">Menikah</option>
                                    </select>
                                </p>
                                <p>
                                    <label>Agama
                                    </label>
                                    <select name="agama">
                                        <option value="islam">Islam
                                        </option>
                                        <option value="kristen">Kristen
                                        </option>
                                        <option value="hindu">Hindu
                                        </option>
                                        <option value="budha">Budha
                                        </option>
                                        <option value="katolik">Katolik
                                        </option>
                                        <option value="lainnya">Lainnya
                                        </option>
                                    </select>
                                </p>                                
                                 <p>
                                    <label>HP *
                                    </label>
                                    <input type="text" maxlength="10" name="hp"/>
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
                                        <option value="ipa">IPA</option>
                                        <option value="ips">IPS</option>
                                        <option value="bahasa">Bahasa</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    
                                    <label>Tahun Lulus
                                    </label>
                                    <select class="tahun-lulus" name="tahun_lulus">
                                        <?php
                                        $current_year = (int)date('Y');
                                        $periode = 10;
                                        $x = $current_year-$periode;
                                        for($i = $current_year; $i > ($current_year-$periode); $i--){                                          
                                            echo "<option value='$i'>$i</option>";                                           
                                        }
                                        ?>
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
                                        <option value="ayah">Ayah</option>
                                        <option value="ibu">Ibu</option>
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
                                        <option value="s3">S3</option>
                                        <option value="s2">S2</option>
                                        <option value="s1" selected>S1</option>
                                        <option value="d3">D3</option>
                                        <option value="smu">SMU</option>
                                        <option value="lainnya">Lainnya</option>
                                     </select>
                                </p>
                                <p>
                                    <label>Pekerjaan
                                    </label>
                                    <input type="text" name="pekerjaan_wali"/>
                                </p>
                                <p>
                                    <label>Jabatan
                                    </label>
                                    <input type="text" name="jabatan_wali"/>
                                </p>
                                <p>
                                    <label>Telepon Kantor
                                    </label>
                                    <input type="text" name="telp_kantor_wali"/>
                                </p>
                                <p>
                                    <label>Telepon Rumah
                                    </label>
                                    <input type="text" name="telp_rumah_wali"/>
                                </p>
                                <p>
                                    <label>HP
                                    </label>
                                    <input type="text" name="hp_wali"/>
                                </p>
                                <p>
                                    <label>Email
                                    </label>
                                    <input type="text" name="email_wali"/>
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
                            <div><button class="button">Create &raquo;</button></div>
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
