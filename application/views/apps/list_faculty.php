<!--<div id="breadcrumb">
    <a href="#">faculty</a>
</div>     -->
<div class="menu-div">
    <a href="#"><div class="menu-list">List</div></a>
    <a href="#"><div class="menu-list">Add</div></a>
</div>
<div id="success-message"> 
    <!--here for success message after creating new schedule-->
</ul>
</div>
<div id="container">           
                  
            <div id="content-container">
                    <div id="content">
                        <h2>Fakultas</h2>
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
                            
                            if(!empty($faculties)){
                             $no = 1;
                             foreach($faculties as $faculty){                                
//                                 echo "<tr>
//                                        <td>$no</td>        
//                                        <td><a href=".base_url()."users/profile/$user[uid]>$user[username]</a></td>  
//                                        <td>$user[status]</td> 
//                                        <td>$user[roles]</td> 
//                                        <td><a href=".base_url()."users/edit/$user[uid]>edit</a></td>";                                          
                                 
//                                
//                             
//                              $no++;
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
   