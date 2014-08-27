<!--
<footer class="container-fluid">

</footer>
-->
<?php
if(isset($_GET['ajaxLoad']))
    return;
echo '
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/localization/messages_ru.js"></script>
    <script src="js/validations.js"></script>
    <!-- ---------- -->
    <script src="js/lib/bootbox.js"></script>
    <script src="js/lib/nprogress.js"></script>
    <script src="js/lib/jquery.cookie.js"></script>
    <!-- ---------- -->
    <script src="js/ajax.js"></script>
    <script src="js/events.js"></script>
    ';
?>

<?php //mdo\loadJS(array('signup.js')); ?>
</body>
