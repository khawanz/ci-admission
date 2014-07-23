<div id="breadcrumb">
    <a href="#">user</a>
</div>     
<div class="menu-schedule">
    <a href="#"><div class="menu-list">List</div></a>
    <a href="<?php echo base_url(); ?>users/add"><div class="menu-list">Add</div></a>
</div>
<div id="success-message"> 
    <!--here for success message after creating new schedule-->
</ul>
</div>
<div id="container">           
                  
            <div id="content-container">
<!--                    <div id="section-navigation">
                            <ul>
                                  
                            </ul>
                    </div>-->
                    <div id="content">
                        <h2>Daftar User</h2>
                           <table class="bordered">
                            <thead>

                            <tr>
                                <th>NO</th>        
                                <th>GEL</th>
                                <th>TGL USM</th>
                                <th>JAM</th>
                                <th>TEMPAT</th>
                                <th>KOTA</th>
                                <th>KT/DF</th>
                                <th>FEE</th>
                                <th>STATUS</th>
                                <th>-</th>
                                <th>-</th>
                            </tr>
                            </thead>
                            <?php 
                             $no = 1;
                             foreach($schedule as $sc){
                                 $tanggal = date('d M Y', strtotime($sc['sc_date']));
                                 echo "<tr>
                                        <td>$no</td>        
                                        <td>$sc[sc_gelombang]</td>
                                        <td>$tanggal</td>
                                        <td>$sc[sc_starttime] s/d $sc[sc_endtime]</td>
                                        <td>$sc[sc_place]</td>  
                                        <td>$sc[sc_city]</td>  
                                        <td>$sc[sc_capacity]</td>  
                                        <td>$sc[sc_capacity]</td>  
                                        <td>$sc[sc_status]</td>  
                                        <td><a href=".base_url()."schedule/edit/".$sc['sc_id'].">edit</a></td>"; ?>                                         
                                 <td><a href="<?php echo base_url().'schedule/delete/'.$sc['sc_id']; ?>" onclick='return confirm("Are you sure?");'>delete</a></td>  
                                     <?php "</tr>  ";
                                
                             
                              $no++;
                              } 
                          ?> 
                           </table><br/>

<!--                        <h2>Zebra stripes, footer</h2>
                        <table class="zebra">
                            <thead>
                            <tr>
                                <th>#</th>        
                                <th>IMDB Top 10 Movies</th>
                                <th>Year</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>&nbsp;</td>        
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>    
                            <tr>

                                <td>1</td>        
                                <td>The Shawshank Redemption</td>
                                <td>1994</td>
                            </tr>        
                            <tr>
                                <td>2</td>         
                                <td>The Godfather</td>
                                <td>1972</td>

                            </tr>
                            <tr>
                                <td>3</td>         
                                <td>The Godfather: Part II</td>
                                <td>1974</td>
                            </tr>    
                            <tr>
                                <td>4</td> 
                                <td>The Good, the Bad and the Ugly</td>

                                <td>1966</td>
                            </tr>
                            <tr>
                                <td>5</td> 
                                <td>Pulp Fiction</td>
                                <td>1994</td>
                            </tr>

                            <tr>
                                <td>6</td> 
                                <td>12 Angry Men</td>
                                <td>1957</td>
                            </tr>
                            <tr>
                                <td>7</td> 
                                <td>Schindler's List</td>

                                <td>1993</td>
                            </tr>    
                            <tr>
                                <td>8</td> 
                                <td>One Flew Over the Cuckoo's Nest</td>
                                <td>1975</td>
                            </tr>
                            <tr>

                                <td>9</td> 
                                <td>The Dark Knight</td>
                                <td>2008</td>
                            </tr>
                            <tr>
                                <td>10</td> 
                                <td>The Lord of the Rings: The Return of the King</td>

                                <td>2003</td>
                            </tr>
                        </table>-->
                            
                    </div>
<!--                    <div id="aside">
                            
                    </div>-->
                   
            </div>
        </div>
    
   
<script>
    //success message will show if new schedule created from 'schedule/add' page or updated schedule from 'schedule/edit'
    $(document).ready(function() {
        $('#success-message').hide();
        <?php if($this->session->flashdata('success')){ ?>
        $('#success-message').html('<?php echo $this->session->flashdata('success'); ?>').fadeIn('slow');
        $('#success-message').fadeOut(4000);
        });
    <?php } ?>
    
    $('.test').click(function(){
        confirm('mau ngapus?');
    });
    
    function confirm_delete(){
        confirm('mau ngapus?');
    }
</script>

