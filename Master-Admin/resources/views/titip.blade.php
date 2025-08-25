<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="\css\style.css">
    <script src="\js\script.js"></script>
    <script src="https://kit.fontawesome.com/43d551183d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-6 .col-sm-8"><a href="#"><button type="button" class="btn btn-outline-dark"><i class="fa-solid fa-arrow-left"></i> Kembali</button></a></div>
            <div class="col-6 .col-sm-4"><h3><i class="fa-solid fa-user-group"></i> Daftar Pengguna</h3></div>
        </div>
        <hr>
    </div>
    <div class="container">
        <table class="table text-center">
            <thead>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>1</td>
                    <td>2057051017</td>
                    <td>Syahril Fajri Pratama</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <a href="#"><button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-list-check"></i></button></a>
                            <a href="#"><button type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate-right"></i></button></a>
                            <a href="#"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>