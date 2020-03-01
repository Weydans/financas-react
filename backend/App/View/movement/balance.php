
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">                            
                            <h5 class="card-title mt-2">
                                <i class="fas fa-list-ol mr-2"></i>Balanço
                            </h5>
                            <div class="card-tools">
                                <form class="form-inline" action="" method="post">
                                    <div class="form-row mr-3">
                                        <label class="mr-2" for="">A partir de</label>
                                        <input type="date" name="from" id="" class="form-control form-control-sm mr-3">

                                        <label class="mr-2" for="">Até</label>
                                        <input type="date" name="from" id="" class="form-control form-control-sm mr-3">

                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-search mr-2"></i>Buscar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descrição</th>
                                                <th>Categoria</th>
                                                <th>Mes Referência</th>
                                                <th class="text-right">Valor</th>
                                                <th width="120px">Ações</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                            $incomeTotal  = 0;
                                            $expenseTotal = 0;
                                            foreach ($movements as $movement) {
                                                $incomeTotal  += ($movement['movement_class_id'] == 1) ? $movement['value'] : 0;
                                                $expenseTotal += ($movement['movement_class_id'] == 2) ? $movement['value'] : 0;
                                        ?>
                                                <tr>
                                                    <td><?= $movement['id'] ?></td>
                                                    <td><?= $movement['description'] ?></td>
                                                    <td><span class="label label-success"><?= $movement['category'] ?></span></td>
                                                    <td><?= (date('m/Y', strtotime($movement['release_date']))) ?></td>
                                                    <td class="text-right text-<?= ($movement['movement_class_id'] == 1 ? 'success' : 'danger') ?>">
                                                        <?= (number_format($movement['value'], 2, ',', '.')) ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= route(($movement['movement_class_id'] == 1 ? 'receita/' : 'despesa/') . $movement['id']) ?>" class="btn btn-sm btn-info mr-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="<?= route(($movement['movement_class_id'] == 1 ? 'receita/' : 'despesa/') . $movement['id'] . '/edicao') ?>" class="btn btn-sm btn-warning mr-1">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?= route('movimentacao/' . $movement['id'] . '/delete') ?>" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php } ?>

                                        </tbody>

                                        <tfoot class="border-bottom">
                                            <tr>
                                                <th  class="border-right"colspan="4">Total de receitas</th>
                                                <th class="text-right text-success"><?= (number_format($incomeTotal, 2, ',', '.')) ?></th>
                                                <th colspan="3"></th>
                                            </tr>

                                            <tr>
                                                <th  class="border-right"colspan="4">Total de despesas</th>
                                                <th class="text-right text-danger"><?= (number_format($expenseTotal, 2, ',', '.')) ?></th>
                                                <th colspan="3"></th>
                                            </tr>

                                            <tr>
                                                <th  class="border-right"colspan="4">Total geral</th>
                                                <th class="text-right bg-<?= (($incomeTotal - $expenseTotal) >= 0 ? 'success' : 'danger') ?>"><?= (number_format($incomeTotal - $expenseTotal, 2, ',', '.')) ?></th>
                                                <th class="bg-<?= (($incomeTotal - $expenseTotal) >= 0 ? 'success' : 'danger') ?>" colspan="3"></th>
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
    </section>
