<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Stok Barang</title>
  </head>
  <body>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-100">
                    <div class="card-header">
                        <h5>Stok Barang</h5>
                        <!-- Button trigger modal -->
                        
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        </button>
                        </div>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($barangs as $barang)
                                <tr>
                                <th scope="row">{{ $no++ }}</th>
                                    <td>{{$barang -> nama}}</td>
                                    <td>{{$barang -> qty}}</td>
                                    <td>{{$barang -> harga}}</td>
                                    <td>

                                    <a class="btn btn-sm btn-primary" data-nama="{{ $barang->nama }}" 
                                    data-qty="{{ $barang->qty }}"
                                    data-harga="{{ $barang->harga }}" data-barang_id="{{ $barang->id }}" href="{{ route('barang.edit', $barang->id) }}" data-toggle="modal" data-target="#detail"> <i class="fa fa-navicon"></i> </a>
                                   
                                    <a class="btn btn-sm btn-success" data-nama="{{ $barang->nama }}" 
                                    data-qty="{{ $barang->qty }}"
                                    data-harga="{{ $barang->harga }}" data-barang_id="{{ $barang->id }}" href="{{ route('barang.edit', $barang->id) }}" data-toggle="modal" data-target="#edit"> <i class="fa fa-pencil"></i> </a>
                                   
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"> </i>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaksi.index') }}"> <h4 class="btn btn-sm btn-dark">Lihat Daftar Transaksi</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
@include('barang.create')
@include('barang.edit')
@include('barang.detail')






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nama = button.data('nama')
            var qty = button.data('qty')
            var harga = button.data('harga')
            var barang_id = button.data('barang_id')
             // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #qty').val(qty)
            modal.find('.modal-body #harga').val(harga)
            modal.find('.modal-body #barang_id').val(barang_id)
            });

        $('#detail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nama = button.data('nama')
            var qty = button.data('qty')
            var harga = button.data('harga')
            var barang_id = button.data('barang_id')
             // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #qty').val(qty)
            modal.find('.modal-body #harga').val(harga)
            modal.find('.modal-body #barang_id').val(barang_id)
            });
    </script>
  </body>
</html>