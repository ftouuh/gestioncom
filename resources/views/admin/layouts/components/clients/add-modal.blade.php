<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Ajouter Un Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm" method="post" action="{{ route('add.clients') }}">
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
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="">
                    </div>
                    <div class="mb-3">
                        <label for="societe" class="form-label">Societe</label>
                        <input type="text" class="form-control" id="societe" name="societe" value="">
                    </div>
                    <div class="mb-3">
                        <label for="ice" class="form-label">ICE</label>
                        <input type="text" class="form-control" id="ice" name="ice" value="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
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
    $('.add-client').click(function() {
        // Show the modal
        $('#addClientModal').modal('show');
    });

});
</script>

