<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <title>Soal 2</title>
</head>

<body>

    <form id="form_soal" action="#" method="post">

        <div id="form_input" class="form-group">

        </div>

    </form>

</body>

<script type="text/javascript">
    let form_prop = [{
            id: 'name',
            label: 'Nama Anda',
        },
        {
            id: 'age',
            label: 'Umur Anda'
        },
        {
            id: 'hobby',
            label: 'hobi Anda'
        }
    ]

    let data = []
    let number = 0

    $(document).ready(function() {
        console.log(form_prop)
        document.getElementById('form_soal')
        
        add_form()

        $('#form_soal').on('submit', function(event){
            //handle submit
            event.preventDefault();
            
            //menyimpan data kedalam array
            data.push($(`#${form_prop[number].id}`).val())

            //number digunakan agar pemanggilan form selanjutnya berubah sesuai kebutuhan
            number++

            //Menghapus form sebelumnya, namun bisa juga bila ingin hanya disembunyikan saja
            $('#form_input').html('')

            //Pengkondisian, bila seluruh form telah terisi, maka data akan ditampilkan
            if( number > 2){
                $('#form_input').html(`
                <p>Nama : ${data[0]}</p>
                <p>Umur : ${data[1]}</p>
                <p>Hobi : ${data[2]}</p>
                `)
            }else{
                add_form()
            }
        })


    })

    function add_form(){
        $('#form_input').html(`
            <label for="name">${form_prop[number].label} :</label>
            <input type="text" name="${form_prop[number].id}" id="${form_prop[number].id}" class="form-control" required>
            <input type="submit" value="Submit">
        `)
    }


</script>

</html>