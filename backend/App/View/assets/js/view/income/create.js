window.addEventListener('load', () => {

    const baseUrl = 'http://localhost/financas/';

    let btnAddCategory  = document.querySelector('#btnAddCategory');
    let btnAddType      = document.querySelector('#btnAddType');
    let btnAddStatus    = document.querySelector('#btnAddStatus');

    /**
     * Adiciona nova categoria 
     */
    btnAddCategory.addEventListener('click', () => {
        addSpecialFields('Cadastro de categoria', getForm(true), baseUrl + 'addCategory', '#movement_category_id');
    });

    /**
     * Adiciona novo tipo de movimentação
     */
    btnAddType.addEventListener('click', () => {
        addSpecialFields('Cadastro de tipo', getForm(), baseUrl + 'addType', '#movement_type_id');
    });

    /**
     * Adiciona novo tipo de Status
     */
    btnAddStatus.addEventListener('click', () => {
        addSpecialFields('Cadastro de status', getForm(), baseUrl + 'addStatus', '#movement_status_id');
    });
});


function modal(title, element) {
    let modal = document.querySelector('#generic-modal');

    if (document.querySelector('.modal-body form')) {
        document.querySelector('.modal-body').removeChild(document.querySelector('.modal-body form'));
    }

    document.querySelector('.modal-title').innerHTML = title;
    document.querySelector('.modal-footer').style.display = 'none';
    document.querySelector('.modal-body').appendChild(element);
    
    modal.style.display = 'block';  
    
    document.querySelector('.close').addEventListener('click', () => {
        [...document.querySelectorAll('.modal-body input[name]')].forEach(input => {
            input.value = '';
        });

        document.querySelector('.modal-msg').innerHTML = '';
        modal.style.display = 'none';
    })
}


function getForm(category = false) {
    let form = document.createElement('form');
    form.setAttribute('id', 'form-modal');

    let receita = 1;
    let despesa = 2;

    if (category) {
        movementClass = window.location.href.indexOf('receita') > 0 ? receita : despesa;
        input = `<input hidden type="text" name="movement_class_id" value="${movementClass}"></input>`;
    }

    form.innerHTML = `
        ${category ? input : ''}
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" autocomplete="off" autofocus>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" autocomplete="off">
        </div>
        </div>
        <div class="form-group text-right">
            <button type="reset" class="btn btn-danger mr-1 ">Limpar</button>
            <button class="btn btn-primary">Cadastrar</button>
        </div>
    `;

    return form;
}


function addSpecialFields(modalTitle, form, url, target) {
    modal(modalTitle, form);

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let formData = new FormData(form);

        fetch(url, {method: 'POST', body: formData})
            .then(response => response.json())
            .then(response => {
                document.querySelector('.modal-msg').innerHTML = response.message;

                if (response.error == 'false') {
                    document.querySelector(target).innerHTML += `<option selected value="${response.data.id}">${response.data.name}</option>`;
                }
            });
    });
}