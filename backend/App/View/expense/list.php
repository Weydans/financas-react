
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-list mr-2"></i>Listagem
                            </h5>
                            <div class="card-tools">
                                <a href="<?= route('despesa/cadastro') ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus mr-2"></i>Nova
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box">
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Descrição</th>
                                                        <th>Categoria</th>
                                                        <th>Mês referência</th>
                                                        <th>Valor</th>
                                                        <th>Status</th>
                                                        <th width="120px">Ações</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="border-bottom">

                                                <?php
                                                    $expenseTotal = 0;
                                                    foreach ($expenses as $expense) {
                                                        $expenseTotal += $expense['value'];
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?= ($expense['id']) ?>
                                                            </td>
                                                            <td>
                                                                <?= ($expense['description']) ?>
                                                            </td>
                                                            <td>
                                                                <span class="label label-success"><?= ($expense['category']) ?></span>
                                                            </td>
                                                            <td>
                                                                <?= (date('m/Y', strtotime($expense['release_date']))) ?>
                                                            </td>
                                                            <td class="text-danger">
                                                                <?= (number_format($expense['value'], 2, ',', '.')) ?>
                                                            </td>
                                                            <td class="text-<?= ($expense['status'] == 'Pago' ? 'success' : ($expense['status'] == 'Atrasado' ? 'danger' : 'warning')) ?>">
                                                                <b><?= ($expense['status']) ?></b>
                                                            </td>
                                                            <td>
                                                                <a href="<?= route('despesa/' . ($expense['id'])) ?>" class="btn btn-sm btn-info mr-1">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="<?= route('despesa/' . ($expense['id']) . '/edicao') ?>" class="btn btn-sm btn-warning mr-1">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= route('despesa/' . ($expense['id']) . '/delete') ?>" class="btn btn-sm btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php } ?>

                                                </tbody>

                                                <tfoot class="border-bottom">
                                                    <tr>
                                                        <th  class="border-right"colspan="4">Total</th>
                                                        <th class="text-danger" colspan="3"><?= (number_format($expenseTotal, 2, ',', '.')) ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
