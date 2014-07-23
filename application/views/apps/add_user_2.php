<link rel='stylesheet' media='all' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' media='all' type='text/css' href='<?php echo base_url(); ?>/assets/css/jquery-ui-timepicker-addon.css' />
<div id='breadcrumb'>
    <a href='#'>users</a> » add-user
</div>     
<div class='menu-schedule'>
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
                        echo form_open('user/create',$attributes) ?>

                            <h1>Add User</h1>
                            
                            <fieldset class="row2">
                                <legend>Data Pribadi
                                </legend>
                                <p>
                                    <label>Nama *
                                    </label>
                                    <input type="text" class="long"/>
                                </p>
                                <p>
                                    <label>Panggilan 
                                    </label>
                                    <input type="text" class="long"/>
                                </p>
                                <p>
                                    <label>Jenis Kelamin *</label>
                                    <input type="radio" value="laki" name="sex"/>
                                    <label class="gender">Laki-laki</label>
                                    <input type="radio" value="perempuan" name="sex"/>
                                    <label class="gender">Perempuan</label>
                                </p>
                                <p>
                                    <label>Tempat Lahir 
                                    </label>
                                    <input type="text" class="long"/>
                                </p>
                                <p>
                                    <label>Tanggal Lahir *
                                    </label>
                                    <select class="birthdate">
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
                                    <select>
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
                                    <input class="year" type="text" size="4" maxlength="4"/>e.g 1976
                                </p>
                                
                                <p>
                                    <label>Status
                                    </label>
                                    <select>
                                        <option value="1">Belum Menikah
                                        </option>
                                        <option value="2">Menikah
                                        </option>
                                    </select>
                                </p>
                                <p>
                                    <label>Agama
                                    </label>
                                    <select>
                                        <option value="1">Islam
                                        </option>
                                        <option value="2">Kristen
                                        </option>
                                        <option value="3">Hindu
                                        </option>
                                        <option value="4">Budha
                                        </option>
                                        <option value="5">Katolik
                                        </option>
                                        <option value="6">Lainnya
                                        </option>
                                    </select>
                                </p>
                                <p>
                                    <label>Phone *
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                            </fieldset>
                            
                            <fieldset class="row2">
                                <legend>Data Sekolah
                                </legend>
                                <p>
                                    <label>Sekolah Asal*
                                    </label>
                                    <input type="text" class="long"/>
                                </p>
                                <p>
                                    <label>Jurusan
                                    </label>
                                    <select class="jurusan">
                                        <option value="1">IPA
                                        </option>
                                        <option value="2">IPS
                                        </option>
                                        <option value="2">Bahasa
                                        </option>
                                    </select>
                                    
                                    <label>Tahun Lulus
                                    </label>
                                    <select class="tahun-lulus">
                                        <option value="1">2012
                                        </option>
                                        <option value="2">2011
                                        </option>
                                        <option value="2">2010
                                        </option>
                                    </select>
                                </p>
                                <p>
                                    <label>Alamat *
                                    </label>
                                    <textarea cols="30" rows="3"></textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>Kode Pos
                                    </label>
                                    <input class="year" type="text" size="8"/>
                                </p>
                                
                            </fieldset>
                            
                            <fieldset class="row3">
                                <legend>Data Orang Tua/Wali
                                </legend>
                                <p>
                                    <label>Orang Tua</label>
                                     <select class="tahun-lulus">
                                        <option value="1">Ayah
                                        </option>
                                        <option value="2">Ibu
                                        </option>
                                     </select>
                                </p>
                                <p>
                                    <label>Nama
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                 <p>
                                    <label>Pendidikan</label>
                                     <select class="tahun-lulus">
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
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>Jabatan
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>Telepon Kantor
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>Telepon Rumah
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>HP
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                <p>
                                    <label>Email
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                 <p>
                                    <label>Alamat *
                                    </label>
                                    <textarea cols="30" rows="3"></textarea>
                                </p>
                                <p>
                                    <label>Kota
                                    </label>
                                    <input type="text" maxlength="10"/>
                                </p>
                                 <p>
                                    <label>Kode Pos
                                    </label>
                                    <input class="year" type="text" size="8"/>
                                </p>
                                <p>
                                    <label>Penghasilan Orang Tua</label>
                                     <select>
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