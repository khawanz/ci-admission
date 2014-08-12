<!--<div id="breadcrumb">
    <a href="#">faculty</a>
</div>     -->
<div class="menu-div">
    <a href="#"><div class="menu-list">List</div></a>
    <a href="<?php echo base_url(); ?>ub/departement/add"><div class="menu-list">Add</div></a>
</div>
<div id="success-message"> 
    <!--here for success message after creating new schedule-->
</ul>
</div>
<div id="container">           
                  
            <div id="content-container">
                    <div id="content">
                        <h2>Departemen</h2>
                           <table class="bordered">
                            <thead>

                            <tr>
                                <th>No.</th>        
                                <th>Kode</th>
                                <th>Nama</th>                               
                                <th>-</th>
                                <th>-</th>                             
                            </tr>
                            </thead>
                            <?php
                            
                            if(!empty($deps)){
                             $no = 1;
                             foreach($deps as $dep){                                
                                echo "<tr>
                                    <td>$no</td>        
                                    <td>$dep[dep_code]</td>  
                                    <td>$dep[dep_name]</td>  
                                    <td><a href=".base_url()."ub/departement/edit/$dep[dep_id]>edit</a></td>";                                          
                            ?>
                                 <td><a href="<?php echo base_url().'ub/departement/delete/'.$dep['dep_id']; ?>" onclick='return confirm("Are you sure?");'>delete</a></td>  
                                     <?php "</tr>  ";
                              $no++;
                              } 
                            }
                            else{
                                echo "<tr><td colspan=5>Tidak ada data</td></tr>";
                            }
                          ?> 
                           </table><br/>

                            
                    </div>

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

