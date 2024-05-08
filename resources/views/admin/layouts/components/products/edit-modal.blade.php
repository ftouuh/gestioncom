<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Modifier Un Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="post">  
                    @csrf
                    @method('PUT')
                    <!-- Hidden input field to store product ID -->
                    <input type="hidden" id="editProductId" name="id">
                    <!-- Form fields -->
                    <div class="mb-3">
                        <label for="famille" class="form-label">Famille</label>
                        <input type="text" class="form-control" id="editProductFamille" name="famille" value="">
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Reference</label>
                        <input type="text" class="form-control" id="editProductReference" name="reference" value="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="editProductDescription" name="description" value="">
                    </div>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantite</label>
                        <input type="text" class="form-control" id="editProductQuantite" name="quantite" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prixAchat" class="form-label">Prix Achat</label>
                        <input type="text" class="form-control" id="editProductPrixAchat" name="Prix_achat" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prixUnitaire" class="form-label">Prix Unitaire</label>
                        <input type="text" class="form-control" id="editProductPrixUnitaire" name="Prix_unitaire" value="">
                    </div>
                    <!-- Other form fields here -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" form="editProductForm" class="btn btn-primary">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
<!-- Ensure you have included jQuery and Axios scripts before this script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
$(document).ready(function() {
    console.log("Document ready");

    // Show modal and populate fields when the edit button is clicked
    $('.edit-product').click(function() {
        var productId = $(this).data('product-id');
        var productFamille = $(this).data('product-famille');
        var productReference = $(this).data('product-reference');
        var productDescription = $(this).data('product-description');
        var productQuantite = $(this).data('product-quantite');
        var productPrixAchat = $(this).data('product-pa');
        var productPrixUnitaire = $(this).data('product-pu');
        console.log(productPrixUnitaire);
        console.log("Edit button clicked");

        // Populate modal fields with product data
        $('#editProductId').val(productId);
        $('#editProductFamille').val(productFamille);
        $('#editProductReference').val(productReference);
        $('#editProductDescription').val(productDescription);
        $('#editProductQuantite').val(productQuantite);
        $('#editProductPrixAchat').val(productPrixAchat);
        $('#editProductPrixUnitaire').val(productPrixUnitaire);

        // Show the modal
        $('#editProductModal').modal('show');
    });

    // Handle form submission via AJAX using Axios
    $('#editProductForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        console.log("Submit button clicked");
        var productId = $('#editProductId').val();
        console.log(productId);
        var formData = $(this).serialize();
        console.log(formData);
        

        // Axios request to update product
        axios.put('/products/update/' + productId, formData)
        location.reload();
        // .then(function(response) {
        //     console.log(response.data); // Log response from server
        //     $('#editProductModal').modal('hide'); // Hide the modal
        //     location.reload(); // Reload the page after successful update
        // })
        // .catch(function(error) {
        //     console.error(error); // Log any errors
        //     // You can handle errors here, e.g., display error messages to the user
        // });
    });
});
</script>
