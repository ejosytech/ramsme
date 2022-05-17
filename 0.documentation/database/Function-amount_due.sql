
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `amount_due`(`occupancy` TEXT, `no_room` INT, `effective_date` DATE) RETURNS decimal(10,2)
BEGIN
   DECLARE  computed_amnt DEC;
   DECLARE  no_month_elaspe INT;
   
   SET no_month_elaspe = TIMESTAMPDIFF(MONTH,effective_date,CURRENT_DATE);
   
   IF (occupancy = 'Landlord') THEN
   SET computed_amnt = 7000 * no_month_elaspe;
   END IF;
   
   IF (occupancy = 'tenant' and no_room = 3) THEN
   SET computed_amnt = 3000 * no_month_elaspe;
   END IF;
   
   IF (occupancy = 'tenant' and no_room = 2) THEN
   SET computed_amnt = 2000 * no_month_elaspe;
   END IF;
   
   IF (occupancy = 'tenant' and no_room = 1) THEN
   SET computed_amnt = 1000 * no_month_elaspe;
   END IF;
   

   RETURN computed_amnt;
   END$$
DELIMITER ;