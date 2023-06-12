<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <title>Soal 3</title>
</head>

<body>


    <table id="tabel_soal" class="table" border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Hobi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br>
    <form id="form_search" action="#" method="post">
        <div class="row">
            <div class="form-group">
                <label for="name">Nama : </label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Alamat : </label>
                <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </div>

    </form>


</body>


<script>
    $(document).ready(function(){
        $.ajax({
            url: 'get_data.php',
            type: 'post',
            dataType: 'json',
            success: function(result){
                //console.log(result)
                add_data_to_table(result)
            }
        })

        $('#form_search').on('submit', function(event){
            event.preventDefault()
            $.ajax({
            data: {nama : $('#nama').val(), alamat : $('#alamat').val()},
            url: 'post_data.php',
            type: 'post',
            dataType: 'json',
            success: function(result){
                //console.log(result)
                add_data_to_table(result)
            }
        })
        })
    })

    function add_data_to_table(data){
        //mengosongkan data pada tabel
        $('#tabel_soal tbody').empty()

        //console.log(data)
        $.each(data, function(i, row){
            $('#tabel_soal tbody').append(`
                <tr>
                    <td>${row.nama}</td>
                    <td>${row.alamat}</td>
                    <td>${row.hobi}</td>
                </tr>
            `)
        })
    }
</script>

</html>