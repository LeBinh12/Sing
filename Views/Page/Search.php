
<h1>Search</h1>





<?php 
    if(isset($_POST['NameSearch'])){
        $name = $_POST['NameSearch'];

        GetCategory($name);
    }
?>