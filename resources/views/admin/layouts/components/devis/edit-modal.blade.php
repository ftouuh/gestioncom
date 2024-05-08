<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST">  
                    @csrf
                    @method('PUT')
                    <!-- Hidden input field to store user ID -->
                    <input type="hidden" id="editUserId" name="id">
                    <!-- Form fields -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="editUsernom" name="nom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="editUserprenom" name="prenom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUserusername" name="username" value="">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="editUserphoneNumber" name="phoneNumber" value="">
                    </div>
                    <!-- Other form fields here -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" form="editUserForm" class="btn btn-primary">Sauvegarder</button>
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
    $('.edit-user').click(function() {
        var userId = $(this).data('user-id');
        var userNom = $(this).data('user-nom');
        var username = $(this).data('username');
        var userPrenom = $(this).data('user-prenom');
        var userPhone = $(this).data('user-phone');
        console.log(userPhone)
        console.log("Edit button clicked");

        // Populate modal fields with user data
        $('#editUserId').val(userId);
        $('#editUsernom').val(userNom);
        $('#editUserprenom').val(userPrenom);
        $('#editUserusername').val(username);
        $('#editUserphoneNumber').val(userPhone);

        // Show the modal
        $('#editUserModal').modal('show');
    });

    // Handle form submission via AJAX using Axios
    $('#editUserForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        console.log("Submit button clicked");
        var userId = $('#editUserId').val();
        var formData = $(this).serialize();
        console.log(formData)
        // Axios request
        axios.put('/users/update/' + userId, formData)
        location.reload()
    });
});
</script>
