<?php

namespace Core\DAO;


use Core\DAO\DAO;

/**
 * DB 
 * 
 * Classe facade de acesso à base de dados
 * @author Weydans Barros
 * Data de criação: 24/02/2020
 */
abstract class DB 
{
    /** @var DAO $dao */
    private static $dao;


    /**
     * select($table, $columns)
     * 
     * Realiza select na base de dados
     * @param string $columns Nome das colunas a serem selecionadas separadas por vírgula
     *                        ou nome da tabela caso parametro $table não seja informado
     * @param string $table Nome da tabela
     * @return DAO
     */
    public static function select(string $columns, string $table = null) : DAO
    {
        self::$dao = new DAO();

        if (empty($table)) {
            $table   = $columns;
            $columns = null;
        }

        self::$dao->setTable($table)->select($columns);

        return self::$dao;
    }
}
