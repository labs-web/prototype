  <!-- Modal -->
  <div class="modal fade" id="deleteMod" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-danger">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Supprimer le
                      Role</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Êtes-vous sûr de vouloir supprimer cette role ?</p>
              </div>
              <div class="modal-footer">
                  <form id="deleteForm" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" id="role_id" name="id">
                      <div class="container pb-3 d-flex flex-row-reverse gap-2 bd-highlight">
                          <button type="submit" onclick="submitDeleteForm()"
                              class="btn btn-danger ml-2">Supprimer</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
