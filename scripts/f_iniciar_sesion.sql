create or replace function f_validar_sesion(
	p_email character varying,
	p_clave character varying
)RETURNS table(estado int, dato character varying) as 
$body$
	declare 
		v_registro record; --almacenar un registro 
		v_respuesta character varying;
		v_estado int;
	begin
		begin
			select 
				u.dni_usuario,
				u.estado,
				u.clave
			into
				v_registro
			from
				usuario u 
				inner join personal p on (u.dni_usuario = p.dni)
			where
				p.email = p_email;

			v_estado = 500; --Error

			if FOUND then 
				if v_registro.clave = md5(p_clave) then 
					if v_registro.estado = 'I' then 
						v_respuesta = 'Usuario Inactivo';
					else 
						v_estado = 200;
						v_respuesta = v_registro.dni_usuario;
					end if;
				else 
					v_respuesta = 'Clave Incorrecta';
				end if;
			else 
				v_respuesta = 'El usuario no existe';
			end if;
		EXCEPTION
			when others then 
				RAISE EXCEPTION '%', SQLERRM;
		end;
		return query select v_estado, v_respuesta;
	end;
$body$
language plpgsql;

select * from f_validar_sesion ('hmera@usat.edu.pe','456')

