
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
                                <a href="<?= route('despesa') ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-undo-alt mr-2"></i>
                                    Voltar
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box">
                                        <h2 class="mb-5"><?= ($expense['description'] ?? '') ?></h2>
                                        <div class="row">
                                            <div class="col-3">
                                                <h1 class="text-danger p-5">R$ <?= (!empty($expense['value']) ? number_format($expense['value'], 2, ',', '.') : ' - ') ?></h1>
                                            </div>
                                            <div class="col-8">
                                                <p class="mb-1"><b>Id:</b> <?= ($expense['id'] ?? ' - ') ?></p>
                                                <p class="mb-1"><b>Categoria:</b> <?= ($expense['category'] ?? ' - ') ?></p>
                                                <p class="mb-1"><b>Tipo:</b> <?= ($expense['type'] ?? ' - ') ?></p>
                                                <p class="mb-1"><b>Mês de referência:</b> <?= (!empty($expense['release_date']) ? date('m/Y', strtotime($expense['release_date'])) : ' - ') ?></p>
                                                <p class="mb-1"><b>Data pagamento:</b> <?= (!empty($expense['payment_date']) ? date('d/m/Y', strtotime($expense['payment_date'])) : ' - ') ?></p>
                                                <p class="mb-1"><b>Status:</b> <?= ($expense['status'] ?? ' - ') ?></p>
                                                <p class="mb-1"><b>Observação:</b> <?= ($expense['observation'] ?? ' - ') ?></p>
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
