<?php

namespace App\Controller;

use App\Model\MovementCategory;
use App\Model\MovementStatus;
use App\Model\MovementType;
use Core\Controller\Controller;
use Core\View\Template;

/**
 * MovementController
 * 
 * Casse base para classes de movimentações
 */
abstract class MovementController extends Controller
{
    protected $categories;
    protected $types;
    protected $status;
    protected $movementClass;


    /**
     * __construct()
     * 
     * Inicializa objeto definindo template padrão
     */
    public function __construct()
    {
        parent::__construct(new Template());
    }


    /**
     * loadCategories()
     * 
     * Carrega todas as categorias de receitas ou despesas
     */
    protected function loadCategories()
    {
        $category         = new MovementCategory();
        $this->categories = $category->all($this->movementClass);
    }


    /**
     * loadTypes()
     * 
     * Carrega todos os tipos de Receitas ou despesas 
     */
    protected function loadTypes()
    {
        $type         = new MovementType();
        $this->types  = $type->all();
    }


    /**
     * loadStatus()
     * 
     * Carrega todos os status de receitas ou despesas
     */
    protected function loadStatus()
    {
        $status       = new MovementStatus();
        $this->status = $status->all();
    }


    /**
     * loadRelationFields()
     * 
     * Carrega campos de de seleção de receitas ou despesas
     */
    protected function loadRelationFields()
    {
        $this->loadCategories();
        $this->loadTypes();
        $this->loadStatus();
    }
}
