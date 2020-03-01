/**
 * Arquivo responsável pelas migrações do projeto
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */

ALTER TABLE movement
ADD CONSTRAINT FK_movement_class
FOREIGN KEY (movement_class_id) REFERENCES movement_class(id);
-- ALTER TABLE movement
-- DROP FOREIGN KEY FK_movement_class;

 
ALTER TABLE movement
ADD CONSTRAINT FK_movement_type
FOREIGN KEY (movement_type_id) REFERENCES movement_type(id);
-- ALTER TABLE movement
-- DROP FOREIGN KEY FK_movement_type;


ALTER TABLE movement
ADD CONSTRAINT FK_movement_category
FOREIGN KEY (movement_category_id) REFERENCES movement_category(id);
-- ALTER TABLE movement
-- DROP FOREIGN KEY FK_movement_category;


ALTER TABLE movement
ADD CONSTRAINT FK_movement_status
FOREIGN KEY (movement_status_id) REFERENCES movement_status(id);
-- ALTER TABLE movement
-- DROP FOREIGN KEY FK_movement_status


ALTER TABLE movement_file
ADD CONSTRAINT FK_movement
FOREIGN KEY (movement_id) REFERENCES movement(id) ON DELETE CASCADE;
-- ALTER TABLE movement_file
-- DROP FOREIGN KEY FK_movement
