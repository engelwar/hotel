<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });

        //Ocultar mensaje
        setTimeout(function() {
            $("#contenMsjs").fadeOut(1000);
        }, 3000);



        $('.btnBorrar').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            url = "recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "index.php";
                    $('#respuesta').html(data);
                }
            });
            return false;

        });
    });
</script>
</body>

</html>