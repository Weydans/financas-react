<?php

namespace App\DAO;


use Core\DAO\DAO;

/**
 * MovementDAO
 * 
 * Responsável pela gestão de dados da entidade movement * 
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */
class MovementDAO extends DAO
{
    protected $table = 'movement';


    public function allMovements(int $classId = null)
    {
        $query = '
            SELECT  
                movement.id,
                movement.movement_class_id,
                movement.description,
                movement_category.name as category,
                movement.release_date,
                movement.payment_date,
                movement.expiration_date,
                movement.value,
                movement_status.name as status
            FROM movement
                INNER JOIN movement_category
                    ON movement.movement_category_id = movement_category.id
                INNER JOIN movement_status
                    ON movement.movement_status_id = movement_status.id
        ';

        if (!empty($classId)) {
            $query .= ' WHERE movement.movement_class_id = :movement_class_id ';
        }

        $query .= ' ORDER BY movement.id';

        if (!empty($classId)) {
            return $this->raw($query, ['movement_class_id' => $classId])->get();
        }

        return $this->raw($query)->get();
    }


    public function find(int $id, int $classId = null) : array
    {
        return $this->raw('
                        SELECT  
                            movement.id,
                            movement.description,
                            movement.release_date,
                            movement.payment_date,
                            movement.expiration_date,
                            movement.value,
                            movement.observation,
                            movement_category.id as movement_category_id,
                            movement_category.name as category,
                            movement_category.description as category_description,
                            movement_status.id as movement_status_id,
                            movement_status.name as status,
                            movement_status.description as status_description,
                            movement_type.id as movement_type_id,
                            movement_type.name as type,
                            movement_type.description as type_description
                        FROM movement
                            INNER JOIN movement_category
                                ON movement.movement_category_id = movement_category.id
                            INNER JOIN movement_status
                                ON movement.movement_status_id = movement_status.id
                            INNER JOIN movement_type
                                ON movement.movement_type_id = movement_type.id
                        WHERE movement.id = :id AND movement.movement_class_id = :movement_class_id
                        ORDER BY movement.id
                    ', [
                        'id' => $id,
                        'movement_class_id' => $classId
                    ])
                    ->first();
    }
}
