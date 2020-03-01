
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">                            
                            <h5 class="card-title">
                                <i class="fas fa-list-ol mr-2"></i>Detalhes
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
                                        <h2 class="mb-5"><?= $income['description'] ?></h2>
                                        <div class="row">
                                            <div class="col-3">
                                                <h1 class="text-success p-5">R$ <?= $income['value'] ?></h1>
                                            </div>
                                            <div class="col-8">
                                                <p class="mb-1"><b>Id:</b> <?= $income['id'] ?></p>
                                                <p class="mb-1"><b>Categoria:</b> <?= $income['category'] ?></p>
                                                <p class="mb-1"><b>Tipo:</b> <?= $income['type'] ?></p>
                                                <p class="mb-1"><b>Mês de Referência:</b> <?= (date('m/Y', strtotime($income['release_date']))) ?></p>
                                                <p class="mb-1"><b>Data Pagamento:</b> <?= (date('d/m/Y', strtotime($income['payment_date']))) ?></p>
                                                <p class="mb-1"><b>Observação:</b> <?= $income['observation'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
