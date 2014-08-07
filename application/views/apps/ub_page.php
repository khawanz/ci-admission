<div id="ub-menu">
    <ul>
        <li id="faculty-link"><a href="#">Fakultas</a></li>
        <li id="departement-link"><a href="#">Departemen</a></li>
    </ul>
</div>
<div id="ub-view">
    Testes
</div>

<script src="<?php echo base_url(); ?>/assets/css/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#faculty-link a').click(function(){
        $('#ub-view').html('<p>Loading..</p>');
    });
</script>