<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Modifier Un Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editClientForm" method="POST">  
                    @csrf
                    @method('PUT')
                    <!-- Hidden input field to store user ID -->
                    <input type="hidden" id="editClientId" name="id">
                    <!-- Form fields -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="editClientnom" name="nom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="editClientprenom" name="prenom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="editClientTelephone" name="telephone" value="">
                    </div>
                    <div class="mb-3">
                        <label for="societe" class="form-label">Societé</label>
                        <input type="text" class="form-control" id="editClientSociete" name="societe" value="">
                    </div>
                    <div class="mb-3">
                        <label for="ice" class="form-label">ICE</label>
                        <input type="text" class="form-control" id="editClientIce" name="ice" value="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="editClientAddress" name="address" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editClientEmail" name="email" value="">
                    </div>
                    <!-- Other form fields here -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" form="editClientForm" class="btn btn-primary">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    
$(document).ready(function() {
    console.log("Document ready");
    // Show modal and populate fields when the edit button is clicked
    $('.edit-client').click(function() {
        var clientId = $(this).data('client-id');
        var clientNom = $(this).data('client-nom');
        var clientPrenom = $(this).data('client-prenom');
        var clientTelephone = $(this).data('client-telephone');
        var clientSociete = $(this).data('client-societe');
        var clientIce = $(this).data('client-ice');
        var clientAddress = $(this).data('client-address');
        var clientEmail = $(this).data('client-email');
        console.log(clientEmail);
        console.log("Edit button clicked");

        // Populate modal fields with user data
        $('#editClientId').val(clientId);
        $('#editClientnom').val(clientNom);
        $('#editClientprenom').val(clientPrenom);
        $('#editClientSociete').val(clientSociete);
        $('#editClientIce').val(clientIce);
        $('#editClientTelephone').val(clientTelephone);
        $('#editClientAddress').val(clientAddress);
        $('#editClientEmail').val(clientEmail);
        // Show the modal
        $('#editClientModal').modal('show');
    });

    // Handle form submission via AJAX using Axios
    $('#editClientForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        console.log("Submit button clicked");
        var clientId = $('#editClientId').val();
        console.log(clientId);
        var formData = $(this).serialize();
        console.log(formData);

        // Axios request
        axios.put('/clients/update/' + clientId, formData);
        location.reload();
    });                 
});
</script>
