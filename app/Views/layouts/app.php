<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        [v-cloak] {
            display: none;
        }

    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="fontawesome/css/all.min.css" ></script>
    <link rel="stylesheet" href="iziToast/dist/css/iziToast.min.css">
</head>
<body>
    
    <?= $this->renderSection('content') ?>
    

    <!-- VueJS and axios -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js" ></script>
    <script src="https://unpkg.com/axios@0.24.0/dist/axios.min.js" ></script>
  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- iziToast.min.js -->
    <script src="iziToast/dist/js/iziToast.min.js" type="text/javascript"></script>

    <!-- fontawesome JS -->
    <script src="fontawesome/js/all.min.js" ></script>

    <!-- fontawesome JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <?= $this->renderSection('script') ?>
</body>
</html>