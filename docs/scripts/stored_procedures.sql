-- Position

DELIMITER //
CREATE PROCEDURE sp_listPositions()
BEGIN
	SELECT id, name, basichourlypay, active FROM position;
END //
DELIMITER ;