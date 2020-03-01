<?php

/**
 * config.php
 * 
 * Arquivo responsável pela configuração geral do sistema
 * @author Weydans Barros
 * Data de criação: 12/01/2020
 */
const HOME       = 'http://localhost/financas/';
const VIEW_PATH  = HOME . 'App/View/';

/**
 * TEMPLATE
 */
const TEMPLATE_HEADER = 'header.php';
const TEMPLATE_FOOTER = 'footer.php';


/**
 * BANCO DE DADOS
 */
const SGBD = 'mysql';
const HOST = 'localhost';
const BASE = 'financas';
const USER = 'root';
const PASS = '';


/**
 * FIELDS DEFAULT DO VALIDATOR
 */
const VALIDATOR_FIELDS_DEFAULT = [
    'name'          => 'nome',
    'password'      => 'senha',
    'email'         => 'email',
    'zipcode'       => 'CEP',
    'date'          => 'data',
    'street'        => 'rua', 
    'city'          => 'cidade',
    'number'        => 'número',
    'neighborhood'  => 'bairro',
    'state'         => 'estado',
    'country'       => 'país',
    'motrher-name'  => 'nome da mãe',
    'father-name'   => 'nome do pai',
    'ocupation'     => 'profissão',

    // Movimentações
    'description'           => 'descrição',
    'movement_category_id'  => 'categoria',
    'movement_type_id'      => 'tipo',
    'value'                 => 'valor',
    'release_date'          => 'data de lançamento',
    'expiration_date'       => 'data de vencimento',
    'payment_date'          => 'data de pagamento',
    'movement_status_id'    => 'status',
    'observation'           => 'observacao',
];


/**
 * MENSÁGENS DEFAULT DO VALIDATOR
 */
const VALIDATOR_MESSAGES_DEFAULT = [
    'required'              => 'O campo {field} é obrigatório.',
    'required_if'           => 'O campo {field} é obrigatório quando o campo {param} for igual a {value}.',
    'required_if_not_empty' => 'O campo {field} é obrigatório quando o campo {param} estiver preenchido.',
    'unique'                => 'Já existe um registro cadastrado com o valor informado para o campo {field}.',
    'numeric'               => 'O campo {field} deve conter apenas números.',
    'in'                    => 'O campo {field} só aceita os seguintes valores {param}.',
    'min'                   => 'O campo {field} deve ter no mínimo {param} caracteres.',
    'max'                   => 'O campo {field} deve ter no máximo {param} caracteres.',
];


/**
 * NAMESPACES QUE NÃO SEGUEM A HIERARQIA DE DIRETÓRIOS DO PROJETO
 */
const COUSTOM_NAMESPACES = [
    'PHPMailer' => [
        'PHPMailer\PHPMailer\PHPMailer' => 'Vendor/PHPMailer/src/PHPMailer.php',
        'PHPMailer\PHPMailer\Exception' => 'Vendor/PHPMailer/src/Exception.php',
        'PHPMailer\PHPMailer\SMTP'      => 'Vendor/PHPMailer/src/SMTP.php',
    ],
];
