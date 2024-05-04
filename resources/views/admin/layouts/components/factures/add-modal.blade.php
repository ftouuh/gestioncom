<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Facture Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body>


    <!-- Modal for adding a new facture -->
    <div class="modal fade" id="addFactureModal" tabindex="-1" aria-labelledby="addFactureModalLabel" aria-hidden="true">
    <style>
        .header{
            display: flex;
            justify-content:space-between;
            margin-bottom:.3rem;
        }
        .products-wrapper{
            background-color:red;
            color:white;
            padding:1rem;
            border-radius:10px;
            display: flex;
            flex-direction:column;
            gap:4px;
        }
        .selects{
            display: flex;
            flex-direction:column;
            gap:4px;
        }
    </style>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFactureModalLabel">Add New Facture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFactureForm" method="post" action="{{ route('add.factures') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="id_client" class="form-label">Client</label>
                            <select name="id_client" id="id_client" class="form-select">
                                <option selected value="">-</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="products-wrapper">
                            <div class="header">
                            <label for="" class="form-label">Les Produits</label>
                            <button id="plus">+</button>
                            </div>
                            <div class="mb-3">
                                <div class="selects">
                                    <div class="mb-3" id="s1">
                                        <select name="id_produit" id="id_produit" class="form-select">
                                        <option selected value="">-</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->ref }} {{ $product->description }}</option>
                                            @endforeach
                                        </select>
                                        <button id="delSelect" class="s1" type='button' onclick="deleteSelect(event)"></button>
                                    </div>

                                </div>
                                <button class="annuler">Annuler</button>
                                <button class="confirmer">Confirmer</button>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="date_commande" class="form-label">Quantité</label>
                            <input type="number" class="form-control" id="qte" name="qte">
                        </div>
                        <input type="hidden" class="form-control" id="nom_client" name="nom_client" value="">
                        <input type="hidden" class="form-control" id="prenom_client" name="prenom_client" value="">
                        <input type="hidden" class="form-control" id="pu">
                        <div class="mb-3">
                            <label for="date_commande" class="form-label">Date Commande</label>
                            <input type="date" class="form-control" id="date_commande" name="date_commande">
                        </div>
                        <div class="mb-3">
                            <label for="versement" class="form-label">Versement</label>
                            <input type="text" class="form-control" id="versement" name="versement">
                        </div>
                        <div class="mb-3">
                            <label for="reste" class="form-label">Reste</label>
                            <input type="text" class="form-control" id="reste" name="reste">
                        </div>
                        <div class="mb-3">
                            <label for="saisi_par" class="form-label">Saisi par</label>
                            <input type="text" class="form-control" id="saisi_par" name="saisi_par">
                        </div>
                        <div class="mb-3">
                            <label for="saisi_le" class="form-label">Date Saisi</label>
                            <input type="date" class="form-control" id="saisi_le" name="saisi_le">
                        </div>
                        <div class="mb-3">
                            <label for="total_ttc" class="form-label">TOTAL_TTC</label>
                            <input type="text" class="form-control" id="total_ttc" name="total_ttc" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tva" class="form-label">TVA</label>
                            <input type="text" class="form-control" id="tva" name="tva" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_ht" class="form-label">TOTAL_HT</label>
                            <input type="text" class="form-control" id="total_ht" name="total_ht" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/libs/jquery/jquery.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {

            var products = [];
            var s = 1
            // Show modal when the add button is clicked
            $('.add-facture').click(function() {
                $('#addFactureModal').modal('show');
            });

            // Fetch client data on id_client change
            $('#id_client').change(async function(){
                const id = $(this).val();
                try {
                    const response = await axios.get('/clients/' + id);
                    const client = response.data;
                    $('#nom_client').val(client.nom);
                    $('#prenom_client').val(client.prenom);
                } catch (error) {
                    console.error('Error fetching client data:', error);
                }
            });
            $('#id_produit').change(async function(){
                const id = $(this).val();
                try {
                    const response = await axios.get('/products/' + id);
                    const product = response.data;
                    $('#ref_p').val(product.reference);
                    $('#desc_p').val(product.description);
                    $('#pu').val(product.Prix_unitaire);

                if($('#pu').val() != '' && $('#qte').val() != ''){
                    const pu = parseFloat($('#pu').val());
                    const qte = parseFloat($('#qte').val());
                    const ttc =  pu*qte;
                    const tva = ttc/6;
                    const ht =  ttc - tva;

                    $('#total_ttc').val(ttc);
                    $('#tva').val(tva);
                    $('#total_ht').val(ht);
                }
                } catch (error) {
                    console.error('Error fetching client data:', error);
                }
            });
            $('#qte').change(function(){
                if($('#pu').val() != '' && $('#qte').val() != ''){
                    const pu = parseFloat($('#pu').val());
                    const qte = parseFloat($('#qte').val());
                    const ttc =  pu*qte;
                    const tva = ttc/6;
                    const ht =  ttc - tva;

                    $('#total_ttc').val(ttc.toFixed(2));
                    $('#tva').val(tva);
                    $('#total_ht').val(ht);
                }
            })

            $('#plus').click(async function(e){
                e.preventDefault();
                const wrapper = $('.selects');
                
                const res = await axios.get('/productsjson');
                const products = res.data.products;
                s++;
                startHTML = `<div class="mb-3" id="s${s}">
                                <select name="id_produit" id="id_produit" class="form-select">
                                <option selected value="">-</option>`;
                
                products.forEach(p => {
                    startHTML += `<option value="${p.id}">${p.reference}${p.description}</option>`
                });
                startHTML += `</select>
                            <button id="delSelect" class="s${s}" type='button' onclick="deleteSelect(event)"></button>
                            </div>`
                wrapper.append(startHTML);
                console.log(startHTML)
            })
            $(".confirmer").click(async function(e){
                e.preventDefault();

                const selects = document.querySelectorAll('#id_produit');

                selects.forEach(async s => {
                    const id = s.value;

                    try {
                        const res = await axios.get('/products/'+ id);
                        const p = res.data
                        products.push([p.id,p.reference,p.description,p.Prix_unitaire])
                    } catch (error) {
                        console.log(error)
                    }
                });
                console.log(products)
            });

            
        });
    </script>
    <script>
        function deleteSelect(e){
                const parent = e.target.parentElement;
                parent.remove();
            }
    </script>
</body>
</html>
