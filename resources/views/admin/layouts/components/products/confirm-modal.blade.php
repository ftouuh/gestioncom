<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteId" name="deleteId" value="" />
                </form>
                Are you sure you want to delete user with ID: <span id="productIdPlaceholder"></span> ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-product').click(function() {
            var productId = $(this).data('product-id'); // Retrieve the user ID
            $('#deleteId').val(productId); // Populate the deleteId input field with the user ID
            $('#productIdPlaceholder').text(productId); // Populate the user ID placeholder in the modal body
            $('#confirmDeleteModal').modal('show'); // Show the confirmation modal
        });

        // Handle confirmation of deletion
        $('#confirmDeleteBtn').click(function() {
            var productId = $('#deleteId').val()
            var formData = $('#deleteForm').serialize();
            axios.delete('/products/destroy/'+ productId, formData)
            location.reload();
        });

        // Detach event handler for delete button after confirmation modal is closed
        $('#confirmDeleteModal').on('hidden.bs.modal', function () {
            // $('#confirmDeleteBtn').off('click');
        });
    });
</script>
