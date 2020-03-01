<?php

use Core\Route;
use App\Controller\LoginController;
use App\Controller\IncomeController;
use App\Controller\ExpenseController;
use App\Controller\FinancialMovimentController;
use App\Controller\MovementCategoryController;
use App\Controller\MovementStatusController;
use App\Controller\MovementTypeController;


try {    
    $route = new Route('financas/');


    $route->get('/', function() {
        $login = new LoginController();
        $login->index();
    });

    $route->get('/home', function() {
        $login = new LoginController();
        $login->home();
    });

    $route->post('/addCategory', function(){
        $movementCategory = new MovementCategoryController();
        $movementCategory->store();
    });

    $route->post('/addType', function(){
        $movementType = new MovementTypeController();
        $movementType->store();
    });

    $route->post('/addStatus', function() {
        $movementStatus = new MovementStatusController();
        $movementStatus->store();
    });

    // ROTAS DE RESCEITAS
    $route->group('/receita', [], function($route) {
        $route->get('', function() {
            $income = new IncomeController();
            $income->index();
        });
    
        $route->get('/cadastro', function() {
            $income = new IncomeController();
            $income->create();
        });
    
        $route->post('/store', function() {
            $income = new IncomeController();
            $income->store();
        });
    
        $route->get('/{id}', function($id) {
            $income = new IncomeController();
            $income->details($id);
        });
    
        $route->get('/{id}/edicao', function($id) {
            $income = new IncomeController();
            $income->edit($id);
        });
    
        $route->post('/update', function() {
            $income = new IncomeController();
            $income->update();
        });
    
        $route->get('/{id}/delete', function($id) {
            $income = new IncomeController();
            $income->delete($id);
        });
    });

    // ROTAS DE DESPESAS
    $route->group('/despesa', [], function($route) {
        $route->get('', function() {
            $expense = new ExpenseController();
            $expense->index();
        });

        $route->get('/cadastro', function() {
            $expense = new ExpenseController();
            $expense->create();
        });

        $route->post('/store', function() {
            $expense = new ExpenseController();
            $expense->store();
        });

        $route->get('/{id}', function($id) {
            $expense = new ExpenseController();
            $expense->details($id);
        });
    
        $route->get('/{id}/edicao', function($id) {
            $expense = new ExpenseController();
            $expense->edit($id);
        });
    
        $route->post('/update', function() {
            $expense = new ExpenseController();
            $expense->update();
        });
    
        $route->get('/{id}/delete', function($id) {
            $expense = new ExpenseController();
            $expense->delete($id);
        });
    });

    $route->get('/movimentacao', function() {
        $moviment = new FinancialMovimentController();
        $moviment->index();
    });

    $route->get('/movimentacao/{id}/delete', function($id) {
        $moviment = new FinancialMovimentController();
        $moviment->delete($id);
    });

    $route->run();

} catch (Exception $e) {
    throw new Exception($e->getMessage());    
}