<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Ajouter Un Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" method="post" action="{{ route('add.users') }}">
                    @csrf
                    <!-- Form fields for adding a new user -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Numero Telephone</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot De Passe</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer Le Mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
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
    $('.add-user').click(function() {
        // Show the modal
        $('#addUserModal').modal('show');
    });
});
</script>

