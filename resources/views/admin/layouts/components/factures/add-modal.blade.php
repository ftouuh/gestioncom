<div class="modal fade" id="addFactureModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New Facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" method="post" action="{{ route('add.factures') }}">
                    @csrf
                    <!-- Form fields for adding a new user -->
                    <div class="mb-3">
                        <label for="client" class="form-label">Nom Client</label>
                        <input type="text" class="form-control" id="nom_client" name="nom_client" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom Client</label>
                        <input type="text" class="form-control" id="prenom_client" name="prenom_client" value="">
                    </div>
                    <div class="mb-3">
                        <label for="Date Commande" class="form-label">Date Commande</label>
                        <input type="date" class="form-control" id="date_commande" name="date_commande" value="">
                    </div>
                    <div class="mb-3">
                        <label for="versement" class="form-label">Versement</label>
                        <input type="text" class="form-control" id="versement" name="versement" value="">
                    </div>
                    <div class="mb-3">
                        <label for="reste" class="form-label">Reste</label>
                        <input type="text" class="form-control" id="reste" name="reste" value="">
                    </div>
                    <div class="mb-3">
                        <label for="Saisi_par" class="form-label">Saisi par</label>
                        <input type="text" class="form-control" id="Saisi_le" name="saisi_par" value="">
                    </div>
                    <div class="mb-3">
                        <label for="Saisi_le" class="form-label">Date Saisi</label>
                        <input type="date" class="form-control" id="Saisi_le" name="saisi_le" value="">
                    </div>
                    <div class="mb-3">
                        <label for="total_TTC" class="form-label">TOTAL_TTC</label>
                        <input type="text" class="form-control" id="total_ttc" name="total_TTC" readonly value="">
                    </div>
                    <div class="mb-3">
                        <label for="TVA" class="form-label">TVA</label>
                        <input type="text" class="form-control" id="TVA" name="TVA" readonly value="">
                    </div>
                    <div class="mb-3">
                        <label for="total_ht" class="form-label">TOTAL_HT</label>
                        <input type="text" class="form-control" id="total_HT" name="total_HT" readonly value="">
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

<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function() {
    console.log("Document ready");

    // Show modal when the add button is clicked
    $('.add-facture').click(function() {
        // Show the modal
        $('#addFactureModal').modal('show');
    });

});

 $('#total_ttc').val()
</script>

