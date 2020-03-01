
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">                            
                            <h5 class="card-title">
                                <i class="fas fa-save mr-2"></i><?= $title ?>
                            </h5>
                            <div class="card-tools">
                                <a href="<?= route('receita') ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-undo-alt mr-2"></i>
                                    Voltar
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box">
                                        <form action="<?= route($action) ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                            
                                            <input hidden type="text" name="movement_class_id" value="<?= ($data['movement_class_id'] ?? 1 ) ?>">
                                            <input hidden type="text" name="id" value="<?= ($data['id'] ?? '' ) ?>" <?= (empty($data['id']) ? 'disabled' : '') ?>>
                                        
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                    <label class="mb-1" for="">Descrição</label>                                                
                                                    <input type="text" name="description" id ="description" class="form-control" value="<?= ($data['description'] ?? '' ) ?>" autofocus>
                                                </div>
                                            
                                                <div class="form-group col-2">
                                                    <label class="mb-1" for="">Categoria</label>
                                                    <button type="button" id="btnAddCategory" class="btn btn-sm btn-secondary py-0 ml-1 mb-1"><i class="fas fa-plus"></i></button>
                                                    <select name="movement_category_id" id="movement_category_id" class="form-control">
                                                        <option selected value="">--SELECIONE--</option>
                                                        
                                                        <?php foreach ($categories as $category) { ?>
                                                                <option value="<?= $category['id'] ?>" <?= (!empty($data['movement_category_id']) && $data['movement_category_id'] == $category['id'] ? 'selected' : '' ) ?> title="<?= $category['description']?>">
                                                                    <?= $category['name'] ?>
                                                                </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>     

                                                <div class="form-group col-2">
                                                    <label class="mb-1" for="">Tipo</label> 
                                                    <button type="button" id="btnAddType" class="btn btn-sm btn-secondary py-0 ml-1 mb-1"><i class="fas fa-plus"></i></button>       
                                                    <select name="movement_type_id" id="movement_type_id" class="form-control">
                                                        <option selected value="">--SELECIONE--</option>
                                                        
                                                        <?php foreach ($types as $type) { ?>
                                                                <option value="<?= $type['id'] ?>" <?= (!empty($data['movement_type_id']) && $data['movement_type_id'] == $type['id'] ? 'selected' : '' ) ?> title="<?= $type['description']?>">
                                                                    <?= $type['name'] ?>
                                                                </option>
                                                        <?php } ?>

                                                    </select> 
                                                </div>

                                                <div class="form-group col-2">
                                                    <label class="mb-1" for="">Valor</label>                                                
                                                    <input type="number" min="0" name="value" id="value" class="form-control" value="<?= ($data['value'] ?? '' ) ?>">
                                                </div>

                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-3">
                                                    <label class="mb-1" for="">Data de lançamento</label>
                                                    <input type="date" name="release_date" id="release_date" class="form-control" value="<?= ($data['release_date'] ?? '' ) ?>">
                                                </div>
                                                
                                                <div class="form-group col-3">
                                                    <label class="mb-1" for="">Data de vencimento</label>                                                
                                                    <input type="date" name="expiration_date"  id="expiration_date" class="form-control" value="<?= ($data['expiration_date'] ?? '' ) ?>">
                                                </div> 
                                                
                                                <div class="form-group col-3">
                                                    <label class="mb-1" for="">Status</label>
                                                    <button type="button" id="btnAddStatus" class="btn btn-sm btn-secondary py-0 ml-1 mb-1"><i class="fas fa-plus"></i></button>
                                                    <select name="movement_status_id" id="movement_status_id" class="form-control">   
                                                        <option selected value="">--SELECIONE--</option>
                                                        
                                                        <?php foreach ($status as $stat) { ?>                                                     
                                                                <option value="<?= $stat['id'] ?>" <?= (!empty($data['movement_status_id']) && $data['movement_status_id'] == $stat['id'] ? 'selected' : '' ) ?> title="<?= $stat['description']?>">
                                                                    <?= $stat['name'] ?>
                                                                </option>
                                                        <?php } ?>

                                                    </select>
                                                </div> 

                                                <div class="form-group col-3">
                                                    <label class="mb-1" for="">Data de pagamento</label>                                                
                                                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="<?= ($data['payment_date'] ?? '' ) ?>">
                                                </div>                                                 

                                                <div class="form-group col-12">
                                                    <label class="mb-1" for="">Observação</label>                                                    
                                                    <textarea name="observation" id="observation" rows="4" class="form-control"><?= ($data['observation'] ?? '' ) ?></textarea>
                                                </div>
                                                
                                                <div class="form-group col-4">
                                                    <label class="mb-1" for="">Arquivos</label>
                                                    <input type="file" name="file[]" multiple id="file" class="form-control-file" value="<?= ($data['file[]'] ?? '' ) ?>">
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <button class="btn btn-primary px-4 mt-3">
                                                    <i class="fas fa-save mr-2"></i><?= $buttonAction ?>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
