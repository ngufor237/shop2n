<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css') }}">
    <title>Liste de clients</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scroll */
            width: 100%;
            box-sizing: border-box; /* Ensure consistent box-sizing */
        }
        .product-row {
          display: none; /* Cacher les lignes de produits par défaut */
          margin-left: -200px;
        }
        .product-row td {
          padding: 10px 0;
        }
        .quantity-input {
            display: inline-flex;
            align-items: center;
        }
        .quantity-input button {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
        .quantity-input input {
            width: 40px;
            height: 30px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 18px;
        }
        #ess1 {
            text-decoration: none;
            color: black;
        }
        #ess1:hover {
            background-color: rgb(8, 8, 8);
            color: white;
        }
        .bg-orange {
            background-color: rgb(176, 117, 68);
        }
        .bg-blue {
            background-color: #4b0ed9;
        }
        .bg-indigo {
            background-color: #14363b;
        }
        .carousel-item img {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            body{
            margin: 0;
            padding: 0;
        }
        .product-row {
          display: none; /* Cacher les lignes de produits par défaut */
          margin-left: -280px;
        }
        .totalhead{
            margin-left: -20px;
            padding-right: 50px;
            display: flex;
        }
        .cancel{
            color: #4b0ed9;
            margin-left: 100%;
        }
            .navbar-nav .nav-item {
                margin-right: 1rem;
            }

            .total-section {
                text-align: center;
            }

            .table-responsive {
                overflow-x: auto;
                margin: 0; /* Remove default margins */
                padding: 0; /* Remove default padding */
            }

            .table {
                width: 100%;
                margin: 0; /* Ensure the table is full width */
            }

            .table thead th, .table tbody td {
                white-space: nowrap; /* Ensure table content doesn't break */
            }

            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
   
        @include('header', ['souscategories' => $souscategories])

        <div class="">
        <div id="flash-message" class="alert alert-success d-none" role="alert">
    <!-- Flash message content will go here -->
</div>

<div class="d-flex" >

   
    <div class="col-sm-9 ms-5" id="julio">
    @if(session('success'))
    <div class="alert alert-success mt-5 ">
        {{ session('success') }}
    </div>
@endif 
@php
$totalle=0;
@endphp
@foreach($produits as $id => $produit)
@php
$totalle=$totalle + ($produit['qttestock'] * $produit['prix']);
@endphp
@endforeach


        <div class="c ">
            <div class="c" >
                    <div class="d-flex justify-content-between totalhead align-items-center mb-4">
                    <h2>TOTAL <span id="total">{{ $totalle }} </span> FCFA</h2>
                    <button class="btn btn-success btn-toggle-products btn-md rounded-pill ms-2" data-id="history">
                        Historique <i class="fas fa-eye ms-2" style="color:green"></i>
                    </button>
                </div>
                <br>
                <div class="table-responsive">
            <table id="table2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th >Images</th>
                <th> Code</th>
                <th> Libelle</th>
                <th> Prix</th>
                <th> Etat</th>

                <th>Quantite</th>
                <th>Total</th>

                <th>Action</th>  
                
            </tr>
        </thead>
        <tbody>
        @foreach($produits as $id => $produit)  

        <tr style=' border:black solid 2px; width:1000px;'>
        <td style='font-size: 15px;'><img src="{{ asset('photos/'.$produit['images'])}}" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></td>

        <td style='font-size: 15px;'>P00{{$id}}</td>
        <td style='font-size: 15px;'>{{$produit['libelle']}}</td>
        <td style='font-size: 15px;' class="prix">{{$produit['prix']}}&ensp;FCFA</td>
        <td style='font-size: 15px;'>{{$produit['etat']}}</td>
         @php
            $quantity=$totalle /$produit['prix'];
         @endphp
        <td style='font-size: 15px;'class="quantity-input"> 
        @php
        $c=$id[0];
        @endphp
        <div class="product-quantity">
            <a class="decrease" data-id="{{ $c }}" data-etat="{{ $produit['etat'] }}">
                <button id="decreaseBtn">-</button>
            </a>
            <input type="text" id="quantity{{ $c }}{{ $produit['etat'] }}" readonly data-product-id="{{ $c }}" min="1" 
                value="{{ $produit['qttestock'] }}" class="quantity" style="width: 80px;"> 
            <a class="increase" data-id="{{ $c }}" data-etat="{{ $produit['etat'] }}">
                <button>+</button>
            </a>
        </div>


        </td>
        
        @php
         $total= ($produit['qttestock'] * $produit['prix']);
        @endphp
        <td style='font-size: 15px;' id="total-price{{$id}}" class="total">{{$total}}</td>

        <td style='font-size: 15px;'><a href="/suprimerprodcard/{{$id}}" class="delete"><i class="fas fa-trash"></i></a>
        @php
        $c=$id[0];
        @endphp
        <a href="/addtocard/{{$c}}" ><button>+ {{$c}}</button></a>
        </td>

       
                
        @endforeach

       
    
        
        
        </tr>
  
        </tbody>
    </table>
                </div>
    <!-- Buttons Section -->
    <div class="d-flex justify-content-end mt-3">
                    <a href="/finaliser" class="btn ">PASSER LA COMMANDE</a>
                    <a href="/suprcart" class=" bg-danger cancel btn-md">SUPPRIMER</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div  class="product-row"  data-id="history">
<div class="col-sm-9 ms-5 ps-5  d-flex ms-5 ps-9" id="julio">
        <div class="card ms-5 ps-5" style=" border-style: none;">
            <div class="card-body ms-5 ps-5" >
                <table id="table2" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Transactio Id</th>
                        <th>Etat</th>
                        <th>Date d'achat</th>
                        <th>Visibilite</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($auteur as $item)
                      <tr>
                          <td>T00{{ $item['id'] }}</td>
                          <td>{{ $item['etat'] }}</td>
                          <td>{{ $item['created_at'] }}</td>
                          <!-- <td>{{ $item['email'] }}</td>
                          <td>{{ $item['contact_what'] }}</td> -->
                          <td><button class="btn btn-toggle-products" data-id="{{ $item['id'] }}">voir<i class="fas fa-eye ms-2" style="color:green"></i></button></td>
                      </tr>
                      <tr class="product-row" data-id="{{ $item['id'] }}">
                        <td colspan="6">
                          <table class="table table-sm " style="background-color:azure">
                            <thead>
                              <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Etat</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                               @php $val = 0; @endphp
                                @foreach($item->commandenvs as $com)
                              <tr>
                                <td>{{$com->produit->libelle}}</td>
                                <td>{{$com->prix}}</td>
                                <td>{{$com->qtte}}</td>
                                <td>{{$com->etat}}</td>
                                <td>{{$com->prix * $com->qtte}}</td>
                              </tr>
                              @php $val += $com->prix * $com->qtte; @endphp
                                @endforeach
                              <tr>
                                <strong>
                                  <td colspan="3" class="text-end">Total</td>
                                    <td>{{ $val }}</td>
                                </strong>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>









<!-- 




   <div class="d-block d-md-none">
<div class="d-flex mb-5 pb-5 " >

   
    <div class="col-sm-9 ms-5" id="julio">
    @if(session('success'))
    <div class="alert alert-success mt-5 ">
        {{ session('success') }}
    </div>
@endif 
@php
$totalle=0;
@endphp
@foreach($produits as $id => $produit)
@php
$totalle=$totalle+$produit['qttestock']*$produit['prix'];
@endphp
@endforeach
        <div class="card mt-5  ms-5 " style=" border-style: none;">
            <div class="card-body" >
                <div class=" text-end me-5  mb-4"  style="color:green "> <h2>Total:   {{ $totalle }} FCFA</h2></div>
            <table id="table2" class="table table-striped table-bordered" style="width:100px;">
        <thead>
            <tr>
            <th> Images</th>
                <th> Reference</th>
                <th> Libelle</th>
                <th> Prieeeeeeeeeeeeeex</th>
                <th> Etat</th>

                <th>Quantite</th>
                <th>Total</th>

                <th>Act</th>





                
                
            </tr>
        </thead>
        <tbody>
        @foreach($produits as $id => $produit)  

        <tr style=' border:black solid 2px; width:100px;'>
            <td style='font-size: 15px;'><img src="{{ asset('photos/'.$produit['images'])}}" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></td>

        <td style='font-size: 15px;'>P00{{$id}}</td>
        <td style='font-size: 15px;'>{{$produit['libelle']}}</td>
        <td style='font-size: 15px;'>{{$produit['prix']}}fcfa</td>
        <td style='font-size: 15px;'>{{$produit['etat']}}</td>

        <td style='font-size: 15px;'> <p type="number" data-product-id="{{$id}}" min="1" class="quantity" value="" style="width: 80px;">{{$produit['qttestock']}}</p> </td>
        
        @php
         $total=$produit['qttestock']*$produit['prix'];
        @endphp
        <td style='font-size: 15px;' id="total-price{{$id}}">{{$total}}</td>

        <td style='font-size: 15px;'><a href="/suprimerprodcard/{{$id}}"><i class="fas fa-trash"></i></a></td>

       
                
        @endforeach

       
    
        
        
        </tr>
  
        </tbody>
    </table>
    <div class="row"> <div class="col-md-7"></div>
    <div class="col-md-5">
        <a href="/finaliser" class="btn btn-success btn-lg rounded-pill me-3" style=" text-decoration: none; color:white"> Submit </a>
        <button  class="btn btn-danger btn-lg rounded-pill ms-3" > <a href="/suprcart" style=" text-decoration: none; color:white">Reset</a> </button>
    </div>
</div>
            </div>
        </div>
    </div>


</div>
</div> -->

    
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: green">Paiement Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                {{-- <form action="">
                <div class="modal-body">
                    <div class="row" class="mt-3">
                        <div class="mb-3 col-md-6">
                        <label for="name" class="form-label"> numero</label>
                        <input type="number" class="form-control" id="name" name="categorie" style="border-top:none;border-left:none;border-right:none; border-bottom:solid 2px rgb(11, 11, 12);" placeholder=" EX : 656768943 ">
                    </div>
                   <div class="mb-3 col-md-6">
                        <label for="name" class="form-label"> Montant</label>
                        <input type="text" class="form-control" id="name" readonly name="categorie" style="border-top:none;border-left:none;border-right:none; border-bottom:solid 2px rgb(10, 10, 12);" >
                    </div>  
                    </div>
                    <div class="row" class="mt-3">

                     <div class="mb-3 col-md-6">
                        <label for="name" class="form-label"> localisation</label>
                        <select class="form-select" name="categorie" id="categorie">
                        </select>                    </div>  
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label"> mode paiement</label>
                        <select class="form-select" name="categorie" id="categorie">
                            <option value="Orange Money">Orange Money</option>
                            <option value="MTN Mobile Money">MTN Mobile Money</option>

                            </select>
                        </div>        
                </div>    
                <div class="row" class="mt-3">

                    <div class="mb-3 col-md-6">
                        <button style="border: none; background:none;" class="mt-3"><img src="photos/mtn1.jfif" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></button>
                    <button style="border: none; background:none;"><img src="photos/om.jfif" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></button>
                         </div>  
                   <div class="mb-3 col-md-6">
                    <label for="name" class="form-label"> mode paiement</label>
                    <select class="form-select" name="categorie" id="categorie">
                        <option value="Orange Money">Orange Money</option>
                        <option value="MTN Mobile Money">MTN Mobile Money</option>

                        </select> </div>        
               </div>      

                </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn bg-success" >Valider</button>

                </div>
            </form> --}}
            {{-- </div>
        </div>
    </div>
     --}}
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset ('bootstrap/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset ('bootstrap/assets/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js') }}"></script>

    <!-- <script>
        $(document).ready(function() {
            var table = $('#table2').DataTable( {
               
                dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ]
            } );
        
            table2.buttons().container()
                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );
    </script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript"src=  "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
        $(document).ready(function() {
            var table = $('#table2').DataTable( {
               
                dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ]
            } );
        
            table2.buttons().container()
                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );
    </script>

    <script>

$(document).on('input', '.quantity', function() {
    let quantity = $(this).val();
    let productId = $(this).data('product-id');
    $.ajax({
        url: '/update-cart',
        method: 'POST',
        data: {
            product_id: productId,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#total-price'+productId).text(response.totalPrice);
        }
    });
});
    </script>
          <script>
        // Function to calculate the total price
        function calculateTotalPrice() {
            const price = parseFloat(document.getElementsByClassName('prix').value);
            const quantity = parseInt(document.getElementsByClassName('quantity').value);
            const totalPrice = price * quantity;
            document.getElementsByClassName('total').textContent = totalPrice;
        }

        // Adding event listeners for real-time calculation
        document.getElementsByClassName('prix').addEventListener('input', calculateTotalPrice);
        // document.getElementsByClassName('quantity').addEventListener('input', calculateTotalPrice);
    </script>
 
 <script>
        $(document).ready(function() {
            $('.btn-toggle-products').on('click', function() {
                var id = $(this).data('id');
                var productRow = $('.product-row[data-id="' + id + '"]');
                productRow.toggle(); // Affiche ou cache la ligne de produits
                
                $.ajax({
                    url: 'http://localhost:8000/lirenotif', // Assurez-vous que cette route est correcte
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Inclure le token CSRF
                        id: id
                    },
                    success: function(response) {
                        // Vous pouvez personnaliser la mise à jour de l'interface utilisateur ici
                       
                    },
                    error: function(xhr) {
                        // Affiche l'erreur si la requête échoue
                       
                    }
                });
            });
        });


</script>


    <div class="mt-5 pt-5 ">@include('footer1')</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.decrease').click(function(e) {
            console.log('ffff');
            console.log(typeof jQuery); // This should output "function" if jQuery is loaded correctly
console.log(typeof $);       // This should also output "function"

            e.preventDefault(); // Prevent the page from refreshing
            
            var productId = $(this).data('id'); // Get product ID from the data attribute
            var etat = $(this).data('etat'); // Get product state from data attribute

            
            $.ajax({
                url: '/minusfromcard/' + productId + '/' + etat,
                type: 'GET', // Use 'POST' if you're submitting form data
                success: function(response) { 
                    var id = 'quantity'+productId+etat;
                    document.getElementById(id).value  = response.cartQuantity;;
                    const titleElement1 = document.getElementById('total');
                    // Update cart info (you can modify this based on your app's structure)
                    // alert(); // or update cart count, etc.
                        // titleElement.textContent = response.cartQuantity;
                        titleElement1.textContent = response.total;
                }, 
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Handler for the "increase" button
        $('.increase').click(function(e) {
            e.preventDefault(); // Prevent page refresh
            
            var productId = $(this).data('id'); // Get product ID from data attribute
            var etat = $(this).data('etat'); // Get product state from data attribute
            var pid = productId+etat; // Get product

            // Make AJAX request to increment the quantity of the specific product and state
            $.ajax({
                url: '/addtocard1/' + productId + '/' + etat,
                type: 'GET', // Use 'POST' if needed, adjust server route accordingly
                success: function(response) { 
                    // Update the quantity field for the specific product
                    var id = 'quantity' + productId+etat;
                    document.getElementById(id).value = response.Quantity;

                    // Update total cart amount displayed on page
                    const totalElement = document.getElementById('total');
                    totalElement.textContent = response.total + " FCFA";

                    // Display a temporary flash message
                    var flashMessage = $('#flash-message');
                    flashMessage.removeClass('d-none').text('Product quantity updated successfully!');
                    
                    // Hide the flash message after 3 seconds
                    setTimeout(function() {
                        flashMessage.addClass('d-none');
                    }, 3000);
                }, 
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        });
    });
</script>

</body>
