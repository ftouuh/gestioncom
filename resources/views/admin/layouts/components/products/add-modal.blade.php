<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Ajouter Un Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="post" action="{{ route('add.products') }}">
                    @csrf
                    <!-- Form fields for adding a new product -->
                    <div class="mb-3">
                        <label for="famille" class="form-label">Famille</label>
                        <input type="text" class="form-control" id="famille" name="famille" value="">
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Reference</label>
                        <input type="text" class="form-control" id="reference" name="reference" value="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="description" name="description" value="">
                    </div>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantite</label>
                        <input type="text" class="form-control" id="quantite" name="quantite" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prixAchat" class="form-label">Prix Achat</label>
                        <input type="text" class="form-control" id="prixAchat" name="Prix_achat" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prixUnitaire" class="form-label">Prix Unitaire</label>
                        <input type="text" class="form-control" id="prixUnitaire" name="Prix_unitaire" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter </button>
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
    $('.add-product').click(function() {
        // Show the modal
        $('#addProductModal').modal('show');
    });
});
</script>
