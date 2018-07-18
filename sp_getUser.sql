CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getUser`(
        in _emailUser VARCHAR(30),
        in _passwordUser VARCHAR(150)
    )
BEGIN
    DECLARE _idUser INT DEFAULT 0;
    BEGIN
    SET _idUser := (select s.fkIdUser from tblSesion s WHERE s.name = _emailUser AND s.password = _passwordUser);
    END ;
    BEGIN
		IF _idUser != ''  OR _idUser != NULL  then 
			select u.id as idUser, u.email  as email, u.name  as nameUser, u.fkIdMaster  as IdMaster   from tblUsers u WHERE u.id = _idUser;
		end if ;
	END ;
END