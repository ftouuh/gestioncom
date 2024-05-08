<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Devis Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body>


    <!-- Modal for adding a new devis -->
    <div class="modal fade" id="addDevisModal" tabindex="-1" aria-labelledby="addDevisModalLabel" aria-hidden="true">
    <style>
        .header{
            display: flex;
            justify-content:space-between;
            margin-bottom:.3rem;
        }
        .products-wrapper{
            background-color:rgb(242, 242, 242);
            color:black;
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
        #delSelect{
            transform:scale(.8)
        }
    </style>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDevisModalLabel">Ajouter Une Devis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        
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
                            <button id="plus" class="btn btn-primary">&plus;</button>
                            </div>
                            <div class="mb-3">
                                <div class="selects">
                                    <div class="mb-3 product" id="s1">
                                        <select name="s1" id="id_produit" class="form-select">
                                            <option selected value="">Choisir un produit</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" id="withtoken" data-tokencsrf="{{ $product->token }}">
                                                    {{ $product->reference }} {{ $product->description }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="mb-3">
                                            <label  class="form-label"></label>
                                            <input type="number" class="form-control" id="qte" name="s1"  placeholder="Quantité">
                                        </div>
                                        <button id="delSelect" class="s1 btn btn-danger" type='button' onclick="deleteSelect(event)">&#10005;</button>
                                        <hr>
                                    </div>
                                    

                                </div>
                                <button class="annuler btn btn-primary" disabled>Annuler</button>
                                <button class="confirmer  btn  btn-primary">Confirmer</button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="nom_client" name="nom_client" value="">
                        <input type="hidden" class="form-control" id="prenom_client" name="prenom_client" value="">
                        <input type="hidden" class="form-control" id="pu">
                        <div class="mb-3">
                            <label for="devis_numero" class="form-label">Numero devis</label>
                            <input type="text" class="form-control" id="devis_numero" name="devis_numero">
                        </div>
                        <div class="mb-3">
                            <label for="date_commande" class="form-label">Date Commande</label>
                            <input type="date" class="form-control" id="date_commande" name="date_commande">
                        </div>
                        <div class="mb-3">
                            <label for="societe" class="form-label">Societe</label>
                            <input type="text" class="form-control" id="societe" readonly name="societe">
                        </div>
                        <div class="mb-3">
                            <label for="ice" class="form-label">ICE client</label>
                            <input type="text" class="form-control" id="ice" readonly name="ice">
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
                            <label for="date_devis" class="form-label">Date devis</label>
                            <input type="date" class="form-control" id="date_devis" name="date_devis">
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
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button id="add" class="btn btn-primary">Ajouter </button>
                        </div>
    </div>
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
            var confirmed = 0;
            var ttc = 0;
            var tva = 0;
            var ht = 0;
            // Show modal when the add button is clicked
            $('.add-devis').click(function() {
                $('#addDevisModal').modal('show');
            });

            // Fetch client data on id_client change
            $('#id_client').change(async function(){
                const id = $(this).val();
                try {
                    const response = await axios.get('/clients/' + id);
                    const client = response.data;
                    $('#nom_client').val(client.nom);
                    $('#prenom_client').val(client.prenom);
                    $('#societe').val(client.societe);
                    $('#ice').val(client.ice);
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


            $('#plus').click(async function(e){
                e.preventDefault();
                const wrapper = $('.selects');
                
                const res = await axios.get('/productsjson');
                const products = res.data.products;
                s++;
                startHTML = `<div class="mb-3" id="s${s}">
                                <select name="s${s}" id="id_produit" class="form-select">
                                <option selected value="">Choisi un produit</option>`;
                
                products.forEach(p => {
                    startHTML += `<option value="${p.id}">${p.reference} ${p.description}</option>`
                });
                startHTML += `</select>
                <div class="mb-3">
                            <label  class="form-label"></label>
                            <input type="number" class="form-control" id="qte" name="s${s}"  placeholder="Quantité">
                        </div>
                            <button id="delSelect" class="s${s} btn btn-danger" type='button' onclick="deleteSelect(event)">&#10005;</button>
                            <hr>
                            </div>`

                wrapper.append(startHTML);
            })
            $(".confirmer").click(async function (e) {
    e.preventDefault();

    const selects = document.querySelectorAll('#id_produit');
    const annuler = document.querySelector('.annuler');
    const confirmer = document.querySelector('.confirmer');
    const plus = document.querySelector('#plus');
    const delSelect = document.querySelectorAll('#delSelect');
    const qtes = document.querySelectorAll('#qte');
    qtes.forEach(q => {
                q.disabled = true;
            });

            delSelect.forEach(d => {
                d.disabled = true;
            });
            annuler.disabled = false;
            plus.disabled = true;
            confirmer.disabled = true;
    selects.forEach(async s => {
        const id = s.value;
        const ss = s.name;
        let qte = 0;

        qtes.forEach(q => {
            if (q.name === ss) {
                qte = q.value;
            }
        });

        s.disabled = true;
        confirmed = 1;

        if (id == "") {
            return;
        }

        try {
            const res = await axios.get('/products/' + id);
            const p = res.data;

            products.push([p.id, p.reference, p.description, p.Prix_unitaire, qte]);

            let ttc = 0;
            let tva = 0;
            let ht = 0;

            products.forEach(p => {
                ttc += parseFloat(p[3]) * parseInt(p[4]);
            });

            tva = ttc / 6;
            ht = ttc - tva;

            $('#total_ttc').val(ttc.toFixed(2));
            $('#tva').val(tva.toFixed(2));
            $('#total_ht').val(ht.toFixed(2));
        } catch (error) {
            console.log(error);
        }
    });

    console.log(products);
});


            $(".annuler").click(function(e){
                e.preventDefault();
                    products = [];

                    const  annuler = document.querySelector('.annuler');
                    const  confirmer = document.querySelector('.confirmer');
                    const  plus = document.querySelector('#plus');
                    const  delSelect = document.querySelectorAll('#delSelect');
                    const selects = document.querySelectorAll('#id_produit');
                    const qtes = document.querySelectorAll('#qte');
                    $('#total_ttc').val('');
                    $('#tva').val('');
                    $('#total_ht').val('');
                        qtes.forEach(q => {
                            q.disabled = false;
                        });
                    selects.forEach(s => {
                            s.disabled = false;
                    });
                        delSelect.forEach(d => {
                            d.disabled = false;
                        })
                    plus.disabled = false;
                    annuler.disabled = true;
                    confirmer.disabled = false;
                    console.log(products);
            })

    $('#add').click(async function(e){
        e.preventDefault();
        const ice = $('#ice').val();
        const societe = $('#societe').val();
        const numero_devis = $('#devis_numero').val();
        const versement = parseFloat($('#versement').val());
        const reste = parseFloat($('#reste').val());
        const saisi_par = $('#saisi_par').val();
        const date_commande = $('#date_commande').val();
        const date_devis = $('#date_devis').val();
        const id_client = $('#id_client').val();
        const TTC = parseFloat($('#total_ttc').val());
        const TVA = parseFloat($('#tva').val());
        const HT = parseFloat($('#total_ht').val());

        async function fetchCsrfToken() {
    try {
        const response = await axios.get('/csrf-token');
        return response.data.token;
    } catch (error) {
        console.error('Failed to fetch CSRF token:', error);
        throw error;
    }
}
        // Function to send data using Axios
async function sendData() {
    try {
        const tokencsrf = await fetchCsrfToken();
        
        const data = {
            _token: tokencsrf,
            devis_numero: numero_devis,
            date_commande: date_commande,
            societe: societe,
            ice: ice,
            versement: versement,
            products: JSON.stringify(products),
            reste: reste,   
            saisi_par: saisi_par,
            date_devis: date_devis,
            total_TTC: TTC,
            TVA: TVA,
            total_HT: HT,
            id_client: id_client
        };

        console.log(data);

        const response = await axios.post("/devis/store", data);
        location.reload();
    } catch (error) {
        console.error('Error sending data:', error);
    }
}
sendData();
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