</div>
<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging" : true,
                "searching": true, // Enable search
                "ordering": true,  
                "pageLength": 1 // Nombre de lignes à afficher par page
            });
        });
    </script>
</body>
</html>