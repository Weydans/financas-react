class MovementController {

    constructor(elementId, title) {
        this._elementId = elementId;
        this._title = title;

        this.buildForm();
    }


    buildModal() {
        let modal       = document.getElementById('generic-modal'); 
        let element     = document.getElementById(this._elementId);
        let modalTitle  = document.querySelector('.modal-title');
        let modalBody   = document.querySelector('.modal-body'); 
        let modalFooter = document.querySelector('.modal-footer');

        element.addEventListener('click', () => {
            modal.style.display       = 'block';
            modalTitle.innerHTML      = this._title;
            modalBody.innerHTML       = this._form;
            modalFooter.style.display = 'none';
        }); 
        
        this.closeModal(modal);
    }


    closeModal(modal) {
        let close = document.querySelector('.close');

        close.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }


    buildForm() {
        this._form = `
            <form id="modal-form">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="form-group text-right mt-4">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        `;
    }


    addSpecialAttribute(url, movementAttribute) {
        this.buildModal();
        let formElement = document.querySelector('#modal-form');

        formElement.addEventListener('submit', (event) => {
            event.preventDefault();

            console.log('run');
            // movementAttribute.save();
        });
    }
}
